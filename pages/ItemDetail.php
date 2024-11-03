<?php
include 'components/Shop/GoodsData.php'; // Load the product data

$productId = $_GET['productId'] ?? null;
$productData = null;

// Find the specific product based on productId
foreach ($DUMMY_PRODUCTS as $product) {
    if ($product['product_id'] == $productId) {
        $productData = $product;
        break;
    }
}

// Start output buffering to capture content
ob_start();
?>

<main>
    <?php if ($productData): ?>
        <!-- <?php include 'components/Details/StickySummary.php'; ?> -->
        <div class="contents-wrapper">
            <?php include 'components/Details/LeftContents.php'; ?>
            <?php include 'components/Details/RightContents.php'; ?>
        </div>
    <?php else: ?>
        <p>Item not found.</p>
    <?php endif; ?>
</main>

<?php
$pageContent = ob_get_clean();
?>

<link rel="stylesheet" href="../../../styles/itemDetail.css">
