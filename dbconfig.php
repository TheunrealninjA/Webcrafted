<?php
    $host = "server330";
    $username = "webcsosl_Admin";
    $password = "S*@zUCE.E[X*";
    $dbname = "webcsosl_Login-info";

    // Create DB Connection
    $mysqli = new mysqli(hostname:$host,
                         username:$username,
                         password:$password,
                         database:$dbname);

    // Check connection
    if ($mysqli->connect_errno) {
        die("Connection failed: " . $mysqli->connect_error);
    }

    return $mysqli;