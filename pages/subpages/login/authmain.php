<?php 
$db = new mysqli('127.0.0.1', 'root', '', 'TwoWay');

if (mysqli_connect_errno()) {
    echo "Error: Could not connect to database.  Please try again later.";
    exit;
}

session_start();

$username = $_POST['name'];
$password = $_POST['password'];

$password = md5($password);

$query = "SELECT * FROM User WHERE Name = '$username' AND Password = '$password'";

$result = $db->query($query);

if ($result->num_rows > 0)
{
    // if they are in the database register the user id
    $_SESSION['valid_user'] = $username;
    header("Location: index.php?page=home");   
    exit();
} else {
    header("Location: index.php?page=faillogin");   
    exit();    
}
$db->close();
?>