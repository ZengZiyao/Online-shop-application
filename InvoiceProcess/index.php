<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/normalize.css">
    <link rel="stylesheet" href="../css/layout.css">
    <link rel="stylesheet" href="./style.css">
    <title>Shop</title>
</head>

<body>
    <?php
    session_start();
    $uid = $_SESSION["uid"];

    $servername = "localhost";
    $username = "f38ee";
    $password = "f38ee";
    $dbname = "f38ee";
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $sql = "SELECT ShopItem.id AS id, name, size, primary_image, Products.price * amount AS p
FROM ShopItem
INNER JOIN Users ON Users.id = ShopItem.uid
INNER JOIN Inventories ON Inventories.id = ShopItem.iid
INNER JOIN Products ON Products.id = Inventories.pid
WHERE completed=0 && Users.id = ".$uid.";";

    $result = mysqli_query($conn, $sql);

    $addInvoice = "INSERT INTO Invoices(deal_time, uid) VALUES (CURRENT_TIMESTAMP, ".$uid.")";
    mysqli_query($conn, $addInvoice);
    $invoice_id = mysqli_insert_id($conn);
    for ($i = 0; $i < mysqli_num_rows($result); $i++) {
        $p = mysqli_fetch_assoc($result);
        $sql = "UPDATE ShopItem SET completed=1 WHERE id=" . $p['id'];
        mysqli_query($conn, $sql);
        $addTxn = "INSERT INTO Transactions(invoice_id,item_id,price) VALUES (".$invoice_id.", ".$p['id'].", ".$p['p'].");";
        echo $addTxn."<br>";
        mysqli_query($conn, $addTxn);
    }
    header("Location: ./invoice.php?id=".$invoice_id);
    ?>
</body>

</html>