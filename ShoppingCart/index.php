<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/normalize.css">
    <link rel="stylesheet" href="../css/layout.css">
    <link rel="stylesheet" href="./style.css">
    <title>Shopping Cart</title>
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

        $sql = "SELECT name, size, primary_image, amount, Products.price * amount AS p
                FROM ShopItem
                INNER JOIN Users ON Users.id = ShopItem.uid
                INNER JOIN Inventories ON Inventories.id = ShopItem.iid
                INNER JOIN Products ON Products.id = Inventories.pid
                WHERE completed=0 && Users.id = ".$uid.";";

        $result = mysqli_query($conn, $sql);
        $price_sum = 0;
    }
    function render_txn($name, $image, $size, $amount, $price)
    {
        echo "<tr>
                <td><span class='delete'>X</span></td>
                <td class='image-cell'>
                    <img class='item-image' src=" . $image . " alt='product1'>
                </td>
                <td>
                    <p>" . $name . "</p>
                    <p>Size: <span>" . $size . "</span></p>
                </td>
                <td>" . $amount . "</td>
                <td>$" . number_format($price, 2) . "</td>
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
                <span><a id="cart"><i class="fa fa-shopping-cart"></i></a></span>
                <span>|</span>
                <span><a href="../Account/index.php">Account</a></span>
            </div>
        </div>
        <main>
            <h1>Shopping Cart</h1>
            <div id="table-container">
                <table id="item-table">
                    <thead>
                        <tr>
                            <th colspan="3">Item</th>
                            <th>QTY</th>
                            <th>PRICE</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        for ($i = 0; $i < mysqli_num_rows($result); $i++) {
                            $p = mysqli_fetch_assoc($result);
                            render_txn($p['name'],$p['primary_image'],$p['size'],$p['amount'],$p['p']);
                            $price_sum += $p['p'];
                        }
                        ?>
                    </tbody>
                </table>
            </div>
            <div class="flex-container">
                <p class="flex-item" id="total-price">Total: $<?php echo number_format($price_sum, 2)?></p>
                <a class="flex-item button" href="../Purchase/index.php">Check out</a>
            </div>
        </main>
    </div>
</body>

</html>