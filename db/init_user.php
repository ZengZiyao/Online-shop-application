<?php
$servername = "localhost";
$dbuser = "f38ee";
$dbpass = "f38ee";
$dbname = "f38ee";

// Create connection
$conn = mysqli_connect($servername, $dbuser, $dbpass, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: ".mysqli_connect_error());
}

$sql = "CREATE TABLE IF NOT EXISTS Users (
    id INT UNSIGNED AUTO_INCREMENT NOT NULL PRIMARY KEY,
    username VARCHAR(20) NOT NULL,
    email VARCHAR(50) NOT NULL,
    password_hash CHAR(60) NOT NULL,
    salt CHAR(60) NOT NULL
)";


if (mysqli_query($conn, $sql)) {
    echo "Table Users created successfully";
} else {
    echo "Failed creation";
}

mysqli_close($conn);

?>