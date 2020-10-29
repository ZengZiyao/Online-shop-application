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
    
        // Create connection
        $conn = mysqli_connect($servername, $username, $password, $dbname);
        // Check connection
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        $sql = "SELECT Products.id as id, Products.price as price, Products.name as name, Images.url as image_url, MIN(Images.id) as image_id FROM Products
        JOIN Images
        ON Products.id = Images.pid
        GROUP BY Products.id;";

        $result = mysqli_query($conn, $sql);

        function render_product($id, $price, $name, $image) {
            echo "<div class='product'>
            <a href='../ItemDetail/index.php?id=".$id."'>
            <img src=".$image." alt='product'>
            <div>
                <h4><b>".$name."</b></h4>
                <p>$".number_format($price, 2)."</p>
            </div>
        </a>
        </div>";
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
                <span><a id="cart" href="../ShoppingCart/index.html"><i class="fa fa-shopping-cart"></i></a></span>
                <span>|</span>
                <span><a href="../Login/index.html">Account</a></span>
            </div>
        </div>
        <main>
            <div class="carousel-wrapper">
                <span id="item-1"></span>
                <span id="item-2"></span>
                <span id="item-3"></span>
                <div class="carousel-item item-1">
                    <img src="../images/carousel-1.jpeg" alt="img1">
                    <a class="arrow arrow-prev" href="#item-3"></a>
                    <a class="arrow arrow-next" href="#item-2"></a>
                </div>

                <div class="carousel-item item-2">
                    <img src="../images/carousel-2.jpeg" alt="img2">
                    <a class="arrow arrow-prev" href="#item-1"></a>
                    <a class="arrow arrow-next" href="#item-3"></a>
                </div>

                <div class="carousel-item item-3">
                    <img src="../images/carousel-3.jpeg" alt="img3">
                    <a class="arrow arrow-prev" href="#item-2"></a>
                    <a class="arrow arrow-next" href="#item-1"></a>
                </div>
            </div>
            <div id="clothes-listing">
                <?php
                        for ($i = 0; $i < mysqli_num_rows($result); $i++) {
                            $product = mysqli_fetch_assoc($result);
                            render_product($product['id'], $product['price'], $product['name'], $product['image_url']);
                        }
                ?>
            </div>
        </main>
    </div>
</body>

</html>