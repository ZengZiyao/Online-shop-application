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

    session_start();
    $uid = $_SESSION["uid"];

    if (!isset($uid)) {
        header("Location: ../Login/index.php");
    } else {
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

        $sql = "SELECT * FROM Users WHERE id = " . $uid;

        $user = mysqli_fetch_assoc(mysqli_query($conn, $sql));
    }
    ?>
    <div>
        <div id="nav-bar">
            <ul id="nav-list">
                <li><a href="../Shop/index.php">Shop</a></li>
                <li><a href="../About/index.html">About</a></li>
                <li><a href="../Contact/index.php">Contact</a></li>
            </ul>
            <h3 id="logo">Anonymous</h3>
            <div id="header-tail">
                <span><a id="cart" href="../ShoppingCart/index.php"><i class="fa fa-shopping-cart"></i></a></span>
                <span>|</span>
                <span><a href="../Account/index.php">Account</a></span>
            </div>
        </div>
        <main>
            <table>
                <thead>
                    <tr>
                        <th colspan="2">Profile</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="field-name">Username</td>
                        <td><?php echo $user["username"] ?></td>
                    </tr>
                    <tr>
                        <td class="field-name">Email</td>
                        <td><?php echo $user["email"] ?></td>
                    </tr>
                </tbody>
            </table>
            <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
                <input type="submit" value="Logout">
            </form>
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