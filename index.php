<?php 
session_start();
include 'header.php'; 
?>

        <div class="content">
            <div class="centered-text">
                <p>Welcome to our store!</p>
                <button><a href="#">Shop Now</a></button>
            </div>
        </div>
    </div>

    <div class="product-container">
        <div class="product-box">
            <button class="ast-on-card-button"><img src="./images/bag.png" alt="bag"></button>
            <img src="./images/product1.jpg" alt="Product 1">
            <h3>Product 1</h3>
            <p>Price: $20.99</p>
        </div>
        <div class="product-box">
            <button class="ast-on-card-button"><img src="./images/bag.png" alt="bag"></button>
            <img src="./images/product2.jpg" alt="Product 2">
            <h3>Product 2</h3>
            <p>Price: $24.99</p>
        </div>
        <div class="product-box">
            <button class="ast-on-card-button"><img src="./images/bag.png" alt="bag"></button>
            <img src="./images/product3.jpg" alt="Product 3">
            <h3>Product 3</h3>
            <p>Price: $19.99</p>
        </div>
    </div>

    <hr class="divider">


    <h2>What Our Customers Say</h2>

    <div class="customer-feedback">            
        <div class="feedback-box">
            <i class="fas fa-quote-left"></i>
            <p>Fast shipping and excellent customer service. The product was even better than expected. I will definitely be a returning customer.</p>
            <img src="./images/profile1.jpg" alt="profile1" class="rounded-photo">
            <p class="customer-name">JENNIFER LEWIS</p>
        </div>
        <div class="feedback-box">
            <i class="fas fa-quote-left"></i>
            <p>Great user experience on your website. I found exactly what I was looking for at a great price. I will definitely be telling my friends.</p>
            <img src="./images/profile2.jpg" alt="profile2" class="rounded-photo">
            <p class="customer-name">ALICIA HEART</p>
        </div>
        <div class="feedback-box">
            <i class="fas fa-quote-left"></i>
            <p>Thank you for the excellent shopping experience. It arrived quickly and was exactly as described. I will definitely be shopping with you again in the future.</p>
            <img src="./images/profile3.jpg" alt="profile3" class="rounded-photo">
            <p class="customer-name">JUAN CARLOS</p>
        </div>
    </div>

    <div class="main-section">
        <div class="background-image">
            <h2>Give the Gift of a Flower</h2>
            <p>Give the gift of a lasting memory with flowers</p>
            <button class="purchase-button">PURCHASE FLOWERS</button>
        </div>
    </div>


    <div class="customer-service">
        <div class="service-box">
            <div class="rounded-icon">
                <img src="./images/lock.png" alt="lock">
            </div>
            <div class="feedback-text">
                <h4>SECURE PAYMENT</h4>
                <p>All our payments are SSL secured</p>
            </div>
        </div>

         <div class="service-box">
            <div class="rounded-icon">
                <img src="./images/package.png" alt="package">
            </div>
            <div class="feedback-text">
                <h4>DELIVERED WITH CARE</h4>
                <p>Super fast shipping to your door</p>
            </div>
        </div>

        <div class="service-box">
            <div class="rounded-icon">
                <img src="./images/service.png" alt="service">
            </div>
            <div class="feedback-text">
                <h4>EXCELLENT SERVICE</h4>
                <p>Live chat and phone support</p>
            </div>            
        </div>
    </div>

<?php include 'footer.php'; ?>

</body>
</html>
