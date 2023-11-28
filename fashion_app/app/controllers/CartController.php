<?php
require_once '../app/models/Model.php';
// app/controllers/ProductController.php

class CartController
{
    public function index()
    {
        require "../app/models/CartModel.php";
        require "../app/models/AuthModel.php";
        require "../app/models/ProductModel.php";

        $db = new Model();
        $cartModel = new CartModel('1', 'cart_items', 'cart_items', $db);
        $user = (new AuthModel($db));
        $userId = $user->getCurrentUserId();
        $cartItems = $cartModel->getCartByUserId($userId);
        $cartDetails = [];
        $productModel = new ProductModel('1', 'products', 'products', $db);
        foreach ($cartItems as $cartItem) {
            $productId = $cartItem['product_id'];
            $product = $productModel->getProductById($productId);

            // Assuming getProductById returns an array with product details
            if ($product) {
                $cartDetails[] = [
                    'product_id' => $productId,
                    'image' => $product['image'],
                    'product_name' => $product['title'],
                    'product_price' => $product['price'],
                    'quantity' => $cartItem['quantity'],

                    // Add other product details as needed
                ];
            }
        }
        $totalPrice = $this->getTotalPrice($cartDetails);
        $_SESSION['cartDetails'] = $cartDetails;
        $_SESSION['total_price'] = $totalPrice;
        $_SESSION['totalItems'] = count($cartDetails);
        $layout = 'cart/index.php';
        require('../app/views/index.php');
    }
    public function getTotalPrice($cartDetails)
    {
        $totalPrice = 0;

        foreach ($cartDetails as $cartItem) {
            $totalPrice += $cartItem['product_price'] * $cartItem['quantity'];
        }

        return $totalPrice;
    }
    public function add()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            require "../app/models/CartModel.php";
            require "../app/models/AuthModel.php";

            $db = new Model();
            $cartModel = new CartModel('2', 'cart_items', 'cart_items', $db);
            $authModel = new AuthModel($db);
            $user_id = $authModel->getCurrentUserId();

            if ($user_id) {
                $product_id = $_POST['product_id'];
                $quantity = $_POST['quantity'];
                $cartModel->addToCart($user_id, $product_id, $quantity);

                // Rest of your code

                header("Location: /cart");
            } else {
                // User is not logged in, handle accordingly
                echo "User is not logged in.";
            }
        }
    }
    public function proceedOrder()
    {
        require "../app/models/AuthModel.php";
        require "../app/models/OrderModel.php";
        require "../app/models/CartModel.php";
        $user = new AuthModel(new Model());
        $userId = $user->getCurrentUserId();

        // Check if the user is logged in
        if (!$userId) {
            // Redirect to login or handle the case where the user is not logged in
            header("Location: /login");
            exit;
        }

        // Assuming you have an OrderModel with methods to create orders and order items
        $orderModel = new OrderModel('user_id', 'orders', 'order_items', 'order_details', new Model());
        $totalPrice = $_POST['total_price'];
        $status = 'pending';
        // Create a new order
        $orderId = $orderModel->createOrder($userId, $totalPrice, $status);

        // Iterate through cart items and add them to order_items table
        foreach ($_SESSION['cartDetails'] as $cartItem) {
            $productId = $cartItem['product_id'];
            $quantity = $cartItem['quantity'];
            $unit_price = $cartItem['product_price'];

            // Add the product to the order_items table
            $orderModel->addOrderItem($orderId, $productId, $quantity, $unit_price);
        }

        // Update order_details table with total price
        $totalPrice = $_POST['total_price'];
        $status = 'pending';
        $firstName = $_POST['firstName'];
        $lastName = $_POST['lastName'];
        $phone = $_POST['phone'];
        $address1 = $_POST['address1'];
        $address2 = $_POST['address2'];
        $city = $_POST['city'];
        $state = $_POST['state'];
        $zipcode = $_POST['zipcode'];
        $countryCode = $_POST['countryCode'];

        $orderModel->insertOrderDetails($firstName, $lastName, $phone, $address1, $address2, $city, $state, $zipcode, $countryCode);

        // Optionally, you can clear the cart after the order is placed
        $cartModel = new CartModel('1', 'cart_items', 'cart_items', $db);
        $cartModel->clearCart($userId);

        // Redirect to a thank you page or order summary page
        header("Location: /");
        exit;
    }
}
