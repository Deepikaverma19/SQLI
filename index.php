<?php
include 'connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $action = $_POST['action'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $id = isset($_POST['id']) ? (int)$_POST['id'] : '';

    if ($action == 'insert') {
        // Vulnerable INSERT
        $sql = "INSERT INTO users (username, password) VALUES ('$username', '$password')";
        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } elseif ($action == 'select') {
        // Vulnerable SELECT
        $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "id: " . $row["id"]. " - Username: " . $row["username"]. " - Password: " . $row["password"]. "<br>";
            }
        } else {
            echo "0 results";
        }
    } elseif ($action == 'update') {
        // Vulnerable UPDATE
        $sql = "UPDATE users SET password = '$password' WHERE username = '$username'";
        if ($conn->query($sql) === TRUE) {
            echo "Record updated successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}
?>

<form method="post" action="">
    <input type="text" name="username" placeholder="Username" required>
    <input type="text" name="password" placeholder="Password" required>
    <input type="hidden" name="action" value="insert">
    <input type="submit" value="Insert">
</form>

<form method="post" action="">
    <input type="text" name="username" placeholder="Username" required>
    <input type="text" name="password" placeholder="Password" required>
    <input type="hidden" name="action" value="select">
    <input type="submit" value="Select">
</form>


<form method="post" action="">
    <input type="text" name="username" placeholder="Username" required>
    <input type="text" name="password" placeholder="New Password" required>
    <input type="hidden" name="action" value="update">
    <input type="submit" value="Update">
</form>
