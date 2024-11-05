<?php
// filterData.php

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
        ['id' => 1, 'name' => '$100 less', 'query' => '0-100000'],
        ['id' => 2, 'name' => '$100 - $300', 'query' => '100000-300000'],
        ['id' => 3, 'name' => '$300 - $500', 'query' => '300000-500000'],
        ['id' => 4, 'name' => '$500 - $1000', 'query' => '500000-1000000'],
        ['id' => 5, 'name' => '$1000 - $2000', 'query' => '1000000-20000000'],
        ['id' => 6, 'name' => '$2000 more', 'query' => '20000000-'],
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
?>
