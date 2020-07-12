<?php 
if (isset($_POST['username'])) {
    $servername = "localhost";
    $username = $_POST['username'];
    $password = $_POST['password'];

    $conn = new mysqli($servername, $username, $password);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Create database
    $sql = "DROP DATABASE myDB";
    if ($conn->query($sql) === true) {
        echo "Database droped successfully";
    } else {
        echo "Error drop database: " . $conn->error;
    }
    $conn->close();
}
?>