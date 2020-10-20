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

$sql = "CREATE TABLE IF NOT EXISTS Product_size (
    id INT(6) UNSIGNED AUTO_INCREMENT NOT NULL PRIMARY KEY,
    pid INT(6) UNSIGNED NOT NULL,
    size VARCHAR(3) NOT NULL,
    FOREIGN KEY(pid) REFERENCES Products(id)

)";

if (mysqli_query($conn, $sql)) {
    echo "Table Product_size created successfully";
} else {
    echo "Failed creation";
}

mysqli_close($conn);

?>