<?php
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

// Verify Cloudflare Turnstile
$turnstile_secret = '0x4AAAAAAAhCYlYwgTIrwevaM5AtVvDhAgQ'; // Replace with your Turnstile secret key
$turnstile_response = $_POST['cf-turnstile-response'];

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "https://challenges.cloudflare.com/turnstile/v0/siteverify");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, [
    'secret' => $turnstile_secret,
    'response' => $turnstile_response,
    'remoteip' => $_SERVER['REMOTE_ADDR']
]);

$response = curl_exec($ch);
curl_close($ch);
$response_data = json_decode($response, true);

// Check if verification was successful
if (!$response_data['success']) {
    // Turnstile verification failed
    header("Location: SignUp.php");
    exit;
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
