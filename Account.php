<?php
include 'PHPScripts/session_manager.php';

$is_logged_in = isset($_SESSION['username']);
$session_username = htmlspecialchars($_SESSION['username']);

if (!$is_logged_in) {
    header("Location: LoginPage.php?status=noaccess");
    exit();
}

$servername = "server330";
$username = "webcsosl_Admin";
$password = "wJFTJo=o=iZ6";
$dbname = "webcsosl_SignUp";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$stmt = $conn->prepare("SELECT id, email, created_at FROM users WHERE username = ?");
$stmt->bind_param("s", $session_username);
$stmt->execute();
$stmt->bind_result($id, $email, $created_at);
$stmt->store_result();

if ($stmt->fetch()) {
    $_SESSION['id'] = $id;
    $_SESSION['email'] = $email;
    $_SESSION['created_at'] = $created_at;
}

$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
    if ($is_logged_in) {
        echo '<title>' . $session_username . ' - WebCrafted Pro</title>';
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
                <li><a href="Account.php"><img src="images/icons/Account.webp" alt="Account"
                            style="margin-top: -8px;"></a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>

            <a class="MiniWCLogo" href="index.php"><img src="images/MiniWCLogo.webp" alt="Logo"></a>
        </header>

        <div class="Cont">
            <?php
            if ($is_logged_in) {
                echo '<h3 class="Welcome">Hello, ' . $session_username . '!</h3>';
            } else {
                echo '<h3 class="Welcome">User Not Found</h3>';
            }
            ?>

            <div class="two-grid">
                <div class="info">
                    <p>Email: <span class="Email"><?php echo htmlspecialchars($email); ?></span></p>
                    <br>
                    <p>Account ID: <span class="AccountID"><?php echo htmlspecialchars($id); ?></span></p>
                    <br>
                    <p>Date Created: <span
                        class="DateCreated"><?php echo htmlspecialchars($created_at); ?></span></p>
                    <br>
                </div>
                <div class="controls">
                    <?php
                    if ($session_username === 'admin') {
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