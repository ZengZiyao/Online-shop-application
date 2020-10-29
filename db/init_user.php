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

$sql = "CREATE TABLE IF NOT EXISTS Users (
    id INT(6) UNSIGNED AUTO_INCREMENT NOT NULL PRIMARY KEY,
    username VARCHAR(20) NOT NULL,
    email VARCHAR(10) NOT NULL,
    password_hash CHAR(40) NOT NULL,
    salt CHAR(40) NOT NULL,
    image_url VARCHAR(255)
)";


if (mysqli_query($conn, $sql)) {
    echo "Table Users created successfully";
} else {
    echo "Failed creation";
}

mysqli_close($conn);

?>