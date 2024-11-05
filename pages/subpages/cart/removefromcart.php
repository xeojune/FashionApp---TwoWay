<?php
    session_start();
    $user = $_SESSION['valid_user'];

    $count = 0;

    @ $db = new mysqli('localhost', 'root','', 'Two-Way');

    if (mysqli_connect_errno()) {
        echo "Error: Could not connect to database.  Please try again later.";
        exit;
    }

    $userquery = "SELECT userid, name FROM user WHERE name = '$user'";
    $resultuser = $db->query($userquery);

    if ($resultuser && $resultuser->num_rows > 0) {
        $row = $resultuser->fetch_assoc();
        $userid = $row['userid'];
        $username = $row['name'];

        // Prepare and execute the deletion query
        $deleteQuery = "DELETE FROM cart WHERE userid = '$userid'";
        $result = $db->query($deleteQuery);
    } else {
        echo "No item specified.";
    }
    // Redirect back to the cart page
    header("Location: shoppingcart.php");
    exit;
    $db->close();
    
?>