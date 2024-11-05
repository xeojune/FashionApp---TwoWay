<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Register Fail</title>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="../../styles/nav.css" />
    <link rel="stylesheet" href="../../styles/form.css"/>
    <link rel="stylesheet" href="../../styles/footer.css"/>
  </head>
  <body>
  <div id='header-wrapper'>
      <div class="header-wrapper">
          <div class="logo-wrapper">
              <img src="../../../public/images/logoimage/images.png" alt="logo">
          </div>
          <div class="nav-wrapper">
          <a href="index.php?page=home" class="headerItem">HOME</a>
              <a href="index.php?page=shop" class="headerItem">SHOP</a>
              <a href="index.php?page=profile" class="headerItem">PROFILE</a>
              <div class="search-wrapper">
                  <img src="../../../public/images/icons/searchicon.png" alt="Search Icon" width="24" height="24" class='searchBtn'>
              </div>
              <div class="cart-wrapper">
                  <img src="../../../public/images/icons/shopicon.png" alt="Cart Icon" width="24" height="22" class='cartBtn'>
              </div>
          </div>
      </div>
    </div>
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