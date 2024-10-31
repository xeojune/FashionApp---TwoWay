<?php
// sortListData.php
$SORT_LIST = [
    [
        'id' => 1,
        'value' => 'sales',
        'title' => 'Most Popular',
    ],
    [
        'id' => 2,
        'value' => 'release_date',
        'title' => 'Date of Release',
    ],
    [
        'id' => 3,
        'value' => 'buy_now',
        'title' => 'Lowest Buying Price',
    ],
    [
        'id' => 4,
        'value' => 'sell_now',
        'title' => 'Highest Selling Price',
    ],
    [
        'id' => 5,
        'value' => 'premium',
        'title' => 'Premium',
    ],
];

// Get the selected sorting option from POST or set a default
$optionValue = $_POST['optionValue'] ?? 'sales';
?>

<link rel="stylesheet" href="../../../styles/SortFilter.css">
<div class="sort-wrapper">
    <form method="POST" style="display: inline;">
        <select class="sort-title" name="optionValue" onchange="this.form.submit()">
            <?php foreach ($SORT_LIST as $sortOption): ?>
                <option value="<?php echo htmlspecialchars($sortOption['value']); ?>" <?php echo $optionValue === $sortOption['value'] ? 'selected' : ''; ?>>
                    <?php echo htmlspecialchars($sortOption['title']); ?>
                </option>
            <?php endforeach; ?>
        </select>
    </form>
</div>
