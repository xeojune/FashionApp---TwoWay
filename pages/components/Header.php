
<link rel="stylesheet" href="../../styles/Header.css">
<div class="header-wrapper">
    <div class="logo-wrapper">
        <a href="index.php">
            <img src="../../../public/images/logoimage/images.png" alt="logo">
        </a>
    </div>
    
    <div class="nav-wrapper">
    <a href="index.php?page=home" class="headerItem">HOME</a>
        <a href="index.php?page=shop" class="headerItem">SHOP</a>
    <?php  session_start();
        if (!empty ($_SESSION['valid_user'])){
            echo '<a href="index.php?page=profile" class="headerItem">PROFILE</a>';
        }
    ?>
        <div class="search-wrapper">
            <img src="../../../public/images/icons/searchicon.png" alt="Search Icon" width="24" height="24" class='searchBtn'>
        </div>
        <?php
            if (!empty($_SESSION['valid_user'])) {
                // Check if the user clicked the logout link
                if (isset($_GET['page']) && $_GET['page'] == 'logout') {
                    unset($_SESSION['valid_user']);
                    session_destroy();
                    echo '<script>alert("You have been logged out.");</script>';
                    echo '<a href="index.php?page=login" class="headerItem">LOGIN</a>';
                } else {
                    echo '<div class="cart-wrapper">
                        <a href="index.php?page=cart">
                            <img src="../../../public/images/icons/shopicon.png" alt="Cart Icon" width="24" height="22" class="cartBtn">
                            </a>
                        </div>';
                    echo '<div class="search-wrapper">
                        <a href="index.php?page=wishlist">
                            <img src="../../../public/images/icons/wishlisticon.png" alt="Wishlist Icon" width="24" height="24" class="WishBtn">
                            </a>
                        </div> &nbsp &nbsp &nbsp' ;
                    // Display the logout link if the session is active
                    echo '<a href="index.php?page=logout" class="headerItem">LOGOUT</a>';
                }
            } else {
                // Display the login link if the session is empty and do not display the cart
                echo '<a href="index.php?page=login" class="headerItem">LOGIN</a>';
            }
        ?>
    </div>
</div>
