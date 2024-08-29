<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();
include('dbconfig.php');

if (isset($_POST['submit_button'])) {
    $username = mysqli_real_escape_string($con, $_POST['username']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    if ($password == $confirm_password) {
        $hashed_password = password_hash($password, PASSWORD_BCRYPT);
        // Check Email

        $checkemail = "SELECT email FROM users WHERE email='$email' LIMIT 1";
        $checkemail_run = mysqli_query($con, $checkemail);

        if (mysqli_num_rows($checkemail_run) > 0) {
            header("Location: Status.php?page=signup&status=emailused");
            exit(0);
        } else {
            $stmt = $con->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");

            // Bind the parameters and execute the query
            $stmt->bind_param("sss", $username, $email, $hashed_password);
            if ($stmt->execute()) {
                header("Location: Status.php?page=signup&status=success");
            } else {
                header("Location: Status.php?page=signup&status=error");
            }

            $stmt->close();
        }
    } else {
        header("Location: Status.php?page=signup&status=password");
    }
    exit(0);
}