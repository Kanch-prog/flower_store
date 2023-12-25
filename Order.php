<?php
require_once 'db_conn.php';

class Order {
    protected $db;

    public function __construct() {
        $this->db = new DBConnection();
    }

    public function createOrder($userId) {
        $conn = $this->db->getConnection();
        $userId = (int) $userId; // Cast to integer for security

        $query = "INSERT INTO orders (user_id, total_amount, status) VALUES ($userId, 0, 'pending')";

        if (mysqli_query($conn, $query)) {
            return mysqli_insert_id($conn); // Return the order ID
        }
        return false;
    }

    public function addOrderItem($orderId, $productId, $quantity) {
        $conn = $this->db->getConnection();
        $orderId = (int) $orderId; // Cast to integer for security
        $productId = (int) $productId; // Cast to integer for security
        $quantity = (int) $quantity; // Cast to integer for security
    
        // Retrieve the price of the product based on the product ID
        $query = "SELECT price FROM products WHERE id = $productId";
        $result = mysqli_query($conn, $query);
    
        if ($result && $row = mysqli_fetch_assoc($result)) {
            $price = $row['price'];
    
            $query = "INSERT INTO order_items (order_id, product_id, quantity, price) VALUES ($orderId, $productId, $quantity, $price)";
            return mysqli_query($conn, $query);
        }
    
        return false;
    }
    

    public function updateOrderStatus($orderId, $status) {
        $conn = $this->db->getConnection();
        $orderId = (int) $orderId; // Cast to integer for security
        $status = mysqli_real_escape_string($conn, $status); // Escape the status string

        $query = "UPDATE orders SET status = '$status' WHERE id = $orderId";

        return mysqli_query($conn, $query);
    }
}
?>
