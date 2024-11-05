<?php
// Include database connection file or create the connection directly
$db = new mysqli('127.0.0.1', 'root', '', 'TwoWay');

// Check for a connection error
if ($db->connect_error) {
    echo "Error: Could not connect to database. Please try again later.";
    exit;
}

$productId = $_GET['productId'] ?? null;
$productData = null;

if ($productId) {
    // Prepare and execute SQL query to fetch product data based on productId
    $sql = "SELECT Products.ProductID, Products.ProductName, Products.Price, Products.ModelNumber, Products.DateCreated, 
                   ProductImages.Image, Brands.BrandName
            FROM Products
            LEFT JOIN ProductImages ON Products.ProductID = ProductImages.ProductID
            LEFT JOIN Brands ON Products.BrandCode = Brands.BrandCode
            WHERE Products.ProductID = ?";
    
    $stmt = $db->prepare($sql);
    $stmt->bind_param("i", $productId);
    $stmt->execute();
    $result = $stmt->get_result();
    
    // Fetch the product data if available
    if ($result->num_rows > 0) {
        $productData = $result->fetch_assoc();
    }

    // Close statement and connection
    $stmt->close();
    $db->close();
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
