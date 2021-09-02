<?php

$server = "localhost";
$username = "user"
$password = "password"
$database = "imageboard"

$conn = mysqli_connect($server, $username, $password, $database);

if (!$conn) { // If Check Connection
    die("<script>alert('Connection Failed.')</script>");
}

?>
