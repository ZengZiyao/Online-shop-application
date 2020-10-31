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

$sql = "CREATE TABLE IF NOT EXISTS Products (
    id INT UNSIGNED AUTO_INCREMENT NOT NULL PRIMARY KEY,
    price FLOAT NOT NULL,
    name VARCHAR(50) NOT NULL,
    description VARCHAR(250) NOT NULL,
    primary_image VARCHAR(510) NOT NULL,
    second_image VARCHAR(510) NOT NULL
)";

if (mysqli_query($conn, $sql)) {
    echo "Table Products created successfully<br>";
} else {
    echo "Failed creation<br>";
}

mysqli_close($conn);

?>