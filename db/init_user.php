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
    username(20) VARCHAR NOT NULL,
    email(10) VARCHAR NOT NULL,
    password_hash VARCHAR(50) NOT NULL,
    salt VARCHAR(50) NOT NULL,
    image_url VARCHAR(50)
)";

if (mysqli_query($conn, $sql)) {
    echo "Table Users created successfully";
} else {
    echo "Failed creation";
}

mysqli_close($conn);

?>