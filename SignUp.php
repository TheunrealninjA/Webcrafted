<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description"
        content="Welcome to WebCrafted.Pro, where you can get hand-crafted custom websites for your businesses specific needs. We have competive prices and exclusive features that elevate your website to the next level.">
    <title>Sign Up - WebCrafted Pro</title>

    <link rel="icon" href="images/WCLogo.webp">

    <link rel="stylesheet" href="CSS/SignUp/Main.css">
    <link rel="stylesheet" href="CSS/Footer.css">
    <link rel="stylesheet" href="CSS/Nav.css">
    <link rel="stylesheet" href="CSS/all.css">
    <link rel="stylesheet" href="CSS/Animate.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <script src="JavaScript/AnimationWait.js"></script>
    <script src="JavaScript/HamBurger.js"></script>
    <style>
        @import url("https://fonts.googleapis.com/css?family=Poppins");
    </style>
    <script src="https://www.google.com/recaptcha/enterprise.js" async defer></script>

    <script>
        function checkUsername() {
            const username = document.getElementById('username').value;
            if (username.length > 0) {
                fetch('check_form.php?username=' + encodeURIComponent(username))
                    .then(response => response.text())
                    .then(data => {
                        const usernameField = document.getElementById('username');
                        if (data === 'taken') {
                            usernameField.setCustomValidity('Username is already taken');
                            usernameField.reportValidity();
                        } else {
                            usernameField.setCustomValidity('');
                        }
                    });
            }
        }

        function checkEmail() {
            const email = document.getElementById('email').value;
            if (email.length > 0) {
                fetch('check_form.php?email=' + encodeURIComponent(email))
                    .then(response => response.text())
                    .then(data => {
                        const emailField = document.getElementById('email');
                        if (data === 'taken') {
                            emailField.setCustomValidity('Email is already in use')
                            emailField.reportValidity();
                        } else {
                            emailField.setCustomValidity('');
                        }
                    });
            }
        }
    </script>
</head>

<body>
    <div class="main-body">
        <header>
            <ul class="Top-Buttons">
                <li id="templates"><a href="Templates.php">Templates</a></li>
                <li id="services" class="Second-Layer"><a href="Pricing.php">Pricing</a>
                <li class="First-Layer"><a href="index.php">Home</a></li>
                <li id="websites" class="Second-Layer"><a href="Websites.php">Websites</a></li>
                <li id="contact"><a href="ContactUs.php">Contact Us</a></li>
            </ul>

            <span class="open-slide">
                <a class="hamburger" href="#" onclick="openSideMenu()">
                    <p> &#9776;</p>
                </a>
            </span>

            <div id="side-menu" class="side-nav">
                <a href="#" class="btn-close" onclick="closeSideMenu()">&times;</a>
                <div class="mobile-nav-buttons">
                    <a href="/">Home</a>
                    <a href="Websites.php">Websites</a>
                    <a href="Pricing.php">Pricing</a>
                    <a href="Templates.php">Templates</a>
                    <a href="ContactUs.php">Contact Us</a>
                </div>
            </div>

            <ul class="account">
                <li><a href="Login.php">Login</a></li>
                <li><a href="Signup.php">Sign Up</a></li>
            </ul>

            <a class="MiniWCLogo" href="index.php"><img src="images/MiniWCLogo.webp" alt="Logo"></a>
        </header>

        <div class="Cont">
            <?php
            function displayMessage($classname, $image, $message) {
                echo '<div class="' . $classname . '">';
                echo '<img style="width: 30px;" src="images/status/' . $image . '" alt="' . $message . '">';
                echo '<h5>' . $message . '</h5>';
                echo '</div>';
            }

            $status = htmlspecialchars($_GET['status'] ?? '', ENT_QUOTES, 'UTF-8');

            switch ($status) {
                case 'robot':
                    displayMessage('errorbox', 'Error.webp', 'Failed Recaptcha');
                    break;
                case 'misrobot':
                    displayMessage('errorbox', 'QuestionMark.webp', 'Recaptcha isn`t complete');
                    break;
                case 'missing':
                    displayMessage('errorbox', 'Error.webp', 'Please fill in all fields');
                    break;
                case 'user':
                    displayMessage('warnbox', 'warning.webp', 'Username Already In Use');
                    break;
                case 'password':
                    displayMessage('errorbox', 'Error.webp', 'Password isn`t the same');
                    break;
                case 'Format':
                    displayMessage('errorbox', 'Error.webp', 'Email Format Is Incorrect');
                    break;
                case 'success':
                    displayMessage('successbox', 'CheckMark.webp', 'Sign Up Successful');
                    break;
                case 'error':
                    displayMessage('errorbox', 'Error.webp', 'Sign Up Failed');
                    break;
                case 'unexpected':
                    displayMessage('errorbox', 'Error.webp', 'Unexpected Error');
                    break;
                case 'conn':
                    displayMessage('errorbox', 'Error.webp', 'Connection Error');
                    break;
                default:
                    break;
            }
            ?>
            <h3>Sign Up</h3>
            <form class="signup" id="SignUpForm" action="signupcheck.php" method="post">
                <label for="username">Username:</label><br>
                <input type="text" id="username" name="username" placeholder="Input Username" required
                    oninput="checkUsername()"><br>

                <label for="email">Email:</label><br>
                <input type="email" id="email" name="email" placeholder="Input Email" required
                    oninput="checkEmail()"><br>

                <label for="password">Password:</label><br>
                <input type="password" id="password" name="password" placeholder="Input Password" required><br>

                <label for="confirm_password">Confirm Password:</label><br>
                <input type="password" id="confirm_password" name="confirm_password" placeholder="Input Password Again"
                    required><br><br>

                <div class="g-recaptcha" data-sitekey="6Ldv2DUqAAAAACCskWsbXnnCAUfXKP-orgUnazGh" data-action="LOGIN"></div><br />

                <div class="check">
                    <input type="checkbox" id="checkbox" name="checkbox" require>
                    <p class="confmes">By ticking this box you agree to our <a class="clicktext" href="Terms.html">Terms & Conditions</a> and our <a class="clicktext" href="Privacy.html">Privacy Policy</a>.</p>
                </div>

                <input type="submit" id="submit" Value="Sign Up">
            </form>
        </div>
    </div>
</body>

</html>