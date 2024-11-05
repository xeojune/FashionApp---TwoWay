<?php
$pageTitle = "Shop"; // Set the page title

// Start output buffering to capture the content
ob_start();
?>

<div class="profile-container">
        <h2>Profile</h2>
        <div class="profile-section">
            <img src="../public/images/profile.png" alt="Profile Picture" class="profile-picture">
            <span class="profile-name"><?php echo $userName; ?></span>
        </div>
        
        <hr>

        <div class="login-info">
            <h3>로그인정보</h3>
            <div class="login-item">
                <label>이메일 주소</label>
                <span><?php echo $userEmail; ?></span>
            </div>
            <div class="login-item">
                <label>비밀번호</label>
                <input type="password" value="**********" disabled>
                <button class="change-button">변경</button>
            </div>
        </div>
    </div>


<?php
$pageContent = ob_get_clean(); // Store the buffered content in $pageContent
?>