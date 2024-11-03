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

include('GoodsData.php');


// Set default limit
$limit = isset($_POST['limit']) ? (int)$_POST['limit'] : 8;


// Connect to the database 이게 맞는지 모르겠음 
$db = new mysqli('127.0.0.1', 'root', '', 'TwoWay');

// Check for a connection error
if ($db->connect_error) {
    echo "Error: Could not connect to database. Please try again later.";
    exit;
}

// SQL query to fetch products with the limit
$sql = "SELECT * FROM Products LIMIT ?";
$stmt = $db->prepare($sql);
$stmt->bind_param("i", $limit);
$stmt->execute();
$displayedProducts = $stmt->get_result();

// Close the statement and connection after fetching the data
$stmt->close();
$db->close();



// Get the products to display based on the limit
// $displayedProducts = array_slice($DUMMY_PRODUCTS, 0, $limit);


// Filter Data
$selectFilter = $_POST['selectFilter'] ?? [];  // Ensure this is an array if selecting multiple values
$selectPrice = $_POST['selectPrice'] ?? [];    // Ensure this is an array if selecting multiple values
$selectShoeSize = $_POST['selectShoeSize'] ?? [];
$selectClothSize = $_POST['selectClothSize'] ?? [];

// Calculate `totalFilter` based on selected filters
$totalFilter = count($selectPrice) + count($selectFilter) + count($selectShoeSize) + count($selectClothSize);

// Determine if any filters are selected
$isFilterSelected = $totalFilter > 0;

?>

<link rel="stylesheet" href="../../../styles/Itemlist.css">
<div class='list-wrapper'>
    <!--Search Bar Component-->
    <?php include('SearchBar.php'); ?>
    <!--Category Component-->
    <div class='category-wrapper'>
        <ul class='category-list'>
            <?php foreach ($CATEGORY_LIST as $categoryItem): ?>
                <?php $category = $categoryItem; ?>
                <?php include('Category.php'); ?>
            <?php endforeach; ?>
        </ul>
    </div>  

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
            <?php if (!empty($displayedProducts)): ?>
                <?php include 'ItemCard.php'; ?>
            <?php else: ?>
                <div class="item-not-found">No items found</div>
            <?php endif; ?>
        </div>
    </div>
</div>

<?php
echo "<pre>";
print_r($_POST);  // This will display all POST data received
echo "</pre>";
?>

<script src="../../../scripts/Itemlist.js"></script>

