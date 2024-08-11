<?php
// Start a session
session_start();
$is_logged_in = isset($_SESSION['username']);

// Check if user is logged in - enable when done making page 
// if (!$is_logged_in) {
//     header("Location: LoginPage.php");
//     exit();
// }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us - WebCrafted Pro</title>
    <meta name="description"
        content="Welcome to WebCrafted.Pro Contact Page, where you can get in contact with us about your hand-crafted custom websites for your businesses specific needs. We have competive prices and exclusive features that elevate your website to the next level.">

    <link rel="icon" href="images/WCLogo.webp">

    <link rel="stylesheet" href="CSS/all.css">
    <link rel="stylesheet" href="CSS/Animate.css">
    <link rel="stylesheet" href="CSS/Footer.css">
    <link rel="stylesheet" href="CSS/Nav.css">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <script src="JavaScript/AnimationWait.js"></script>
    <script src="JavaScript/ContactFormUpdate.js"></script>
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

        <div class="Cont">
            <div>
                <h2>Contact Us</h2>
                <form class="ContactForm" action="send_email.php" method="post">
                    <label for="email">Email:</label><br>
                    <input type="email" name="email" placeholder="Enter Your Email" required
                        autocomplete="email"><br>

                    <label for="subject">Subject:</label><br>
                    <select id="subject" name="subject" required onchange="showOther()">
                        <option value="" disabled selected>Select One...</option>
                        <option value="Private Hire">Private Hire</option>
                        <option value=""></option>
                        <option value="Support">Support</option>
                        <option value="Other">Other</option>
                    </select><br>

                    <div id="moreInfoDropdown">
                        <label for="moreInfo">What Is The Issue:</label><br>
                        <select id="moreInfo" name="moreInfo" onchange="showOther()">
                            <option value="" disabled selected>Select One...</option>
                            <option value="">My website isnt online</option>
                            <option value="">Website is loading slow</option>
                            <option value="">There is a bug on my website</option>
                            <option value="">How do I host the website</option>
                            <option value="Other">Other</option>
                        </select><br>
                    </div>

                    <div id="OtherOptions">
                        <label for="otherSubject">Reason For Contacting:</label><br>
                        <input type="text" id="otherSubject" name="otherSubject"><br>
                    </div>

                    <label for="message">Message:</label><br>
                    <textarea id="message" name="message" placeholder="Add Some Extra Details You Would Like Us To Know"
                        required></textarea><br>
                    <input type="submit" value="Submit">
                </form>
            </div>
        </div>
    </div>
</body>

</html>