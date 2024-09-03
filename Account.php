<?php
// Start a session
session_start();
$is_logged_in = isset($_SESSION['username']);
$username = htmlspecialchars($_SESSION['username']);

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
    <?php
    //if ($is_logged_in){
    //    echo '<title>' . $is_logged_in . ' - WebCrafted Pro</title>';
    //}else{
    //    echo '<title>Not Logged In - WebCrafted Pro';
    //}
    ?>

    <link rel="icon" href="images/WCLogo.webp">

    <link rel="stylesheet" href="CSS/all.css">
    <link rel="stylesheet" href="CSS/Animate.css">
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
                    <li><a href="Account.php"><img src="images/icons/Account.webp" alt="Account"
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
            <?php
            if ($is_logged_in){
                echo '<h3>Hello, ' . $username . '!</h3>';
            }else{
                echo '<h3>User Not Found</h3>';
            }
            
            if ($username === 'admin'){
                echo '<a href="">Control Center</a>';
            }
            ?>
            <a href="">Change Password</a>
            <a href="logout.php" class="logout">Log Out</a>
        </div>
    </div>
</body>

</html>