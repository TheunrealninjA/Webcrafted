<?php
require_once '/recaptcha-master/src/autoload.php';

$secret = '6Ldv2DUqAAAAAMxohMkkHwT90vWDgkh_nxf_s7Eh';
$remoteIp = $_SERVER['REMOTE_ADDR'];

$recaptcha = new \ReCaptcha\ReCaptcha($secret);
$resp = $recaptcha->setExpectedHostname('webcrafted.pro')
    ->verify($gRecaptchaResponse, $remoteIp);

if ($resp->isSuccess()) {

    $servername = "server330.web-hosting.com";
    $dbname = "webcsosl_SignUp";
    $username = "webcsosl_Admin";
    $password = "wJFTJo=o=iZ6";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        header("Location: Status.php?page=signup&status=connerror");
        exit();
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $user = $_POST['username'];
        $email = $_POST['email'];
        $pass = $_POST['password'];
        $confirm_pass = $_POST['confirm_password'];

        $stmt = $conn->prepare("SELECT id FROM users WHERE username = ?");
        $stmt->bind_param("s", $user);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            header("Location: Status.php?page=signup&status=user");
            $stmt->close();
            $conn->close();
            exit();
        }

        if ($confirm_pass !== $pass) {
            header("Location: Status.php?page=signup&status=password");
            $stmt->close();
            $conn->close();
            exit();
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            header("Location: Status.php?page=signup&status=format");
            $stmt->close();
            $conn->close();
            exit();
        }

        $stmt->close();

        $password_hash = password_hash($pass, PASSWORD_BCRYPT);

        $stmt = $conn->prepare("INSERT INTO users (username, email, password_hash) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $user, $email, $password_hash);

        if ($stmt->execute()) {
            header("Location: Status.php?page=signup&status=success");
            $stmt->close();
            $conn->close();
            exit();
        } else {
            header("Location: Status.php?page=signup&status=error");
            $stmt->close();
            $conn->close();
            exit();
        }
    } else {
        header("Location: Status.php?page=signup&status=error");
        $conn->close();
        exit();
    }
} else {
    $errors = $resp->getErrorCodes();
}