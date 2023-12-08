<?php
require_once '../app/models/ProductModel.php';
require_once '../app/models/OrderModel.php';
require_once '../app/models/CategoryModel.php';
require_once '../app/models/Model.php';
require_once '../app/models/UserModel.php';
class AdminController
{
    public function index()
    {
        $db = new Model();
        // Assuming you have instances for OrderModel, ProductModel, and CategoryModel
        $orderModel = new OrderModel('orders', 'order_items', 'order_details', $db);
        $productModel = new ProductModel('products', $db);
        $categoryModel = new CategoryModel('categories', $db);
        $userModel = new UserModel('users', $db);
        // Fetch data for the cards
        $totalProducts = count($productModel->getAllProducts());
        $totalCategories = count($categoryModel->getAllCategories());
        $totalCustomers = count($userModel->getAllUsers());
        $totalOrders = count($orderModel->getAllOrders());
        $totalItemsOrdered = $orderModel->getCompletedOrderQuantitiesForMonth(12);
        $totalRevenue = $orderModel->getTotalRevenue();
        $revenueMonth = $orderModel->getRevenueByMonth(2023);
        $top3SoldProducts = $orderModel->getTopSoldProducts(12);

        // Fetch data for the bar charts
        // $leftoverProducts = $productModel->getLeftoverProducts();
        // $bestSellingProducts = $productModel->getBestSellingProducts();

        // Fetch data for the pie charts
        $incomeTarget = 71;
        $expensesTarget = 54;
        $spendingsTarget = 32;
        $totalsTarget = 89;

        // Load the admin dashboard view with the fetched data
        require('../app/views/admin/index.php');
    }

    public function category()
    {
        // Add logic for the category page if needed
        $categoryModel = new CategoryModel('categories', 'your_database_instance_here');
        $categories = $categoryModel->getAllCategories();

        // Load the category view with the fetched data
        require('../app/views/admin/category.php');
    }
}
