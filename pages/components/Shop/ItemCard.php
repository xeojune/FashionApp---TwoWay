<?php
// Define getRandNum once here
function getRandNum($max) {
    return number_format(rand(1, $max) + rand() / getrandmax(), 1);
}

// Set default limit
$limit = isset($_POST['limit']) ? (int)$_POST['limit'] : 8;

// Filter Data
$selectFilter = $_POST['selectFilter'] ?? [];

// Define the category mapping
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
        ['id' => 6, 'name' => '$2000 or more', 'query' => '2000-']
    ],
];

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

// Remove any null values (in case of mismatches)
$selectedCategories = array_filter($selectedCategories);

// Remove any null values (in case of mismatches)
$selectedPriceRanges = array_filter($selectedPriceRanges);

// Connect to the database
$db = new mysqli('127.0.0.1', 'root', '', 'TwoWay');

// Check for a connection error
if ($db->connect_error) {
    echo "Error: Could not connect to database. Please try again later.";
    exit;
}


// Build the SQL query with category and price filtering if needed
$sql = "SELECT Products.ProductID, Products.ProductName, Products.Price, ProductImages.Image, Brands.BrandName 
        FROM Products
        LEFT JOIN ProductImages ON Products.ProductID = ProductImages.ProductID
        LEFT JOIN Brands ON Products.BrandCode = Brands.BrandCode";

$conditions = [];  // Array to store conditions for the WHERE clause
$params = [];      // Array to store bind parameters
$types = '';       // String to store parameter types for bind_param

// Category filter
if (!empty($selectedCategories)) {
    $placeholders = implode(',', array_fill(0, count($selectedCategories), '?'));
    $conditions[] = "Products.Category IN ($placeholders)";
    $params = array_merge($params, $selectedCategories);
    $types .= str_repeat('s', count($selectedCategories)); // 's' for each category name
}

// Price filter
if (!empty($selectedPriceRanges)) {
    // Create price range conditions for each selected price range
    $priceConditions = [];
    foreach ($selectedPriceRanges as $range) {
        if ($range['max'] !== null) {
            // Both min and max price are defined
            $priceConditions[] = "(Products.Price >= ? AND Products.Price <= ?)";
            $params[] = $range['min'];
            $params[] = $range['max'];
            $types .= 'ii'; // 'i' for each integer (min and max prices)
        } else {
            // Only min price is defined (open-ended range)
            $priceConditions[] = "(Products.Price >= ?)";
            $params[] = $range['min'];
            $types .= 'i'; // 'i' for integer (min price only)
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

$stmt = $db->prepare($sql);

// Bind parameters dynamically
$stmt->bind_param($types, ...$params);

$stmt->execute();
$displayedProducts = $stmt->get_result();

// Fetch all products as an associative array
$productsArray = $displayedProducts->fetch_all(MYSQLI_ASSOC);

// Close the statement and connection
$stmt->close();
$db->close();
?>

<link rel="stylesheet" href="../../../styles/ItemCard.css">

<div class="item-wrapper">
    <div class="item-list">
        <?php if (count($productsArray) > 0): ?>
            <?php foreach ($productsArray as $product): ?>
                <?php 
                    // Extract product details for each item
                    $product_id = htmlspecialchars($product['ProductID']);
                    $eng_name = htmlspecialchars($product['ProductName']);
                    $thumbnail_url = htmlspecialchars($product['Image']); // Assuming your images are saved using BrandCode/ProductID.jpg format
                    $price = htmlspecialchars($product['Price']);
                    $brand = htmlspecialchars($product['BrandName']);

                    // Include Item.php and pass product data
                    include 'Items.php'; 
                ?>
            <?php endforeach; ?>
        <?php else: ?>
            <div class="item-not-found">No items found</div>
        <?php endif; ?>
    </div>
    <form method="POST">
        <!-- Retain current limit and increase by 8 -->
        <input type="hidden" name="limit" value="<?php echo $limit + 8; ?>">

        <!-- Hidden inputs to retain selected category filters -->
        <?php if (!empty($selectFilter)): ?>
            <?php foreach ($selectFilter as $filterId): ?>
                <input type="hidden" name="selectFilter[]" value="<?php echo htmlspecialchars($filterId); ?>">
            <?php endforeach; ?>
        <?php endif; ?>

        <!-- Hidden inputs to retain other filters if needed -->
        <?php if (!empty($selectPrice)): ?>
            <?php foreach ($selectPrice as $price): ?>
                <input type="hidden" name="selectPrice[]" value="<?php echo htmlspecialchars($price); ?>">
            <?php endforeach; ?>
        <?php endif; ?>
        
        <?php if (!empty($selectShoeSize)): ?>
            <?php foreach ($selectShoeSize as $shoeSize): ?>
                <input type="hidden" name="selectShoeSize[]" value="<?php echo htmlspecialchars($shoeSize); ?>">
            <?php endforeach; ?>
        <?php endif; ?>

        <?php if (!empty($selectClothSize)): ?>
            <?php foreach ($selectClothSize as $clothSize): ?>
                <input type="hidden" name="selectClothSize[]" value="<?php echo htmlspecialchars($clothSize); ?>">
            <?php endforeach; ?>
        <?php endif; ?>

        <!-- More button to submit form with retained filters -->
        <button type="submit" class="load-more">More</button>
    </form>
</div>
