<?php
$pageTitle = "Register Fauk"; // Set the page title

// Start output buffering to capture the content
ob_start();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="../../../styles/form.css"/>
  </head>
  <body>
    <form method="POST" action="index.php?page=registerauth" id="regForm">
      <?php
            // Check if there are error messages and display them
            if (isset($_SESSION['register_error']) && !empty($_SESSION['register_error'])) {
                foreach ($_SESSION['register_error'] as $error) {
                    echo "<label class='register-failed'>$error</label><br>";
                }
                // Clear session errors after displaying them
                unset($_SESSION['register_error']);
            }
        ?>
      <label>Username <input type="text" placeholder="Enter your Username" id="name"  name="name"></label>
      <label>Email <input type="text" placeholder="Enter your Email" id="email" name="email"> </label> 
      <label>Phone Number: <input type="text" placeholder="Enter your Phone Number" id="number" name="number"> </label> 
      <label>Password <input type="password" placeholder="Enter your Password" id="pass" name="password"> </label> 
      <label>Retype Password <input type="password" placeholder="Enter your Password" id="verifypass" name="password2"> </label> 
      <input type="submit" value="Register" class="custom-button" name="submit">
      <input type="button" value="Login" class="custom-button" onclick="window.location.href='index.php?page=login';">
      <script type="text/javascript" src="../../../../scripts/register.js"></script>
    </form>
  </body>
</html>
<?php
$pageContent = ob_get_clean(); // Store the buffered content in $pageContent
?>