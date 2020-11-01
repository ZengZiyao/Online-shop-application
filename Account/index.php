<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/normalize.css">
    <link rel="stylesheet" href="../css/layout.css">
    <link rel="stylesheet" href="./style.css">
    <title>Account</title>
</head>

<body>
    <?php

    session_start();
    $uid = $_SESSION["uid"];

    if (!isset($uid)) {
        header("Location: ../Login/index.php");
    } else {
        $servername = "localhost";
        $dbuser = "f38ee";
        $dbpass = "f38ee";
        $dbname = "f38ee";

        $conn = mysqli_connect($servername, $dbuser, $dbpass, $dbname);
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        $sql = "SELECT * FROM Users WHERE id = " . $uid;

        $user = mysqli_fetch_assoc(mysqli_query($conn, $sql));

        $invoice_id_SQL = "SELECT id FROM Invoices WHERE uid = ".$uid.";";
        $invoice_id = mysqli_query($conn, $invoice_id_SQL);

        $invoice_SQL = "SELECT name, size, primary_image, amount, Transactions.price AS p
                FROM Transactions
                JOIN Invoices ON Transactions.invoice_id=Invoices.id
                JOIN ShopItem ON Transactions.item_id=ShopItem.id
                JOIN Inventories ON Inventories.id = ShopItem.iid
                JOIN Products ON Products.id = Inventories.pid
                WHERE Invoices.id = ";
    }

    function render_txn($name, $image, $size, $amount, $price)
    {
        echo "<tr>
                <td class='image-cell'>
                    <img class='item-image' src='" . $image . "' alt='product1'>
                </td>
                <td>
                    <p>" . $name . "</p>
                    <p>Size: <span>" . $size . "</span></p>
                </td>
                <td>
                    <p>QTY <span>" . $amount . "</span></p>
                    <p>Price $" . number_format($price, 2) . "</p>
                </td>
            </tr>";
    }
    ?>
    <div>
        <div id="nav-bar">
            <ul id="nav-list">
                <li><a href="../Shop/index.php">Shop</a></li>
                <li><a href="../About/index.html">About</a></li>
                <li><a href="../Contact/index.php">Contact</a></li>
            </ul>
            <h3 id="logo"><a href="../index.html">Anonymous</a></h3>
            <div id="header-tail">
                <span><a id="cart" href="../ShoppingCart/index.php"><i class="fa fa-shopping-cart"></i></a></span>
                <span>|</span>
                <span><a href="../Account/index.php">Account</a></span>
            </div>
        </div>
        <main>
            <h1 id="header">Profile</h1>
            <table>
                <tr>
                    <td class="field-name">Username</td>
                    <td><?php echo $user["username"] ?></td>
                </tr>
                <tr>
                    <td class="field-name">Email</td>
                    <td><?php echo $user["email"] ?></td>
                </tr>
            </table>
            <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
                <input type="submit" value="Logout">
            </form>
            <h1 id="header">Transaction History</h1>
            <table>
                <?php
                for ($j = 0; $j < mysqli_num_rows($invoice_id); $j++) {
                    $id = mysqli_fetch_assoc($invoice_id)['id'];
                    $result = mysqli_query($conn, $invoice_SQL.$id);
                    for ($i = 0; $i < mysqli_num_rows($result); $i++) {
                        $p = mysqli_fetch_assoc($result);
                        render_txn($p['name'],$p['primary_image'],$p['size'],$p['amount'],$p['p']);
                    }
                }
                ?>
            </table>
        </main>
    </div>
    <?php

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        unset($_SESSION["uid"]);
        session_destroy();
        header("Location: ../Login/index.php");
    }
    ?>
</body>

</html>