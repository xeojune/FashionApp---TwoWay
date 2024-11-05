<?php
$pageTitle = "InsertWishList"; // Set the page title

// Start output buffering to capture the content
ob_start();

if (isset($_SESSION['valid_user']) && isset($_GET['productID']) && isset($_GET['price']) && isset($_GET['size'])) {
    $user = $_SESSION['valid_user'];
    $productID = (int)$_GET['productID']; // Ensure integer for ID
    $price = (float)$_GET['price'];        // Ensure float for price
    $size = $_GET['size'];

    $db = new mysqli('127.0.0.1', 'root', '', 'TwoWay');

    if ($db->connect_errno) {
        echo "Error: Could not connect to database. Please try again later.";
        exit;
    }

    // Check if the product already exists in the Cart for the current user
    $checkQuery = "SELECT Quantity FROM WishList WHERE Name = ? AND ProductID = ? AND Size = ?";
    $checkStmt = $db->prepare($checkQuery);
    
    // Bind parameters for the check query
    $checkStmt->bind_param('sis', $user, $productID, $size);
    $checkStmt->execute();
    $checkStmt->store_result();

    if ($checkStmt->num_rows > 0) {
        // Product exists, update the quantity
        $checkStmt->bind_result($currentQuantity);
        $checkStmt->fetch();
        $newQuantity = $currentQuantity + 1; // Increase quantity by 1
        
        // Calculate the new total price
        $newTotalPrice = $price * $newQuantity;

        $updateQuery = "UPDATE WishList SET Quantity = ?, Price = ? WHERE Name = ? AND ProductID = ? AND Size = ?";
        $updateStmt = $db->prepare($updateQuery);
        
        if ($updateStmt === false) {
            echo "Error: Prepare failed. " . $db->error;
            exit;
        }

        // Bind parameters for the update query
        $updateStmt->bind_param('idsis', $newQuantity, $newTotalPrice, $user, $productID, $size);
        if ($updateStmt->execute()) {
            echo "Product quantity and price successfully updated.";
        } else {
            echo "Error: Could not update product quantity and price. " . $updateStmt->error;
        }

        $updateStmt->close();
    } else {
        // Product does not exist, insert a new record
        $addQuery = "INSERT INTO WishList (Name, ProductID, Quantity, Size, Price) VALUES (?, ?, 1, ?, ?)";
        $stmt = $db->prepare($addQuery);
        
        if ($stmt === false) {
            echo "Error: Prepare failed. " . $db->error;
            exit;
        }

        // Bind the parameters (use 'ssis' for Name (string), ProductID (integer), Size (string), and Price (double))
        if (!$stmt->bind_param('sisd', $user, $productID, $size, $price)) {
            echo "Error: Binding parameters failed. " . $stmt->error;
            exit;
        }

        // Execute and check for errors
        if ($stmt->execute()) {
            echo "Product successfully added to cart.";
        } else {
            echo "Error: Could not add product to cart. " . $stmt->error;
        }

        $stmt->close();
    }

    $checkStmt->close();
    $db->close();
} else {
    echo "All required parameters are not available to add the product to the cart.";
}
?>
<p>Wishlist Database Added successfully</p>
<?php $pageContent = ob_get_clean(); // Store the buffered content in $pageContent ?>