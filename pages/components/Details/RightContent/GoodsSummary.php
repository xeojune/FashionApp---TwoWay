<?php if (!isset($productData)) return; 

$isUserLoggedIn = isset($_SESSION['valid_user']);

// Set sales button prices based on product price with a 5% difference
$SALES_BUTTON = [
    [
        "id" => 1,
        "name" => "Buy",
        "price" => $productData['Price'] * 1.05 // 5% more than product price
    ],
    [
        "id" => 2,
        "name" => "Sell",
        "price" => $productData['Price'] * 0.95 // 5% less than product price
    ]
];

// Calculate the recent price increase or decrease (10% increase as example)
$recentPriceChange = $productData['Price'] * 0.1;
$recentPriceChangePercentage = 10.5; // This can be dynamically calculated too
$bookmarkCount = 5719; // Replace with dynamic data if available

$serializedData = urlencode(serialize($productData));
?>

<link rel="stylesheet" href="../../../styles/GoodsSummary.css">
<div class="summary-wrapper">
    <p class="goods-name-eng"><?php echo htmlspecialchars($productData['ProductName']); ?></p>

    <div class="goods-size">
        <span class="goods-size-label">Size</span>
        <div class="goods-size-select">
            <span class="size-select-text">All Sizes</span>
            <button class="size-select-btn" onclick="toggleSizeDropdown()">▼</button>
            <!-- Dropdown list for sizes -->
            <div class="size-dropdown" id="sizeDropdown" style="display: none;">
                <?php if (!empty($productData['Sizes'])):?>
                    <?php foreach ($productData['Sizes'] as $size): ?>
                        <div class="size-option" onclick="selectSize('<?php echo htmlspecialchars($size); ?>')">
                            <?php echo htmlspecialchars($size); ?>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <div class="size-option">No sizes available</div>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <div class="goods-price-wrapper">
        <span class="recent-price-label">Recent Price</span>
        <div class="recent-price-wrapper">
            <span class="recent-price">$<?php echo htmlspecialchars(number_format($productData['Price'], 2)); ?></span>
            <div class="price-amount-wrapper">
                <span class="price-amount-icon">▲</span>
                <span class="price-amount">$<?php echo htmlspecialchars(number_format($recentPriceChange, 2)); ?> (+<?php echo htmlspecialchars($recentPriceChangePercentage); ?>%)</span>
            </div>
        </div>
    </div>

    <div class="deal-btns-wrapper">
        <?php foreach ($SALES_BUTTON as $btnData): ?>
            <?php 
                // Apply conditional class based on button name
                $buttonClass = $btnData['name'] === 'Buy' ? 'sales-button sales-button-red' : 'sales-button sales-button-green';
            ?>
            <button class="<?php echo $buttonClass; ?>" onclick="goToDeal('<?php echo htmlspecialchars($btnData['name']); ?>', <?php echo $btnData['price']; ?>)" value="<?php echo htmlspecialchars($btnData['name']); ?>">
                <span class="btns-name"><?php echo htmlspecialchars($btnData['name']); ?></span>
                <div class="btns-price-wrapper">
                    <span class="btns-price-text">$<span class="formatted-price"><?php echo htmlspecialchars(number_format($btnData['price'], 2)); ?></span></span>
                    <span class="btns-price-state">Instant <?php echo htmlspecialchars($btnData['name']); ?>ing Price</span>
                </div>
            </button>
        <?php endforeach; ?>
    </div>

    <button class="bookmark-btns-wrapper" onclick="addToWishlist()">
        <span class="bookmark-icon">🔖</span>
        <span class="bookmark-btns-label">Bookmark Product</span>
        <span class="bookmark-btns-nums"><?php echo number_format($bookmarkCount); ?></span>
    </button>
</div>

<script>
let selectedSize = 'All Sizes';

function toggleSizeDropdown() {
    var dropdown = document.getElementById("sizeDropdown");
    dropdown.style.display = dropdown.style.display === "none" ? "block" : "none";
}

function selectSize(size) {
    selectedSize = size;
    document.querySelector('.size-select-text').innerText = size;
    document.getElementById("sizeDropdown").style.display = "none";
}

function goToDeal(action, rawPrice) {
    const price = parseFloat(rawPrice).toFixed(2); // Ensure price has two decimal places
    <?php if ($isUserLoggedIn): ?>
        if (action === 'Buy') {
            const productID = "<?php echo $productData['ProductID']; ?>";
            const productName = "<?php echo urlencode($productData['ProductName']); ?>";
            
            window.location.href = `index.php?page=addcart&productID=${productID}&price=${price}&size=${encodeURIComponent(selectedSize)}&productName=${productName}`;
        } else if (action === 'Sell') {
            window.location.href = `index.php?page=sell&data=<?php echo $serializedData; ?>`;
        }
    <?php else: ?>
        alert("You are not logged in!");
        window.location.href = "index.php?page=login";
    <?php endif; ?>
}

function addToWishlist() {
    <?php if ($isUserLoggedIn): ?>
        const productID = "<?php echo $productData['ProductID']; ?>";
        const price = parseFloat(<?php echo $productData['Price'] * 1.05; ?>).toFixed(2); // Format to two decimal places
        const productName = "<?php echo urlencode($productData['ProductName']); ?>";

        window.location.href = `index.php?page=insertwishlist&productID=${productID}&productName=${productName}&price=${price}&size=${encodeURIComponent(selectedSize)}`;
    <?php else: ?>
        alert("You are not logged in!");
        window.location.href = "index.php?page=login";
    <?php endif; ?>
}
</script>