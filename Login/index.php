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
                <span><a href="../Login/index.php">Account</a></span>
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
            <div id="form-container" class="card">
                <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
                    <img src="../images/avatar.png" alt="avatar" class="avatar">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" required>
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" required>

                    <div class="flex-container">
                        <a href="../Register/index.php" id="sign-up">Sign up</a>
                        <input type="submit" name="login" value="Log in" id="login">
                    </div>
                </form>
            </div>
        </main>
    </div>
    <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $email = $_POST["email"];
            $account_password = $_POST["password"];

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

            $sql = "SELECT password_hash FROM Users WHERE email = '".$email."'";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
                $password_hash = mysqli_fetch_assoc($result)["password_hash"];

                if (password_verify($account_password, $password_hash)) {
                    header("Location: http://".$_SERVER["HTTP_HOST"]."/f38ee/Online-shop-application/Shop/index.php");
                } else {
                    echo "<script>alert('Wrong Credentials!')</script>";
                }
            } else {
                echo "<script>alert('Account does not exist!')</script>";

            }

        }
    ?>
</body>

</html>