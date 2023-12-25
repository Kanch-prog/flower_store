<?php
session_start();
require_once 'Order.php';
require_once 'Product.php';
require_once 'Cart.php';

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php"); // Redirect to the login page
    exit();
}

// Retrieve cart items from the session
$cartItems = $_SESSION['cart'];

if (empty($cartItems)) {
    echo "Your cart is empty.";
    exit();
}

// Create an instance of the Product class
$product = new Product();
$order = new Order();
$cart = new Cart();

// Initialize the $products array with product information
$products = $product->getProducts(); // You need to implement the getProducts method in your Product class

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Collect and validate user information here (e.g., shipping address).
    // Ensure that 'user_id' is set in the session
    if (!isset($_SESSION['user_id'])) {
        echo "You are not logged in. Please log in to complete your order.";
        exit();
    }

    // Create an order in the database.
    $userId = $_SESSION['user_id']; // Assuming the user is logged in.
    $orderId = $order->createOrder($userId);

    if ($orderId) {
        foreach ($cartItems as $productId => $quantity) {
            // Store order details in the order_items table.
            $order->addOrderItem($orderId, $productId, $quantity, $product->getProductPrice($productId));
        }

        // Redirect the user to the order confirmation page after successfully placing the order
        header("Location: payhere.php?order_id=$orderId");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <link rel="stylesheet" type="text/css" href="checkout.css">
</head>
<body>
    <form method="post" action="checkout.php" class="form-container">
        <div class="left-column shipping-info">
            <h2>Shipping Information</h2>
            <label for="full_name">Full Name:</label>
            <input type="text" name="full_name" id="full_name" required>

            <label for="shipping_address">Shipping Address:</label>
            <input type="text" name="shipping_address" id="shipping_address" required>

            <label for="contact_number">Contact Number:</label>
            <input type="tel" name="contact_number" id="contact_number" required>

            <label for="email">Email:</label>
            <input type="email" name="email" id="email" required>
        </div>

        <div class="right-column order-summary">
            <h2>Order Summary</h2>
            <ul>
                <?php foreach ($cartItems as $productId => $quantity): ?>
                    <li><?php echo "Product ID: $productId, Quantity: $quantity"; ?></li>
                <?php endforeach; ?>
            </ul>

            <p class="cart-total">Total Price: $<?php echo $cart->calculateTotalPrice($products); ?></p>
            <div class="payment-actions">
            <div>
                <a href="view_cart.php">Go Back to Cart</a>
            </div>

            <div>
                <input type="submit" value="Continue to Payment">
            </div>
        </div>
          
        </div>

        
    </form>
</body>
</html>
