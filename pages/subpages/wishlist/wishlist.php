<?php
$pageTitle = "Wishlist"; // Set the page title
ob_start();

$user = $_SESSION['valid_user'];

$db = new mysqli('127.0.0.1', 'root', '', 'TwoWay');

if ($db->connect_errno) {
    echo "Error: Could not connect to database. Please try again later.";
    exit;
}

// Query to get the wish list items for the current user
$wishlistQuery = "SELECT WishList.ProductID, WishList.Quantity, WishList.Size, WishList.Price, 
                        Products.ProductName, ProductImages.image, Brands.BrandName
                  FROM WishList
                  JOIN Products ON WishList.ProductID = Products.ProductID
                  LEFT JOIN ProductImages ON Products.ProductID = ProductImages.ProductID
                  JOIN Brands ON Products.BrandCode = Brands.BrandCode
                  WHERE WishList.Name = ?";
$stmt = $db->prepare($wishlistQuery);
$stmt->bind_param('s', $user);
$stmt->execute();
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Wish List</title>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="../../../../styles/wishlist.css" />
</head>
<body>
    <div class="container">
        <h1>Wish List</h1>
        <?php if ($result->num_rows > 0): ?>
            <p><?php echo $result->num_rows; ?> item(s) in your wish list</p>
            <hr>
            <?php while ($row = $result->fetch_assoc()): ?>
                <div class="wishlist-item">
                    <img src="<?php echo $row['image']; ?>" alt="Item Image" class="item-image">
                    <div class="item-details">
                        <h2>Brand: <?php echo $row['BrandName']; ?></h2>
                        <p>Product Name: <?php echo $row['ProductName']; ?></p>
                        <p>Size: <?php echo $row['Size']; ?></p>
                        <p>Quantity: <?php echo $row['Quantity']; ?></p>
                        <div class="actions">
                            <a href="index.php?page=movetocart&productID=<?php echo $row['ProductID']; ?>&size=<?php echo $row['Size']; ?>&quantity=<?php echo $row['Quantity']; ?>&price=<?php echo $row['Price']; ?>">Move to Shopping Bag</a>
                            <a href="index.php?page=removewishlist&productID=<?php echo $row['ProductID']; ?>&size=<?php echo $row['Size']; ?>" class="remove">Remove from Wish List</a>
                        </div>                    
                    </div>
                    <div class="item-price">
                        <p class="price">$<?php echo number_format($row['Price'], 2); ?></p>
                    </div>
                </div>
            <?php endwhile; ?>
        <?php else: ?>
            <p>Your wish list is currently empty.</p>
        <?php endif; ?>

        <div class="wishlist-summary">
            <h3>Keep shopping for more items</h3>
            <a href="index.php?page=home"><button class="continue-shopping-btn">Continue Shopping</button></a>
        </div>
    </div>
</body>
</html>

<?php
$stmt->close();
$db->close();
$pageContent = ob_get_clean(); // Store the buffered content in $pageContent
?>