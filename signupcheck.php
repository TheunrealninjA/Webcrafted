<?php
// register.php

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
    $email = $_POST['email'];
    $pass = $_POST['password'];

    // Validate the email address
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die("Invalid email format");
    }

    // Hash the password using a strong algorithm (e.g., bcrypt)
    $password_hash = password_hash($pass, PASSWORD_BCRYPT);

    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO users (username, email, password_hash) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $user, $email, $password_hash);

    // Execute the statement
    if ($stmt->execute()) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}