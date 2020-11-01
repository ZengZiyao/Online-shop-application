<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/normalize.css">
    <link rel="stylesheet" href="../css/layout.css">
    <link rel="stylesheet" href="./style.css">
    <title>Shop Item</title>
</head>

<body>
    <?php
    session_start();
    $uid = $_SESSION["uid"];
    $pid = $_GET["id"];
    $servername = "localhost";
    $dbuser = "f38ee";
    $dbpass = "f38ee";
    $dbname = "f38ee";

    $conn = mysqli_connect($servername, $dbuser, $dbpass, $dbname);
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $sql = "SELECT * FROM Products WHERE id = " . $pid;
    $product = mysqli_fetch_assoc(mysqli_query($conn, $sql));
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
            <div class="flex-container">

                <div id="gallery-container">
                    <div id="image-column">
                        <img src="<?php echo $product['primary_image'] ?>" alt="product-detail1" class="thumbnail" onclick="selectImage('<?php echo $product['primary_image'] ?>')">
                        <img src="<?php echo $product['second_image'] ?>" alt="product-detail2" class="thumbnail" onclick="selectImage('<?php echo $product['second_image'] ?>')">
                    </div>
                    <div id="selected">
                        <img src="<?php echo $product['primary_image'] ?>" alt="selected-image" id="selected-image">
                    </div>
                </div>
                <div id="details-container">
                    <h1 id="title"><?php echo $product['name'] ?></h1>
                    <h2>$<span><?php echo number_format($product['price'], 2) ?></span></h2>
                    <h3>DESCRIPTION</h3>
                    <p id="description"><?php echo $product['description'] ?>
                    </p>
                    <form id="form" method="POST">
                        <input type="hidden" name="price" value="<?php echo $product['price'] ?>">
                        <select name="size" id="size">
                            <option value="S">S</option>
                            <option value="M" selected>M</option>
                            <option value="L">L</option>
                            <option value="XL">XL</option>
                            <option value="XXL">XXL</option>

                        </select>
                        <input type="number" id="qty" name="quantity" value="1" min="1">
                        <div id="button-container">
                            <input type="submit" name="cart" value="Add To Cart" onclick="submitForm(<?php echo $_SERVER['PHP_SELF'] . "?id=" . $pid ?>)">
                            <input type="submit" name="purchase" value="Purchase" disabled>
                        </div>

                    </form>

                </div>
            </div>

            <div id="recommendation">
                <h1>You Might Also Like</h1>
                <div id="clothes-listing">
                    <?php
                    $sql = "SELECT id, price, name, primary_image as image_url FROM Products LIMIT 4;";

                    $result = mysqli_query($conn, $sql);

                    function render_product($id, $price, $name, $image)
                    {
                        echo "<div class='product'>
                                <a href='../ItemDetail/index.php?id=" . $id . "'>
                                <img src=" . $image . " alt='product'>
                                <div>
                                    <h4><b>" . $name . "</b></h4>
                                    <p>$" . number_format($price, 2) . "</p>
                                </div>
                            </a>
                            </div>";
                    }

                    for ($i = 0; $i < mysqli_num_rows($result); $i++) {
                        $product = mysqli_fetch_assoc($result);
                        render_product($product['id'], $product['price'], $product['name'], $product['image_url']);
                    }
                    ?>

                </div>

            </div>
        </main>
    </div>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (!isset($uid)) {
            echo "<script>window.location.href='../Login/index.php';</script>";
        } else {
            $size = $_POST["size"];
            $qty = $_POST["quantity"];
            $price = $_POST["price"];

            $sql = "SELECT id FROM Inventories WHERE pid = " . $pid . " AND size = '" . $size . "'";
            $iid = mysqli_fetch_assoc(mysqli_query($conn, $sql))["id"];

            // Update Inventories
            $sql = "UPDATE Inventories SET inventory = inventory - " . $qty . " WHERE id = " . $iid;
            mysqli_query($conn, $sql);

            //Insert into ShopItems
            $sql = "SELECT * FROM ShopItem WHERE completed = 0 AND iid = " . $iid . " AND uid = " . $uid;
            if (mysqli_num_rows(mysqli_query($conn, $sql)) > 0) {
                $sql = "UPDATE ShopItem SET amount = amount + " . $qty . " WHERE iid = " . $iid . " AND uid = " . $uid;
            } else {
                $sql = "INSERT INTO ShopItem(iid, amount, uid) VALUES (" . $iid . ", " . $qty . ", " . $uid . ")";
            }
            if (mysqli_query($conn, $sql)) {
                echo "<script>alert('Product added successfully!');</script>";
            } else {
                echo "<script>alert('Something went wrong!');</script>";
            }
        }
    }

    ?>
    <script>
        function selectImage(image_url) {
            document.getElementById("selected-image").src = image_url;
        }

        function submitForm(action) {
            var form = document.getElementById("form");
            form.action = action;
            form.submit();
        }
    </script>
</body>

</html>