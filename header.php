<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="styles.css">
    <script src="https://kit.fontawesome.com/e17277e6f9.js" crossorigin="anonymous"></script>
</head>
<body>
    <div class="background">
        <nav>
            <h1 class="store-name"><img src="./images/logo.png" alt="logo"></h1> 
            <ul class="nav-links">
                
                <li class="nav-link"><a href="index.php">Home</a></li>
                <li class="nav-link"><a href="about.php">About</a></li>
                <li class="nav-link"><a href="product_listing.php">Shop</a></li>
                <li class="nav-link"><a href="contact.php">Contact</a></li>
                <?php if (isset($_SESSION['user_id'])) : ?>
                    <!-- Cart Dropdown -->
                    <li class="nav-link dropdown">
                        <a href="#" class="cart-dropdown">
                            <img src="./images/cart.png" alt="cart">
                            <a href="view_cart.php" id="cart-link"><span id="cart-count">0</span></a>
                        </a>
                    </li>
                    <!-- Logout Dropdown -->
                    <li class="nav-link dropdown">
                        <a href="logout.php" class="avatar-dropdown">Logout</a>
                    </li>
                <?php else : ?>
                    <!-- Login Link -->
                    <li class="nav-link"><a href="login.php"><img src="./images/login.png" alt="login"></a></li>
                <?php endif; ?>
            </ul>
        </nav>

