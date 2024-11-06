<?php
$pageTitle = "movetocart"; // Set the page title

// Start output buffering to capture the content
ob_start();
?>

<?php

$user = $_SESSION['valid_user'];

// Connect to the database
$db = new mysqli('127.0.0.1', 'root', '', 'TwoWay');

if ($db->connect_errno) {
    echo "Error: Could not connect to the database. Please try again later.";
    exit;
}

// Get product details from the URL parameters
$productID = isset($_GET['productID']) ? $_GET['productID'] : null;
$size = isset($_GET['size']) ? $_GET['size'] : null;
$quantity = isset($_GET['quantity']) ? $_GET['quantity'] : null;
$price = isset($_GET['price']) ? $_GET['price'] : null;

if ($productID && $size && $quantity && $price) {
    // Check if the item already exists in the Cart table for the current user
    $checkQuery = "SELECT Quantity, Price FROM Cart WHERE Name = '$user' AND ProductID = '$productID' AND Size = '$size'";
    $result = $db->query($checkQuery);

    if ($result && $result->num_rows > 0) {
        // If the item exists, update the existing row
        $row = $result->fetch_assoc();
        $newQuantity = $row['Quantity'] + $quantity;
        $newPrice = $row['Price'] + $price; // Adjust if price should be calculated differently

        $updateQuery = "UPDATE Cart SET Quantity = '$newQuantity', Price = '$newPrice' 
                        WHERE Name = '$user' AND ProductID = '$productID' AND Size = '$size'";
        
        if ($db->query($updateQuery)) {
            // Delete the item from the Wishlist
            $wishlistDeleteQuery = "DELETE FROM WishList WHERE Name = '$user' AND ProductID = '$productID' AND Size = '$size'";
            $db->query($wishlistDeleteQuery);

            // Redirect to the wishlist page with a success message
            header("Location: index.php?page=wishlist&message=Item moved to Cart successfully");
            exit;
        } else {
            echo "Error: Could not update the item in the Cart. " . $db->error;
        }
    } else {
        // If the item does not exist, insert a new row
        $cartInsertQuery = "INSERT INTO Cart (Name, ProductID, Quantity, Size, Price)
                            VALUES ('$user', '$productID', '$quantity', '$size', '$price')";

        if ($db->query($cartInsertQuery)) {
            // Delete the item from the Wishlist
            $wishlistDeleteQuery = "DELETE FROM WishList WHERE Name = '$user' AND ProductID = '$productID' AND Size = '$size'";
            $db->query($wishlistDeleteQuery);

            // Redirect to the wishlist page with a success message
            header("Location: index.php?page=wishlist&message=Item moved to Cart successfully");
            exit;
        } else {
            echo "Error: Could not move the item to the Cart. " . $db->error;
        }
    }
} else {
    echo "Invalid input detected. Please try again.";
}

$db->close();
header("Location: index.php?page=cart");
?>

<?php
$pageContent = ob_get_clean(); // Store the buffered content in $pageContent
?>
