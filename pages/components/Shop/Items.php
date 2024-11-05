<?php
// Generate a random background color
$backgroundColors = ['lavender', 'lavenderblush', 'linen', 'powderblue', 'thistle'];
$randomColor = $backgroundColors[array_rand($backgroundColors)];
?>

<link rel="stylesheet" href="../../../styles/Items.css">

<div class="item-component" onclick="goToDetail(<?php echo htmlspecialchars($product['ProductID']); ?>)">
    <img 
        class="item-img" 
        src="<?php echo htmlspecialchars($thumbnail_url); ?>" 
        alt="item" 
        style="background-color: <?php echo $randomColor; ?>"
    />
    <div class="item-title">
        <div class="description">
            <div class="brand-name"><?php echo htmlspecialchars($brand); ?></div>
            <div class="item-name-en"><?php echo htmlspecialchars($eng_name); ?></div>
        </div>
        <div class="amount">
            <p class="price">$<?php echo htmlspecialchars($price); ?></p>
            <p class="price-description">Instant Purchase Price</p>
        </div>
    </div>
    <div class="interests">
        <div class="bookmark">
            <span class="bookmark-icon">🔖</span>
            <span class="bookmark-num"><?php echo getRandNum(20); ?>k</span>
        </div>
        <div class="likes">
            <span class="likes-icon">👍</span>
            <span class="likes-num"><?php echo getRandNum(10); ?>k</span>
        </div>
    </div>
</div>

<script>
function goToDetail(productId) {
    window.location.href = `index.php?page=detail&productId=${productId}`;
}
</script>
