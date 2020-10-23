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

$insert_sql = "INSERT INTO Products(image_url, price, name, description) VALUES 
('https://images.squarespace-cdn.com/content/v1/5d02d798cc25920001b61816/1562770837698-FMNKJ1A4GRW0EYTHCPDD/ke17ZwdGBToddI8pDm48kNgFyjlEyNHlSWEjE-QCU1p7gQa3H78H3Y0txjaiv_0fDoOvxcdMmMKkDsyUqMSsMWxHk725yiiHCCLfrh8O1z5QPOohDIaIeljMHgDF5CVlOqpeNLcJ80NK65_fV7S1UdLKTLgsLX9_T7LnpaostY9WYLb0IFNaX6bgMhY2dUNBWIB-7cQgYKo_bDpR6cEVkg/ulihu-charcoal-silk-linen-tunic_0326-v1-FINAL-copy.jpg?format=750w', 50.00, 'Lounge Tunic / Black', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.'),
('https://images.squarespace-cdn.com/content/v1/5d02d798cc25920001b61816/1562797313348-RV3I7WY2DOYUQ3ZLZA61/ke17ZwdGBToddI8pDm48kNgFyjlEyNHlSWEjE-QCU1p7gQa3H78H3Y0txjaiv_0fDoOvxcdMmMKkDsyUqMSsMWxHk725yiiHCCLfrh8O1z5QPOohDIaIeljMHgDF5CVlOqpeNLcJ80NK65_fV7S1UdLKTLgsLX9_T7LnpaostY9WYLb0IFNaX6bgMhY2dUNBWIB-7cQgYKo_bDpR6cEVkg/ulihu-blue-linen-tunic_0308-v1-FINAL-copy.jpg?format=750w', 50.00, 'Lounge Tunic / Blue', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.'),
('https://images.squarespace-cdn.com/content/v1/5d02d798cc25920001b61816/1560522174782-G9Z1KCIOM3D9FXP19G8W/ke17ZwdGBToddI8pDm48kNgFyjlEyNHlSWEjE-QCU1p7gQa3H78H3Y0txjaiv_0fDoOvxcdMmMKkDsyUqMSsMWxHk725yiiHCCLfrh8O1z5QPOohDIaIeljMHgDF5CVlOqpeNLcJ80NK65_fV7S1UdLKTLgsLX9_T7LnpaostY9WYLb0IFNaX6bgMhY2dUNBWIB-7cQgYKo_bDpR6cEVkg/lauren-winter-natural-dress_0172-v1-FINAL-copy.jpg?format=750w', 40.00, 'Lounge Tunic / Cream', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.'),
('https://images.squarespace-cdn.com/content/v1/5d02d798cc25920001b61816/1560521851099-Y8NGHHO3QX5EVA0JBN9T/ke17ZwdGBToddI8pDm48kNgFyjlEyNHlSWEjE-QCU1p7gQa3H78H3Y0txjaiv_0fDoOvxcdMmMKkDsyUqMSsMWxHk725yiiHCCLfrh8O1z5QPOohDIaIeljMHgDF5CVlOqpeNLcJ80NK65_fV7S1UdLKTLgsLX9_T7LnpaostY9WYLb0IFNaX6bgMhY2dUNBWIB-7cQgYKo_bDpR6cEVkg/lauren-winter-sonia-skirt-grey_0270-v1-FINAL-copy.jpg?format=750w', 50.00, 'Sonia Skirt', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.'),
('https://images.squarespace-cdn.com/content/v1/5d02d798cc25920001b61816/1560521363849-RX99J2RHCVOTM3N8HYGH/ke17ZwdGBToddI8pDm48kNgFyjlEyNHlSWEjE-QCU1p7gQa3H78H3Y0txjaiv_0fDoOvxcdMmMKkDsyUqMSsMWxHk725yiiHCCLfrh8O1z5QPOohDIaIeljMHgDF5CVlOqpeNLcJ80NK65_fV7S1UdLKTLgsLX9_T7LnpaostY9WYLb0IFNaX6bgMhY2dUNBWIB-7cQgYKo_bDpR6cEVkg/lauren-winter-wide-pant-natural_0178-v1-FINAL.jpg?format=750w', 50.00, 'Wide Pant', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.'),
('https://images.squarespace-cdn.com/content/v1/5d02d798cc25920001b61816/1561469212344-XBYPU0UICG521PTL351M/ke17ZwdGBToddI8pDm48kOM0wi0zWgY49OChaGdbQod7gQa3H78H3Y0txjaiv_0fDoOvxcdMmMKkDsyUqMSsMWxHk725yiiHCCLfrh8O1z5QPOohDIaIeljMHgDF5CVlOqpeNLcJ80NK65_fV7S1Udq808UFTE3RUCYZpscC1JaI0xjbDb9OOCsv-L8MD1ND_7k-9-XsFQ9lvpTgv0wwCA/ulihu-blue-linen-crop-top_0320-v1-FINAL-1-copy.jpg?format=750w', 50.00, 'Haori Jacket', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.'),
('https://images.squarespace-cdn.com/content/v1/5d02d798cc25920001b61816/1560521764586-0L1FNDRJKDTBBKDCJV8Z/ke17ZwdGBToddI8pDm48kNgFyjlEyNHlSWEjE-QCU1p7gQa3H78H3Y0txjaiv_0fDoOvxcdMmMKkDsyUqMSsMWxHk725yiiHCCLfrh8O1z5QPOohDIaIeljMHgDF5CVlOqpeNLcJ80NK65_fV7S1UdLKTLgsLX9_T7LnpaostY9WYLb0IFNaX6bgMhY2dUNBWIB-7cQgYKo_bDpR6cEVkg/ulihu-blue-linen-long-short_0346-v1-FINAL-copy.jpg?format=750w', 50.00, 'Wide Pant / Blue', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.');";

if (mysqli_query($conn, $insert_sql)) {
    echo "Products inserted successfully";
} else {
    echo "Failed insertion";
}

$select_sql = "SELECT id FROM Products";
$result = mysqli_query($conn, $select_sql);

for ($i = 0; $i < mysqli_num_rows($result); $i++) {
    $id = mysqli_fetch_assoc($result)["id"];

    $sql = "INSERT INTO Inventories(pid, size) VALUES
    (" . $id . ", 'S'),
    (" . $id . ", 'M'),
    (" . $id . ", 'L'),
    (" . $id . ", 'XL'),
    (" . $id . ", 'XXL');";

    if (mysqli_query($conn, $sql)) {
        echo "Inventory inserted successfully";
    } else {
        echo "Failed insertion";
    }
}

mysqli_close($conn);
