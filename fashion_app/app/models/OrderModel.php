<?php
class OrderModel extends Model
{
    private $userIdColumn;
    private $ordersTable;
    private $orderItemsTable;
    private $orderDetailsTable;
    protected $db;

    public function __construct($userIdColumn, $ordersTable, $orderItemsTable, $orderDetailsTable, $db)
    {
        $this->userIdColumn = $userIdColumn;
        $this->ordersTable = $ordersTable;
        $this->orderItemsTable = $orderItemsTable;
        $this->orderDetailsTable = $orderDetailsTable;
        $this->db = $db;
        $this->connectToDatabase();
    }

    public function createOrder($userId, $totalPrice, $status)
    {
        $sql = "INSERT INTO {$this->ordersTable} ({$this->userIdColumn}, total_price, status) VALUES (:userId, :totalPrice, :status)";


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

    public function insertOrderDetails($firstName, $lastName, $phone, $address1, $address2, $city, $state, $zipcode, $countryCode)
    {
        $query = "INSERT INTO {$this->orderDetailsTable} (first_name, last_name, phone, address1, address2, city, state, zipcode, country_code) VALUES (:first_name, :last_name, :phone, :address1, :address2, :city, :state, :zipcode, :country_code)";
        $params = [
            'first_name' => $firstName,
            'last_name' => $lastName,
            'phone'  => $phone,
            'address1' => $address1,
            'address2' => $address2,
            'city' => $city,
            'state' => $state,
            'zipcode' => $zipcode,
            'country_code' => $countryCode
        ];

        try {
            $stmt = $this->db->prepare($query);
            $stmt->execute($params);
        } catch (PDOException $e) {
            // Handle the exception appropriately
            die("Error updating order details: " . $e->getMessage());
        }
    }
}
