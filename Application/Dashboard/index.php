<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Webcrafted Pro</title>
    <link rel="stylesheet" href="CSS/Main.css">
    <link rel="stylesheet" href="../../CSS/all.css">
    <script src="../../JavaScript/HamBurger.js"></script>
    <style>
        @import url("https://fonts.googleapis.com/css?family=Poppins");
    </style>
</head>

<body>
    <header class="snap">
        <div class="Top-Buttons">
            <img src="../../images/MiniWCLogo.webp" alt="Webcrafted Pro Logo">
            <ul>
                <li class="First-Layer"><a href="../../index.php">Home</a></li>
                <li id="services" class="Second-Layer"><a href="../../Pricing.php">Pricing</a></li>
                <li id="websites" class="Second-Layer"><a href="../../Websites.php">Websites</a></li>
                <li id="templates"><a href="../../Templates.php">Templates</a></li>
                <li id="contact"><a href="../../ContactUs.php">Contact Us</a></li>
            </ul>
        </div>
        <ul class="account">
            <li><a href="Account.php"><img src="../../images/icons/Account.webp" alt="Account"
                        style="margin-top: -8px;"></a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>
        <span class="open-slide">
            <a class="hamburger" href="#" onclick="openSideMenu()">
                <p>&#9776;</p>
            </a>
        </span>
        <div id="side-menu" class="side-nav">
            <a href="#" class="btn-close" onclick="closeSideMenu()">&times;</a>
            <div class="mobile-nav-buttons">
                <a href="../../">Home</a>
                <a href="../../Websites.php">Websites</a>
                <a href="../../Pricing.php">Pricing</a>
                <a href="../../Templates.php">Templates</a>
                <a href="../../ContactUs.php">Contact Us</a>
            </div>
        </div>
    </header>
    <div class="dashboard-container">
        <div class="sidebar">
            <button class="menu-item">Account</button>
            <a class="menu-item" href="">Website Builder</a>

            <a class="menu-item" href="../logout.php">Logout</a>
        </div>
        <div class="main">
            <div class="content">
                <h3>Under Construction... Coming Soon!</h3>
            </div>
        </div>
    </div>
</body>

</html>