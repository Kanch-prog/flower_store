<?php
session_start();
include 'header.php';
require_once 'Product.php';
require_once 'Cart.php';

// Check if the user is logged in
if (isset($_SESSION['user_id'])) {
    $loggedIn = true;
    // You can use $_SESSION['username'] if needed
    // $username = $_SESSION['username'];
} else {
    $loggedIn = false;
    header("Location: login.php"); // Redirect to the login page if not logged in
    exit();
}

// Handle logout
if (isset($_POST['logout'])) {
    session_unset();
    session_destroy();
    header('Location: login.php'); // Redirect to the login page after logout
    exit();
}

$product = new Product();
$cart = new Cart();
$products = $product->getProducts();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['product_id'])) {
    $productId = $_POST['product_id'];
    $cart->addItem($productId);
    header('Location: product_listing.php');
    exit();
}
?>
        <div class="content">
            <div class="centered-text">
                <p>Products</p>                
            </div>
            <nav class="category-bar">
                    <ul>
                        <li><a href="#">All</a></li>
                        <li><a href="#">Red Flowers</a></li>
                        <li><a href="#">Yellow Flowers</a></li>
                        <li><a href="#">Blue Flowers</a></li>
                        <li><a href="#">Pink Flowers</a></li>
                        <li><a href="#">Orange Flowers</a></li>
                    </ul>
            </nav>
        </div>
    </div>

    <div class="product-container">
        <?php
        require_once 'Product.php';

        $product = new Product();
        $products = $product->getProducts();

        if ($products) {
            foreach ($products as $product) {
                echo "<div class='product-box'>";
                echo "<button class='ast-on-card-button'><img src='./images/bag.png' alt='bag'></button>";
                $image = isset($product['image']) ? $product['image'] : 'default_image.jpg';
            
                echo "<img src='./images/{$image}' alt='{$product['name']}'>";
                echo "<h3>{$product['name']}</h3>";
                echo "<p>Price: $ {$product['price']}</p>";
                echo "<form method='post' action='product_listing.php'>";
                echo "<input type='hidden' name='product_id' value='{$product['id']}'>";
                echo "<input type='number' name='quantity' value='1' min='1'>";
                echo "<input type='submit' value='Add to Cart' onclick='updateCartCount()'>";
                echo "</form>";
                echo "</div>";
            }
        } else {
            echo "No products available.";
        }
        ?>
    </div>

    <?php include 'footer.php'; ?>

<script>
    function updateCartCount() {
        const cartCountElement = document.getElementById('cart-count');
        const cartItems = <?php echo json_encode($cart->getCart()); ?>;
        let count = 0;

        for (const productId in cartItems) {
            count += cartItems[productId];
        }

        cartCountElement.textContent = count;
    }

    updateCartCount();
</script>
