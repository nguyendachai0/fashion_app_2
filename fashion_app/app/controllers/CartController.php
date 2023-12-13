<?php
require_once '../app/models/Model.php';
require_once '../app/models/AuthModel.php';
require_once '../app/models/CartModel.php';
require_once '../app/models/ProductModel.php';


class CartController
{
    private $db;
    private $cartModel;
    // private $productModel;
    public function __construct()
    {
        $this->db = new Model();
        $this->cartModel = new CartModel('cart_items', $this->db);
        // $this->productModel = new ProductModel('products', $this->db);
    }
    public function delete()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $user_id = $_SESSION['user_id'];

            if ($user_id) {
                $product_id = $_POST['product_id'];
                $this->cartModel->deleteCartItem($user_id, $product_id);

                // Update session variables and redirect back to the cart page
                $cartItems = $this->cartModel->getCartByUserId($user_id);
                $cartDetails = $this->cartModel->getCartDetails($cartItems);
                $totalPrice = $this->cartModel->getTotalPrice($cartDetails);

                $_SESSION['cartDetails'] = $cartDetails;
                $_SESSION['total_price'] = $totalPrice;
                $_SESSION['totalItems'] = count($cartDetails);

                header("Location: /cart");
            } else {
                // User is not logged in, handle accordingly
                echo "User is not logged in.";
            }
        }
    }
    public function deleteAll()
    {

        $user_id = $_SESSION['user_id'];
        if (isset($user_id)) {
            $this->cartModel->clearCart($user_id);
        }
        header('Location: /cart');
    }
    public function update()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {


            $user_id = $_SESSION['user_id'];
            if ($user_id) {

                $product_id = $_POST['product_id'];
                $new_quantity = $_POST['new_quantity'];

                // Check if the new quantity is valid (greater than 0)
                if ($new_quantity > 0) {


                    $this->cartModel->updateCartItem($user_id, $product_id, $new_quantity);

                    // Update session variables and redirect back to the cart page
                    $cartItems = $this->cartModel->getCartByUserId($user_id);
                    $cartDetails = $this->cartModel->getCartDetails($cartItems);
                    $totalPrice = $this->cartModel->getTotalPrice($cartDetails);

                    $_SESSION['cartDetails'] = $cartDetails;
                    $_SESSION['total_price'] = $totalPrice;
                    $_SESSION['totalItems'] = count($cartDetails);

                    header("Location: /cart");
                } else {
                    // Invalid quantity, handle accordingly (e.g., show an error message)
                    echo "Invalid quantity.";
                }
            } else {
                // User is not logged in, handle accordingly
                echo "User is not logged in.";
            }
        }
    }


    public function index()
    {


        $user_id = $_SESSION['user_id'];
        if ($user_id !== null) {
            $cartItems = $this->cartModel->getCartByUserId($user_id);
            $cartDetails = $this->cartModel->getCartDetails($cartItems);
            $totalPrice = $this->cartModel->getTotalPrice($cartDetails);
            $_SESSION['cartDetails'] = $cartDetails;
            $_SESSION['total_price'] = $totalPrice;
            $_SESSION['totalItems'] = count($cartDetails);
            $layout = 'cart/index.php';
            require('../app/views/index.php');
        } else {
            header('Location: /login');
        }
    }

    public function add()
    {

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $user_id = $_SESSION['user_id'];
            if ($user_id) {
                $cartItems = $this->cartModel->getCartByUserId($user_id);

                $product_id = $_POST['product_id'];
                $quantity = $_POST['quantity'];
                $this->cartModel->addToCart($user_id, $product_id, $quantity);
                $cartItems = $this->cartModel->getCartByUserId($user_id);
                $cartDetails = $this->cartModel->getCartDetails($cartItems);
                $totalPrice = $this->cartModel->getTotalPrice($cartDetails);

                $_SESSION['cartDetails'] = $cartDetails;
                $_SESSION['total_price'] = $totalPrice;
                $_SESSION['totalItems'] = count($cartDetails);

                header("Location: /cart");
            } else {
                // User is not logged in, handle accordingly
                header("Location: /login");
            }
        }
    }
    public function proceedOrder()
    {
        // require "../app/models/AuthModel.php";
        require_once "../app/models/OrderModel.php";
        require_once "../app/models/CartModel.php";

        $user_id = $_SESSION['user_id'];
        // Check if the user is logged in
        if (!$user_id) {
            // Redirect to login or handle the case where the user is not logged in
            header("Location: /login");
            exit;
        }
        // Assuming you have an OrderModel with methods to create orders and order items
        $orderModel = new OrderModel('orders', 'order_items', 'order_details', new Model);
        $totalPrice = $_POST['total_price'];
        $status = 'pending';
        // Create a new order
        $orderId = $orderModel->createOrder($user_id, $totalPrice, $status);

        $cartItems = $this->cartModel->getCartByUserId($user_id);
        $cartDetails = $this->cartModel->getCartDetails($cartItems);
        $totalPrice = $this->cartModel->getTotalPrice($cartDetails);
        // Iterate through cart items and add them to order_items table
        foreach ($cartDetails as $cartItem) {
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

        $orderModel->insertOrderDetails($firstName, $lastName, $phone, $address1, $address2, $city, $state, $zipcode, $countryCode, $orderId);

        // Optionally, you can clear the cart after the order is placed
        $this->cartModel->clearCart($user_id);

        // Redirect to a thank you page or order summary page
        header("Location: /");
        exit;
    }
}
