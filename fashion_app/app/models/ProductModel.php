<?php
// CategoryModel.php
require_once '../app/models/Model.php';

class ProductModel extends Model
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
    public function createProduct($title, $description, $price, $image, $status, $category_id)
    {
        try {
            // Insert category data into the database
            $sql = "INSERT INTO products (title, description, price, image, status, category_id) 
                    VALUES (:title, :description,:price, :image, :status, :category_id)";

            $stmt = $this->db->prepare($sql);

            // Bind parameters
            $stmt->bindParam(':title', $title);
            $stmt->bindParam(':description', $description);
            $stmt->bindParam(':price', $price);
            $stmt->bindParam(':image', $image);
            $stmt->bindParam(':status', $status);
            $stmt->bindParam(':category_id', $category_id);

            // Execute the prepared statement
            $stmt->execute();
        } catch (PDOException $e) {
            // Handle the exception (e.g., log the error or display a message)
            echo "<pre>";
            echo ("Error: " . $e->getMessage());
            echo "</pre>";
        }
    }
    public function getProductById($productId)
    {
        // Retrieve category data from the database based on $productId
        $sql = "SELECT * FROM products WHERE id = :id";
        $stmt = $this->db->prepare($sql);

        $stmt->bindParam(":id", $productId, PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result;
    }

    // Getters
    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getDescription()
    {
        return $this->description;
    }

    // Setters (You can add more setters as needed)
    public function setName($name)
    {
        $this->name = $name;
    }

    public function setDescription($description)
    {
        $this->description = $description;
    }
    public function getAllProducts()
    {

        try {
            // Prepare the SQL query
            $query = 'SELECT * FROM products';

            // Execute the query
            $statement = $this->db->query($query);

            // Fetch all rows as associative arrays
            $categories = $statement->fetchAll(PDO::FETCH_ASSOC);

            return $categories;
        } catch (PDOException $e) {
            // Handle the error (e.g., log it, return an empty array, or throw an exception)
            echo 'Error fetching categories: ' . $e->getMessage();
            return [];
        }
    }
    public function updateProduct($id, $title,  $description, $price, $image, $status, $category_id)
    {
        // Update category data in the database based on $categoryId
        $sql = "UPDATE products SET title=:title, description=:description, price=:price, image=:image, status=:status,  category_id=:category_id WHERE id=:id";
        $stmt = $this->db->prepare($sql);

        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':price', $price);
        $stmt->bindParam(':image', $image);
        $stmt->bindParam(':status', $status);
        $stmt->bindParam(':category_id', $category_id);
        $stmt->bindParam(':id', $id);


        $stmt->execute();
    }
    public function delete($productId)
    {
        try {
            // Prepare the SQL query
            $sql = "DELETE FROM products WHERE id = :id";
            $stmt = $this->db->prepare($sql);

            // Bind the parameter
            $stmt->bindParam(":id", $productId, PDO::PARAM_INT);

            // Execute the statement
            $stmt->execute();

            // Check if the deletion was successful
            if ($stmt->rowCount() > 0) {
                echo "Products with ID $productId has been deleted.";
            } else {
                echo "No product found with ID $productId.";
            }
        } catch (PDOException $e) {
            // Handle the exception (e.g., log the error or display a message)
            echo "Error: " . $e->getMessage();
        }
    }
    public function getProductsByStatus($status)
    {
        // Replace this with your actual database query
        // Assuming $db is your database connection object
        $query = "SELECT * FROM products WHERE status = :status";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':status', $status, PDO::PARAM_INT);
        $stmt->execute();

        // Fetch all products
        $products = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $products;
    }
    public function getNumProducts($num)
    {
        try {
            // Prepare the SQL query to retrieve the first 8 products
            $query = 'SELECT * FROM products LIMIT ' . $num;

            // Execute the query
            $statement = $this->db->query($query);

            // Fetch all rows as associative arrays
            $numProducts = $statement->fetchAll(PDO::FETCH_ASSOC);

            return $numProducts;
        } catch (PDOException $e) {
            // Handle the error (e.g., log it, return an empty array, or throw an exception)
            echo 'Error fetching products: ' . $e->getMessage();
            return [];
        }
    }




    // You can add more methods as needed for CRUD operations or other functionality
}
