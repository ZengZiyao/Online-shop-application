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

$sql = "CREATE TABLE IF NOT EXISTS Product_inventory (
    id INT(6) UNSIGNED AUTO_INCREMENT NOT NULL PRIMARY KEY,
    psid INT(6) UNSIGNED NOT NULL,
    inventory INT DEFAULT 100,
    FOREIGN KEY(psid) REFERENCES Product_size(id)

)";

if (mysqli_query($conn, $sql)) {
    echo "Table Product_inventory created successfully";
} else {
    echo "Failed creation";
}

mysqli_close($conn);

?>