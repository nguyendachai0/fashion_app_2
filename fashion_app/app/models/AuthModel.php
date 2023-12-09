<?php

require_once '../app/models/Model.php';
class AuthModel extends Model
{

    protected $db;
    private static $auth;
    public function __construct($db = null)
    {
        $this->db = $db;
        $this->connectToDatabase();
    }
    public static function getInstance($db)
    {
        if (!self::$auth) {
            self::$auth = new self($db);
        }
        return self::$auth;
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
    public function isLoggedIn()
    {
        // Check if the user is logged in by verifying the presence of user ID in the session
        return isset($_SESSION['user_id']);
    }
    public function isAdmin($user_id)
    {
        // Assuming you have a 'role' column in your user database table
        // Check if the user with the given ID has the role of 'admin'
        $stmt = $this->db->prepare("SELECT role_as FROM users WHERE id = :user_id");


        $stmt->bindParam(':user_id', $user_id);
        $result = $stmt->execute();
        $role_as = $stmt->fetch(PDO::FETCH_ASSOC);
        $stmt->fetch();
        $stmt->closeCursor();

        return $role_as['role_as'] === 0;
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
