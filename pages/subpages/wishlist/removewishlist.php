<?php
$pageTitle = "Wishlist"; // Set the page title
ob_start();
?>

<?php

// Get the user and product details from the URL parameters
$user = $_SESSION['valid_user'];
$productID = $_GET['productID'];
$size = $_GET['size'];

// Connect to the database
$db = new mysqli('127.0.0.1', 'root', '', 'TwoWay');

if ($db->connect_errno) {
    echo "Error: Could not connect to database. Please try again later.";
    exit;
}

// Prepare and execute the DELETE query directly
$deleteQuery = "DELETE FROM WishList WHERE Name = '$user' AND ProductID = '$productID' AND Size = '$size'";
$result = $db->query($deleteQuery);

if ($result && $db->affected_rows > 0) {
    // Item successfully deleted, redirect back to the wishlist
    header("Location: index.php?page=wishlist");
} else {
    echo "Error: Could not remove the item from the wish list.";
}

// Close the database connection
$db->close();
?>


<?php
$pageContent = ob_get_clean(); // Store the buffered content in $pageContent
?>