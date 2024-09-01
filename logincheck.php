<?php
// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Start a session
session_start();

// Database connection parameters
$servername = "server330.web-hosting.com";
$dbname = "webcsosl_SignUp";
$username = "webcsosl_Admin";
$password = "wJFTJo=o=iZ6";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve and sanitize user input
    $user = htmlspecialchars($_POST['username']);
    $pass = htmlspecialchars($_POST['password']);

    // Prepare SQL statement
    $stmt = $conn->prepare("SELECT password FROM users WHERE username = ?");
    $stmt->bind_param("s", $user);
    $stmt->execute();
    $stmt->bind_result($hashed_password);
    $stmt->fetch();
    $stmt->close();

    // Verify password
    if (password_verify($pass, $hashed_password)) {
        // Set session variables
        $_SESSION['username'] = $user;
        echo "Login successful!";
        // Redirect to a protected page
        header("Location: index.php");
        exit();
    } else {
        echo "Invalid username or password.";
    }
}

// Close connection
$conn->close();