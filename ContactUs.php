<?php
include 'PHPScripts/session_manager.php';
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
    <script src="https://www.google.com/recaptcha/enterprise.js" async defer></script>
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

        <div class="Cont ContactCont snap">
            <div>
                <?php
                function displayMessage($classname, $image, $message)
                {
                    echo '<div class="' . $classname . '">';
                    echo '<img style="width: 30px;" src="images/status/' . $image . '" alt="' . $message . '">';
                    echo '<h5>' . $message . '</h5>';
                    echo '</div>';
                }

                $status = htmlspecialchars($_GET['status'] ?? '', ENT_QUOTES, 'UTF-8');

                switch ($status) {
                    case 'robot':
                        displayMessage('errorbox', 'Error.webp', 'You are a robot');
                        break;
                    case 'misrobot':
                        displayMessage('warnbox', 'warning.webp', 'Recaptcha Not Completed');
                        break;
                    case 'success':
                        displayMessage('successbox', 'CheckMark.webp', 'Email Sent Successfully');
                        break;
                    case 'error':
                        displayMessage('errorbox', 'Error.webp', 'Email Failed To Send');
                        break;
                    default:
                        break;
                }
                ?>
                <h2>Contact Us</h2>
                <form class="ContactForm" id="ContactForm" action="send_email.php" method="post">
                    <label for="email">Email:</label><br>
                    <input type="email" name="email" placeholder="Enter Your Email" required autocomplete="email"><br>

                    <label for="subject">Subject:</label><br>
                    <select id="subject" name="subject" required onchange="showOther()">
                        <option value="" disabled selected>Select One...</option>
                        <option value="Private Hire">Private Hire</option>
                        <option value="Question">Question</option>
                        <option value="Support">Support</option>
                        <option value="Other">Other</option>
                    </select><br>

                    <div id="moreInfoDropdown">
                        <label for="moreInfo">What Is The Issue:</label><br>
                        <select id="moreInfo" name="moreInfo" onchange="showOther()">
                            <option value="" disabled selected>Select One...</option>
                            <option value="Website is offline">My website isnt online</option>
                            <option value="Website slow">Website is loading slow</option>
                            <option value="Bugs on website">There is a bug on my website</option>
                            <option value="Help hosting website">How do I host the website</option>
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

                    <div class="g-recaptcha" data-sitekey="6Ldv2DUqAAAAACCskWsbXnnCAUfXKP-orgUnazGh" data-action="LOGIN"></div><br />

                    <input type="submit" id="submit" value="Submit">
                </form>
            </div>
        </div>
    </div>
</body>
</html>