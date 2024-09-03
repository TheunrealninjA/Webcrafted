<?php
$host = "server330";
$username = "webcsosl_Admin";
$password = "S*@zUCE.E[X*";
$dbname = "webcsosl_Login-info";

// Create DB Connection
$conn = new mysqli($host, $username, $password, $dbname);

return $conn;