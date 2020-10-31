<?php
$servername = "localhost";
$dbuser = "f38ee";
$dbpass = "f38ee";
$dbname = "f38ee";

// Create connection
$conn = mysqli_connect($servername, $dbuser, $dbpass, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "INSERT INTO ShopItem(iid, uid, amount) VALUES 
(1, 1, 3),
(12, 1, 3),
(24, 1, 3)";

if (mysqli_query($conn, $sql)) {
    echo "Table Users created successfully";
} else {
    echo "Failed insertion";
}

mysqli_close($conn);
