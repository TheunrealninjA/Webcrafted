<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verify Email - WebCrafted Pro</title>

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
            <li><a href="../../Login.php">Login</a></li>
            <li><a href="../../SignUp.php">Sign Up</a></li>
        </ul>

        <a class="MiniWCLogo" href="../../index.php"><img src="../../images/MiniWCLogo.webp" alt="Logo"></a>
    </header>

    <div class="Cont">
        <h1>Password Reset</h1>
        <?php
        function displayMessage($classname, $image, $message)
        {
            echo '<div class="' . $classname . '">';
            echo '<img style="width: 30px;" src="../../images/status/' . $image . '" alt="' . $message . '">';
            echo '<h5>' . $message . '</h5>';
            echo '</div>';
        }

        $servername = "server330";
        $username = "webcsosl_Admin";
        $password = "wJFTJo=o=iZ6";
        $dbname = "webcsosl_SignUp";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            displayMessage("error", "Error.webp", "Connection failed: " . $conn->connect_error);
        }

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $email = $_POST['email'];

            $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                $token = bin2hex(random_bytes(50));
                $reset_link = "https://webcrafted.pro/Reset_Password?token=" . $token;

                $update = $conn->prepare("UPDATE users SET reset_token = ? WHERE email = ?");
                $update->bind_param("ss", $token, $email);
                $update->execute();

                $subject = "Password Reset Request";
                $message = "Click the following link to reset your password: $reset_link";
                $headers = "From: no-reply@webcrafted.pro";

                if (mail($email, $subject, $message, $headers)) {
                    displayMessage("successbox", "CheckMark.webp", "Reset link sent to your email.");
                } else {
                    displayMessage("errorbox", "Error.webp", "Failed to send reset link.");
                }
            } else {
                displayMessage("errorbox", "Error.webp", "Email not found.");
            }

            $stmt->close();
            $update->close();
        }
        $conn->close();
        ?>

        <form method="POST">
            <label for="email">Enter your email to reset your password:</label>
            <input type="email" name="email" id="email" required>
            <button type="submit">Send Reset Link</button>
        </form>
    </div>

</body>

</html>