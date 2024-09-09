<?php
session_start();

$servername = "server330.web-hosting.com";
$dbname = "webcsosl_SignUp";
$username = "webcsosl_Admin";
$password = "wJFTJo=o=iZ6";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (!isset($_SESSION['username']) && isset($_COOKIE['remember_me'])) {
    $token = $_COOKIE['remember_me'];

    $stmt = $conn->prepare("SELECT username, remember_token_expiration FROM users WHERE remember_token = ?");
    $stmt->bind_param("s", $token);
    $stmt->execute();
    $stmt->bind_result($username, $token_expiration);

    if ($stmt->fetch()) {
        if (strtotime($token_expiration) > time()) {
            $_SESSION['username'] = $username;
        } else {
            setcookie('remember_me', '', time() - 3600, "/");
        }
    }
    $stmt->close();
}
$conn->close();