<?php
    session_start();
    $user = $_SESSION['valid_user'];
    if (isset($_POST['total'])) {
        $total = $_POST['total'];
    } else {
        $total = 0;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Purchase Confirmation</title>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="../../styles/nav.css" />
    <link rel="stylesheet" href="../../styles/form.css" />
    <link rel="stylesheet" href="../../styles/footer.css" />
    <link rel="stylesheet" href="../../styles/purchase.css" />
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
            <form action="confirmorder.php" method="POST">
                <label for="name">Full Name:</label>
                <input type="text" id="name" name="name"><br><br>
                
                <label for="address">Address:</label>
                <textarea id="address" name="address" rows="3"></textarea><br><br>

                <label for="phone">Phone Number:</label>
                <input type="tel" id="phone" name="phone"><br><br>

                <label for="payment-method">Payment Method:</label>
                <select id="payment-method" name="payment_method" onchange="toggleCardForm()">
                    <option value="">Select Payment Method</option>
                    <option value="credit-card">Credit Card</option>
                    <option value="bank-transfer">Bank Transfer</option>
                    <option value="paypal">Crypto</option>
                </select><br><br>

                <div id="credit-card-details" style="display: none;">
                    <label for="card-number">Card Number:</label>
                    <input type="text" id="card-number" name="card_number" placeholder="1234 5678 9012 3456" ><br><br>

                    <label for="card-name">Name on Card:</label>
                    <input type="text" id="card-name" name="card_name" placeholder="Full Name"><br><br>

                    <label for="card-ccv">CCV:</label>
                    <input type="text" id="card-ccv" name="card_ccv" placeholder="123"><br><br>

                    <label for="expire-date">Expiry Date:</label>
                    <input type="month" id="expire-date" name="expire_date" ><br><br>
                </div>
                <div id="banktransfer" style="display: none;">
                    <label for="bank-number">Bank Number:</label>
                    <input type="text" id="bank-number" name="bank-number" placeholder="1234 5678 9012 3456"><br><br>

                    <label for="name">Account Holder Name:</label>
                    <input type="text" id="name" name="name" placeholder="Full Name" ><br><br>

                    <label for="bank-name">Bank Name:</label>
                    <input type="text" id="bank-name" name="bank-name" placeholder="Full Name" ><br><br>
                </div>
                <button type="submit" class="purchase-btn">Confirm Purchase</button>
            </form>
        </div>
    </div>
    <script type="text/javascript" src="../../script/card.js"></script>
</body>
</html>