<?php
$pageTitle = "Completed Order"; // Set the page title

// Start output buffering to capture the content
ob_start();

$user = $_SESSION['valid_user'];

// Connect to the database
$db = new mysqli('127.0.0.1', 'root', '', 'TwoWay');
if (mysqli_connect_errno()) {
    echo "Error: Could not connect to database. Please try again later.";
    exit;
}

// Query to get order details for the logged-in user
$orderQuery = "SELECT ProductID, ProductName, BrandName, ProductImage, CartName FROM OrderDetails WHERE UserName = '$user'";
$resultOrder = $db->query($orderQuery);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Order Completed</title>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="../../../../styles/ordercompleted.css" />
    <link rel="stylesheet" href="../../../../styles/form.css" />
</head>
<body>
    <div class="container">
        <h2>Order History</h2>
        <div class="order-summary">
            <h3>Order Details</h3>
            <?php if (isset($_SESSION['total']) && $_SESSION['total'] > 0){ ?>
            <p><strong>Date Purchased:</strong> <?php echo date("Y-m-d"); ?></p>
            <p><strong>Estimated Date of Arrival:</strong> <?php echo date("Y-m-d", strtotime("+5 days")); // Placeholder for ETA ?></p>
            <h4>Items Purchased:</h4>
            <?php }?>
            <ul>
                <?php
                if ($resultOrder && $resultOrder->num_rows > 0) {
                    while ($orderRow = $resultOrder->fetch_assoc()) {
                        $productName = htmlspecialchars($orderRow['ProductName']);
                        $brandName = htmlspecialchars($orderRow['BrandName']);
                        $productImage = htmlspecialchars($orderRow['ProductImage']);
                        $cartName = htmlspecialchars($orderRow['CartName']);
                        $total = $_SESSION['total'];
                        // Display product details without bullet points
                        echo "<div class='item-details'>";
                        echo "<img src='$productImage' alt='$productName' style='width: 100px; height: 100px;'>";
                        echo "<div class='item-text'>";
                        echo "<p><strong>Brand:</strong> $brandName</p>";
                        echo "<p><strong>Product Name:</strong> $productName</p>";
                        echo "</div>";
                        echo "</div>";
                    }
                } else {
                    echo "<li>No items found in your recent order.</li>";
                }
                ?>
            </ul>
            <?php 
            if (isset($_SESSION['total']) && $_SESSION['total'] > 0) {
                echo "<p><strong>Total Price:</strong> $" . number_format($_SESSION['total'], 2) . "</p>";
                }
            ?>
        </div>
    </div>
</body>
</html>

<?php
$db->close();
$pageContent = ob_get_clean(); // Store the buffered content in $pageContent
?>