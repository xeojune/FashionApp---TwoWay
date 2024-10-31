<link rel="stylesheet" href="../../../styles/Category.css">
<!-- Category.php -->
<li class="category-item">
    <img class="category-img" src="<?php echo $category['src']; ?>" alt="<?php echo htmlspecialchars($category['text']); ?>" />
    <p class="category-text"><?php echo htmlspecialchars($category['text']); ?></p>
</li>
