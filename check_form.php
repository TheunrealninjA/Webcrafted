<?php
$servername = "server330.web-hosting.com";
$dbname = "webcsosl_SignUp";
$username = "webcsosl_Admin";
$password = "wJFTJo=o=iZ6";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    header("Location: Status.php?page=signup&status=connerror");
    exit();
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
}elseif (isset($_GET['email'])) {
    $email = $_GET['email'];

    $stmt = $conn->prepare("SELECT id FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        echo 'taken';
    }else{
        echo 'available';
    }

    $stmt->close();
}else{
    header("Location: Status.php?page=signup&status=");
    exit();
}

$conn->close();