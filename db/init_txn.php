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

$sql = "CREATE TABLE IF NOT EXISTS Transactions (
    id INT(6) UNSIGNED AUTO_INCREMENT NOT NULL PRIMARY KEY,
    pi_id INT(6) UNSIGNED NOT NULL,
    uid INT(6) UNSIGNED NOT NULL,
    amount INT(3) UNSIGHED NOT NULL,
    FOREIGN KEY(pi_id) REFERENCES Product_inventory(id)

)";

if (mysqli_query($conn, $sql)) {
    echo "Table Transactions created successfully";
} else {
    echo "Failed creation";
}

mysqli_close($conn);

?>