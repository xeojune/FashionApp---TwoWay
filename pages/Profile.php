<?php

$pageTitle = "Profile"; // Set the page title

// Database connection
@ $db = new mysqli('127.0.0.1', 'root', '', 'TwoWay');

if ($db->connect_error) {
    echo "Error: Could not connect to database. Please try again later.";
    exit;
}

// Check if the user is logged in
if (!isset($_SESSION['valid_user'])) {
    echo "You need to log in to view this page.";
    exit;
}

// Get the user's ID from the session
$userid = $_SESSION['valid_user'];


// Fetch user data from the database
$query = "SELECT Name, Email, PhoneNumber FROM User WHERE Name = '$userid'";
$result = $db->query($query);


if ($result && $row = $result->fetch_assoc()) {
    $username = $row['Name'];
    $email = $row['Email'];
    $phonenumber = $row['PhoneNumber'];
} else {
    echo "User data could not be retrieved.";
    exit;
}

// Close the database connection
$db->close();

// Start output buffering to capture the content
ob_start();
?>

<link rel="stylesheet" href="../styles/profile.css">
<div class='profile-wrapper'>
    <div class="profile-container">
        <h2>Profile</h2>
        <div class="profile-section">
            <img src="../public/images/profile.png" alt="Profile Picture" class="profile-picture">
            <span class="profile-name"><?php echo htmlspecialchars($username); ?></span>
        </div>
        
        <hr>

        <div class="login-info">
            <h3>User Information</h3>
            <div class="login-item">
                <label>Email Address</label>
                <span><?php echo htmlspecialchars($email); ?></span>
            </div>
            <div class="login-item">
                <label>Phone Number</label>
                <span><?php echo htmlspecialchars($phonenumber); ?></span>
            </div>
        </div>
    </div>
</div>

<?php
$pageContent = ob_get_clean(); // Store the buffered content in $pageContent
?>

