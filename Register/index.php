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
                <span><a id="cart" href="../ShoppingCart/index.php"><i class="fa fa-shopping-cart"></i></a></span>
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
                    <label for="username">Username</label>
                    <input type="text" id="username" name="username" required>
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" required>
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" required>
                    <label for="confirm-password">Confirm Password</label>
                    <input type="password" id="confirm-password" name="confirm-password" required>
                    <input type="submit" name="signup" value="Sign Up" id="signup" onclick="validatePassword()">
                </form>
            </div>
        </main>
    </div>
    <?php
    
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $username = $_POST["username"];
            $email = $_POST["email"];
            $password = $_POST["password"];
            $password_hash = password_hash($password, PASSWORD_DEFAULT);

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

            $sql = "SELECT * FROM Users WHERE email = '".$email."'";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
                echo "<script>alert('Account Already Exists!')</script>";

            } else {
                $sql = "INSERT INTO Users(username, email, password_hash) VALUES ('". $username. "', '".$email."', '".$password_hash."')";

                mysqli_query($conn, $sql);
    
                header("Location: http://".$_SERVER["HTTP_HOST"]."/f38ee/Online-shop-application/Shop/index.php");
    
            }

     
        }
    ?>
    <script>
        function validatePassword() {
            var password = document.getElementById("password");
            var confirm_password = document.getElementById("confirm-password");

            if (password.value != confirm_password.value) {
                confirm_password.setCustomValidity("Passwords Don't Match");
            } else {
                confirm_password.setCustomValidity('');
            }
        }
    </script>
</body>

</html>