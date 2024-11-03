<?php if (!isset($productData)) return; 

$SALES_BUTTON = [
    [
        "id" => 1,
        "name" => "Buy",
        "price" => "222,000"
    ],
    [
        "id" => 2,
        "name" => "Sell",
        "price" => "210,000"
    ]
];

?>

<link rel="stylesheet" href="../../../styles/GoodsSummary.css">
<div class="summary-wrapper">
    <p class="goods-name-eng"><?php echo htmlspecialchars($productData['eng_name']); ?></p>

    <div class="goods-size">
        <span class="goods-size-label">Size</span>
        <div class="goods-size-select">
            <span class="size-select-text">All Sizes</span>
            <button class="size-select-btn">▼</button>
        </div>
    </div>

    <div class="goods-price-wrapper">
        <span class="recent-price-label">Recent Price</span>
        <div class="recent-price-wrapper">
            <span class="recent-price">$<?php echo htmlspecialchars($productData['price']); ?></span>
            <div class="price-amount-wrapper">
                <span class="price-amount-icon">▲</span>
                <span class="price-amount">$24,000 (+10.5%)</span>
            </div>
        </div>
    </div>

    <div class="deal-btns-wrapper">
        <?php foreach ($SALES_BUTTON as $btnData): ?>
            <?php 
                // Apply conditional class based on button name
                $buttonClass = $btnData['name'] === 'Buy' ? 'sales-button sales-button-red' : 'sales-button sales-button-green';
            ?>
            <button class="<?php echo $buttonClass; ?>" onclick="goToDeal('<?php echo htmlspecialchars($btnData['name']); ?>')" value="<?php echo htmlspecialchars($btnData['name']); ?>">
                <span class="btns-name"><?php echo htmlspecialchars($btnData['name']); ?></span>
                <div class="btns-price-wrapper">
                    <span class="btns-price-text">$<?php echo htmlspecialchars($btnData['price']); ?></span>
                    <span class="btns-price-state">Instant <?php echo htmlspecialchars($btnData['name']); ?>ing Price</span>
                </div>
            </button>
        <?php endforeach; ?>
    </div>

    <button class="bookmark-btns-wrapper">
        <span class="bookmark-icon">🔖</span>
        <span class="bookmark-btns-label">Bookmark Product</span>
        <span class="bookmark-btns-nums">5,719</span>
    </button>
</div>

<script>
function goToDeal(action) {
    if (action === 'Buy') {
        window.location.href = 'buy.php'; // Update with the actual URL for the "buy" page
    } else if (action === 'Sell') {
        window.location.href = 'sell.php'; // Update with the actual URL for the "sell" page
    }
}
</script>
