<?php
    $host = "server330";
    $username = "webcsosl_Admin";
    $password = "S*@zUCE.E[X*";
    $database = "webcsosl_Login-info";

    // Create DB Connection
    $conn = mysqli_connect($host, $username, $password, $database);

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }