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

$sql = "INSERT INTO Users(username, email, password_hash, salt) VALUES 
('Zayn', 'zaynjarvis@gmail.com', '$2y$12$QjSH496pcT5CEbzjD/vtVeH03tfHKFy36d4J0Ltp3lRtee9HDxY3K','$2y$12$QjSH496pcT5CEbzjD/vtVeH03tfHKFy36d4J0Ltp3lRtee9HDxY3K')";

if (mysqli_query($conn, $sql)) {
    echo "Table Users inserted successfully";
} else {
    echo "Failed insertion";
}

mysqli_close($conn);
