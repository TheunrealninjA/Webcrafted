<?php
// Start a session
session_start();
$is_logged_in = isset($_SESSION['username']);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Templates - WebCrafted Pro</title>
    <meta name="description"
        content="Welcome to WebCrafted.Pro, where you can get hand-crafted custom websites for your businesses specific needs. We have competive prices and exclusive features that elevate your website to the next level.">

    <link rel="icon" href="images/WCLogo.webp">

    <link rel="stylesheet" href="CSS/all.css">
    <link rel="stylesheet" href="CSS/Animate.css">
    <link rel="stylesheet" href="CSS/Footer.css">
    <link rel="stylesheet" href="CSS/Nav.css">
    <link rel="stylesheet" href="CSS/Templates/Main.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <script src="JavaScript/AnimationWait.js"></script>
    <script src="JavaScript/Filter.js"></script>
    <style>
        @import url("https://fonts.googleapis.com/css?family=Poppins");
    </style>
</head>

<body>
    <div class="main-body">
        <header class="snap">
            <ul class="Top-Buttons">
                <li id="templates"><a href="Templates.php">Templates</a></li>
                <li id="services" class="Second-Layer"><a href="Pricing.php">Pricing</a></li>
                <li class="First-Layer"><a href="index.php">Home</a></li>
                <li id="websites" class="Second-Layer"><a href="Websites.php">Websites</a></li>
                <li id="contact"><a href="ContactUs.php">Contact Us</a></li>
            </ul>

            <ul class="account">
                <?php if ($is_logged_in): ?>
                    <li><a href="account.php"><img src="images/account.png" alt="Account"
                                style="width:30px;height:30px;"></a></li>
                    <li><a href="logout.php">Logout</a></li>
                <?php else: ?>
                    <li><a href="Login.php">Login</a></li>
                    <li><a href="SignUp.php">Sign Up</a></li>
                <?php endif; ?>
            </ul>

            <a class="MiniWCLogo" href="index.php"><img src="images/MiniWCLogo.webp" alt="Logo"></a>
        </header>


        <div class="filter-background">
            <img src="images/icons/Filter_icon.webp" alt="filter">
        </div>

        <div class="filter-options">
            <button class="close-filter">&times;</button>
            <h3>Filters</h3>
            <ul>
                <li><label>Personal <input type="checkbox" class="filter-checkbox" value="personal"></label></li>
                <li><label>Small Business <input type="checkbox" class="filter-checkbox" value="small-business"></label>
                </li>
                <li><label>Business <input type="checkbox" class="filter-checkbox" value="business"></label></li>
            </ul>
        </div>

        <script>
            const filterBackground = document.querySelector('.filter-background');
            const filterOptions = document.querySelector('.filter-options');
            const closeFilter = document.querySelector('.close-filter');

            filterBackground.addEventListener('click', function () {
                filterOptions.classList.toggle('open');
            });

            closeFilter.addEventListener('click', function () {
                filterOptions.classList.remove('open');
            });
        </script>

        <div class="templates three-grid" id="items-container">
            <div class="Cont filter-item" data-category="small-business" style="margin: 0;">
                <h3>Small E-commerce Light</h3>
                <img src="images/Templates/SmallETemp.webp" alt="Small E-commerce Store">
                <p>Best for small E-commerce businesses</p>
            </div>
            <div class="Cont filter-item" data-category="personal" style="margin: 0;">
                <h3>Personal Bio</h3>
                <img src="images/Templates/BioTemp.webp" alt="Bio Template">
                <p>Best for a personal website or a public bio for showing off and promoting your socials</p>
            </div>
            <div class="Cont filter-item" data-category="business" style="margin: 0;">
                <h3>Large E-commerce Light</h3>
                <img src="images/Templates/LargeETemp.webp" alt="Large E-commerce Store">
                <p>Best for big E-commerce businesses</p>
            </div>
        </div>
    </div>
</body>

</html>