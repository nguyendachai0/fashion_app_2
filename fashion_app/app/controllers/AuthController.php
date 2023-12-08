<?php
require_once '../app/models/AuthModel.php';
require_once '../app/models/Model.php';
require_once '../app/controllers/AuthController.php';


class AuthController
{
    private $authModel;

    public function __construct()
    {
        $db = new Model();

        $this->authModel = new AuthModel($db);
    }
    public function login()
    {

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Validate and sanitize user input
            $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
            $password = $_POST['password'];


            // Authenticate the user using the AuthModel
            $error = $this->authModel->login($email, $password);


            if ($error === null) {
                // Login successful, redirect to the dashboard or another destination
                $user_id = $this->authModel->getCurrentUserId();


                header("Location: /");
                exit();
            } else {
                // Login failed, store the error in a session variable and redirect back to login page
                $_SESSION['login_error'] = $error;
                header("Location: login");
                exit();
            }
        }

        // Display the login form

        require('../app/views/auth/login.php');
    }
    public function access_denied()
    {
        require('../app/views/access-denied.php');
        die();
    }
    public function register()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Validate and sanitize user input
            $username = 'h';
            $email = $_POST['email'];
            $password = $_POST['password'];

            // Register the user using the AuthModel
            $this->authModel->registerUser($username, $email, $password);

            // Redirect to login page or another destination
            header("Location: login");
            exit();
        }

        // Display registration form
        include('../app/views/auth/register.php');
    }
    public function logout()
    {
        session_start();
        session_unset();
        session_destroy();
        header("Location: login");
        exit();
    }




    // Additional methods for authentication-related functionalities
}
