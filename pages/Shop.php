<?php
$pageTitle = "Shop"; // Set the page title

// Start output buffering to capture the content
ob_start();
?>
<?php include('components/Shop/ItemList.php'); // Example of including a shop-specific component ?>
<?php
$pageContent = ob_get_clean(); // Store the buffered content in $pageContent
?>


