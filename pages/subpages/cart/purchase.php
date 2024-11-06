<?php

    $user = $_SESSION['valid_user'];
    $total = $_SESSION['total'];
    unset($_SESSION['total']);

    $db = new mysqli('127.0.0.1', 'root', '', 'TwoWay');
    
    if (mysqli_connect_errno()) {
        echo "Error: Could not connect to database.  Please try again later.";
        exit;
    }

    $userquery = "SELECT PhoneNumber, Name FROM User WHERE Name = '$user'";
    $resultuser = $db->query($userquery);

    if ($resultuser && $resultuser->num_rows > 0) {
        $row = $resultuser->fetch_assoc();
        $username = $row['Name'];
        $phonenumber = $row['PhoneNumber'];
    } 
    $db->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Purchase Confirmation</title>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="../../../../styles/form.css" />
    <link rel="stylesheet" href="../../../../styles/purchase.css" />
</head>
<body>
    <div class="container">
        <h1>Purchase Confirmation</h1>
        <div class="order-summary">
            <h3>Order Details</h3>
            <div class="summary-details">
            <p>Subtotal<span>$ <?php echo number_format($total - 2.00, 2); ?></span></p>
            <p>Delivery<span>$ 2.00</span></p>
            <strong><p>Total (SGD) <span>$ <?php echo number_format($total, 2); ?></span></p></strong>
        </div>
        <h2>Delivery Information</h2>
        <div class="info-box">
            <form action="index.php?page=ordertodb" method="POST">
                <label for="name">Full Name:</label>
                <input type="text" id="name" name="name" required><br><br>
                
                <label for="address">Address:</label>
                <textarea id="address" name="address" rows="3" required></textarea><br><br>

                <label for="phone">Phone Number:</label>
                <input type="tel" id="phone" name="phone" value=<?php echo $phonenumber; ?> required><br><br>

                <label for="payment-method">Payment Method:</label>
                <select id="payment-method" name="payment_method" onchange="toggleCardForm()" required>
                    <option value="">Select Payment Method</option>
                    <option value="credit-card">Credit Card</option>
                    <option value="bank-transfer">Bank Transfer</option>
                    <option value="paypal">Crypto</option>
                </select><br><br>

                <div id="credit-card-details" style="display: none;">
                    <label for="card-number">Card Number:</label>
                    <input type="text" id="card-number" name="card-number" placeholder="1234 5678 9012 3456" ><br><br>

                    <label for="card-name">Name on Card:</label>
                    <input type="text" id="card-name" name="card-name" placeholder="Full Name"><br><br>

                    <label for="card-ccv">CCV:</label>
                    <input type="text" id="card-ccv" name="card-ccv" placeholder="123"><br><br>

                    <label for="expire-date">Expiry Date:</label>
                    <input type="month" id="expire-date" name="expire-date" placeholder="MM/YY"><br><br>
                </div>

                <div id="banktransfer" style="display: none;">
                    <label for="bank-number">Bank Number:</label>
                    <input type="text" id="bank-number" name="bank-number" placeholder="1234 5678 9012 3456"><br><br>

                    <label for="name">Account Holder Name:</label>
                    <input type="text" id="name" name="name" placeholder="Full Name" ><br><br>

                    <label for="bank-name">Bank Name:</label>
                    <input type="text" id="bank-name" name="bank-name" placeholder="Bank Name" ><br><br>
                </div>
                <button type="submit" class="purchase-btn">Confirm Purchase</button>
            </form>
        </div>
    </div>
    <script type="text/javascript" src="../../../../scripts/card.js"></script>
</body>
</html>

<?php
$pageContent = ob_get_clean(); // Store the buffered content in $pageContent
?>