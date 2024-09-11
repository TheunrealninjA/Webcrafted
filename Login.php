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
                function displayMessage($classname, $image, $message){
                    echo '<div class="' . $classname . '">';
                    echo '<img style="width: 30px;" src="images/status/' . $image . '" alt="' . $message . '">';
                    echo '<h5>' . $message . '</h5>';
                    echo '</div>';
                }

                $status = htmlspecialchars($_GET['status'] ?? '', ENT_QUOTES, 'UTF-8');

                switch ($status) {
                    case 'invalid':
                        displayMessage('errorbox', 'Error.webp', 'Invalid Username or Password');
                        break;
                    case 'username':
                        displayMessage('warnbox', 'warning.webp', 'Username does not exist');
                        break;
                    case 'unexpected':
                        displayMessage('errorbox', 'warning.webp', 'An unexpected error occurred');
                        break;
                    case 'conn':
                        displayMessage('errorbox', 'Error.webp', 'Connection Error');
                        break;
                    default:
                        displayMessage('warnbox', 'warning.webp', 'Invalid Status');
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
                        <input style="width: auto; transform:scale(1.2);" id="remember_me" name="remember_me" type="checkbox">
                        <p style="margin:0; padding-left: 10px;" class="confmes">Remember Me?</p>
                    </div>

                    <input class="login" type="submit" value="Login">
                </form>
            </div>
        </div>
    </div>
</body>

</html>