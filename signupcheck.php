<?php
$captcha = $_POST['cf-turnstile-response'];

if (!$captcha) {
    // What happens when the CAPTCHA was entered incorrectly
    echo '<h2>Please check the captcha form.</h2>';
    exit;
}

$secretKey = "0x4AAAAAAAhCYlYwgTIrwevaM5AtVvDhAgQ";
$ip = $_SERVER['REMOTE_ADDR'];

$url_path = 'https://challenges.cloudflare.com/turnstile/v0/siteverify';
$data = array('secret' => $secretKey, 'response' => $captcha, 'remoteip' => $ip);

$options = array(
    'http' => array(
        'method' => 'POST',
        'content' => http_build_query($data)
    )
);

$stream = stream_context_create($options);

$result = file_get_contents(
    $url_path,
    false,
    $stream
);

$response = $result;

$responseKeys = json_decode($response, true);
//print_r ($responseKeys);
if (intval($responseKeys["success"]) !== 1) {
    echo '<h2>spam?</h2>';

} else {
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    // Database connection parameters
    $servername = "server330";
    $username = "webcsosl_Admin"; // Update this if your database username is different
    $password = "S*@zUCE.E[X*"; // Update this if your database password is different
    $dbname = "webcsosl_Login-info";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Retrieve and sanitize user input
    $user = htmlspecialchars($_POST['username']);
    $email = htmlspecialchars($_POST['email']);
    $pass = htmlspecialchars($_POST['password']);
    $confirm_pass = htmlspecialchars($_POST['confirm_password']);

    // Check if passwords match
    if ($pass !== $confirm_pass) {
        die("Passwords do not match.");
    }

    // Hash the password
    $hashed_password = password_hash($pass, PASSWORD_BCRYPT);

    // Prepare SQL statement
    $stmt = $conn->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $user, $email, $hashed_password);

    // Execute the statement
    if ($stmt->execute()) {
        header("Location: Status.php?page=signup&status=success");
    } else {
        header("Location: Status.php?page=signup&status=error");
    }

    // Close connection
    $stmt->close();
    $conn->close();
}