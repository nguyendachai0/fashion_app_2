<?php
require_once '../app/models/Model.php';
// app/controllers/ProductController.php

class ProductController
{
    public function index()
    {
        require "../app/models/ProductModel.php";

        $db = new Model();
        $productModel = new ProductModel('1', 'products', 'products', $db);

        $products = $productModel->getAllProducts();

        $layout = 'product/index.php';
        require('../app/views/admin/index.php');
    }
    public function create()
    {
        require_once "../app/models/CategoryModel.php";

        $db = new Model();
        $categoryModel = new CategoryModel('1', 'categories', 'categories', $db);
        $allCategoryTitle = $categoryModel->getAllCategoryAssociativeArray();

        $layout = 'product/create.php';
        require('../app/views/admin/index.php');
    }
    public function store()
    {

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Assuming you have a Model instance
            require_once "../app/models/ImageModel.php";
            require_once "../app/models/ProductModel.php";
            $db = new Model(); // Adjust this based on your database connection setup
            $productModel = new ProductModel('1', 'products', 'products', $db);
            // Get data from the form
            $title = $_POST['title'];
            $description = $_POST['description'];
            // Handle file upload
            if (isset($_FILES['image'])) {
                $file = $_FILES['image'];

                // Check for errors
                if ($file['error'] === UPLOAD_ERR_OK) {
                    $uploadDir = 'uploads/product/';
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


            $status = isset($_POST['status']) ? 1 : 0; // Assuming it's a checkbox
            $category_id = ($_POST['category_id']);
            $price = $_POST['price'];





            // Call the method to store in the database
            $productModel->createProduct($title, $description, $price, $image, $status, $category_id);


            header("Location: /admin/product"); // Adjust the URL
            exit();
        } else {
            // Handle invalid request method (optional)
            header("HTTP/1.0 405 Method Not Allowed");
            echo "Method Not Allowed";
        }
    }
    public function edit($productId)
    {
        // Assuming you have a Model instance
        require_once "../app/models/ProductModel.php";
        require_once "../app/models/CategoryModel.php";

        $db = new Model(); // Adjust this based on your database connection setup
        $productModel = new productModel('1', 'products', 'products', $db);

        // Get the product data based on $productId
        $product = $productModel->getProductById($productId);

        $categoryModel = new CategoryModel('1', 'categories', 'categories', $db);
        $allCategoryTitle = $categoryModel->getAllCategoryAssociativeArray();


        // Check if the product exists
        if ($product) {
            // Load your edit form with the product data

            $layout = 'product/edit.php';
            require('../app/views/admin/index.php');
        } else {
            // Handle product not found (optional)
            header("HTTP/1.0 404 Not Found");
            echo "product Not Found";
        }
    }
    public function update()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Assuming you have a Model instance
            require_once "../app/models/ImageModel.php";
            require_once "../app/models/productModel.php";
            $db = new Model(); // Adjust this based on your database connection setup
            $productModel = new productModel('1', 'categories', 'categories', $db);

            // Get the product data based on $productId
            $product = $productModel->getProductById($_POST['id']);
            // Handle file upload

            // Check if the product exists
            if ($product) {
                // Get data from the form
                $image = $product['image'];
                if (isset($_FILES['image'])) {
                    $file = $_FILES['image'];

                    // Check for errors
                    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
                        // Handle file upload and update image
                        $file = $_FILES['image'];
                        $uploadDir = 'uploads/product/';
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
                $id = $_POST['id'];
                $title = $_POST['title'];

                $description = $_POST['description'];
                $status = $_POST['status'];
                $category_id = ($_POST['category_id']);
                $price = $_POST['price'];

                // Update the product in the database
                $productModel->updateProduct($id, $title,  $description, $price, $image, $status, $category_id);

                // Redirect to the product list or another destination
                header("Location: /admin/product");
                exit();
            } else {
                // Handle product not found (optional)
                header("HTTP/1.0 404 Not Found");
                echo "product Not Found";
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
            require_once "../app/models/productModel.php";
            $db = new Model(); // Adjust this based on your database connection setup
            $productModel = new productModel('1', 'categories', 'categories', $db);
            $id = $_POST['id'];
            $productModel->delete($id);
            header("Location: /admin/product");
        }
    }
    public function show($id)
    {

        require_once "../app/models/ProductModel.php";
        $db = new Model(); // Adjust this based on your database connection setup
        $productModel = new productModel('products', $db);
        $product = $productModel->getProductById($id);

        $layout = '../app/views/product/product-detail.php';

        require('../app/views/index.php');
    }
}
