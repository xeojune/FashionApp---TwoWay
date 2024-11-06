<?php
$pageTitle = "Order to DB"; // Set the page title

// Start output buffering to capture the content
ob_start();

session_start(); // Ensure session is started
$user = $_SESSION['valid_user'];
$total = $_SESSION['total'];

$db = new mysqli('127.0.0.1', 'root', '', 'TwoWay');

if (mysqli_connect_errno()) {
    echo "Error: Could not connect to database. Please try again later.";
    exit;
}

$userquery = "SELECT PhoneNumber, Name FROM User WHERE Name = '$user'";
$resultuser = $db->query($userquery);

if ($resultuser && $resultuser->num_rows > 0) {
    $row = $resultuser->fetch_assoc();
    $username = $row['Name'];
    $phonenumber = $row['PhoneNumber'];
    
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
                Cart.Quantity,
                Cart.Size,
                Cart.Price,
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
                    $quantity = $cartDetails['Quantity'];
                    $size = $cartDetails['Size'];
                    $price = $cartDetails['Price'];

                    // Insert the cart details into the OrderDetails table
                    $insertQuery = "
                        INSERT INTO OrderDetails (UserName, ProductID, ProductName, BrandCode, ProductImage, BrandName, CartName, Quantity, Size, Price)
                        VALUES ('$username', '$productID', '$productName', '$brandCode', '$productImage', '$brandName', '$cartName', '$quantity', '$size', '$price')";

                    if (!$db->query($insertQuery)) {
                        echo "Error: Could not insert data into OrderDetails table. " . $db->error;
                    }

                    // Delete the item from the Cart table
                    $deleteQuery = "DELETE FROM Cart WHERE Name = '$username' AND ProductID = '$productID'";
                    if (!$db->query($deleteQuery)) {
                        echo "Error: Could not delete data from Cart table. " . $db->error;
                    }
                }
            } else {
                echo "No cart details found.";
            }   
        }                                 
    }
} 
header("Location: index.php?page=completed"); 
exit();
?>        
<?php
$pageContent = ob_get_clean(); // Store the buffered content in $pageContent
?>
