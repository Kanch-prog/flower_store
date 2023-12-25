<?php
session_start();
require_once 'Cart.php';

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['product_id'])) {
    $productId = $_GET['product_id'];
    $cart = new Cart();
    $cart->removeItem($productId);
}

header('Location: view_cart.php');
exit();
?>
