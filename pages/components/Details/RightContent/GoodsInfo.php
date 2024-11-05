<?php if (!isset($productData)) return; ?>

<link rel="stylesheet" href="../../../styles/GoodsInfo.css">
<div class="info-wrapper">
    <p class="info-title">Product Information</p>

    <div class="info-list-wrapper">
        <dl class="info-list">
            <div class="info-item-wrapper">
                <dt class="info-list-title">Model Number</dt>
                <dd class="info-list-desc"><?php echo htmlspecialchars($productData['ModelNumber'] ?? ''); ?></dd>
            </div>
            <div class="info-item-wrapper">
                <dt class="info-list-title">Date Released</dt>
                <dd class="info-list-desc"><?php echo htmlspecialchars(date('Y-m-d', strtotime($productData['DateCreated'] ?? '')));  ?></dd>
            </div>
            <div class="info-item-wrapper">
                <dt class="info-list-title">Selling Price</dt>
                <dd class="info-list-desc">$<?php echo htmlspecialchars($productData['Price'] ?? ''); ?></dd>
            </div>
        </dl>
    </div>

    <div class="delivery-wrapper">
        <p class="delivery-info">Delivery Information</p>
        <div class="delivery-way">
            <img src="https://kream-phinf.pstatic.net/MjAyMTExMjlfMTQ4/MDAxNjM4MTc4MjI5NTk3.2phJLPtRvFqViNfhZu06HzNRiUBlT4cmZR4_Ukqsyesg.ikrfWOrL7WXCVO0Rqy5kMvOn3B2YpjLUj6RuJqosPX0g.PNG/a_8b54cbca40e945f4abf1ee24bdd031f7.png" alt="배송이미지" class="delivery-image">
            <div class="delivery-contents">
                <div class="delivery-title-wrapper">
                    <span class="delivery-type">Standard Delivery</span>
                    <span class="delivery-price">$3.00</span>
                </div>
                <p class="delivery-desc">5-7 days until arrival</p>
            </div>
        </div>
    </div>
</div>
