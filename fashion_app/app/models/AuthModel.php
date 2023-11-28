<?php

require_once '../app/models/Model.php';
class AuthModel extends Model
{

    protected $db;

    public function __construct($db)
    {
        $this->db = $db;
        $this->connectToDatabase();
    }
    public function getCurrentUserId()
    {
        // Check if the user is logged in
        if (isset($_SESSION['user_id'])) {
            return $_SESSION['user_id'];
        } else {
            return null; // User is not logged in
        }
    }

    public function login($email, $password)
    {
        // Validate the user's credentials


        $user = $this->getUserByEmail($email);

        if ($user && password_verify($password, $user['password'])) {


            $_SESSION['user_id'] = $user['id'];
            $_SESSION['email'] = $user['email'];

            return null; // No error, authentication successful
        } else {
            return 'Invalid email or password'; // Error message for failed login
        }
    }
    private function getUserByEmail($email)
    {
        // Query the database to retrieve user data by email
        $sql = "SELECT * FROM users WHERE email = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$email]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        $stmt->closeCursor();

        return $user;
    }

    public function registerUser($name, $email, $password)
    {
        // Hash the password before storing it in the database
        $name = 'admin4';
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // Generate a unique activation code (optional, for email verification)
        $activationCode = md5(uniqid());

        // Insert user data into the database
        $sql = "INSERT INTO users (name, email, password) VALUES (:name, :email, :password)";
        $stmt = $this->db->prepare($sql);

        if ($stmt) {
            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':password', $hashedPassword);


            $stmt->execute();

            if ($stmt->affected_rows > 0) {
                // Registration successful
                return null;
            } else {
                // Registration failed
                return "Registration failed. Please try again.";
            }

            $stmt->close();
        } else {
            // Handle database error
            return "Database error. Please try again.";
        }
    }


    public function getUserByUsername($username)
    {
        // Implement code to retrieve user data by username
    }

    // Additional methods for user-related database operations
}
