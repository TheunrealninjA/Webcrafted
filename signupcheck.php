<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();
include('dbconfig.php');

if(isset($_POST['submit_button']))
{
    $username = mysqli_real_escape_string($con, $_POST['username']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $confirm_password = mysqli_real_escape_string($con, $_POST['confirm_password']);

    if($password == $confirm_password)
    {
        // Check Email
        $checkemail = "SELECT email FROM users WHERE email='$email' LIMIT 1";
        $checkemail_run = mysqli_query($con, $checkemail);

        if(mysqli_num_rows($checkemail_run) > 0)
        {
            header("Location: Status.php?page=signup&status=emailused");
            exit(0);
        }
        else
        {
            $user_query = "INSERT INTO users (username,email,password) VALUES ('$username','$email','$password')";
            $user_query_run = mysqli_query($con, $user_query);

            if($user_query_run)
            {
                header("Location: Status.php?page=signup&status=success");
                exit(0);
            }
            else
            {
                header("Location: Status.php?page=signup&status=error");
                exit(0);
            }
        }
    }
    else
    {
        header("Location: Status.php?page=signup&status=password");
        exit(0);
    }
}