<?php
    session_start();
    $user = $_SESSION['valid_user'];

    $count = 0;

    @ $db = new mysqli('localhost', 'root','', 'Two-Way');

    if (mysqli_connect_errno()) {
        echo "Error: Could not connect to database.  Please try again later.";
        exit;
    }

    $userquery = "SELECT userid, name FROM user WHERE name = '$user'";
    $resultuser = $db->query($userquery);

    if ($resultuser && $resultuser->num_rows > 0) {
        $row = $resultuser->fetch_assoc();
        $userid = $row['userid'];
        $username = $row['name'];

        // Query to get items from the cart using the extracted userid
        $cartquery = "SELECT * FROM cart WHERE userid = '$userid'";
        $resultcart = $db->query($cartquery);
    
        if ($resultcart && $resultcart->num_rows > 0) {
            while ($cartrow = $resultcart->fetch_assoc()) {
                $count = $count + 1;
                $brand = $cartrow['brand'];
                $description = $cartrow['description'];
                $quantity = $cartrow['quantity'];
                $size = $cartrow['size'];
                $price = $cartrow['price'];
                // Display cart item details
                // echo "Item ID: " . $cartrow['brand'] . "<br>";
                // echo "Item Name: " . $cartrow['description'] . "<br>";
                // echo "Quantity: " . $cartrow['quantity'] . "<br><br>";
                // echo "Quantity: " . $cartrow['size'] . "<br><br>";
            }
        }
    }
    // Create the query to get the image path for the specified brand from ProductImages table
    $imagesquery = "SELECT * FROM ProductImages WHERE image LIKE '%$brand%'";
    $resultcart = $db->query($imagesquery);
    if ($resultcart->num_rows > 0) {
        while ($row = $resultcart->fetch_assoc()) {
            $image = $row["Image"];
        }
    }
    $db->close();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Shopping Cart</title>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="../../styles/nav.css" />
    <link rel="stylesheet" href="../../styles/form.css" />
    <link rel="stylesheet" href="../../styles/footer.css" />
    <link rel="stylesheet" href="../../styles/shoppingcart.css" />
    <script type="text/javascript" src="../../script/shoppingcart_qty.js"></script>
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
    <?php 
        echo "Welcome back, " .$user;
    ?>
    <div class="container">
        <h1>Shopping Bag</h1>
        <p> <?php echo $count;?> items</p>
        <hr>
        <?php 
        if ($count > 0){
        ?>        
        <div class="shopping-item">
            <img src=<?php echo $image;?> alt="Item Image" class="item-image">
            <div class="item-details">
                <h2>Brand: <?php echo $brand;?></h2>
                <p>Item Name: <?php echo $description;?></p>
                <p>Size: <?php echo $size;?></p>
                <div class="actions">
                    <a href="removefromcart.php">Remove from Bag</a>
                </div>
            </div>
            <div class="item-price-quantity">
                <p class="price">$<?php echo $price;?></p>
                <input type="hidden" id="hidden-price" value="<?php echo $price; ?>">
                <div class="quantity-controls">
                    <button onclick="decreaseQuantity()">-</button>
                    <input type="text" id="quantity" value = <?php echo $quantity;?> readonly style="width: 30px; height:25px ; text-align: center;" />
                    <button onclick="increaseQuantity()">+</button>
                </div>
            </div>
        </div>
        <?php }?>
        <div class="order-summary">
            <h3>Order summary</h3>
            <div class="summary-details">
                <p>Delivery<span id="total"> <?php if($count == 0) { echo "$0.00" ;} else {echo "$2.00";} ?></span></p>
                <strong><p>Total (SGD) <span id="total-price">$<?php  if($count == 0) { echo "0.00" ;} else {echo number_format($quantity*$price+2.00,2);}?></span></p></strong>
            </div>
            <?php if ($count > 0) {?>
            <form action="purchase.php" method="POST">
                <input type="hidden" name="total" value="<?php echo number_format($quantity*$price+2.00,2); ?>">
                <button type="submit" class="purchase-btn">Proceed to purchase</button>
            </form>
            <?php }?>
        </div>
    </div>
</body>
<footer>
    <div class="footer-left">FOOTER</div>
</footer>
</html>