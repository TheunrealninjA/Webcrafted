<?php
//include 'PHPScripts/session_manager.php';

$is_logged_in = isset($_SESSION['username']);

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
    <title>Login</title>
    <meta name="description"
        content="Welcome to WebCrafted.Pro Contact Page, where you can get in contact with us about your hand-crafted custom websites for your businesses specific needs. We have competive prices and exclusive features that elevate your website to the next level.">
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
                <li id="services" class="Second-Layer"><a href="Pricing.php">Pricing</a></li>
                <li class="First-Layer"><a href="index.php">Home</a></li>
                <li id="websites" class="Second-Layer"><a href="Websites.php">Websites</a></li>
                <li id="contact"><a href="ContactUs.php">Contact Us</a></li>
            </ul>

            <ul class="account">
                <li><a href="Login.php">Login</a></li>
                <li><a href="SignUp.php">Sign Up</a></li>
            </ul>

            <a class="MiniWCLogo" href="index.php"><img src="images/MiniWCLogo.webp" alt="Logo"></a>
        </header>

        <div class="Cont">
            <div class="signup">
                <?php
                $status = htmlspecialchars($_GET['status'] ?? '', ENT_QUOTES, 'UTF-8');

                switch ($status){
                    case 'invalid':
                        echo '<div class="errorbox">';
                        echo '<img src="images/status/error.webp" style="width: 30px;" alt="error">';
                        echo '<h5>Username Or Password Is Invalid</h5>';
                        echo '</div>';
                        break;
                    case 'username':
                        echo '<div class="warnbox">';
                        echo '<img src="images/status/warning.webp" style="width: 30px;" alt="warning">';
                        echo '<h5>Username Doesnt Exist</h5>';
                        echo '</div>';
                        break;
                    case 'unexpected':
                        echo '<div class="errorbox">';
                        echo '<img src="images/status/error.webp" style="width: 30px;" alt="error">';
                        echo '<h5>Unexpected Error</h5>';
                        echo '</div>';
                        break;
                    case 'conn':
                        echo '<div class="errorbox">';
                        echo '<img src="images/status/error.webp" style="width: 30px;" alt="error">';
                        echo '<h5>Connection Error</h5>';
                        echo '</div>';
                        break;
                    }
                    ?>
                <h2>Login</h2>
                <form action="logincheck.php" method="post">
                    <label for="username">Username:</label>
                    <input type="text" id="username" name="username" required><br><br>

                    <label for="password">Password:</label>
                    <input type="password" id="password" name="password" required><br><br>

                    <div class="check" style="margin-left:3%;">
                        <input style="width: auto; transform:scale(1.2);" id="remember_me" name="remember_me" type="checkbox"><p style="margin:0; padding-left: 10px;" class="confmes">Remember Me?</p>
                    </div>

                    <input class="login" type="submit" value="Login">
                </form>
            </div>
        </div>
    </div>
</body>

</html>