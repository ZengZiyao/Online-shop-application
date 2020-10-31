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

$sql = "CREATE TABLE IF NOT EXISTS Inventories (
    id INT UNSIGNED AUTO_INCREMENT NOT NULL PRIMARY KEY,
    pid INT UNSIGNED NOT NULL,
    size CHAR(3) NOT NULL,
    inventory INT DEFAULT 100,
    FOREIGN KEY(pid) REFERENCES Products(id)
)";

if (mysqli_query($conn, $sql)) {
    echo "Table Inventories created successfully";
} else {
    echo "Failed creation";
}

mysqli_close($conn);
