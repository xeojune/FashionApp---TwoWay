<?php
$pageTitle = "Completed Order"; // Set the page title

// Start output buffering to capture the content
ob_start();

$user = $_SESSION['valid_user'];

$db = new mysqli('127.0.0.1', 'root', '', 'TwoWay');
if (mysqli_connect_errno()) {
    echo "Error: Could not connect to database. Please try again later.";
    exit;
}

$orderQuery = "SELECT ProductID, ProductName, BrandName, ProductImage, CartName, Price, Quantity, Size 
               FROM OrderDetails 
               WHERE UserName = '$user'";
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
            <?php if ($resultOrder && $resultOrder->num_rows > 0) { ?>
                <h3>Order Details</h3>
                <p><strong>Date Purchased:</strong> <?php echo date("Y-m-d"); ?></p>
                <p><strong>Estimated Date of Arrival:</strong> <?php echo date("Y-m-d", strtotime("+5 days")); // Placeholder for ETA ?></p>
                <h4>Items Purchased:</h4>
                <ul>
                    <?php
                    while ($orderRow = $resultOrder->fetch_assoc()) {
                        $productName = $orderRow['ProductName'];
                        $brandName = $orderRow['BrandName'];
                        $productImage = $orderRow['ProductImage'];
                        $cartName = $orderRow['CartName'];
                        $size = $orderRow['Size'];
                        $quantity = $orderRow['Quantity'];
                        $price = $orderRow['Price'];
                        
                        echo "<div class='item-details'>";
                        echo "<img src='$productImage' alt='$productName' style='width: 100px; height: 100px;'>";
                        echo "<div class='item-text'>";
                        echo "<p><strong>Brand:</strong> $brandName</p>";
                        echo "<p><strong>Product Name:</strong> $productName</p>";
                        echo "<p><strong>Size:</strong> $size</p>";
                        echo "<p><strong>Quantity:</strong> $quantity</p>";
                        echo "<p><strong>Price:</strong> $" . number_format($price, 2) . "</p>";
                        echo "</div>";
                        echo "</div>";      
                    }
                    ?>
                </ul>
                <p><strong>Total Price:</strong> $<?php echo number_format($_SESSION['total'], 2); ?></p>
            <?php } else { ?>
                <p>No items found in your recent order.</p>
            <?php } ?>
        </div>
    </div>
</body>
</html>

<?php
$db->close();
$pageContent = ob_get_clean(); // Store the buffered content in $pageContent
?>
