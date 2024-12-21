<?php
include 'PHPScripts/session_manager.php';
$is_logged_in = isset($_SESSION['username']);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Websites - WebCrafted Pro</title>
    <meta name="description"
        content="Welcome to WebCrafted.Pro, where you can get hand-crafted custom websites for your businesses specific needs. We have competive prices and exclusive features that elevate your website to the next level.">

    <link rel="icon" href="images/WCLogo.webp">

    <link rel="stylesheet" href="CSS/all.css">
    <link rel="stylesheet" href="CSS/Animate.css">
    <link rel="stylesheet" href="CSS/Footer.css">
    <link rel="stylesheet" href="CSS/Nav.css">
    <link rel="stylesheet" href="CSS/Websites/Main.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <script src="JavaScript/AnimationWait.js"></script>
    <script src="JavaScript/HamBurger.js"></script>
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

            <span class="open-slide">
                <a class="hamburger" href="#" onclick="openSideMenu()">
                    <p> &#9776;</p>
                </a>
            </span>

            <div id="side-menu" class="side-nav">
                <a href="#" class="btn-close" onclick="closeSideMenu()">&times;</a>
                <div class="mobile-nav-buttons">
                    <a href="/">Home</a>
                    <a href="Websites.php">Websites</a>
                    <a href="Pricing.php">Pricing</a>
                    <a href="Templates.php">Templates</a>
                    <a href="ContactUs.php">Contact Us</a>
                </div>
            </div>

            <ul class="account">
                <?php if ($is_logged_in): ?>
                    <li><a href="Account.php"><img src="images/icons/Account.webp" alt="Account" style="margin-top: -8px;"></a></li>>
                    <li><a href="logout.php">Logout</a></li>
                <?php else: ?>
                    <li><a href="Login.php">Login</a></li>
                    <li><a href="SignUp.php">Sign Up</a></li>
                <?php endif; ?>
            </ul>

            <a class="MiniWCLogo" href="index.php"><img src="images/MiniWCLogo.webp" alt="Logo"></a>
        </header>
        <div class="box snap">
            <h3>Our Websites</h3>
            <div class="three-grid">
                <div class="web Cont" style="margin: 0;">
                    <h3>WebCrafted.Pro</h3>
                    <img src="images/WCLogo.webp" alt="webcrafted.pro home page">
                    <p>WebCrafted.Pro, where you can get hand-crafted custom websites for your businesses
                        specific needs. We have competive prices and exclusive features that elevate your website to the
                        next level.</p>
                    <a href="https://webcrafted.pro/">See More &gt;</a>
                </div>
                <div class="web Cont" style="margin: 0;">
                    <h3>KLCGroup</h3>
                    <img class="klc" src="KLCGroup/Images/Company Logo.webp" alt="klcgroup home page">
                    <p>A small family owned business that works in home improvement and offers services like
                        rendering, loft insulation and external wall insulation. They have competitive prices and
                        operate in the West Midlands.</p>
                    <a href="https://klcgroup.co.uk/">See More &gt;</a>
                </div>
                <div class="web Cont" style="margin: 0;">
                    <h3>More Coming Soon</h3>
                    <img src="images/QuestionMark.webp" alt="Question Mark">
                    <p>More will be coming soon! If you have made a website with us and want to see it here then please
                        contact us.</p>
                    <a href="ContactUs.php">Contact Us &gt;</a>
                </div>
            </div>
        </div>
        <footer class="box snap">
            <div class="footerlist">
                <div class="section-1">
                    <h3>About Us</h3>
                    <h4>WebCrafted.Pro is where you can get hand-crafted custom websites for your businesses
                        specific needs.
                        We have competive prices and exclusive features that elevate your website to the next
                        level.</h4>
                </div>
                <div class="section-2">
                    <h3>Contact Us</h3>
                    <h4>Email Us : <a href="mailto:wyattd@webcrafted.pro">wyattd@webcrafted.pro</a></h4>
                </div>
                <div class="section-3">
                    <h3>Extras</h3>
                    <h4><a href="">Sitemap</a></h4>
                    <h4><a href="Privacy.html">Privacy Policy</a></h4>
                </div>
            </div>
            <div class="Copyright">
                <p>&copy2024 WebCrafted.Pro. All rights reserved. Website designed and coded by Wyatt @ <a
                        href="https://webcrafted.pro">webcrafted.pro</a></p>
            </div>
        </footer>
    </div>
</body>

</html>