<?php

class CategoryController
{
    public function index()
    {
        require "../app/models/CategoryModel.php";

        $db = new Model();
        $categoryModel = new CategoryModel('1', 'categories', 'categories', $db);

        $categories = $categoryModel->getAllCategories();

        $layout = 'category/index.php';
        require('../app/views/admin/index.php');
    }
    public function create()
    {

        $layout = 'category/create.php';
        require('../app/views/admin/index.php');
    }

    // You can add more methods for handling different actions related to categories
    public function show($categoryId)
    {
        // Logic to display a specific category based on $categoryId
        echo "Show Category with ID: " . $categoryId;
    }


    public function store()
    {

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Assuming you have a Model instance
            require_once "../app/models/ImageModel.php";
            require_once "../app/models/CategoryModel.php";
            $db = new Model(); // Adjust this based on your database connection setup
            $categoryModel = new CategoryModel('1', 'categories', 'categories', $db);
            // Get data from the form
            $title = $_POST['title'];

            $description = $_POST['description'];
            // Handle file upload
            if (isset($_FILES['image'])) {
                $file = $_FILES['image'];

                // Check for errors
                if ($file['error'] === UPLOAD_ERR_OK) {
                    $uploadDir = 'uploads/category/';
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


            $status = isset($_POST['status']) ? 1 : 0; // Assuming it's a checkbox




            // Call the method to store in the database
            $categoryModel->createCategory($title, $description, $image, $status);


            header("Location: /admin/category"); // Adjust the URL
            exit();
        } else {
            // Handle invalid request method (optional)
            header("HTTP/1.0 405 Method Not Allowed");
            echo "Method Not Allowed";
        }
    }


    public function edit($categoryId)
    {
        // Assuming you have a Model instance
        require_once "../app/models/CategoryModel.php";
        $db = new Model(); // Adjust this based on your database connection setup
        $categoryModel = new CategoryModel('1', 'categories', 'categories', $db);

        // Get the category data based on $categoryId
        $category = $categoryModel->getCategoryById($categoryId);

        // Check if the category exists
        if ($category) {
            // Load your edit form with the category data

            $layout = 'category/edit.php';
            require('../app/views/admin/index.php');
        } else {
            // Handle category not found (optional)
            header("HTTP/1.0 404 Not Found");
            echo "Category Not Found";
        }
    }
    public function update()
    {

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Assuming you have a Model instance
            require_once "../app/models/ImageModel.php";
            require_once "../app/models/CategoryModel.php";
            $db = new Model(); // Adjust this based on your database connection setup
            $categoryModel = new CategoryModel('1', 'categories', 'categories', $db);

            // Get the category data based on $categoryId
            $category = $categoryModel->getCategoryById($_POST['id']);
            // Handle file upload

            // Check if the category exists
            if ($category) {
                // Get data from the form
                $image = $category['image'];
                if (isset($_FILES['image'])) {
                    $file = $_FILES['image'];

                    // Check for errors
                    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
                        // Handle file upload and update image
                        $file = $_FILES['image'];
                        $uploadDir = 'uploads/category/';
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
                    }
                }
                $id = $_POST['id'];
                $title = $_POST['title'];
                $description = $_POST['description'];
                $status = $_POST['status'];
                // Update the category in the database
                $categoryModel->updateCategory($id, $title, $description, $image, $status);

                // Redirect to the category list or another destination
                header("Location: /admin/category");
                exit();
            } else {
                // Handle category not found (optional)
                header("HTTP/1.0 404 Not Found");
                echo "Category Not Found";
            }
        } else {
            // Handle invalid request method (optional)
            header("HTTP/1.0 405 Method Not Allowed");
            echo "Method Not Allowed";
        }
    }
    public function delete()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            require_once "../app/models/CategoryModel.php";
            $db = new Model(); // Adjust this based on your database connection setup
            $categoryModel = new CategoryModel('1', 'categories', 'categories', $db);
            $id = $_POST['id'];
            $categoryModel->delete($id);
            header("Location: /admin/category");
        }
    }
}
