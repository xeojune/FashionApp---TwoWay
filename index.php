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
        } else {
            include('./pages/Home.php'); // Load Home.php as default
        }
        
        echo $pageContent; // Display the main content
        ?>
    </div>

    <script src="script.js"></script>
</body>
</html>
