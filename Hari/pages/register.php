<?php 

$username = $_POST['name'];
$password = $_POST['password'];

$password = md5($password);

@ $db = new mysqli('localhost', 'root','', 'two-way');

if (mysqli_connect_errno()) {
    echo "Error: Could not connect to database.  Please try again later.";
    exit;
}

$query = "INSERT into user (name, password) VALUES ('$username', '$password')";
$result = $db->query($query);

if (!$result) {
    echo "Your query failed.";
} else {
    // Redirect to another page
    header("Location: login.html");
    exit();
}

$db->close();
?>