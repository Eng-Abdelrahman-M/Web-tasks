<?php
if (isset($_POST['username'])) {
    $servername = "localhost";
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Create connection
    $conn = new mysqli($servername, $username, $password);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Create database
    $sql = "CREATE DATABASE myDB";
    if ($conn->query($sql) === true) {
        echo "Database created successfully";
    } else {
        echo "Error creating database: " . $conn->error;
    }

    mysqli_select_db($conn, "myDB");
    $sql = "CREATE TABLE deals (
				clientDeal_id int NOT NULL AUTO_INCREMENT PRIMARY KEY,
				client_id int,
				client_name varchar(50),
				deal_id int,
				deal_name varchar(50),
				date DATETIME,
				accepted int,
				refused int)";
    if ($conn->query($sql) === true) {
        echo "table created successfully";
    } else {
        echo "Error creating database: " . $conn->error;
    }

    $fileName = $_FILES["file"]["tmp_name"];
    if ($_FILES["file"]["size"] > 0) {

        $file = fopen($fileName, "r");
        $flag = true;
        while (($column = fgetcsv($file, 10000, ",")) !== false) {
            if ($flag) {$flag = false;
                continue;}
            $client = "";
            $clientId = 0;
            if (isset($column[0])) {
                $temp = explode(" @", mysqli_real_escape_string($conn, $column[0]));
                $client = $temp[0];
                $clientId = intval($temp[1], 10);
            }

            $deal = "";
            $dealId = 0;
            if (isset($column[1])) {
                $temp = explode(" #", mysqli_real_escape_string($conn, $column[1]));
                $deal = $temp[0];
                $dealId = intval($temp[1], 10);
            }

            $date = "";
            if (isset($column[2])) {
                $date = "20" . $column[2] . ":00";
                $date = mysqli_real_escape_string($conn, $date);
            }

            $accepted = "";
            if (isset($column[3])) {
                $accepted = intval($column[3], 10);
            }

            $refused = "";
            if (isset($column[4])) {
                $refused = intval($column[4], 10);
            }

            $sqlInsert = "INSERT into deals (client_id,client_name,deal_id,deal_name,date,accepted,refused)
					values (" . $clientId . ',\'' . $client . '\',' . $dealId . ',\'' . $deal . '\',\'' . $date . '\',' . $accepted . ',' . $refused . ')';

            if ($conn->query($sqlInsert) === true) {
                echo "insert successfully";
            } else {
                echo "Error insert " . $conn->error . $sqlInsert;
            }
        }

    }

    $conn->close();
}
