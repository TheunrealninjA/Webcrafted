<?php
// Start a session
session_start();
$is_logged_in = isset($_SESSION['username']);

// Check if user is logged in
if ($is_logged_in) {
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
    $page = htmlspecialchars($_GET['page'] ?? '', ENT_QUOTES, 'UTF-8');
    $status = htmlspecialchars($_GET['status'] ?? '', ENT_QUOTES, 'UTF-8');

    if ($page === 'signup') {
        switch ($status) {
            case 'success':
                echo '<title>Successful Sign Up</title>';
                break;
            case 'error':
                echo '<title>Failed Sign Up</title>';
                break;
            case 'robot':
                echo '<title>Failed Captcha</title>';
                break;
            case '':
                echo '<title>Missing Status</title>';
                break;
            default:
                echo '<title>Invalid Status</title>';
                break;
        }
    }elseif ($page === 'Contact') {
        switch ($status) {
            case 'success':
                echo '<title>Sent Sucessfully</title>';
                break;
            case 'error':
                echo '<title>Uh Oh</title>';
                break;
            case '':
                echo '<title>Missing Status</title>';
                break;
            default:
                echo '<title>Invalid Status</title>';
                break;
        }
    }else {
        echo $page === '' ? '<title>Missing Page</title>' : '<title>Invalid Page</title>';
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
                <li id="services" class="Second-Layer"><a href="Pricing.php">Pricing</a></li>
                <li class="First-Layer"><a href="index.php">Home</a></li>
                <li id="websites" class="Second-Layer"><a href="Websites.php">Websites</a></li>
                <li id="contact"><a href="ContactUs.php">Contact Us</a></li>
            </ul>

            <ul class="account">
                <li><a href="Login.php">Login</a></li>
                <li><a href="Signup.php">Sign Up</a></li>
            </ul>

            <a class="MiniWCLogo" href="index.php"><img src="images/MiniWCLogo.webp" alt="Logo"></a>
        </header>
        <?php
        function displayMessage($image, $message, $linkText, $linkHref)
        {
            echo '<div style="text-align: center;">';
            echo '<img class="status" src="images/status/' . $image . '" alt="' . $message . '">';
            echo '<h3 class="message">' . $message . '</h3>';
            echo '<a class="button" href="' . $linkHref . '">' . $linkText . '</a>';
            echo '</div>';
        }

        $page = htmlspecialchars($_GET['page'] ?? '', ENT_QUOTES, 'UTF-8');
        $status = htmlspecialchars($_GET['status'] ?? '', ENT_QUOTES, 'UTF-8');

        if ($page === 'signup') {
            switch ($status) {
                case 'success':
                    displayMessage('CheckMark.webp', 'Sign Up Successful', 'Back to home', 'index.php');
                    break;
                case 'error':
                    displayMessage('Error.webp', 'Sign Up Failed', 'Go Back', 'SignUp.php');
                    break;
                case 'robot':
                    displayMessage('Error.webp', 'Failed Captcha', 'Go Back', 'SignUp.php');
                    break;
                default:
                    displayMessage('QuestionMark.webp', 'Invalid Status', 'Go Back', 'SignUp.php');
                    break;
            }
        } elseif($page === 'Contact') {
            switch ($status) {
                case 'success':
                    displayMessage('CheckMark.webp', 'Sent Sucessfully', 'Back to home', 'index.php');
                    break;
                case 'error':
                    displayMessage('Error.webp', 'Something Went Wrong', 'Try Again', 'ContactUs.php');
                    break;
                default:
                    displayMessage('QuestionMark.webp', 'Invalid Status', 'Go Back', 'ContactUs.php');
                    break;
            }
        }else {
            displayMessage('QuestionMark.webp', 'Invalid Redirect', 'Back to home', 'index.php');
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