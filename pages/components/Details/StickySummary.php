<?php
// Assuming you have already set $productData in your main file
if (!isset($productData)) return;

// Button data as an array
$SALES_BUTTON = [
    [
        "id" => 1,
        "name" => "구매",
        "price" => "222,000",
        "color" => "#ef6253"
    ],
    [
        "id" => 2,
        "name" => "판매",
        "price" => "222,000",
        "color" => "#41b979"
    ]
];
?>

<link rel="stylesheet" href="../../../styles/StickySummary.css">

<div id="sticky-summary">
    <div class="Summary-wrapper" style="display: none;">
        <div class="goods-info-wrapper">
            <div class="goods-image-wrapper">
                <img src="<?php echo htmlspecialchars($productData['thumbnail_url']); ?>" alt="<?php echo htmlspecialchars($productData['eng_name']); ?>" class="goods-image" />
            </div>
            <div class="goods-text-wrapper">
                <p class="Goods-name-eng"><?php echo htmlspecialchars($productData['eng_name']); ?></p>
            </div>
        </div>

        <div class="deal-btns-wrapper">
            <button class="Bookmark-btns-wrapper">
                <span class="Bookmark-icon">🔖</span>
                <span class="Bookmark-btns-nums">5,719</span>
            </button>
            
            <div class="sales-btns-wrapper">
                <?php foreach ($SALES_BUTTON as $btnData): ?>
                    <button 
                        class="sales-button"
                        onclick="goToDeal('<?php echo htmlspecialchars($btnData['name']); ?>')" 
                        style="background-color: <?php echo htmlspecialchars($btnData['color']); ?>;"
                    >
                        <span class="btns-name"><?php echo htmlspecialchars($btnData['name']); ?></span>
                        <div class="btns-price-wrapper">
                            <span class="btns-price-text"><?php echo htmlspecialchars($btnData['price']); ?>원</span>
                            <span class="btns-price-state">즉시 <?php echo htmlspecialchars($btnData['name']); ?>가</span>
                        </div>
                    </button>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>

<script>
    function goToDeal(action) {
        if (action === '구매') {
            window.location.href = 'buy.php'; // Set appropriate URL
        } else if (action === '판매') {
            window.location.href = 'sell.php'; // Set appropriate URL
        }
    }

    window.addEventListener('scroll', () => {
        const summaryWrapper = document.querySelector('.summary-wrapper');
        if (window.scrollY >= 300) {
            summaryWrapper.style.display = 'flex';
        } else {
            summaryWrapper.style.display = 'none';
        }
    });
</script>
