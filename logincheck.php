<?php
// login.php

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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = $_POST['username'];
    $pass = $_POST['password'];

    // Prepare and bind
    $stmt = $conn->prepare("SELECT password_hash FROM users WHERE username = ?");
    $stmt->bind_param("s", $user);

    // Execute the statement
    $stmt->execute();
    $stmt->bind_result($password_hash);
    $stmt->fetch();

    // Check if password matches
    if (password_verify($pass, $password_hash)) {
        echo "Login successful! Welcome, " . htmlspecialchars($user);
        // Start the session or set up cookies if needed
        // session_start();
        // $_SESSION['username'] = $user;
    } else {
        echo "Invalid username or password";
    }

    $stmt->close();
    $conn->close();
} else {
    echo "No Post";
}
