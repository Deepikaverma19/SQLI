<?php

$conn = new mysqli('localhost', 'root', '@rmour123', 'vulnerable_db');


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$user_id = $_GET['id'];


$sql = "DELETE FROM users WHERE id = $user_id";

if ($conn->query($sql) === TRUE) {
    echo "Record deleted successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
