<?php

class OrderController
{
    public function index()
    {
        require_once "../app/models/OrderModel.php";

        $db = new Model();
        $orderModel = new OrderModel('orders', 'order_items', 'order_details', $db);
        $orders = $orderModel->getAllOrders();

        $layout = 'order/index.php';
        require('../app/views/admin/index.php');
    }
    public function create()
    {
        require_once "../app/models/OrderModel.php";

        $db = new Model();
        $orderModel = new OrderModel('1', 'orders', 'orders', $db);
        $layout = 'order/create.php';
        require('../app/views/admin/index.php');
    }
    public function updateStatus()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Assuming you have a Model instance
            require_once "../app/models/OrderModel.php";
            $db = new Model(); // Adjust this based on your database connection setup
            $orderModel = new OrderModel('orders', 'order_items', 'order_details', $db);

            // Get the data from the AJAX request
            $orderId = $_POST['orderId'];
            $newStatus = $_POST['newStatus'];

            // Call the method to update status in the database
            $orderModel->updateOrderStatus($orderId, $newStatus);

            // You might want to send a response back to the frontend
            echo json_encode(['success' => true]);
            exit();
        } else {
            // Handle invalid request method (optional)
            header("HTTP/1.0 405 Method Not Allowed");
            echo "Method Not Allowed";
        }
    }
}
