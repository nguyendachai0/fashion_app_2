<?php
// CategoryModel.php
require_once '../app/models/Model.php';

class CartModel extends Model
{
    protected $id;
    protected $db;
    private $name;
    private $description;

    // Constructor
    public function __construct($id, $name, $description, $db)
    {
        parent::__construct($id); // Call the parent constructor with the ID

        $this->name = $name;
        $this->description = $description;
        $this->db = $db;
        $this->connectToDatabase();
    }



    public function getCartByUserId($userId)
    {
        // Assuming your user ID column is named 'user_id'
        $query = "SELECT * FROM cart_items WHERE $userId = :userId";
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






    // You can add more methods as needed for CRUD operations or other functionality
}
