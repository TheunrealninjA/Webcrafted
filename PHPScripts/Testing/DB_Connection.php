<?php
$servername = "server330";
$username = "webcsosl_Admin";
$password = "wJFTJo=o=iZ6";
$dbname = "webcsosl_SignUp";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    displayMessage("error", "Error.webp", "Connection failed: " . $conn->connect_error);
}

return $conn;