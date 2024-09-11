<?php
require_once __DIR__ . '/recaptcha-master/src/autoload.php';
function redirectWithStatus($status)
{
    header("Location: SignUp.php?status=$status");
    exit();
}
function validatePostFields($requiredFields)
{
    foreach ($requiredFields as $field) {
        if (!isset($_POST[$field]) || empty($_POST[$field])) {
            return false;
        }
    }
    return true;
}
function checkUsernameExists($conn, $username) {
    $stmt = $conn->prepare("SELECT id FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->store_result();
    $exists = $stmt->num_rows > 0;
    $stmt->close();
    return $exists;
}
function insertNewUser($conn, $username, $email, $password_hash) {
    $stmt = $conn->prepare("INSERT INTO users (username, email, password_hash) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $username, $email, $password_hash);
    $success = $stmt->execute();
    $stmt->close();
    return $success;
}

$gRecaptchaResponse = $_POST['g-recaptcha-response'];
$secret = '6Ldv2DUqAAAAAMxohMkkHwT90vWDgkh_nxf_s7Eh';
$remoteIp = $_SERVER['REMOTE_ADDR'];

if (!isset($gRecaptchaResponse) || empty($gRecaptchaResponse)){
    $recaptcha = new \ReCaptcha\ReCaptcha($secret);
    $resp = $recaptcha->setExpectedHostname('webcrafted.pro')
        ->verify($gRecaptchaResponse, $remoteIp);

    if (!$resp->isSuccess()) {
        $errors = $resp->getErrorCodes();
        redirectWithStatus('robot');
    }else{
        redirectWithStatus('misrobot');
    }    
}    

$servername = "server330.web-hosting.com";
$dbname = "webcsosl_SignUp";
$username = "webcsosl_Admin";
$password = "wJFTJo=o=iZ6";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    redirectWithStatus('connerror');
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $requiredFields = ['username', 'email', 'password', 'confirm_password'];

    if (!validatePostFields($requiredFields)) {
        $conn->close();
        redirectWithStatus('missing');
    }

    $user = $_POST['username'];
    $email = $_POST['email'];
    $pass = $_POST['password'];
    $confirm_pass = $_POST['confirm_password'];

    if (checkUsernameExists($conn, $user)) {
        $conn->close();
        redirectWithStatus('user');
    }
    if ($confirm_pass !== $pass) {
        $conn->close();
        redirectWithStatus('password');
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $conn->close();
        redirectWithStatus('format');
    }

    $password_hash = password_hash($pass, PASSWORD_BCRYPT);

    if (insertNewUser($conn, $user, $email, $password_hash)) {
        $conn->close();
        redirectWithStatus('success');
    } else {
        $conn->close();
        redirectWithStatus('error');
    }
} else {
    $conn->close();
    redirectWithStatus('error');
}