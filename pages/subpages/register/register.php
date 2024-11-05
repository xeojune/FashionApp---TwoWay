<?php
$pageTitle = "Register"; // Set the page title

// Start output buffering to capture the content
ob_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Register</title>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="../../styles/form.css"/>
    <link rel="stylesheet" href="../../styles/footer.css"/>
  </head>
  <body>
    
    <form method="POST" action="register.php" id="regForm">
      <img src="../../../../public/images/logoimage/images.png" alt="Logo" class="logo"/>
      <label class="subtitle">Resell and Earn </label>
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
  <footer>
    <div class="footer-left">FOOTER</div>
  </footer>
</html>

<?php
$pageContent = ob_get_clean(); // Store the buffered content in $pageContent
?>