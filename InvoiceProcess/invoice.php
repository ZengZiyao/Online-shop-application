<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/normalize.css">
    <link rel="stylesheet" href="../css/layout.css">
    <link rel="stylesheet" href="./style.css">
    <title>Invoice</title>
</head>

<body>
    <?php
    $servername = "localhost";
    $dbuser = "f38ee";
    $dbpass = "f38ee";
    $dbname = "f38ee";
    $conn = mysqli_connect($servername, $dbuser, $dbpass, $dbname);
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        $id = $_GET['id'];
        $sql = "SELECT name, size, primary_image, amount, Transactions.price AS p
                FROM Transactions
                JOIN Invoices ON Transactions.invoice_id=Invoices.id
                JOIN ShopItem ON Transactions.item_id=ShopItem.id
                JOIN Inventories ON Inventories.id = ShopItem.iid
                JOIN Products ON Products.id = Inventories.pid
                WHERE Invoices.id = ".$id;

        $result = mysqli_query($conn, $sql);
        $price_sum = 0;
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
                <span><a href="../Login/index.php">Account</a></span>
            </div>
        </div>
        <main>
            <div id="order-container" class="card">
                <h1>Invoice</h1>
                <table id="item-table">
                    <?php
                    if ($_SERVER["REQUEST_METHOD"] == "GET") {
                        for ($i = 0; $i < mysqli_num_rows($result); $i++) {
                            $p = mysqli_fetch_assoc($result);
                            render_txn($p['name'],$p['primary_image'],$p['size'],$p['amount'],$p['p']);
                            $price_sum += $p['p'];
                        }
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
        </main>
    </div>
</body>

</html>