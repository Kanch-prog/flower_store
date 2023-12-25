<?php
require_once 'db_conn.php';
class Cart {
    protected $cart;

    public function __construct() {
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = [];
        }
        $this->cart = &$_SESSION['cart'];
    }

    public function addItem($productId, $quantity = 1) {
        if (isset($this->cart[$productId])) {
            $this->cart[$productId] += $quantity;
        } else {
            $this->cart[$productId] = $quantity;
        }
        
        // Debug output
        echo "Added $quantity of product $productId to the cart.";
    }
    

    public function updateItemQuantity($productId, $quantity) {
        if (isset($this->cart[$productId])) {
            $this->cart[$productId] = $quantity;
        }
    }

    public function removeItem($productId) {
        if (isset($this->cart[$productId])) {
            unset($this->cart[$productId]);
        }
    }

    public function getCart() {
        return $this->cart;
    }

    public function calculateTotalPrice($products) {
        $totalPrice = 0;
        foreach ($this->cart as $productId => $quantity) {
            $product = $products[$productId];
            $totalPrice += $product['price'] * $quantity;
        }
        return $totalPrice;
    }
}
?>
