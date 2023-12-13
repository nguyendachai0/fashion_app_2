<?php
// CategoryModel.php
require_once '../app/models/Model.php';

class CartModel extends Model
{
    protected $db;
    private $name;

    // Constructor
    public function __construct($name, $db)
    {

        $this->name = $name;
        $this->db = $db;
        $this->connectToDatabase();
    }
    public function getTotalPrice($cartDetails)
    {
        $totalPrice = 0;

        foreach ($cartDetails as $cartItem) {
            $totalPrice += $cartItem['product_price'] * $cartItem['quantity'];
        }

        return $totalPrice;
    }
    public function getCartDetails($cartItems)
    {
        $cartDetails = [];
        $productModel = new ProductModel('products', $this->db);

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

        return $cartDetails;
    }
    public function getCartByUserId($userId)
    {
        // Assuming your user ID column is named 'user_id'

        $query = "SELECT * FROM cart_items WHERE user_id = :userId";
        $params = [':userId' => $userId];

        try {
            $stmt = $this->db->prepare($query);
            $stmt->execute($params);

            // Fetch all cart items for the user
            $cartItems = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $cartItems;
        } catch (PDOException $e) {
            // Handle the exception appropriately (log, display an error message, etc.)
            die("Error: " . $e->getMessage());
        }
    }
    public function addToCart($user_id, $product_id, $quantity)
    {
        try {
            // Check if the product is already in the cart for the user
            $sqlCheck = "SELECT * FROM cart_items WHERE user_id = :user_id AND product_id = :product_id";
            $stmtCheck = $this->db->prepare($sqlCheck);
            $stmtCheck->bindParam(':user_id', $user_id);
            $stmtCheck->bindParam(':product_id', $product_id);
            $stmtCheck->execute();

            if ($stmtCheck->rowCount() > 0) {

                $sqlUpdate = "UPDATE cart_items SET quantity = quantity + :quantity 
                              WHERE user_id = :user_id AND product_id = :product_id";
                $stmtUpdate = $this->db->prepare($sqlUpdate);
                $stmtUpdate->bindParam(':user_id', $user_id);
                $stmtUpdate->bindParam(':product_id', $product_id);
                $stmtUpdate->bindParam(':quantity', $quantity);
                $stmtUpdate->execute();
            } else {
                // If the product is not in the cart, insert a new record
                $sqlInsert = "INSERT INTO cart_items (user_id, product_id, quantity) 
                              VALUES (:user_id, :product_id, :quantity)";
                $stmtInsert = $this->db->prepare($sqlInsert);
                $stmtInsert->bindParam(':user_id', $user_id);
                $stmtInsert->bindParam(':product_id', $product_id);
                $stmtInsert->bindParam(':quantity', $quantity);
                $stmtInsert->execute();
            }

            echo "Product added to the cart.";
        } catch (PDOException $e) {
            // Handle the exception (e.g., log the error or display a message)
            echo "Error: " . $e->getMessage();
        }
    }
    public function clearCart($userId)
    {
        $query = "DELETE FROM {$this->name} WHERE user_id = :userId";
        $params = [':userId' => $userId];

        try {
            $stmt = $this->db->prepare($query);
            $stmt->execute($params);
        } catch (PDOException $e) {
            // Handle the exception appropriately
            die("Error clearing cart: " . $e->getMessage());
        }
    }
    public function deleteCartItem($user_id, $product_id)
    {
        try {
            // Check if the product is in the cart for the user
            $sqlCheck = "SELECT * FROM cart_items WHERE user_id = :user_id AND product_id = :product_id";
            $stmtCheck = $this->db->prepare($sqlCheck);
            $stmtCheck->bindParam(':user_id', $user_id);
            $stmtCheck->bindParam(':product_id', $product_id);
            $stmtCheck->execute();

            if ($stmtCheck->rowCount() > 0) {
                // If the product is in the cart, delete the record
                $sqlDelete = "DELETE FROM cart_items WHERE user_id = :user_id AND product_id = :product_id";
                $stmtDelete = $this->db->prepare($sqlDelete);
                $stmtDelete->bindParam(':user_id', $user_id);
                $stmtDelete->bindParam(':product_id', $product_id);
                $stmtDelete->execute();

                echo "Product removed from the cart.";
            } else {
                echo "Product not found in the cart.";
            }
        } catch (PDOException $e) {
            // Handle the exception (e.g., log the error or display a message)
            echo "Error: " . $e->getMessage();
        }
    }
    public function updateCartItem($user_id, $product_ids, $quantities)
    {
        try {
            // Check if the arrays have the same number of elements
            if (count($product_ids) !== count($quantities)) {
                echo "Error: Product IDs and quantities arrays must have the same number of elements.";
                return;
            }
            // Loop through the arrays and update each item in the cart
            for ($i = 0; $i < count($product_ids); $i++) {
                $product_id = $product_ids[$i];
                $quantity = $quantities[$i];

                // Check if the product is in the cart for the user
                $sqlCheck = "SELECT * FROM cart_items WHERE user_id = :user_id AND product_id = :product_id";
                $stmtCheck = $this->db->prepare($sqlCheck);
                $stmtCheck->bindParam(':user_id', $user_id);
                $stmtCheck->bindParam(':product_id', $product_id);
                $stmtCheck->execute();

                if ($stmtCheck->rowCount() > 0) {
                    // If the product is in the cart, update the quantity
                    $sqlUpdate = "UPDATE cart_items SET quantity = :quantity 
                      WHERE user_id = :user_id AND product_id = :product_id";
                    $stmtUpdate = $this->db->prepare($sqlUpdate);
                    $stmtUpdate->bindParam(':user_id', $user_id);
                    $stmtUpdate->bindParam(':product_id', $product_id);
                    $stmtUpdate->bindParam(':quantity', $quantity);
                    $stmtUpdate->execute();

                    echo "Cart item (product_id: $product_id) updated to quantity: $quantity.<br>";
                } else {
                    echo "Product (product_id: $product_id) not found in the cart.<br>";
                }
            }
        } catch (PDOException $e) {
            // Handle the exception (e.g., log the error or display a message)
            echo "Error: " . $e->getMessage();
        }
    }








    // You can add more methods as needed for CRUD operations or other functionality
}
