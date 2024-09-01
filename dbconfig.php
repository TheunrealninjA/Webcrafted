<?php
$host = "server330";
$username = "webcsosl_Admin";
$password = "S*@zUCE.E[X*";
$dbname = "webcsosl_Login-info";

// Create DB Connection
$conn = new mysqli(
    hostname: $host,
    username: $username,
    password: $password,
    database: $dbname
);

// Check connection
if ($conn->connect_errno) {
    die("Connection failed: " . $conn->connect_error);
}

return $conn;