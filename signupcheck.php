<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

print_r($_POST);

$hashed_password = password_hash($_POST['password'], PASSWORD_BCRYPT);

$mysqli = require(__DIR__ . "/dbconfig.php");
$sql = "INSERT INTO users (username, email, password)
        VALUES (?, ?, ?)";

// Bind the parameters and execute the query
$stmt = $mysqli->stmt_init();

$stmt->prepare($sql);

if (!$stmt->prepare($sql)) {
    die("SQL Error: " . $mysqli->error);
}

$stmt->bind_param("sss",
                  $_POST["username"],
                  $_POST["email"], 
                  $hashed_password);

$stmt->execute();

if ($stmt->execute()) {
    header("Location: Status.php?page=signup&status=success");
    exit(0);
} else {
    header("Location: Status.php?page=signup&status=error");
    exit(0);
}
