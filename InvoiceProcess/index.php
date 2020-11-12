<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/normalize.css">
    <link rel="stylesheet" href="../css/layout.css">
    <link rel="stylesheet" href="./style.css">
    <title>Invoice Process</title>
</head>

<body>
    <?php
    session_start();
    $uid = $_SESSION["uid"];

    $servername = "localhost";
    $dbuser = "f38ee";
    $dbpass = "f38ee";
    $dbname = "f38ee";
    $conn = mysqli_connect($servername, $dbuser, $dbpass, $dbname);
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    if (true) { // if (payment.ExecutePayment())
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

        $to = "f38ee@localhost"; // can be changed to user email when application is online
        $subject = "Order Confirmation";
        $message = "Thanks you for your order. Please find your invoice via this link: http://".$_SERVER['HTTP_HOST']."/f38ee/Online-shop-application/InvoiceProcess/invoice.php?id=".$invoice_id;
        $headers = "From:  f38ee@localhost"."\r\n"."Reply-To: f38ee@localhost"."\r\n"."X-Mailer: PHP/".phpversion();

        mail($to, $subject, $message, $headers, "-ff38ee@localhost");

        header("Location: ./invoice.php?id=".$invoice_id);
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
        <div class="full-page">
            <h1>Payment failed!</h1>
            <div>
                <a id="go-back" href="../ShoppingCart/index.php"><button>Go Back To Shopping Cart</button></a>
            </div>
        </div>
    </div>
</body>

</html>