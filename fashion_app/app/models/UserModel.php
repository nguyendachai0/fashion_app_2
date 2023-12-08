<?php
// CategoryModel.php
require_once '../app/models/Model.php';

class UserModel extends Model
{
    protected $db;
    protected $userRole;
    private $name;
    private $description;
    protected $user_roles = [
        0 => 'Admin',
        1 => 'Cashier',
        2 => 'Client'
    ];

    // Constructor
    public function __construct($name, $db)
    {

        $this->name = $name;
        $this->db = $db;
        $this->connectToDatabase();
    }
    public function getAllUsers()
    {
        try {
            // Prepare the SQL query to select all user data
            $query = 'SELECT * FROM users';

            // Execute the query
            $statement = $this->db->query($query);

            // Fetch all rows as associative arrays
            $users = $statement->fetchAll(PDO::FETCH_ASSOC);

            return $users;
        } catch (PDOException $e) {
            // Handle the error (e.g., log it, return an empty array, or throw an exception)
            echo 'Error fetching user data: ' . $e->getMessage();
            return [];
        }
    }
    public function createUser($name, $email, $role, $image, $password)
    {
        try {
            // Hash the password
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

            // Insert user data into the database
            $sql = "INSERT INTO users (name, email, role_as, image, password) 
                    VALUES (:name, :email, :role_as, :image, :password)";

            $stmt = $this->db->prepare($sql);

            // Bind parameters
            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':role_as', $role);
            $stmt->bindParam(':image', $image);
            $stmt->bindParam(':password', $hashedPassword);

            // Execute the prepared statement
            $stmt->execute();
        } catch (PDOException $e) {
            // Handle the exception (e.g., log the error or display a message)
            echo "<pre>";
            echo ("Error: " . $e->getMessage());
            echo "</pre>";
        }
    }
    public function getUserById($userId)
    {
        // Retrieve category data from the database based on $userId
        $sql = "SELECT * FROM users WHERE id = :id";
        $stmt = $this->db->prepare($sql);

        $stmt->bindParam(":id", $userId, PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result;
    }
    public function updateUser($id, $name, $email, $role, $image, $password)
    {
        try {
            // Hash the password
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

            // Insert user data into the database
            $sql = "UPDATE users 
            SET name = :name, email = :email, role_as = :role_as, image = :image, password = :password 
            WHERE id = :id";

            $stmt = $this->db->prepare($sql);

            // Bind parameters
            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':role_as', $role);
            $stmt->bindParam(':image', $image);
            $stmt->bindParam(':password', $hashedPassword);
            $stmt->bindParam(':id', $id);

            // Execute the prepared statement
            $stmt->execute();
        } catch (PDOException $e) {
            // Handle the exception (e.g., log the error or display a message)
            echo "<pre>";
            echo ("Error: " . $e->getMessage());
            echo "</pre>";
        }
    }
    public function delete($userId)
    {
        try {
            // Prepare the SQL query
            $sql = "DELETE FROM users WHERE id = :id";
            $stmt = $this->db->prepare($sql);

            // Bind the parameter
            $stmt->bindParam(":id", $userId, PDO::PARAM_INT);

            // Execute the statement
            $stmt->execute();

            // Check if the deletion was successful
            if ($stmt->rowCount() > 0) {
                echo "Products with ID $userId has been deleted.";
            } else {
                echo "No product found with ID $userId.";
            }
        } catch (PDOException $e) {
            // Handle the exception (e.g., log the error or display a message)
            echo "Error: " . $e->getMessage();
        }
    }

    public function getUserRoles()
    {
        return $this->user_roles;
    }
}
