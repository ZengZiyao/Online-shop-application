<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/normalize.css">
    <link rel="stylesheet" href="../css/layout.css">
    <link rel="stylesheet" href="./style.css">
    <title>Admin</title>
</head>

<body>
    <div>
        <div id="nav-bar">
            <ul id="nav-list">
                <li><a href="../Shop/index.php">Shop</a></li>
                <li><a href="../About/index.html">About</a></li>
                <li><a href="../Contact/index.php">Contact</a></li>
            </ul>
            <h3 id="logo"><a href="../index.html">Anonymous</a></h3>
            <div id="header-tail">
                <span><a href="../Account/index.php">Account</a></span>
            </div>
        </div>
        <main>

            <div id="form-container" class="card">
            <h1>Add New Product</h1>

                <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
                    <label for="name">Name</label>
                    <input type="text" name="name" required>
                    <div class="flex-container">
                        <div>
                            <label for="price">Price</label>
                            <input type="number" name="price" min="0" required>

                        </div>
                        <div>
                            <label for="inventory">Inventory</label>
                            <input type="number" name="inventory" min="0" step="1" required>
                        </div>
                    </div>
                    <label for="primary-image">Primary Image</label>
                    <input type="text" name="primary-image" required>
                    <label for="second-image">Second Image</label>
                    <input type="text" name="second-image" required>
                    <label for="description">Description</label>
                    <textarea type="description" name="description" cols="70" rows="5" required></textarea>

                    <div class="flex-container">
                        <input type="submit" name="submit" value="Add">
                    </div>
                </form>
            </div>
        </main>
    </div>
    <?php

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = $_POST["name"];
        $price = $_POST["price"];
        $inventory = $_POST["inventory"];
        $primary_image = $_POST["primary-image"];
        $second_image = $_POST["second-image"];
        $description = $_POST["description"];

        $servername = "localhost";
        $dbuser = "f38ee";
        $dbpass = "f38ee";
        $dbname = "f38ee";

        // Create connection
        $conn = mysqli_connect($servername, $dbuser, $dbpass, $dbname);
        // Check connection
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        $p_sql = "INSERT INTO Products(price, name, description, primary_image, second_image) VALUES (" . $price . ", '" . $name . "', '" . $description . "', '" . $primary_image . "', '" . $second_image . "')";

        if (mysqli_query($conn, $p_sql)) {
            $select_sql = "SELECT id FROM Products WHERE name = '" . $name . "'";
            $result = mysqli_query($conn, $select_sql);

            $id = mysqli_fetch_assoc($result)["id"];

            $sql = "INSERT INTO Inventories(pid, size, inventory) VALUES
             (" . $id . ", 'S', " . $inventory . "),
             (" . $id . ", 'M', " . $inventory . "),
             (" . $id . ", 'L', " . $inventory . "),
             (" . $id . ", 'XL', " . $inventory . "),
             (" . $id . ", 'XXL', " . $inventory . ");";

            if (mysqli_query($conn, $sql)) {
                echo "<script>alert('Product inserted successfully');</script>";
            } else {
                echo "<script>alert('Failed insertion');</script>";
            }
        } else {
            echo "<script>alert('Failed insertion');</script>";
        }
    }
    ?>
</body>

</html>