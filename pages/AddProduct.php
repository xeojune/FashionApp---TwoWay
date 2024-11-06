<?php

$pageTitle = "AddProduct"; // Set the page title

ob_start();
// Database connection
$servername = "127.0.0.1"; // Replace with your database server
$username = "root";        // Replace with your database username
$password = "";            // Replace with your database password
$dbname = "TwoWay";        // Replace with your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if necessary POST data is set
if (isset($_POST['productID'], $_POST['size'])) {
    // Retrieve form data
    $productID = $_POST['productID'];
    $sizeName = $_POST['size']; // This is the actual size value, like 215
    $quantity = 1;
    $price = str_replace('$', '', $_POST['price']); // Remove dollar sign if present

    // Look up SizeCode for the given SizeName
    $sizeQuery = "SELECT SizeCode FROM Sizes WHERE SizeName = ?";
    $sizeStmt = $conn->prepare($sizeQuery);
    $sizeStmt->bind_param("s", $sizeName);
    $sizeStmt->execute();
    $sizeStmt->bind_result($sizeCode);
    $sizeStmt->fetch();
    $sizeStmt->close();

    if ($sizeCode) {
        // Check if the ProductID and SizeCode combination already exists in ProductInventory
        $checkQuery = "SELECT Quantity FROM ProductInventory WHERE ProductID = ? AND SizeCode = ?";
        $checkStmt = $conn->prepare($checkQuery);
        $checkStmt->bind_param("ii", $productID, $sizeCode);
        $checkStmt->execute();
        $checkStmt->store_result();

        if ($checkStmt->num_rows > 0) {
            // If the entry exists, increase the quantity by 1
            $checkStmt->bind_result($currentQuantity);
            $checkStmt->fetch();
            $newQuantity = $currentQuantity + 1;

            $updateQuery = "UPDATE ProductInventory SET Quantity = ? WHERE ProductID = ? AND SizeCode = ?";
            $updateStmt = $conn->prepare($updateQuery);
            $updateStmt->bind_param("iii", $newQuantity, $productID, $sizeCode);
            $updateStmt->execute();
            $updateStmt->close();

            echo "Product quantity updated successfully.";
        } else {
            // If no entry exists, insert a new record
            $insertQuery = "INSERT INTO ProductInventory (ProductID, SizeCode, Quantity) VALUES (?, ?, ?)";
            $insertStmt = $conn->prepare($insertQuery);
            $insertStmt->bind_param("iii", $productID, $sizeCode, $quantity);
            $insertStmt->execute();
            $insertStmt->close();

            echo "Product added to inventory successfully.";
        }

        // Close the check statement
        $checkStmt->close();
    } else {
        echo "Error: The selected size does not exist in the Sizes table.";
    }
} else {
    echo "Required form data is missing.";
}

// Redirect to the shop page after the operation
header("Location: index.php?page=shop");
exit();

$conn->close();
?>
<?php
$pageContent = ob_get_clean(); // Store the buffered content in $pageContent
?>
