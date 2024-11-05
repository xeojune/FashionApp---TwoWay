<?php
$pageTitle = "Wishlist"; // Set the page title
ob_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Wish List</title>
    <meta charset="utf-8" />
    <script type="text/javascript" src="../../../../scripts/wishlist.js"></script>
    <link rel="stylesheet" href="../../../../styles/wishlist.css" />
</head>
<body>
    <div class="container">
        <h1>Wish List</h1>
        <p>1 item in your wish list</p>
        <hr>
        <div class="wishlist-item">
            <img src="../../assets/asics.png" alt="Item Image" class="item-image">
            <div class="item-details">
                <h2>Brand</h2>
                <p>Item Name</p>
                <div class="actions">
                    <a href="index.php?page=cart">Move to Shopping Bag</a>
                    <div class="actions">
                        <a href="#" class="remove">Remove from Wish List</a>
                    </div>                    
                </div>
            </div>
            <div class="item-price">
                <p class="price">$795</p>
            </div>
        </div>

        <div class="wishlist-summary">
            <h3>Keep shopping for more items</h3>
            <button class="continue-shopping-btn">Continue Shopping</button>
        </div>
    </div>
</body>
</html>


<?php
$pageContent = ob_get_clean(); // Store the buffered content in $pageContent
?>
