<?php
class OrderModel extends Model
{

    private $orderTable;
    private $orderItemsTable;
    private $orderDetailsTable;

    protected $db;

    public function __construct($orderTable, $orderItemsTable, $orderDetailsTable, $db)
    {
        $this->orderTable = $orderTable;
        $this->orderItemsTable = $orderItemsTable;
        $this->orderDetailsTable = $orderDetailsTable;
        $this->db  = $db;
        $this->connectToDatabase();
    }
    public function getAllOrders()
    {
        $query = "SELECT {$this->orderTable}.id, first_name, last_name,total_price, status  FROM {$this->orderTable} INNER JOIN $this->orderDetailsTable ON {$this->orderTable}.id = $this->orderDetailsTable.order_id";
        $result = $this->db->query($query);

        // Check if the query was successful
        if ($result) {
            // Fetch all rows as associative arrays
            $orders = $result->fetchAll(PDO::FETCH_ASSOC);

            return $orders;
        } else {
            // Handle the case where the query fails
            return [];
        }
    }

    public function createOrder($userId, $totalPrice, $status)
    {
        $sql = "INSERT INTO {$this->orderTable} (user_id, total_price, status) VALUES (:userId, :totalPrice, :status)";

        try {
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(':userId', $userId);
            $stmt->bindParam(':totalPrice', $totalPrice);
            $stmt->bindParam(':status', $status);
            $stmt->execute();

            unset($_SESSION['cartDetails']);

            // Return the ID of the newly inserted order
            return $this->db->lastInsertId();
            // Destroy the cart session after the order is created



        } catch (PDOException $e) {
            // Handle the exception appropriately
            die("Error creating order: " . $e->getMessage());
        }
    }

    public function addOrderItem($orderId, $productId, $quantity, $unit_price)
    {
        $query = "INSERT INTO {$this->orderItemsTable} (order_id, product_id, quantity, unit_price) VALUES (:orderId, :productId, :quantity,:unit_price)";
        $params = [':orderId' => $orderId, ':productId' => $productId, ':quantity' => $quantity, 'unit_price' => $unit_price];

        try {
            $stmt = $this->db->prepare($query);
            $stmt->execute($params);
        } catch (PDOException $e) {
            // Handle the exception appropriately
            die("Error adding order item: " . $e->getMessage());
        }
    }

    public function insertOrderDetails($firstName, $lastName, $phone, $address1, $address2, $city, $state, $zipcode, $countryCode, $order_id)
    {
        $query = "INSERT INTO {$this->orderDetailsTable} (first_name, last_name, phone, address1, address2, city, state, zipcode, country_code, order_id) VALUES (:first_name, :last_name, :phone, :address1, :address2, :city, :state, :zipcode, :country_code, :order_id)";
        $params = [
            'first_name' => $firstName,
            'last_name' => $lastName,
            'phone'  => $phone,
            'address1' => $address1,
            'address2' => $address2,
            'city' => $city,
            'state' => $state,
            'zipcode' => $zipcode,
            'country_code' => $countryCode,
            'order_id' => $order_id,

        ];

        try {
            $stmt = $this->db->prepare($query);
            $stmt->execute($params);
        } catch (PDOException $e) {
            // Handle the exception appropriately
            die("Error updating order details: " . $e->getMessage());
        }
    }
    public function getTopSoldProducts($month, $limit = 3)
    {
        $query = "
        SELECT {$this->orderItemsTable}.product_id,
            title, 
            SUM({$this->orderItemsTable}.quantity) AS total_sold,
            {$this->orderItemsTable}.unit_price
        FROM {$this->orderItemsTable}
        INNER JOIN {$this->orderTable} ON {$this->orderItemsTable}.order_id = {$this->orderTable}.id
        INNER JOIN products ON {$this->orderItemsTable}.product_id = products.id
        WHERE {$this->orderTable}.status = 'completed'
            AND MONTH({$this->orderTable}.date) = :month
        GROUP BY {$this->orderItemsTable}.product_id
        ORDER BY total_sold 
        LIMIT :limit
    ";

        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
        $stmt->bindParam(':month', $month, PDO::PARAM_INT);
        $stmt->execute();

        // Check if the query was successful
        if ($stmt) {
            // Fetch all rows as associative arrays
            $topSoldProducts = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $topSoldProducts;
        } else {
            // Handle the case where the query fails
            return [];
        }
    }
    public function getTopSpendingCustomers($limit = 3)
    {
        $query = "
        SELECT user_id,
               SUM(total_price) AS total_spent
        FROM {$this->orderTable}
        WHERE status = 'completed'
        GROUP BY user_id
        ORDER BY total_spent DESC
        LIMIT :limit
    ";

        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
        $stmt->execute();

        // Check if the query was successful
        if ($stmt) {
            // Fetch all rows as associative arrays
            $topSpendingCustomers = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $topSpendingCustomers;
        } else {
            // Handle the case where the query fails
            return [];
        }
    }
    public function getUserOrders($userId)
    {
        $query = "
        SELECT 
               {$this->orderTable}.status,
               {$this->orderItemsTable}.product_id,
               {$this->orderItemsTable}.quantity,
               {$this->orderItemsTable}.unit_price,
               products.title,
               products.image
        FROM {$this->orderTable}
        INNER JOIN {$this->orderItemsTable} ON {$this->orderTable}.id = {$this->orderItemsTable}.order_id
        INNER JOIN products ON {$this->orderItemsTable}.product_id = products.id
        WHERE {$this->orderTable}.user_id = :userId
    ";


        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':userId', $userId, PDO::PARAM_INT);
        $stmt->execute();

        // Check if the query was successful
        if ($stmt) {
            // Fetch all rows as associative arrays
            $userOrders = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $userOrders;
        } else {
            // Handle the case where the query fails
            return [];
        }
    }
    public function getCompletedOrderQuantitiesForMonth($month)
    {
        $query = "
        SELECT
            SUM({$this->orderItemsTable}.quantity) AS monthly_quantities
        FROM {$this->orderTable}
        INNER JOIN {$this->orderItemsTable} ON {$this->orderTable}.id = {$this->orderItemsTable}.order_id
        WHERE {$this->orderTable}.status = 'completed'
        AND MONTH({$this->orderTable}.date) = :month
    ";

        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':month', $month, PDO::PARAM_INT);
        $stmt->execute();

        // Check if the query was successful
        if ($stmt) {
            // Fetch the result as a single value
            $monthlyQuantities = $stmt->fetchColumn();

            return $monthlyQuantities;
        } else {
            // Handle the case where the query fails
            return false;
        }
    }

    public function getTotalRevenue()
    {
        $query = "
            SELECT
                SUM(total_price) AS total_revenue
            FROM {$this->orderTable}
            WHERE status = 'completed'
        ";

        $stmt = $this->db->prepare($query);
        $stmt->execute();

        // Check if the query was successful
        if ($stmt) {
            // Fetch the total revenue as a single value
            $totalRevenue = $stmt->fetchColumn();

            return $totalRevenue !== false ? $totalRevenue : 0;
        } else {
            // Handle the case where the query fails
            return 0;
        }
    }
    public function getRevenueByMonth($year)
    {
        $query = "
            SELECT
                MONTH(date) AS month,
                SUM(total_price) AS monthly_revenue
            FROM {$this->orderTable}
            WHERE status = 'completed' AND YEAR(date) = :year
            GROUP BY MONTH(date)
        ";

        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':year', $year, PDO::PARAM_INT);
        $stmt->execute();

        // Check if the query was successful
        if ($stmt) {
            // Fetch all rows as associative arrays
            $revenueByMonth = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $revenueByMonth;
        } else {
            // Handle the case where the query fails
            return [];
        }
    }
    public function updateOrderStatus($orderId, $newStatus)
    {
        // Assuming you have a PDO connection stored in $this->db
        $query = "UPDATE orders SET status = :newStatus WHERE id = :orderId";
        $stmt = $this->db->prepare($query);

        // Bind parameters
        $stmt->bindParam(':newStatus', $newStatus, PDO::PARAM_STR);
        $stmt->bindParam(':orderId', $orderId, PDO::PARAM_INT);

        // Execute the query
        $stmt->execute();

        // Check if the query was successful
        if ($stmt->rowCount() > 0) {
            // The update was successful
            return true;
        } else {
            // The update failed
            return false;
        }
    }
}
