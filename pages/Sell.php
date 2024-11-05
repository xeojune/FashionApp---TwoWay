<?php
$pageTitle = "Sell"; // Set the page title


if (isset($_GET['data'])) {
    $productData = unserialize(urldecode($_GET['data']));
    $productID = $productData['ProductID'];
    $price = $productData['Price'];
    $productName = $productData['ProductName'];
    $productType = $productData['Category'];
    $image = $productData['Image'];
} else {
    echo "Product data not available.";
    exit;
}

if ($productType === 'Shoes') {
    $sizes = range(215, 330, 5); // Generates an array from 215 to 330 in steps of 5
} elseif ($productType === 'Clothes') {
    $sizes = ['XXS', 'XS', 'S', 'M', 'L', 'XL', 'XXL', 'XXXL'];
} else {
    $sizes = ['-']; // Leave empty for "Others"
}



// Start output buffering to capture the content
ob_start();
?>
<link rel="stylesheet" href="../../../styles/Sell.css">
<div class="form-container">
    <form class="sell-form">
        <p>Sell Your Product</p>
        <div class="sellImage">
            <img class="goods-image" src="<?php echo htmlspecialchars($image); ?>" alt="<?php echo htmlspecialchars($productName); ?>">
        </div>
        
        <!-- Search input for finding items -->
        <div class="form-group">
            <label for="search">Item Name</label>
            <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($productName); ?>" readonly>
        </div>
        
        <!-- Dropdown for sizes -->
        <div class="form-group">
            <label for="size">Select Size</label>
            <select id="size" name="size">
                <?php if (empty($sizes)): ?>
                    <!-- Display a placeholder option if no sizes are available -->
                    <option value="">-</option>
                <?php else: ?>
                    <?php foreach ($sizes as $size): ?>
                        <option value="<?php echo htmlspecialchars($size); ?>"><?php echo htmlspecialchars($size); ?></option>
                    <?php endforeach; ?>
                <?php endif; ?>
            </select>
        </div>
        
        <!-- Read-only input for price -->
        <div class="form-group">
            <label for="price">Price</label>
            <input type="text" id="price" name="price" value="$<?php echo number_format($price, 2); ?>" readonly>
        </div>

        <!-- Submit button -->
        <button type="submit" class="submit-button">Sell Item</button>
    </form>
</div>

<?php
$pageContent = ob_get_clean(); // Store the buffered content in $pageContent
?>
