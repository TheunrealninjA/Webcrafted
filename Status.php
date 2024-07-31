<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
    if (isset($_GET['page'])) {
        $page = $_GET['page'];

        if ($page === 'signup') {
            if (isset($_GET['status'])) {
                $status = $_GET['status'];
                if ($status === 'success') {
                    echo '<title>Successful Sign Up</title>';
                } elseif ($status === 'error') {
                    echo '<title>Failed Sign Up</title>';
                } else {
                    echo '<title>Invalid Status</title>';
                }
            } else {
                echo '<title>Missing Status</title>';
            }
        } else {
            echo '<title>Invalid Page</title>';
        }
    } else {
        echo '<title>Missing Page</title>';
    }
    ?>


    <link rel="icon" href="images/WCLogo.webp">

    <link rel="stylesheet" href="CSS/Footer.css">
    <link rel="stylesheet" href="CSS/Status/Main.css">
    <link rel="stylesheet" href="CSS/Nav.css">
    <link rel="stylesheet" href="CSS/all.css">
    <link rel="stylesheet" href="CSS/Animate.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <script src="JavaScript/AnimationWait.js"></script>
    <style>
        @import url("https://fonts.googleapis.com/css?family=Poppins");
    </style>

    <link rel="prefetch" href="https://webcrafted.pro/Images/status/CheckMark.webp"> <!-- Change this -->
    <link rel="prefetch" href="https://webcrafted.pro/Images/status/Error.webp"> <!-- Change this -->
    <link rel="prefetch" href="https://webcrafted.pro/Images/status/QuestionMark.webp"> <!-- Change this -->
</head>

<body>
    <div class="main-body">
        <header class="snap">
            <ul class="Top-Buttons">
                <li id="templates"><a href="Templates.php">Templates</a></li>
                <li id="services" class="Second-Layer"><a href="Pricing.html">Pricing</a></li>
                <li class="First-Layer"><a href="index.html">Home</a></li>
                <li id="websites" class="Second-Layer"><a href="Websites.html">Websites</a></li>
                <li id="contact"><a href="ContactUs.html">Contact Us</a></li>
            </ul>

            <ul class="account">
                <li><a href="Login.php">Login</a></li>
                <li><a href="Signup.html">Sign Up</a></li>
            </ul>

            <a class="MiniWCLogo" href="index.html"><img src="images/MiniWCLogo.webp" alt="Logo"></a>
        </header>
        <?php
        if (isset($page)) {
            if ($page === 'signup') {
                if ($status === 'success') {
                    echo '<div style="text-align: center;">';
                    echo '<img class="status" src="images/status/CheckMark.webp" alt="Check Mark">';
                    echo '<h3 class="message">Sign Up Successful</h3>';
                    echo '<a class="button" href="index.html">Back to home</a>';
                    echo '</div>';
                } elseif ($status === 'error') {
                    echo '<div style="text-align: center;">';
                    echo '<img class="status" src="images/status/Error.webp" alt="Error">';
                    echo '<h3 class="message">Sign Up Failed</h3>';
                    echo '<a class="button" href="SignUp.html">Go Back</a>';
                    echo '</div>';
                } else {
                    echo '<div style="text-align: center;">';
                    echo '<img class="status" src="images/status/QuestionMark.webp" alt="Invalid Status">';
                    echo '<h3 class="message">Invalid Status</h3>';
                    echo '<a class="button" href="SignUp.html">Go Back</a>';
                    echo '</div>';
                }
            } else {
                echo '<div style="text-align: center;">';
                echo '<img class="status" src="images/status/QuestionMark.webp" alt="Invalid Redirect">';
                echo '<h3 class="message">Invalid Redirect</h3>';
                echo '<a class="button" href="index.html">Back to home</a>';
                echo '</div>';
            }
        } else {
            echo '<div style="text-align: center;">';
            echo '<img class="status" src="images/status/QuestionMark.webp" alt="Invalid Redirect">';
            echo '<h3 class="message">Invalid Redirect</h3>';
            echo '<a class="button" href="index.html">Back to home</a>';
            echo '</div>';
        }
        ?>
        <footer>
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
                    <h4><a href="Terms.html">Terms & Conditions</a></h4>
                    <h4><a href="Privacy.html">Privacy Policy</a></h4>
                </div>
            </div>
            <div class="Copyright">
                <p>&copy2024 WebCrafted.Pro. All rights reserved. Website designed and coded by Wyatt @ <a href="https://webcrafted.pro">webcrafted.pro</a></p>
            </div>
        </footer>
    </div>
</body>

</html>