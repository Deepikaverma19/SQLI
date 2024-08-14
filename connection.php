<?php

$servername = "localhost";
$username = "root";
$password = "@rmour123";
$dbname = "vulnerable_db";


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>