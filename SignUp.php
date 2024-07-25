<?php
// Database connection parameters
$servername = "server330";
$username = "webcsosl_Admin"; // Update this if your database username is different
$password = "&#i^%leoS[wd"; // Update this if your database password is different
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
    echo "Signup successful!";
} else {
    echo "Error: " . $stmt->error;
}

// Close connection
$stmt->close();
$conn->close();
?>
