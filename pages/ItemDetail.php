<?php
$productId = $_GET['productId'] ?? null;

ob_start();
?>
<?php if ($productId) {
    echo "<h1>Item Details for Product ID: " . htmlspecialchars($productId) . "</h1>";
} else {
    echo "<p>Item not found.</p>";
} ?>
<?php
$pageContent = ob_get_clean();
?>


