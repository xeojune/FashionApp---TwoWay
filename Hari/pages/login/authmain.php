<?php 

@ $db = new mysqli('localhost', 'root','', 'Two-Way');

if (mysqli_connect_errno()) {
    echo "Error: Could not connect to database.  Please try again later.";
    exit;
}

session_start();

$username = $_POST['name'];
$password = $_POST['password'];

$password = md5($password);

$query = "SELECT * FROM user WHERE name = '$username' AND password = '$password'";

$result = $db->query($query);

if ($result->num_rows > 0)
{
    // if they are in the database register the user id
    $_SESSION['valid_user'] = $username;
    header("Location: ../../pages/cart/shoppingcart.php");   
    exit();
} else {
    header("Location: loginfail.html");   
    exit();    
}

$db->close();

?>