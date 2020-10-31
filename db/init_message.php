<?php
$servername = "localhost";
$username = "f38ee";
$password = "f38ee";
$dbname = "f38ee";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: ".mysqli_connect_error());
}

$sql = "CREATE TABLE IF NOT EXISTS Messages (
    id INT UNSIGNED AUTO_INCREMENT NOT NULL PRIMARY KEY,
    fname VARCHAR(20) NOT NULL,
    lname VARCHAR(20) NOT NULL,
    email VARCHAR(200) NOT NULL,
    message VARCHAR(1000) NOT NULL,
    sub BOOLEAN NOT NULL
)";

if (mysqli_query($conn, $sql)) {
    echo "Table Messages created successfully";
} else {
    echo "Failed creation";
}

mysqli_close($conn);
