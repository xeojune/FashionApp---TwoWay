<!-- Filter.php -->
<link rel="stylesheet" href="../../../styles/Filter.css">
<div class="filter-wrapper">
    <div class="title">
        <p class="filter-tag"><?php echo htmlspecialchars($filterData['filterName']); ?></p>
        <button type="button" class="seeMore" onclick="toggleFilterVisibility(this)">+</button>
    </div>
    <div class="list hidden">
        <?php foreach ($filterData['filterList'] as $filter): ?>
            <div class="select-filter">
                <input 
                    type="checkbox" 
                    class="checkbox"
                    name="selectedFilters[]" 
                    value="<?php echo $filter['id']; ?>"
                    <?php echo in_array($filter['id'], $_POST['selectedFilters'] ?? []) ? 'checked' : ''; ?>
                    
                >
                <?php echo htmlspecialchars($filter['name']); ?>
            </div>
        <?php endforeach; ?>
    </div>
</div>
