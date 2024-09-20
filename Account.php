<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include 'PHPScripts/session_manager.php';

$is_logged_in = isset($_SESSION['username']);
$username = htmlspecialchars($_SESSION['username']);

if (!$is_logged_in) {
    header("Location: LoginPage.php?status=noaccess");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
    if ($is_logged_in) {
        echo '<title>' . $username . ' - WebCrafted Pro</title>';
    } else {
        echo '<title>Not Logged In - WebCrafted Pro';
    }
    ?>

    <link rel="icon" href="images/WCLogo.webp">
    <link rel="stylesheet" href="CSS/all.css">
    <link rel="stylesheet" href="CSS/Animate.css">
    <link rel="stylesheet" href="CSS/Account/Main.css">
    <link rel="stylesheet" href="CSS/Footer.css">
    <link rel="stylesheet" href="CSS/Nav.css">
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
                <?php if ($is_logged_in): ?>
                    <li><a href="Account.php"><img src="images/icons/Account.webp" alt="Account" style="margin-top: -8px;"></a></li>
                    <li><a href="logout.php">Logout</a></li>
                <?php else: ?>
                    <li><a href="Login.php">Login</a></li>
                    <li><a href="SignUp.php">Sign Up</a></li>
                <?php endif; ?>
            </ul>

            <a class="MiniWCLogo" href="index.php"><img src="images/MiniWCLogo.webp" alt="Logo"></a>
        </header>

        <div class="Cont">
            <?php
            if ($is_logged_in) {
                echo '<h3 class="Welcome">Hello, ' . $username . '!</h3>';
            } else {
                echo '<h3 class="Welcome">User Not Found</h3>';
            }
            ?>

            <div  class="two-grid">
                <div>
                    Email: <span class="Email"><?php echo htmlspecialchars($_SESSION['email']); ?></span>
                    <br>
                    Account ID: <span class="AccountID"><?php echo htmlspecialchars($_SESSION['id']); ?></span>
                    <br>
                    Date Created: <span class="DateCreated"><?php echo htmlspecialchars($_SESSION['created_at']); ?></span>
                    <br>
                </div>
                <div class="controls">
                    <?php
                    if ($username === 'admin') {
                        echo '<a href="Admin/index.php" class="ControlBtn">Control Center</a>';
                    }
                    ?>
                    <a href="" class="ControlBtn">Change Password</a>
                    <a href="logout.php" class="ControlBtn">Log Out</a>
                </div>
            </div>
        </div>
    </div>
</body>

</html>