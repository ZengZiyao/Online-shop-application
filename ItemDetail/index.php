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
    $pid = $_GET["id"];
    $servername = "localhost";
    $username = "f38ee";
    $password = "f38ee";
    $dbname = "f38ee";

    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $sql = "SELECT * FROM Products WHERE id = " . $pid;
    $product = mysqli_fetch_assoc(mysqli_query($conn, $sql));

    $image_sql = "SELECT url FROM Images WHERE pid = " . $pid;
    $images = mysqli_query($conn, $image_sql);

    $image_1 = mysqli_fetch_row($images);
    $image_2 = mysqli_fetch_row($images);
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
                <span><a id="cart" href="../ShoppingCart/index.html"><i class="fa fa-shopping-cart"></i></a></span>
                <span>|</span>
                <span><a href="../Login/index.html">Account</a></span>
            </div>
        </div>
        <main>
            <div class="flex-container">

                <div id="gallery-container">
                    <div id="image-column">
                        <img src="<?php echo $image_1[0] ?>" alt="product-detail1" class="thumbnail" onclick="selectImage('<?php echo $image_1[0] ?>')">
                        <img src="<?php echo $image_2[0] ?>" alt="product-detail2" class="thumbnail" onclick="selectImage('<?php echo $image_2[0] ?>')">
                    </div>
                    <div id="selected">
                        <img src="<?php echo $image_1[0] ?>" alt="selected-image" id="selected-image">
                    </div>
                </div>
                <div id="details-container">
                    <h1 id="title"><?php echo $product['name'] ?></h1>
                    <h2>$<span><?php echo number_format($product['price'], 2) ?></span></h2>
                    <h3>DESCRIPTION</h3>
                    <p id="description"><?php echo $product['description'] ?>
                    </p>
                    <form method="POST" action="<?php echo $_SERVER['PHP_SELF']."?id=".$pid ?>">
                        <input type="hidden" name="price" value="<?php echo $product['price'] ?>">
                        <select name="size" id="size">
                            <option value="" selected>Select Size</option>
                            <option value="S">S</option>
                            <option value="M">M</option>
                            <option value="L">L</option>
                            <option value="XL">XL</option>
                        </select>
                        <input type="number" id="qty" name="quantity" value="1" min="1">
                        <div id="button-container">
                            <input type="submit" name="cart" value="Add To Cart">
                            <input type="submit" name="purchase" value="Purchase">
                        </div>

                    </form>

                </div>
            </div>

            <div id="recommendation">
                <h1>You Might Also Like</h1>
                <div id="clothes-listing">
                    <?php
                    $sql = "SELECT Products.id as id, Products.price as price, Products.name as name, Images.url as image_url, MIN(Images.id) as image_id FROM Products
                            JOIN Images
                            ON Products.id = Images.pid
                            GROUP BY Products.id
                            LIMIT 4;";

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
                        $product = mysqli_fetch_row($result);
                        render_product($product[0], $product[1], $product[2], $product[3]);
                    }

                    ?>

                </div>

            </div>
        </main>
    </div>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $size = $_POST["size"];
        $qty = $_POST["quantity"];
        $price = $_POST["price"];

        if (isset($_POST["cart"])) {
            $sql = "SELECT id FROM Inventories WHERE pid = ".$pid." AND size = '".$size."'";
            $iid = mysqli_fetch_assoc(mysqli_query($conn, $sql))["id"];

            // Update Inventories
            $sql = "UPDATE Inventories SET inventory = inventory - ".$qty." WHERE id = ".$iid;
            mysqli_query($conn, $sql);

            //Insert into ShopItems
            //TODO: replace uid
            $sql = "INSERT INTO ShopItem(iid, amount, price, uid) VALUES (".$iid.", ".$qty. ", ".$price.", 1)";
            mysqli_query($conn, $sql);
        }
    }

    ?>
    <script>
        function selectImage(image_url) {
            document.getElementById("selected-image").src = image_url;
        }
    </script>
</body>

</html>