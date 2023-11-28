<?php
// Assuming you have a ProductModel to interact with the database
require_once '../app/models/Model.php';


class HomeController
{
    public function index()
    {
        require_once "../app/models/ProductModel.php";
        require_once "../app/models/AuthModel.php";
        require_once "../app/models/CartModel.php";
        $db = new Model();
        // Assuming you have a ProductModel with a method to get products by status
        $productModel = new ProductModel(1, 'products', 'products', $db);
        // Call the function to get products with status = 5
        $productSlide = $this->getProductsByStatus(5);
        $eightProducts = $productModel->getNumProducts(8);
        $cartDetails = isset($_SESSION['cartDetails']) ? $_SESSION['cartDetails'] : [];

        $_SESSION['totalItems'] = count($cartDetails);
        $layout = "../app/views/layouts/main.php";
        require('../app/views/index.php');
        // Now you can use $products in your view or perform further actions
    }

    public function getProductsByStatus($status)
    {
        require_once "../app/models/ProductModel.php";
        $db = new Model();
        // Assuming you have a ProductModel with a method to get products by status
        $productModel = new ProductModel(1, 'products', 'products', $db);

        $products = $productModel->getProductsByStatus($status);


        return $products;
    }
}
