<?php 
include('filterData.php');

$CATEGORY_LIST = [
    ['id' => 1, 'src' => '../../../public/images/categoryImg/shoes1.png', 'text' => 'Shoes'],
    ['id' => 2, 'src' => '../../../public/images/categoryImg/shoes2.png', 'text' => 'Flats'],
    ['id' => 3, 'src' => '../../../public/images/categoryImg/shoes3.png', 'text' => 'Boots'],
    ['id' => 4, 'src' => '../../../public/images/categoryImg/shoes4.png', 'text' => 'Converse'],
    ['id' => 5, 'src' => '../../../public/images/categoryImg/tshirt.png', 'text' => 'T-Shirt'],
    ['id' => 6, 'src' => '../../../public/images/categoryImg/jean.png', 'text' => 'Jeans'],
    ['id' => 7, 'src' => '../../../public/images/categoryImg/bag.png', 'text' => 'Accessories'],
    ['id' => 8, 'src' => '../../../public/images/categoryImg/game.png', 'text' => 'LifeStyle'],
];

$FILTER_CATEGORY = [
    'filterName' => 'Categories',
    'filterList' => [
        ['id' => 1, 'name' => 'Shoes', 'query' => 'Shoes'],
        ['id' => 2, 'name' => 'Clothes', 'query' => 'Clothes'],
        ['id' => 3, 'name' => 'Accessories', 'query' => 'Accessories'],
        ['id' => 4, 'name' => 'Life', 'query' => 'Life'],
        ['id' => 5, 'name' => 'Tech', 'query' => 'Tech'],
    ],
];

$PRICE_FILTER = [
    'filterName' => 'Price',
    'filterList' => [
        ['id' => 1, 'name' => '$100 or less', 'query' => '0-100'],
        ['id' => 2, 'name' => '$100 - $300', 'query' => '100-300'],
        ['id' => 3, 'name' => '$300 - $500', 'query' => '300-500'],
        ['id' => 4, 'name' => '$500 - $1000', 'query' => '500-1000'],
        ['id' => 5, 'name' => '$1000 - $2000', 'query' => '1000-2000'],
        ['id' => 6, 'name' => '$2000 or more', 'query' => '2000-'],
    ],
];


$SHOES_FILTER = [
    'filterName' => 'Shoe Sizes',
    'filterList' => [
        ['id' => 1, 'name' => '215'],
        ['id' => 2, 'name' => '220'],
        ['id' => 3, 'name' => '225'],
        ['id' => 4, 'name' => '230'],
        ['id' => 5, 'name' => '235'],
        ['id' => 6, 'name' => '240'],
        ['id' => 7, 'name' => '245'],
        ['id' => 8, 'name' => '250'],
        ['id' => 9, 'name' => '255'],
        ['id' => 10, 'name' => '260'],
        ['id' => 11, 'name' => '265'],
        ['id' => 12, 'name' => '270'],
        ['id' => 13, 'name' => '275'],
        ['id' => 14, 'name' => '280'],
        ['id' => 15, 'name' => '285'],
        ['id' => 16, 'name' => '290'],
        ['id' => 17, 'name' => '295'],
        ['id' => 18, 'name' => '300'],
        ['id' => 19, 'name' => '305'],
        ['id' => 20, 'name' => '310'],
        ['id' => 21, 'name' => '315'],
        ['id' => 22, 'name' => '320'],
        ['id' => 23, 'name' => '325'],
        ['id' => 24, 'name' => '330'],
    ],
    'filterKey' => 'shoe_size',
];

$CLOTHING_FILTER = [
    'filterName' => 'Cloth Sizes',
    'filterList' => [
        ['id' => 1, 'name' => 'XXS'],
        ['id' => 2, 'name' => 'XS'],
        ['id' => 3, 'name' => 'S'],
        ['id' => 4, 'name' => 'M'],
        ['id' => 5, 'name' => 'L'],
        ['id' => 6, 'name' => 'XL'],
        ['id' => 7, 'name' => 'XXL'],
        ['id' => 8, 'name' => 'XXXL'],
    ],
];


// Connect to the database 이게 맞는지 모르겠음 
$db = new mysqli('127.0.0.1', 'root', '', 'TwoWay');

// Check for a connection error
if ($db->connect_error) {
    echo "Error: Could not connect to database. Please try again later.";
    exit;
}

// Set default limit
$limit = isset($_POST['limit']) ? (int)$_POST['limit'] : 8;

// Filter Data
$selectFilter = $_POST['selectFilter'] ?? [];  // Ensure this is an array if selecting multiple values
$selectPrice = $_POST['selectPrice'] ?? [];    // Ensure this is an array if selecting multiple values
$selectShoeSize = $_POST['selectShoeSize'] ?? [];
$selectClothSize = $_POST['selectClothSize'] ?? [];

// Map selected IDs to category names
$selectedCategories = array_map(function($id) use ($FILTER_CATEGORY) {
    foreach ($FILTER_CATEGORY['filterList'] as $category) {
        if ($category['id'] == $id) {
            return $category['query']; // Map ID to category name
        }
    }
    return null;
}, $selectFilter);

// Map selected price IDs to price ranges
$selectedPriceRanges = array_map(function($id) use ($PRICE_FILTER) {
    foreach ($PRICE_FILTER['filterList'] as $priceRange) {
        if ($priceRange['id'] == $id) {
            // Parse min and max prices from the query string (e.g., '0-100' or '2000-')
            [$minPrice, $maxPrice] = explode('-', $priceRange['query']);
            return [
                'min' => (int)$minPrice,
                'max' => $maxPrice !== '' ? (int)$maxPrice : null  // null for no upper limit
            ];
        }
    }
    return null;
}, $selectPrice);


//remove all null values
$selectedCategories = array_filter($selectedCategories);
$selectedPriceRanges = array_filter($selectedPriceRanges);



$sql = "SELECT Products.* FROM Products";
$conditions = [];
$params = [];
$types = '';

// Category filter
if (!empty($selectedCategories)) {
    $placeholders = implode(',', array_fill(0, count($selectedCategories), '?'));
    $conditions[] = "Category IN ($placeholders)";
    $params = array_merge($params, $selectedCategories);
    $types .= str_repeat('s', count($selectedCategories)); // 's' for each category name
}

// Apply price filter as explained above
if (!empty($selectedPriceRanges)) {
    $priceConditions = [];
    foreach ($selectedPriceRanges as $range) {
        if ($range['max'] !== null) {
            $priceConditions[] = "(Products.Price >= ? AND Products.Price <= ?)";
            $params[] = $range['min'];
            $params[] = $range['max'];
            $types .= 'ii';
        } else {
            $priceConditions[] = "(Products.Price >= ?)";
            $params[] = $range['min'];
            $types .= 'i';
        }
    }
    $conditions[] = '(' . implode(' OR ', $priceConditions) . ')';
}

// Combine conditions into the WHERE clause
if (!empty($conditions)) {
    $sql .= ' WHERE ' . implode(' AND ', $conditions);
}

// Add the limit to the query
$sql .= " LIMIT ?";
$params[] = $limit;
$types .= 'i';

// Prepare the statement
$stmt = $db->prepare($sql);

// Bind parameters dynamically
$stmt->bind_param($types, ...$params);


// Execute the statement and fetch results
$stmt->execute();
$displayedProducts = $stmt->get_result();

// Close the statement and connection after fetching the data
$stmt->close();
$db->close();

// Calculate `totalFilter` based on selected filters
$totalFilter = count($selectPrice) + count($selectFilter) + count($selectShoeSize) + count($selectClothSize);

// Determine if any filters are selected
$isFilterSelected = $totalFilter > 0;

?>

<link rel="stylesheet" href="../../../styles/Itemlist.css">
<div class='list-wrapper'>
    <div class='page-title'>
        Shop
    </div>
    <hr class='divider'>

    <div class='content'>
        <div class='search-filter'>
            <div class="filter">
                Filter
                <div class="filter-status" style="display: <?php echo $isFilterSelected ? 'inline-block' : 'none'; ?>;">
                    <?php echo $totalFilter; ?>
                </div>
                <div class="filter-delete" style="display: <?php echo $isFilterSelected ? 'inline-block' : 'none'; ?>;" onclick="deleteAllFilters()">Clear All</div>
            </div>

            <form id="filter-form" method="POST" action="">
                
                    <!-- Include Category Filter -->
                <?php $filterData = $FILTER_CATEGORY; include 'CategoryFilter.php'; ?>

                <!-- Include Price Filter -->
                <?php $filterData = $PRICE_FILTER; include 'PriceFilter.php'; ?>
                

                <!-- Include Shoes Filter -->
                <?php $filterData = $SHOES_FILTER; $filterType = 'selectShoeSize'; include 'ShoesFilter.php'; ?>
                <?php 
                // Persist selected filters by creating hidden inputs from `$_POST`
                if (isset($_POST['selectShoeSize'])):
                    foreach ($_POST['selectShoeSize'] as $selectedFilterId): ?>
                        <input type="hidden" name="selectShoeSize[]" value="<?php echo htmlspecialchars($selectedFilterId); ?>">
                <?php endforeach; endif; ?>
                

                <!-- Include Clothes Filter -->
                <?php $filterData = $CLOTHING_FILTER; $filterType = 'selectClothSize'; include 'ClothFilter.php'; ?>
                <?php 
                // Persist selected filters by creating hidden inputs from `$_POST`
                if (isset($_POST['selectClothSize'])):
                    foreach ($_POST['selectClothSize'] as $selectedFilterId): ?>
                        <input type="hidden" name="selectClothSize[]" value="<?php echo htmlspecialchars($selectedFilterId); ?>">
                <?php endforeach; endif; ?>
            </form>
        </div>
        <div class='item-container'>
            <div class='search-options'>
                <div class='filter-categories'>
                    <!-- Single selectFilter item with delete button -->
                    <?php if (!empty($selectFilter)): ?>
                        <?php foreach ($selectFilter as $filterId): ?>
                            <?php 
                                $filterName = array_values(array_filter($FILTER_CATEGORY['filterList'], function ($filter) use ($filterId) {
                                    return $filter['id'] == $filterId;
                                }))[0]['name'] ?? ''; 
                            ?>
                            <div class="filter-category" data-filter-id="<?php echo $filterId; ?>" data-filter-type="selectFilter">
                                <?php echo htmlspecialchars($filterName); ?>
                                <button class="delete-button" onclick="removeFilter(<?php echo $filterId; ?>, 'selectFilter')">X</button>
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                    <!-- Single selectPrice item with delete button -->
                    <?php if (!empty($selectPrice)): ?>
                        <?php foreach ($selectPrice as $priceId): ?>
                            <?php 
                                $priceName = array_values(array_filter($PRICE_FILTER['filterList'], function ($price) use ($priceId) {
                                    return $price['id'] == $priceId;
                                }))[0]['name'] ?? ''; 
                            ?>
                            <div class="filter-category" data-filter-id="<?php echo $priceId; ?>" data-filter-type="selectPrice">
                                <?php echo htmlspecialchars($priceName); ?>
                                <button class="delete-button" onclick="removeFilter(<?php echo $priceId; ?>, 'selectPrice')">X</button>
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>

                    <!-- Shoes filter tags -->
                    <?php if (!empty($selectShoeSize)): ?>
                        <?php foreach ($selectShoeSize as $shoeSizeId): ?>
                            <?php 
                                $shoeName = array_values(array_filter($SHOES_FILTER['filterList'], fn($filter) => $filter['id'] == $shoeSizeId))[0]['name'] ?? ''; 
                            ?>
                            <div class="filter-category" data-filter-id="<?php echo $shoeSizeId; ?>" data-filter-type="selectShoeSize">
                                <?php echo htmlspecialchars($shoeName); ?>
                                <button class="delete-button" onclick="removeFilter(<?php echo $shoeSizeId; ?>, 'selectShoeSize')">X</button>
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>

                    <!-- Clothes filter tags -->
                    <?php if (!empty($selectClothSize)): ?>
                        <?php foreach ($selectClothSize as $clothSizeId): ?>
                            <?php 
                                $clothName = array_values(array_filter($CLOTHING_FILTER['filterList'], fn($filter) => $filter['id'] == $clothSizeId))[0]['name'] ?? ''; 
                            ?>
                            <div class="filter-category" data-filter-id="<?php echo $clothSizeId; ?>" data-filter-type="selectClothSize">
                                <?php echo htmlspecialchars($clothName); ?>
                                <button class="delete-button" onclick="removeFilter(<?php echo $clothSizeId; ?>, 'selectClothSize')">X</button>
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>

                    
                </div>
                <?php include 'SortFilter.php'; ?>
            </div>
            <?php if ($displayedProducts->num_rows > 0): ?>
                <?php include 'ItemCard.php'; ?>
            <?php else: ?>
                <div class="item-not-found">No items found</div>
            <?php endif; ?>
        </div>
    </div>
</div>

<script src="../../../scripts/Itemlist.js"></script>

