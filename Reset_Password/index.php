<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password - WebCrafted Pro</title>

    <link rel="icon" href="../../images/WCLogo.webp">
    <link rel="stylesheet" href="../../CSS/all.css">
    <link rel="stylesheet" href="../../CSS/Animate.css">
    <link rel="stylesheet" href="../../CSS/Footer.css">
    <link rel="stylesheet" href="../../CSS/Nav.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <script src="../../JavaScript/AnimationWait.js"></script>
    <script src="../../JavaScript/HamBurger.js"></script>
    <style>
        @import url("https://fonts.googleapis.com/css?family=Poppins");
    </style>
    <script src="https://www.google.com/recaptcha/enterprise.js" async defer></script>
</head>

<body>
    <header class="snap">
        <ul class="Top-Buttons">
            <li id="templates"><a href="../../Templates.php">Templates</a></li>
            <li id="services" class="Second-Layer"><a href="../../Pricing.php">Pricing</a></li>
            <li class="First-Layer"><a href="../../index.php">Home</a></li>
            <li id="websites" class="Second-Layer"><a href="../../Websites.php">Websites</a></li>
            <li id="contact"><a href="../../ContactUs.php">Contact Us</a></li>
        </ul>

        <span class="open-slide">
            <a class="hamburger" href="#" onclick="openSideMenu()">
                <p> &#9776;</p>
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

        <ul class="account">
            <li><a href="../../Account.php"><img src="../../images/icons/Account.webp" alt="Account"
                        style="margin-top: -8px;"></a></li>
            <li><a href="../../logout.php">Logout</a></li>
        </ul>

        <a class="MiniWCLogo" href="../../index.php"><img src="../../images/MiniWCLogo.webp" alt="Logo"></a>
    </header>

    <div class="Cont">
        <h2>Reset Password</h2>
        <?php
        require_once __DIR__ . '../../recaptcha-master/src/autoload.php';

        function displayMessage($classname, $image, $message)
        {
            echo '<div class="' . $classname . '">';
            echo '<img style="width: 30px;" src="../../images/status/' . $image . '" alt="' . $message . '">';
            echo '<h5>' . $message . '</h5>';
            echo '</div>';
        }

        $gRecaptchaResponse = $_POST['g-recaptcha-response'];
        $secret = '6Ldv2DUqAAAAAMxohMkkHwT90vWDgkh_nxf_s7Eh';
        $remoteIp = $_SERVER['REMOTE_ADDR'];

        if (empty($gRecaptchaResponse)) {
            displayMessage('warnbox', 'QuestionMark.webp', 'Recaptcha isn`t complete');
        } else {
            $recaptcha = new \ReCaptcha\ReCaptcha($secret);
            $resp = $recaptcha->verify($gRecaptchaResponse, $remoteIp);

            if (!$resp->isSuccess()) {
                $errors = $resp->getErrorCodes();
                displayMessage('errorbox', 'Error.webp', 'Failed Recaptcha');
            } else {
                $servername = "server330";
                $username = "webcsosl_Admin";
                $password = "wJFTJo=o=iZ6";
                $dbname = "webcsosl_SignUp";
        
                $conn = new mysqli($servername, $username, $password, $dbname);
        
                if ($conn->connect_error) {
                    displayMessage("errorbox", "Error.webp", "Connection failed: " . $conn->connect_error);
                }
        
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    $token = $_POST['token'];
                    $new_password = password_hash($_POST['password'], PASSWORD_BCRYPT);
        
                    $stmt = $conn->prepare("SELECT * FROM users WHERE reset_token = ?");
                    $stmt->bind_param("s", $token);
                    $stmt->execute();
                    $result = $stmt->get_result();
        
                    if ($result->num_rows > 0) {
                        $update = $conn->prepare("UPDATE users SET password_hash = ?, reset_token = NULL WHERE reset_token = ?");
                        $update->bind_param("ss", $new_password, $token);
                        $update->execute();
        
                        displayMessage("successbox", "CheckMark.webp", "Password reset successfully.");
                        header("Location: https://webcrafted.pro/");
                        sleep(2);
                        exit();

                    } else {
                        displayMessage("errorbox", "Error.webp", "Expired or Invalid token.");
                    }
                    $stmt->close();
                    $update->close();
                }
                $conn->close();
            }
        }
        ?>

        <form method="POST">
            <input type="hidden" name="token" value="<?php echo htmlspecialchars($_GET['token']); ?>">
            <label for="password">Enter your new password:</label>
            <input type="password" name="password" id="password" required><br>
            <div class="g-recaptcha" data-sitekey="6Ldv2DUqAAAAACCskWsbXnnCAUfXKP-orgUnazGh" data-action="LOGIN"></div>
            <button type="submit">Reset Password</button>
        </form>
    </div>

</body>

</html>