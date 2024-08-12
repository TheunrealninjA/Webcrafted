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
    <meta name="description"
        content="Welcome to WebCrafted.Pro, where you can get hand-crafted custom websites for your businesses specific needs. We have competive prices and exclusive features that elevate your website to the next level.">
    <title>Sign Up - WebCrafted Pro</title>

    <link rel="icon" href="images/WCLogo.webp">

    <link rel="stylesheet" href="CSS/Footer.css">
    <link rel="stylesheet" href="CSS/Nav.css">
    <link rel="stylesheet" href="CSS/all.css">
    <link rel="stylesheet" href="CSS/Animate.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <script src="JavaScript/AnimationWait.js"></script>
    <style>
        @import url("https://fonts.googleapis.com/css?family=Poppins");
    </style>
</head>

<body>
    <div class="main-body">
        <header class="snap">
            <ul class="Top-Buttons">
                <li id="templates"><a href="Templates.php">Templates</a></li>
                <li id="services" class="Second-Layer"><a href="Pricing.php">Pricing</a>
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

        <div class="Cont">
            <h3>Sign Up</h3>
            <form class="signup" action="signupcheck.php" method="post">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" placeholder="Username" required><br><br>

                <label for="email">Email:</label>
                <input type="email" id="email" name="email" placeholder="Email" required><br><br>

                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required placeholder="Input Password"><br><br>

                <label for="confirm_password">Confirm Password:</label>
                <input type="password" id="confirm_password" name="confirm_password" placeholder="Input Password Again"><br><br>

                <label for="Captcha">What is 5x2?</label>
                <input type="text" id="answer" name="answer" placeholder="Prove You Are Human"><br><br>

                <input type="submit" value="Sign Up">
            </form>
        </div>

    </div>
</body>

</html>