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
</head>
<body>
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
    $token = $_POST['token'];
    $new_password = password_hash($_POST['password'], PASSWORD_BCRYPT);

    // Verify if the token exists
    $stmt = $conn->prepare("SELECT * FROM users WHERE reset_token = ?");
    $stmt->bind_param("s", $token);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Update the password
        $update = $conn->prepare("UPDATE users SET password_hash = ?, reset_token = NULL WHERE reset_token = ?");
        $update->bind_param("ss", $new_password, $token);
        $update->execute();

        displayMessage("success", "CheckMark.webp", "Password reset successfully.");
    } else {
        displayMessage("error", "Error.webp", "Expired or Invalid token.");
    }
    $stmt->close();
    $update->close();
}
$conn->close();
?>

<!-- HTML Form for password input -->
<div class="Cont">
    <h2>Reset Passoword</h2>
    <form method="POST">
        <input type="hidden" name="token" value="<?php echo htmlspecialchars($_GET['token']); ?>">
        <label for="password">Enter your new password:</label>
        <input type="password" name="password" id="password" required>
        <button type="submit">Reset Password</button>
    </form>
</div>

</body>
</html>