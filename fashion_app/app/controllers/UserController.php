<?php

class UserController
{
    public function index()
    {
        require "../app/models/UserModel.php";

        $db = new Model();
        $userModel = new UserModel('1', 'users', 'users', $db);
        $user_roles = $userModel->getUserRoles();
        $users = $userModel->getAllUsers();

        $layout = 'user/index.php';
        require('../app/views/admin/index.php');
    }
    public function create()
    {
        require "../app/models/UserModel.php";

        $db = new Model();
        $userModel = new UserModel('1', 'users', 'users', $db);
        $user_roles = $userModel->getUserRoles();
        $layout = 'user/create.php';
        require('../app/views/admin/index.php');
    }
    public function store()
    {

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Assuming you have a Model instance
            require_once "../app/models/ImageModel.php";
            require_once "../app/models/UserModel.php";
            $db = new Model(); // Adjust this based on your database connection setup
            $userModel = new UserModel('1', 'users', 'users', $db);



            $name = $_POST['name'];
            $email = $_POST['email'];
            $role = $_POST['role'];
            // Handle file upload
            if (isset($_FILES['image'])) {
                $file = $_FILES['image'];

                // Check for errors
                if ($file['error'] === UPLOAD_ERR_OK) {
                    $uploadDir = 'uploads/user/';
                    $uploadPath = $uploadDir . basename($file['name']);
                    $image = basename($file['name']);
                    move_uploaded_file($file['tmp_name'], $uploadPath);

                    // Instantiate ImageModel
                    $imageModel = new ImageModel();

                    // Create a thumbnail
                    $thumbnailPath = $uploadDir . 'thumbnails/' . 'thumb_' . basename($file['name']);
                    $imageModel->createThumbnail($uploadPath, $thumbnailPath, 100, 100);

                    // Create a resized image
                    $resizedPath = $uploadDir . 'resized/' . 'resized_' . basename($file['name']);
                    $imageModel->resizeImage($uploadPath, $resizedPath, 300, 200);

                    // Now you can save these paths to the database or process them further as needed
                } else {
                    // Handle file upload error
                    echo 'File upload failed.';
                }
            }


            $password = $_POST['password'];



            // Call the method to store in the database
            $userModel->createUser($name, $email, $role, $image, $password);


            header("Location: /admin/user"); // Adjust the URL
            exit();
        } else {
            // Handle invalid request method (optional)
            header("HTTP/1.0 405 Method Not Allowed");
            echo "Method Not Allowed";
        }
    }


    public function edit($userId)
    {
        // Assuming you have a Model instance
        require_once "../app/models/userModel.php";
        $db = new Model(); // Adjust this based on your database connection setup
        $userModel = new userModel('1', 'categories', 'categories', $db);

        // Get the user data based on $userId
        $user = $userModel->getUserById($userId);
        $user_roles = $userModel->getUserRoles();
        // Check if the user exists
        if ($user) {
            // Load your edit form with the user data

            $layout = 'user/edit.php';
            require('../app/views/admin/index.php');
        } else {
            // Handle user not found (optional)
            header("HTTP/1.0 404 Not Found");
            echo "Category Not Found";
        }
    }

    public function update()
    {

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Assuming you have a Model instance
            require_once "../app/models/ImageModel.php";
            require_once "../app/models/UserModel.php";
            $db = new Model(); // Adjust this based on your database connection setup
            $userModel = new UserModel('1', 'users', 'users', $db);

            $user = $userModel->getUserById($_POST['id']);

            $id = $_POST['id'];
            $name = $_POST['name'];
            $email = $_POST['email'];
            $role = $_POST['role'];
            // Handle file upload
            if ($user) {
                // Get data from the form
                $image = $user['image'];
                if (isset($_FILES['image'])) {
                    $file = $_FILES['image'];

                    // Check for errors
                    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
                        // Handle file upload and update image
                        $file = $_FILES['image'];
                        $uploadDir = 'uploads/user/';
                        $uploadPath = $uploadDir . basename($file['name']);
                        $image = basename($file['name']);
                        move_uploaded_file($file['tmp_name'], $uploadPath);

                        // Instantiate ImageModel
                        $imageModel = new ImageModel();

                        // Create a thumbnail
                        $thumbnailPath = $uploadDir . 'thumbnails/' . 'thumb_' . basename($file['name']);
                        $imageModel->createThumbnail($uploadPath, $thumbnailPath, 100, 100);

                        // Create a resized image
                        $resizedPath = $uploadDir . 'resized/' . 'resized_' . basename($file['name']);
                        $imageModel->resizeImage($uploadPath, $resizedPath, 300, 350);

                        // Now you can save these paths to the database or process them further as needed
                    } else {
                        // Handle file upload error
                        echo 'File upload failed.';
                    }
                }
            } else {
                // Handle product not found (optional)
                header("HTTP/1.0 404 Not Found");
                echo "product Not Found";
            }


            $password = ($_POST['password'] !=  '') ? $_POST['password'] : $user['password'];



            // Call the method to store in the database
            $userModel->updateUser($id, $name, $email, $role, $image, $password);


            header("Location: /admin/user"); // Adjust the URL
            exit();
        } else {
            // Handle invalid request method (optional)
            header("HTTP/1.0 405 Method Not Allowed");
            echo "Method Not Allowed";
        }
    }
    public function delete()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            require_once "../app/models/userModel.php";
            $db = new Model(); // Adjust this based on your database connection setup
            $userModel = new userModel('1', 'categories', 'categories', $db);
            $userModel->delete($_POST['id']);
            header("Location: /admin/user");
        }
    }
}
