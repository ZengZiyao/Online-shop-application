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
    $servername = "localhost";
    $username = "f38ee";
    $password = "f38ee";
    $dbname = "f38ee";
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $sql = "SELECT name, size, primary_image, amount, Products.price * amount AS p
FROM ShopItem
INNER JOIN Users ON Users.id = ShopItem.uid
INNER JOIN Inventories ON Inventories.id = ShopItem.iid
INNER JOIN Products ON Products.id = Inventories.pid;";

    $result = mysqli_query($conn, $sql);
    $price_sum = 0;

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
                    <p>Price $" . number_format($amount * $price, 2) . "</p>
                </td>
            </tr>";
    }
    ?>
    <div>
        <div id="nav-bar">
            <ul id="nav-list">
                <li><a href="../Shop/index.php">Shop</a></li>
                <li><a href="../About/index.html">About</a></li>
                <li><a href="../Contact/index.html">Contact</a></li>
            </ul>
            <h3 id="logo">Anonymous</h3>
            <div id="header-tail">
                <span><a id="cart" href="../ShoppingCart/index.php"><i class="fa fa-shopping-cart"></i></a></span>
                <span>|</span>
                <span><a href="../Login/index.php">Account</a></span>
            </div>
        </div>
        <main>
            <div id="order-container" class="card">
                <h1>Order Summary</h1>
                <table id="item-table">
                    <?php
                    for ($i = 0; $i < mysqli_num_rows($result); $i++) {
                        $p = mysqli_fetch_assoc($result);
                        render_txn($p['name'],$p['primary_image'],$p['size'],$p['amount'],$p['p']);
                        $price_sum += $p['amount']*$p['p'];
                    }
                    ?>
                    <tr class="border-top">
                        <td colspan="2">Subtotal</td>
                        <td>$<span><?php echo number_format($price_sum, 2)?></span></td>
                    </tr>
                    <tr>
                        <td colspan="2">GST</td>
                        <td>$<span><?php echo number_format($price_sum * 0.07, 2)?></span></td>
                    </tr>
                    <tr>
                        <td colspan="2">Shipping Cost</td>
                        <td>$<span>0.00</span></td>
                    </tr>
                    <tr class="border-top" id="total-price">
                        <td colspan="2">Total</td>
                        <td>$<span><?php echo number_format($price_sum * 1.07, 2)?></span></td>
                    </tr>
                </table>
            </div>
            <div id="payment-container">
                <a class="button" id="saved-payment" href="../SavedPayment/index.php">Use Saved Payment Method</a>
                <a class="button" id="new-payment" href="../NewPayment/index.php">Use New Payment Method</a>
            </div>
        </main>
    </div>
</body>

</html>