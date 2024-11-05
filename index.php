<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Website</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <!-- Header Content + Navbar -->
    <div id='header-wrapper'>
        <?php include('./pages/components/Header.php'); ?>
    </div>
    
    <!-- Main content -->
    <div id="content">
        <?php 
        // Check the URL parameter to decide which page to load
        $page = $_GET['page'] ?? 'home';
        $productId = $_GET['productId'] ?? null;
        
        if ($page === 'shop') {
            include('./pages/Shop.php'); // Load Shop.php
        } elseif ($page === 'detail' && $productId) {
            include('./pages/ItemDetail.php'); // Load ItemDetail.php if productId is set
        } elseif ($page === 'profile'){
            include('./pages/Profile.php'); // Load Profile.php
        } elseif ($page === 'login'){
            include('./pages/subpages/login/login.php'); // Load Login.php
        } else if ($page === 'register'){
            include('./pages/subpages/register/register.php'); // Load Register.php
        } else if ($page === 'loginauth'){
            include('./pages/subpages/login/authmain.php'); // Load authmain.php
        } else if ($page === 'faillogin'){
            include('./pages/subpages/login/loginfail.php'); // Load loginfail.php            
        } else if ($page === 'registerauth') {
            include('./pages/subpages/register/registerauth.php'); // Load registerauth.php
        } else if ($page === 'failregister') {
            include('./pages/subpages/register/registerfail.php'); // Load Registerfail.php
        } else if ($page === 'successregister') {
            include('./pages/subpages/register/registersuccess.php'); // Load RegisterSuccess.php
        } else if ($page === 'cart') {
            include('./pages/subpages/cart/shoppingcart.php'); // Load shoppingcart.php
        } else if (strpos($page, 'addcart') === 0) {
            include('./pages/subpages/cart/addtocart.php'); // Load addtocart.php
        } else if ($page === 'removecart') {
            include('./pages/subpages/cart/removefromcart.php'); // Load removefromcart.php
        } else if ($page === 'wishlist') {
            include('./pages/subpages/wishlist/wishlist.php'); // Load wishlist.php
        } else if (strpos($page, 'insertwishlist') === 0) {
            include('./pages/subpages/wishlist/addtowishlist.php'); // Load addtowishlist.php
        } else if ($page === 'purchase'){
            include('./pages/subpages/cart/purchase.php'); // Load purchase.php            
        } else if ($page === 'ordertodb') {
            include('./pages/subpages/cart/ordertodb.php'); // Load ordertodb.php 
        } else if ($page === 'completed') {
            include('./pages/subpages/cart/completedorder.php'); // Load completedorder.php 
        } else if ($page === 'profile'){
            include('./pages/Profile.php'); // Load Profile.php
        } else if (strpos($page, 'sell') === 0){
            include('./pages/Sell.php'); // Load Sell.php (check if the page stats with 'sell')
        } else {
            include('./pages/Home.php'); // Load Home.php as default
        }
        
        echo $pageContent; // Display the main content
        ?>
    </div>

    <script src="script.js"></script>
</body>
</html>
