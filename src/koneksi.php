<?php

$servername ="localhost";
$username = "root";
$password = "";
$db = "football_manager";
$conn = mysqli_connect($servername, $username, $password, $db);

if(!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}


?>