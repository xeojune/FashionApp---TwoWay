<?php
$pageTitle = "RemoveCart"; // Set the page title

// Start output buffering to capture the content
ob_start();

    if (isset($_SESSION['valid_user']) && isset($_GET['productID'])) {
        $user = $_SESSION['valid_user'];
        $productID = $_GET['productID'];

        $db = new mysqli('127.0.0.1', 'root', '', 'TwoWay');

        if ($db->connect_errno) {
            echo "Error: Could not connect to database. Please try again later.";
            exit;
        }

        // Prepare and execute the deletion query for the specific product
        $deleteQuery = "DELETE FROM Cart WHERE Name = ? AND ProductID = ?";
        $stmt = $db->prepare($deleteQuery);
        $stmt->bind_param('si', $user, $productID);
        $stmt->execute();

        if ($stmt->affected_rows > 0) {
            // Successful deletion
            header("Location: index.php?page=cart");
            exit;
        } else {
            echo "No matching item found to remove.";
        }

        $stmt->close();
        $db->close();
    } else {
        echo "No item specified or user not logged in.";
    }

$pageContent = ob_get_clean(); // Store the buffered content in $pageContent
?>