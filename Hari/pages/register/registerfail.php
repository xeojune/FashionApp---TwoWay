<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Register Fail</title>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="../../styles/nav.css" />
    <link rel="stylesheet" href="../../styles/form.css"/>
    <link rel="stylesheet" href="../../styles/footer.css"/>
  </head>
  <body style = "background-color: #f9f9f9;">
    <nav>
      <div class="nav-logo">
        <a href="#home"><img src="../../assets/mainlogo.png" alt="Logo" /></a>
      </div>
      <div class="nav-links">
        <a href="test.html">STYLE</a>
        <a href="test.html">SHOP</a>
        <a href="test.html">ABOUT</a>
      </div>
    </nav>
    <form method="POST" action="register.php" id="regForm">
      <img src="../../assets/mainlogo.png" alt="Logo" class="logo"/>
      <label class="subtitle">Resell and Earn </label>
      <?php
            session_start(); // Start the session

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
      <input type="button" value="Login" class="custom-button" onclick="window.location.href='register.html';">
      <script type="text/javascript" src="../../script/register.js"></script>
    </form>
  </body>
  <footer>
    <div class="footer-left">FOOTER</div>
  </footer>
</html>