<?php
session_start();

$servername = "server330.web-hosting.com";
$dbname = "webcsosl_SignUp";
$username = "webcsosl_Admin";
$password = "wJFTJo=o=iZ6";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    header("Location: Login.php?status=conn");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = $_POST['username'];
    $pass = $_POST['password'];
    $remember_me = isset($_POST['remember_me']);
    $stmt = $conn->prepare("SELECT password_hash FROM users WHERE username = ?");
    $stmt->bind_param("s", $user);
    $stmt->execute();
    $stmt->bind_result($password_hash);
    $stmt->fetch();

    if (password_verify($pass, $password_hash)) {
        $_SESSION['username'] = $user;

        if ($remember_me) {
            do {
                $token = bin2hex(random_bytes(16));

                $check_stmt = $conn->prepare("SELECT COUNT(*) FROM users WHERE remember_token = ?");
                $check_stmt->bind_param("s", $token);
                $check_stmt->execute();
                $check_stmt->bind_result($token_count);
                $check_stmt->fetch();
                $check_stmt->close();
            } while ($token_count > 0);

            $expiration = date('Y-m-d H:i:s', strtotime('+30 days'));

            $stmt = $conn->prepare("UPDATE users SET remember_token = ?, remember_token_expiration = ? WHERE username = ?");
            $stmt->bind_param("sss", $token, $expiration, $user);
            $stmt->execute();

            setcookie('remember_me', $token, time() + (86400 * 30), "/", "", true, true);
        }
        header("Location: Status.php?page=login&status=success");
        exit();
    } else {
        header("Login.php?stastus=invalid");
        exit();
    }
    $stmt->close();
} else {
    header("Location: Login.php?status=unexpected");
    exit();
}
$conn->close();