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

$sql = "CREATE TABLE IF NOT EXISTS ShopItem (
    id INT UNSIGNED AUTO_INCREMENT NOT NULL PRIMARY KEY,
    iid INT UNSIGNED NOT NULL,
    uid INT UNSIGNED NOT NULL,
    amount INT UNSIGNED NOT NULL,
    completed BOOLEAN DEFAULT false,
    FOREIGN KEY(iid) REFERENCES Inventories(id),
    FOREIGN KEY(uid) REFERENCES Users(id)
)";

if (mysqli_query($conn, $sql)) {
    echo "Table Transactions created successfully<br>";
} else {
    echo "Failed creation<br>";
}

$sql = "CREATE TABLE IF NOT EXISTS Invoices (
    id INT UNSIGNED AUTO_INCREMENT NOT NULL PRIMARY KEY,
    deal_time TIMESTAMP NOT NULL,
    uid INT UNSIGNED NOT NULL,
    FOREIGN KEY(uid) REFERENCES Users(id)
)";

if (mysqli_query($conn, $sql)) {
    echo "Table Transactions created successfully<br>";
} else {
    echo "Failed creation<br>";
}

$sql = "CREATE TABLE IF NOT EXISTS Transactions (
    id INT UNSIGNED AUTO_INCREMENT NOT NULL PRIMARY KEY,
    invoice_id INT UNSIGNED NOT NULL,
    item_id INT UNSIGNED NOT NULL,
    price FLOAT NOT NULL,
    FOREIGN KEY(invoice_id) REFERENCES Invoices(id),
    FOREIGN KEY(item_id) REFERENCES ShopItem(id)
)";

if (mysqli_query($conn, $sql)) {
    echo "Table Transactions created successfully";
} else {
    echo "Failed creation";
}

mysqli_close($conn);

?>