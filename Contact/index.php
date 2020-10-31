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
            <div id="desc">
                <h1>Contact Us</h1>
                <p>Bezig staan steun zal dan. Ik er ze primitieve na districten geruineerd. Wie vijftien weg uitgeput
                    dezelfde der veertien zee. Mag tin kost niet uren. Al na parasiet of om hellende verbindt. Far gas
                    oude uit niet ipoh. Dat woekeraars dag
                    afwachting mee verwijderd feestdagen ingenieurs aanleiding. Liput koopt japan zes zelfs ugong tin.
                    Er af zuiger twaalf lengte andere koffie voeren. Op besluit ad geplant geheven op haalden beneden
                    of. Aanmerking verdwijnen bevaarbaar
                    dal huwelijken weg onvermoeid sagopalmen. Af cultures werkzaam kinderen ad te zuiniger in verwoede.
                    Jungle andere loopen tronoh ik de al. Hitte leven ijzer de te ad na. Kintya ruimer gelukt in nu.
                    Deden goten ten hitte haven rijst
                    met. De chinees nu op systeem zooveel te gebruik.
                </p>
            </div>
            <div id="form-container" class="card">
                <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
                    <div id="sub-container">
                        <div>
                            <label for="fname">First Name</label>
                            <input type="text" id="fname" name="fname" onchange="validate('fname', this.value)" required>
                            <p class='error' id="fname-error" style="color:red"></p>
                        </div>
                        <div>
                            <label for="lname">Last Name</label>
                            <input type="text" id="lname" name="lname" onchange="validate('lname', this.value)" required>
                            <p class='error' id="lname-error" style="color:red"></p>
                        </div>
                    </div>
                    <label for="email">Email</label>
                    <input type="text" id="email" name="email" onchange="validate('email', this.value)" required>
                    <p class='error' id="email-error" style="color:red"></p>
                    <label for="message">Message to us</label>
                    <textarea name="message" id="" cols="90" rows="10" onchange="validate('msg', this.value)" required></textarea>
                    <p class='error' id="msg-error" style="color:red"></p>
                    <div id="sub-container">
                        <label id="subscribe">
                            <input type="checkbox" name="sub" checked="checked" value="1">
                            subscribe from our mailing list
                        </label>
                        <input type="submit" name="submit" id="submit" value="Submit">
                    </div>
                </form>
            </div>
        </main>
    </div>
    <?php 
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $fname = $_POST["fname"];
        $lname = $_POST["lname"];
        $email = $_POST["email"];
        $msg = $_POST["message"];
        $sub = 0;
        if (isset($_POST['sub'])) {
            $sub = 1;
        }
        $sql = "INSERT INTO Messages(fname, lname, email, message, sub) VALUES (\"". $fname . "\", \"". $lname . "\", \"". $email . "\", \"". $msg . "\", ". $sub . ")";
        if (mysqli_query($conn, $sql)) {
            echo "<script>alert('Message sent successfully!');</script>";
        } else {
            echo "<script>alert('something went wrong!');</script>";
        }
    }
    ?>
    <script>
        function validate(type, value) {
            switch (type) {
                case 'fname':
                    nameRegex = /^[a-zA-Z ]+$/
                    if (value === "" || !nameRegex.test(value)) document.querySelector('#fname-error').innerHTML = 'first name is invalid'
                    else document.querySelector('#fname-error').innerHTML = ''
                    break;
                case 'lname':
                    nameRegex = /^[a-zA-Z ]+$/
                    if (value === "" ||!nameRegex.test(value)) document.querySelector('#lname-error').innerHTML = 'last name is invalid'
                    else document.querySelector('#lname-error').innerHTML = ''
                    break;
                case 'email':
                    emailRegex = /^[a-z0-9A-Z-.]+@([a-z0-9A-Z]+\.){1,3}[a-zA-Z]{2,3}$/
                    if (!emailRegex.test(value)) document.querySelector('#email-error').innerHTML = 'email is invalid'
                    else document.querySelector('#email-error').innerHTML = ''
                    break;
                case 'msg':
                    if (value == '') document.querySelector('#msg-error').innerHTML = 'message should not be empty'
                    else document.querySelector('#msg-error').innerHTML = ''
                    break;
            }
        }
    </script>
</body>

</html>