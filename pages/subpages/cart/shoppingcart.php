<?php
    $pageTitle = "cart"; // Set the page title

    // Start output buffering to capture the content
    ob_start();

    $count = 0;

    if (!empty($_SESSION['valid_user'])) {
        $user = $_SESSION['valid_user'];

        $db = new mysqli('127.0.0.1', 'root', '', 'TwoWay');
    
        if (mysqli_connect_errno()) {
            echo "Error: Could not connect to database.  Please try again later.";
            exit;
        }
    
        $userquery = "SELECT Name FROM User WHERE Name = '$user'";
        $resultuser = $db->query($userquery);
    
        if ($resultuser && $resultuser->num_rows > 0) {
            $row = $resultuser->fetch_assoc();
            $username = $row['Name'];
    
            // Query to get items from the cart using the extracted userid
            $cartquery = "SELECT * FROM Cart WHERE Name = '$username'";
            $resultcart = $db->query($cartquery);
        
            if ($resultcart && $resultcart->num_rows > 0) {
                while ($cartrow = $resultcart->fetch_assoc()) {
                    $count = $count + 1;
                }
            }
        }
        $db->close();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="../../../../styles/form.css" />
    <link rel="stylesheet" href="../../../../styles/shoppingcart.css" />
    <script type="text/javascript" src="../../../../scripts/shoppingcart_qty.js"></script>
</head>
<body>
    <div class="container">
        <h1>Shopping Bag</h1>
        <p> <?php echo $count;?> items</p>
        <hr>
        <?php 
            if ($count > 0) {
                $user = $_SESSION['valid_user'];
                $db = new mysqli('127.0.0.1', 'root', '', 'TwoWay');

                if (mysqli_connect_errno()) {
                    echo "Error: Could not connect to database. Please try again later.";
                    exit;
                }

                $userquery = "SELECT Name FROM User WHERE Name = '$user'";
                $resultuser = $db->query($userquery);

                if ($resultuser && $resultuser->num_rows > 0) {
                    $row = $resultuser->fetch_assoc();
                    $username = $row['Name'];

                // Query to get items from the cart using the extracted userid
                $cartquery = "SELECT * FROM Cart WHERE name = '$username'";
                $resultcart = $db->query($cartquery);
                
                    if ($resultcart && $resultcart->num_rows > 0) {
                        while ($cartrow = $resultcart->fetch_assoc()) {
                            $productID = $cartrow['ProductID'];
                            $Quantity = $cartrow['Quantity'];
                            $Size = $cartrow['Size'];
                            $Price = $cartrow['Price'];

                            $cartDetailsQuery = "
                            SELECT 
                                Cart.Name AS CartName,
                                Cart.ProductID,
                                Products.ProductName,
                                Products.BrandCode,
                                ProductImages.image,
                                Brands.BrandName
                            FROM 
                                Cart
                            JOIN 
                                Products ON Cart.ProductID = Products.ProductID
                            LEFT JOIN 
                                ProductImages ON Products.ProductID = ProductImages.ProductID
                            JOIN 
                                Brands ON Products.BrandCode = Brands.BrandCode
                            WHERE 
                                Cart.ProductID = '$productID'";
                            
                           
                            $resultCartDetails = $db->query($cartDetailsQuery);

                            if ($resultCartDetails && $resultCartDetails->num_rows > 0) {
                                while ($cartDetails = $resultCartDetails->fetch_assoc()) {
                                    $cartName = $cartDetails['CartName'];
                                    $productID = $cartDetails['ProductID'];
                                    $productName = $cartDetails['ProductName'];
                                    $brandCode = $cartDetails['BrandCode'];
                                    $productImage = $cartDetails['image'];
                                    $brandName = $cartDetails['BrandName'];
                                }
                            } else {
                                echo "No cart details found.";
                            }

        ?>        
                <div class="shopping-item">
                    <img src="<?php echo $productImage; ?>" alt="Item Image" class="item-image">
                    <div class="item-details">
                        <h2>Brand: <?php echo $brandName; ?></h2>
                        <p>Item Name: <?php echo $productName; ?></p>
                        <p>Size: <?php echo $Size; ?></p>
                        <p>Quantity: <?php echo $Quantity?></p>
                        <div class="actions">
                            <a href="index.php?page=removecart&productID=<?php echo $productID; ?>">Remove from Bag</a>
                        </div>
                    </div>
                    <div class="item-price-quantity">
                        <p class="price">$<?php echo $Price; ?></p>
                        <input type="hidden" id="hidden-price" value="<?php echo $Price; ?>">
                    </div>
                </div>
        <?php 
                    }
                }
            }
            $db->close();
        }
        ?>
        <?php if (!empty($_SESSION['valid_user'])) {?>
        <div class="order-summary">
            <h3>Order summary</h3>
            <div class="summary-details">
  
                <p>Delivery<span id="total"> <?php if($count == 0) { echo "$0.00" ;} else {echo "$2.00";} ?></span></p>
                <strong><p>Total (SGD) <span id="total-price">$<?php  if($count == 0) { echo "0.00" ;} else {echo number_format($Quantity*$Price+2.00,2);}?></span></p></strong>
            </div>
            <?php if ($count > 0) {?>
            <form action="index.php?page=purchase" method="POST">
                <input type="hidden" name="total" value="<?php session_start();  $_SESSION['total'] = $Quantity * $Price + 2.00; echo "Quantity: $Quantity, Price: $price"; ?>">
                <button type="submit" class="purchase-btn">Proceed to purchase</button>
            </form>
            <?php } }?>
        </div>
    </div>
</body>
</html>

<?php
$pageContent = ob_get_clean(); // Store the buffered content in $pageContent
?>