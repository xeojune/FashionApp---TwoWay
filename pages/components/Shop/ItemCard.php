<?php
// Define getRandNum once here
function getRandNum($max) {
    return number_format(rand(1, $max) + rand() / getrandmax(), 1);
}
?>
<link rel="stylesheet" href="../../../styles/ItemCard.css">

<div class="item-wrapper">
    <div class="item-list">
        <?php foreach ($DUMMY_PRODUCTS as $product): ?>
            <?php 
                // Extract product details for each item
                $product_id = htmlspecialchars($product['product_id']);
                $eng_name = htmlspecialchars($product['eng_name']);
                $thumbnail_url = htmlspecialchars($product['thumbnail_url']);
                $price = htmlspecialchars($product['price']);

                // Include Item.php and pass product data
                include 'Items.php'; 
            ?>
        <?php endforeach; ?>
    </div>
    <form method="POST">
        <input type="hidden" name="limit" value="<?php echo $limit + 8; ?>">
        <button type="submit" class="load-more">More</button>
    </form>
</div>
