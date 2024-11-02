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
        <h3>Password Reset</h3>
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
                $message = '
                <html>
                <head>
                    <style>
                        .email-container {
                            font-family: Arial, sans-serif;
                            background-color: #f4f4f4;
                            padding: 20px;
                            border-radius: 10px;
                            max-width: 600px;
                            margin: auto;
                        }
                        .email-header {
                            background-color: #0073e6;
                            color: white;
                            padding: 10px;
                            border-radius: 10px 10px 0 0;
                            text-align: center;
                        }
                        .email-body {
                            padding: 20px;
                            background-color: white;
                            border-radius: 0 0 10px 10px;
                        }
                        .email-footer {
                            text-align: center;
                            padding: 10px;
                            font-size: 12px;
                            color: #777;
                        }
                        .reset-button {
                            display: inline-block;
                            padding: 10px 20px;
                            margin: 20px 0;
                            background-color: #0073e6;
                            color: white;
                            text-decoration: none;
                            border-radius: 5px;
                        }
                    </style>
                </head>
                <body>
                    <div class="email-container">
                        <div class="email-header">
                            <h2>Password Reset Request</h2>
                        </div>
                        <div class="email-body">
                            <p>We received a request to reset your password. Click the button below to reset your password:</p>
                            <a href="' . $reset_link . '" class="reset-button">Reset Password</a>
                            <p>If you did not request a password reset, please ignore this email.</p>
                        </div>
                        <div class="email-footer">
                            <p>&copy; 2024 WebCrafted Pro. All rights reserved.</p>
                        </div>
                    </div>
                </body>
                </html>
                ';
                $headers = "From: no-reply@webcrafted.pro\r\n";
                $headers .= "MIME-Version: 1.0\r\n";
                $headers .= "Content-type: text/html; charset=UTF-8\r\n";


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