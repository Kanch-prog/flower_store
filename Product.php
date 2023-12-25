<?php
require_once 'db_conn.php';

class Product {
    protected $db;

    public function __construct() {
        $this->db = new DBConnection();
    }

    public function getProducts() {
        $query = "SELECT * FROM products";
        $result = $this->db->getConnection()->query($query);

        if ($result->num_rows > 0) {
            $products = [];
            while ($row = $result->fetch_assoc()) {
                $products[] = $row;
            }
            return $products;
        } else {
            return false;
        }
    }

    public function getProductPrice($productId) {
        // Retrieve the price of the product based on the product_id
        $productId = (int) $productId; // Cast to integer for security
        $query = "SELECT price FROM products WHERE id = $productId";
        $result = $this->db->getConnection()->query($query);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            return $row['price'];
        } else {
            return false; // Product not found
        }
    }

     // Function to get product details by product ID
     public function getProductDetails($productId) {
        $conn = $this->db->getConnection();

        // You should use prepared statements to prevent SQL injection.
        $productId = (int)$productId; // Cast to integer for security

        $query = "SELECT * FROM products WHERE id = $productId";
        $result = $conn->query($query);

        if ($result && $result->num_rows === 1) {
            return $result->fetch_assoc();
        } else {
            return null; // Product not found
        }
    }
}
?>
