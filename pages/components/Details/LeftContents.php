<?php if (!isset($productData)) return; ?>

<link rel="stylesheet" href="../../../styles/LeftContents.css">
<aside class="left-contents-wrapper">
    <div class="goods-image-wrapper">
        <img class="goods-image" src="<?php echo htmlspecialchars($productData['thumbnail_url']); ?>" alt="<?php echo htmlspecialchars($productData['eng_name']); ?>">
    </div>
    <div class="deal-notice">
        <div class="notice-wrapper">
            <div class="notice-header">
                <span class="notice-badge">Warning</span>
                <span class="notice-title">Trading Cautions</span>
            </div>
            <p class="notice-desc">Only Sell Products that are Owned</p>
        </div>
        <span class="notice-arrow">→</span> 
    </div>
</aside>
