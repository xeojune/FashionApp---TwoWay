<?php
    session_start();
    $user = $_SESSION['valid_user'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Shopping Cart</title>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="../../styles/nav.css" />
    <link rel="stylesheet" href="../../styles/form.css" />
    <link rel="stylesheet" href="../../styles/footer.css" />
    <link rel="stylesheet" href="../../styles/ordercompleted.css" />
</head>
<body>
    <nav>
        <div class="nav-logo">
            <a href="#home"><img src="../../assets/mainlogo.png" alt="Logo" /></a>
        </div>
        <div class="nav-links">
            <a href="test.html">STYLE</a>
            <a href="test.html">SHOP</a>
            <a href="test.html">ABOUT</a>
            <a href="test.html">PROFILE</a>
        </div>
    </nav>
    <div class="container">
        <h2>Order Completed</h2>
        <div class="order-summary">
            <h3>Order Details</h3>
            <p><strong>Date Purchased:</strong> <?php echo date("Y-m-d");?></p>
            <p><strong>Estimated Date of Arrival:</strong> <?php echo date("Y-m-d", strtotime("+5 days")); // Placeholder for ETA ?></p>
            <h4>Items Purchased:</h4>
            <ul>
                <?php
                    // Placeholder for purchased items (in a real application, you would retrieve these from a database)
                    $items = [
                        ["name" => "Product 1", "price" => 25.99],
                        ["name" => "Product 2", "price" => 15.49],
                        ["name" => "Product 3", "price" => 45.00]
                    ];

                    $total_price = 0;
                    foreach ($items as $item) {
                        echo "<li>" . htmlspecialchars($item["name"]) . " - $" . number_format($item["price"], 2) . "</li>";
                        $total_price += $item["price"];
                    }
                ?>
            </ul>
            <p><strong>Total Price:</strong> $<?php echo number_format($total_price, 2); ?></p>
        </div>
    </div>
</body>
<footer>
    <div class="footer-left">FOOTER</div>
</footer>
</html>
