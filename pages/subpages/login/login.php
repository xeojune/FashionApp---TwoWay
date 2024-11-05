<?php
$pageTitle = "Login"; // Set the page title

// Start output buffering to capture the content
ob_start();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Login</title>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="../../styles/form.css"/>
    <link rel="stylesheet" href="../../styles/footer.css"/>
  </head>
  <body>
    <form method="POST" action="authmain.php" id="logform">
      <img src="../../../../public/images/logoimage/images.png" alt="Logo" class="logo"/>
      <label class="subtitle">Resell and Earn </label>
      <label>Username <input type="text" placeholder="Enter your Username" id="name"  name="name"></label>
      <label>Password <input type="password" placeholder="Enter your Password" id="password" name="password"> </label> 
      <input type="submit" value="Login" class="custom-button">
      <input type="button" value="Register" class="custom-button" onclick="window.location.href='index.php?page=register';">
    </form>
  </body>
  <script type="text/javascript" src="../../../../scripts/login.js"></script>
  <footer>
    <div class="footer-left">FOOTER</div>
  </footer>
</html>

<?php
$pageContent = ob_get_clean(); // Store the buffered content in $pageContent
?>
