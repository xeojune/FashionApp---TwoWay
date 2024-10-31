<?php
$pageTitle = "Home"; // Set the page title

// Start output buffering to capture the content
ob_start();
?>
<?php include('components/Home/Banner.php'); ?>
<?php include('components/Home/Brand.php'); ?>
<?php
$pageContent = ob_get_clean(); // Store the buffered content in $pageContent
?>
