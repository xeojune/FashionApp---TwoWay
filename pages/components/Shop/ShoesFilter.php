<!-- ShoesFilter.php -->
<link rel="stylesheet" href="../../../styles/ProductFilter.css">
<div class="filter-wrapper">
    <div class="title">
        <p class="filter-tag"><?php echo htmlspecialchars($filterData['filterName']); ?></p>
        <button type="button" class="seeMore" onclick="toggleFilterVisibility(this)">+</button>
    </div>
    <div class="List hidden">
        <?php foreach ($filterData['filterList'] as $filter): ?>
            <button 
                type="button" 
                class="checkBox <?php echo $filterType; ?> <?php echo in_array($filter['id'], $_POST['selectShoeSize'] ?? []) ? 'selected' : ''; ?>"
                onclick="selectFilter(this, <?php echo $filter['id']; ?>, 'selectShoeSize', '<?php echo htmlspecialchars($filter['name']); ?>')"
            >
                <?php echo htmlspecialchars($filter['name']); ?>
            </button>
        <?php endforeach; ?>
    </div>
</div>
