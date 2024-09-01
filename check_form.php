<?php
$conn = require(__DIR__ . "/dbconfig.php");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_GET['username'])) {
    $user = $_GET['username'];

    $stmt = $conn->prepare("SELECT id FROM users WHERE username = ?");
    $stmt->bind_param("s", $user);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        echo 'taken';
    } else {
        echo 'available';
    }

    $stmt->close();
}

$conn->close();