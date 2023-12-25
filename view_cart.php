<?php
session_start();

require_once 'Product.php';
require_once 'Cart.php';

$product = new Product();
$cart = new Cart();
$products = $product->getProducts();
$cartItems = $cart->getCart();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    foreach ($cartItems as $productId => $quantity) {
        $newQuantity = $_POST[$productId];
        if ($newQuantity <= 0) {
            $cart->removeItem($productId);
        } else {
            $cart->updateItemQuantity($productId, $newQuantity);
        }
    }
    header('Location: view_cart.php');
    exit();
}
?>

<?php include 'header.php'; ?>

        <div class="content">
            <div class="centered-text">
                <p>Your Shopping Cart</p>
            </div>
        </div>
    </div>

    <form method="post" action="update_cart.php">
        <?php foreach ($cartItems as $productId => $quantity): ?>
            <?php $product = $products[$productId]; ?>
            <div class="cart-item">
                <p><?php echo $product['name']; ?></p>
                <p>Price: $<?php echo $product['price']; ?></p>
                <label for="<?php echo $productId; ?>">Quantity:</label>
                <input type="number" name="<?php echo $productId; ?>" id="<?php echo $productId; ?>" value="<?php echo $quantity; ?>" min="1">
                <a href="remove_from_cart.php?product_id=<?php echo $productId; ?>">Remove</a>
            </div>
        <?php endforeach; ?>
        
    </form>
    <!-- Display Cart Total Price -->
    <p class="cart-total">Total Price: $<?php echo $cart->calculateTotalPrice($products); ?></p>

    <!-- Cart and Checkout buttons -->
    <div class="cart-actions">
        <input type="submit" value="Update Cart" onclick="updateCartCount()">
    </div>

    <div class="checkout-actions">
        <button onclick="location.href='checkout.php';">Checkout</button>
    </div>
</body>
</html>
