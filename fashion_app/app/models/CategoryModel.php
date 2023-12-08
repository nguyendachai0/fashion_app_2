<?php
// CategoryModel.php
require_once '../app/models/Model.php';

class CategoryModel extends Model
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
    public function createCategory($title, $description, $image, $status)
    {
        try {
            // Insert category data into the database
            $sql = "INSERT INTO categories (title,  description, image, status) 
                    VALUES (:title, :description, :image, :status)";

            $stmt = $this->db->prepare($sql);

            // Bind parameters
            $stmt->bindParam(':title', $title);
            $stmt->bindParam(':description', $description);
            $stmt->bindParam(':image', $image);
            $stmt->bindParam(':status', $status);
            // Execute the prepared statement
            $stmt->execute();
        } catch (PDOException $e) {
            // Handle the exception (e.g., log the error or display a message)
            echo "<pre>";
            echo ("Error: " . $e->getMessage());
            echo "</pre>";
        }
    }
    public function getCategoryById($categoryId)
    {
        // Retrieve category data from the database based on $categoryId
        $sql = "SELECT * FROM categories WHERE id = :id";
        $stmt = $this->db->prepare($sql);

        $stmt->bindParam(":id", $categoryId, PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result;
    }
    public function updateCategory($categoryId, $title, $description, $image, $status)
    {
        // Update category data in the database based on $categoryId
        $sql = "UPDATE categories SET title=:title, description=:description, image=:image, status=:status WHERE id=:id";
        $stmt = $this->db->prepare($sql);

        $stmt->bindParam(":title", $title, PDO::PARAM_STR);
        $stmt->bindParam(":description", $description, PDO::PARAM_STR);
        $stmt->bindParam(":image", $image, PDO::PARAM_STR);
        $stmt->bindParam(":status", $status, PDO::PARAM_INT);
        $stmt->bindParam(":id", $categoryId, PDO::PARAM_INT);

        $stmt->execute();

        // Check if the update was successful
        // if ($stmt->affected_rows > 0) {
        //     $stmt->close();
        //     return true; // Update successful
        // } else {
        //     $stmt->close();
        //     return false; // No records were updated
        // }
    }
    public function delete($categoryId)
    {
        try {
            // Prepare the SQL query
            $sql = "DELETE FROM categories WHERE id = :id";
            $stmt = $this->db->prepare($sql);

            // Bind the parameter
            $stmt->bindParam(":id", $categoryId, PDO::PARAM_INT);

            // Execute the statement
            $stmt->execute();

            // Check if the deletion was successful
            if ($stmt->rowCount() > 0) {
                echo "Category with ID $categoryId has been deleted.";
            } else {
                echo "No category found with ID $categoryId.";
            }
        } catch (PDOException $e) {
            // Handle the exception (e.g., log the error or display a message)
            echo "Error: " . $e->getMessage();
        }
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

    // Setters (You can add more setters as needed)
    public function setName($name)
    {
        $this->name = $name;
    }

    public function getAllCategories()
    {

        try {
            // Prepare the SQL query
            $query = 'SELECT * FROM categories';

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
    public function getAllCategoryAssociativeArray()
    {
        try {
            // Prepare the SQL query to select id and title
            $query = 'SELECT id, title FROM categories';

            // Execute the query
            $statement = $this->db->query($query);

            // Fetch all rows as an associative array with id as keys and title as values
            $categories = $statement->fetchAll(PDO::FETCH_ASSOC);

            return $categories;
        } catch (PDOException $e) {
            // Handle the error (e.g., log it, return an empty array, or throw an exception)
            echo 'Error fetching category data: ' . $e->getMessage();
            return [];
        }
    }



    // You can add more methods as needed for CRUD operations or other functionality
}
