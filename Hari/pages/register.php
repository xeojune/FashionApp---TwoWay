<?php
session_start();

$username = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];
$phonenumber = $_POST['number'];
$date = date("Y-m-d");

// Hash the password securely before storing it in the database
$password = md5($password);

// Connect to the database
@ $db = new mysqli('localhost', 'root', '', 'Two-Way');

// Check for connection errors
if (mysqli_connect_errno()) {
    echo "Error: Could not connect to database. Please try again later.";
    exit;
}

// Create an array to store error messages
$_SESSION['register_error'] = [];

// Check if the username already exists
$userQuery = "SELECT * FROM user WHERE name = '$username'";
$userResult = $db->query($userQuery);

if ($userResult->num_rows > 0) {
    $_SESSION['register_error'][] = "Username inuse";
}

// Check if the email already exists
$emailQuery = "SELECT * FROM user WHERE email = '$email'";
$emailResult = $db->query($emailQuery);

if ($emailResult->num_rows > 0) {
    $_SESSION['register_error'][] = "Email inuse";
}

// Check if the phone number already exists
$phoneQuery = "SELECT * FROM user WHERE phonenumber = '$phonenumber'";
$phoneResult = $db->query($phoneQuery);

if ($phoneResult->num_rows > 0) {
    $_SESSION['register_error'][] = "Phone number inuse";
}

// Redirect to registerfail.php if there are any errors
if (!empty($_SESSION['register_error'])) {
    header("Location: registerfail.php");
    exit();
}

// Insert new user into the database if there are no errors
$query = "INSERT INTO user (name, email, password, phonenumber, datecreated) VALUES ('$username', '$email', '$password', '$phonenumber', '$date')";
$result = $db->query($query);

if (!$result) {
    echo "Your query failed.";
} else {
    // Redirect to the success page
    header("Location: registersuccess.html");
    exit();
}

// Close the database connection
$db->close();
?>
