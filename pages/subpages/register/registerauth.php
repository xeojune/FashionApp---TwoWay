<?php
$username = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];
$phonenumber = $_POST['number'];
$date = date("Y-m-d");

// Hash the password securely before storing it in the database
$password = md5($password);

// Connect to the database
$db = new mysqli('127.0.0.1', 'root', '', 'TwoWay');

// Check for connection errors
if (mysqli_connect_errno()) {
    echo "Error: Could not connect to database. Please try again later.";
    exit;
}

// Create an array to store error messages
$_SESSION['register_error'] = [];

// Check if the username already exists
$userQuery = "SELECT * FROM User WHERE Name = '$username'";
$userResult = $db->query($userQuery);

if ($userResult->num_rows > 0) {
    $_SESSION['register_error'][] = "Username Used";
}

// Check if the email already exists
$emailQuery = "SELECT * FROM User WHERE Email = '$email'";
$emailResult = $db->query($emailQuery);

if ($emailResult->num_rows > 0) {
    $_SESSION['register_error'][] = "Email Used";
}

// Check if the phone number already exists
$phoneQuery = "SELECT * FROM User WHERE PhoneNumber = '$phonenumber'";
$phoneResult = $db->query($phoneQuery);

if ($phoneResult->num_rows > 0) {
    $_SESSION['register_error'][] = "Phone number Used";
}

// Redirect to registerfail.php if there are any errors
if (!empty($_SESSION['register_error'])) {
    header("Location: index.php?page=failregister");
    exit();
}

// Insert new user into the database if there are no errors
$query = "INSERT INTO User (Name, Email, Password, PhoneNumber, DateCreated) VALUES ('$username', '$email', '$password', '$phonenumber', '$date')";
$result = $db->query($query);

if (!$result) {
    echo "Your query failed.";
} else {
    // Redirect to the success page
    header("Location: index.php?page=successregister");
    exit();
}

// Close the database connection
$db->close();
?>
