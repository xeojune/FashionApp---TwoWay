<?php
$pageTitle = "Brand"; // Set the page title

// Start output buffering to capture the content
ob_start();

// Check if the brandName parameter exists in the URL
$brandName = isset($_GET['brandName']) ? $_GET['brandName'] : 'Unknown Brand';

// Set default values
$backgroundImage = "../../../public/images/brandImg/DefaultBackground.png";
$logoImage = "../../../public/images/brandImg/DefaultLogo.png";
$brandSubtitle = $brandName;
$followers = "0";
$styles = "0";
$shortDescription = "Explore the latest styles and collections from " . $brandName;

// Customize content based on brand name
switch (strtolower($brandName)) {
    case "nike":
        $backgroundImage = "../../../public/images/brandImg/NikeBackground.png";
        $logoImage = "../../../public/images/brandImg/NikeLogo.png";
        $brandSubtitle = "Nike.inc";
        $followers = "65,424";
        $styles = "318,758";
        $shortDescription = "Nike, the leading global sportswear brand, known for innovative designs and athletic performance.";
        break;

    case "adidas":
        $backgroundImage = "../../../public/images/brandImg/AdidasBackground.png";
        $logoImage = "../../../public/images/brandImg/AdidasLogo.png";
        $brandSubtitle = "Adidas.inc";
        $followers = "50,000";
        $styles = "290,000";
        $shortDescription = "Adidas, a sportswear giant, famous for its iconic three stripes and commitment to quality.";
        break;

    case "palace":
        $backgroundImage = "../../../public/images/brandImg/PalaceBackground.png";
        $logoImage = "../../../public/images/brandImg/PalaceLogo.png";
        $brandSubtitle = "Palace.inc";
        $followers = "30,000";
        $styles = "150,000";
        $shortDescription = "Palace is a British streetwear brand, blending skate culture with modern fashion aesthetics.";
        break;

    case "converse":
        $backgroundImage = "../../../public/images/brandImg/ConverseBackground.png";
        $logoImage = "../../../public/images/brandImg/ConverseLogo.png";
        $brandSubtitle = "Converse.inc";
        $followers = "20,000";
        $styles = "100,000";
        $shortDescription = "Converse, renowned for its Chuck Taylor All Star sneakers, is a timeless classic in footwear.";
        break;
    
    case "stussy":
        $backgroundImage = "../../../public/images/brandImg/StussyBackground.png";
        $logoImage = "../../../public/images/brandImg/StussyLogo.png";
        $brandSubtitle = "Stussy.inc";
        $followers = "15,000";
        $styles = "80,000";
        $shortDescription = "Stussy, a pioneer in streetwear, combines surf culture with hip-hop influences in its designs.";
        break;
    
    case "iabstudio":
        $backgroundImage = "../../../public/images/brandImg/IABBackground.png";
        $logoImage = "../../../public/images/brandImg/IABLogo.png";
        $brandSubtitle = "IAB Studio.inc";
        $followers = "10,000";
        $styles = "50,000";
        $shortDescription = "IAB Studio, a South Korean brand, mixes art and fashion for a distinct, innovative style.";
        break;

    case "asics":
        $backgroundImage = "../../../public/images/brandImg/AsicsBackground.png";
        $logoImage = "../../../public/images/brandImg/AsicsLogo.png";
        $brandSubtitle = "Asics.inc";
        $followers = "5,000";
        $styles = "30,000";
        $shortDescription = "Asics, known for its high-quality running shoes, promotes 'Sound Mind, Sound Body' through its products.";
        break;

    case "supreme":
        $backgroundImage = "../../../public/images/brandImg/SupremeBackground.png";
        $logoImage = "../../../public/images/brandImg/SupremeLogo.png";
        $brandSubtitle = "Supreme.inc";
        $followers = "2,000";
        $styles = "10,000";
        $shortDescription = "Supreme is a cult streetwear brand from NYC, recognized for its bold and exclusive releases.";
        break;
    
    case "chromehearts":
        $backgroundImage = "../../../public/images/brandImg/ChromeBackground.png";
        $logoImage = "../../../public/images/brandImg/ChromeLogo.png";
        $brandSubtitle = "Chrome Hearts.inc";
        $followers = "1,000";
        $styles = "5,000";
        $shortDescription = "Chrome Hearts, a luxury brand, merges high-end fashion with rock 'n' roll vibes in its collections.";
        break;
    
    case "newbalance":
        $backgroundImage = "../../../public/images/brandImg/NewBackground.png";
        $logoImage = "../../../public/images/brandImg/NewLogo.png";
        $brandSubtitle = "New Balance.inc";
        $followers = "500";
        $styles = "2,000";
        $shortDescription = "New Balance, famous for its comfortable sneakers, blends style and functionality for all walks of life.";
        break;

    default:
        $brandSubtitle = $brandName; // Display brand name as subtitle if unknown
        break;
}
?>

<link rel="stylesheet" href="../../../styles/BrandDetail.css">
<div class="brand-header">
    <div class="brand-background">
        <img src="<?php echo $backgroundImage; ?>" alt="Brand Background" class="background-image">
    </div>
</div>

<div class="brand-info">
    <div class="brand-details">
        <img src="<?php echo $logoImage; ?>" alt="Brand Thumbnail" class="brand-thumbnail">
        <div class="brand-text">
            <h2><?php echo htmlspecialchars($brandName); ?></h2>
            <p class="brand-subtitle"><?php echo htmlspecialchars($brandSubtitle); ?></p>
            <div class="brand-stats">
                <span class="followers">Interests <?php echo $followers; ?></span> |
                <span class="styles">Styles <?php echo $styles; ?></span>
            </div>
            <p class="brand-description"><?php echo htmlspecialchars($shortDescription); ?></p>
        </div>
    </div>
    <div class="brand-actions">
        <button class="follow-button">Save</button>
        <button class="share-button">Share Brand</button>
    </div>
</div>

<div class="shop-button-container">
    <a href="index.php?page=shop" class="shop-button">Go to Shop</a>
</div>

<?php
$pageContent = ob_get_clean(); // Store the buffered content in $pageContent
?>
