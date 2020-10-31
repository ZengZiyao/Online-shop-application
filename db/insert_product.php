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

$insert_sql = "INSERT INTO Products(price, name, description, primary_image, second_image) VALUES 
(50.00, 'Lounge Tunic / Black', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'https://images.squarespace-cdn.com/content/v1/5d02d798cc25920001b61816/1562770837698-FMNKJ1A4GRW0EYTHCPDD/ke17ZwdGBToddI8pDm48kNgFyjlEyNHlSWEjE-QCU1p7gQa3H78H3Y0txjaiv_0fDoOvxcdMmMKkDsyUqMSsMWxHk725yiiHCCLfrh8O1z5QPOohDIaIeljMHgDF5CVlOqpeNLcJ80NK65_fV7S1UdLKTLgsLX9_T7LnpaostY9WYLb0IFNaX6bgMhY2dUNBWIB-7cQgYKo_bDpR6cEVkg/ulihu-charcoal-silk-linen-tunic_0326-v1-FINAL-copy.jpg?format=750w', 'https://images.squarespace-cdn.com/content/v1/5d02d798cc25920001b61816/1585924962177-GO2SN5WOIMC9RQTF8H7F/ke17ZwdGBToddI8pDm48kJUlZr2Ql5GtSKWrQpjur5t7gQa3H78H3Y0txjaiv_0fDoOvxcdMmMKkDsyUqMSsMWxHk725yiiHCCLfrh8O1z5QPOohDIaIeljMHgDF5CVlOqpeNLcJ80NK65_fV7S1UfNdxJhjhuaNor070w_QAc94zjGLGXCa1tSmDVMXf8RUVhMJRmnnhuU1v2M8fLFyJw/ulihu-charcoal-silk-linen-tunic_DETAIL.jpg?format=2500w'),
(50.00, 'Lounge Tunic / Blue', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'https://images.squarespace-cdn.com/content/v1/5d02d798cc25920001b61816/1562797313348-RV3I7WY2DOYUQ3ZLZA61/ke17ZwdGBToddI8pDm48kNgFyjlEyNHlSWEjE-QCU1p7gQa3H78H3Y0txjaiv_0fDoOvxcdMmMKkDsyUqMSsMWxHk725yiiHCCLfrh8O1z5QPOohDIaIeljMHgDF5CVlOqpeNLcJ80NK65_fV7S1UdLKTLgsLX9_T7LnpaostY9WYLb0IFNaX6bgMhY2dUNBWIB-7cQgYKo_bDpR6cEVkg/ulihu-blue-linen-tunic_0308-v1-FINAL-copy.jpg?format=750w', 'https://images.squarespace-cdn.com/content/v1/5d02d798cc25920001b61816/1585929753415-TG7NL6K8E6STNTC27UM8/ke17ZwdGBToddI8pDm48kJUlZr2Ql5GtSKWrQpjur5t7gQa3H78H3Y0txjaiv_0fDoOvxcdMmMKkDsyUqMSsMWxHk725yiiHCCLfrh8O1z5QPOohDIaIeljMHgDF5CVlOqpeNLcJ80NK65_fV7S1UfNdxJhjhuaNor070w_QAc94zjGLGXCa1tSmDVMXf8RUVhMJRmnnhuU1v2M8fLFyJw/ulihu-blue-linen-tunic_DETAIL.jpg?format=1500w'),
(40.00, 'Lounge Tunic / Cream', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'https://images.squarespace-cdn.com/content/v1/5d02d798cc25920001b61816/1560522174782-G9Z1KCIOM3D9FXP19G8W/ke17ZwdGBToddI8pDm48kNgFyjlEyNHlSWEjE-QCU1p7gQa3H78H3Y0txjaiv_0fDoOvxcdMmMKkDsyUqMSsMWxHk725yiiHCCLfrh8O1z5QPOohDIaIeljMHgDF5CVlOqpeNLcJ80NK65_fV7S1UdLKTLgsLX9_T7LnpaostY9WYLb0IFNaX6bgMhY2dUNBWIB-7cQgYKo_bDpR6cEVkg/lauren-winter-natural-dress_0172-v1-FINAL-copy.jpg?format=750w', 'https://images.squarespace-cdn.com/content/v1/5d02d798cc25920001b61816/1585931027621-NFYY80YTYYTJ132RCYWR/ke17ZwdGBToddI8pDm48kJUlZr2Ql5GtSKWrQpjur5t7gQa3H78H3Y0txjaiv_0fDoOvxcdMmMKkDsyUqMSsMWxHk725yiiHCCLfrh8O1z5QPOohDIaIeljMHgDF5CVlOqpeNLcJ80NK65_fV7S1UfNdxJhjhuaNor070w_QAc94zjGLGXCa1tSmDVMXf8RUVhMJRmnnhuU1v2M8fLFyJw/lauren-winter-natural-dress_DETAIL.jpg?format=2500w'),
(50.00, 'Sonia Skirt', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'https://images.squarespace-cdn.com/content/v1/5d02d798cc25920001b61816/1560521851099-Y8NGHHO3QX5EVA0JBN9T/ke17ZwdGBToddI8pDm48kNgFyjlEyNHlSWEjE-QCU1p7gQa3H78H3Y0txjaiv_0fDoOvxcdMmMKkDsyUqMSsMWxHk725yiiHCCLfrh8O1z5QPOohDIaIeljMHgDF5CVlOqpeNLcJ80NK65_fV7S1UdLKTLgsLX9_T7LnpaostY9WYLb0IFNaX6bgMhY2dUNBWIB-7cQgYKo_bDpR6cEVkg/lauren-winter-sonia-skirt-grey_0270-v1-FINAL-copy.jpg?format=750w', 'https://images.squarespace-cdn.com/content/v1/5d02d798cc25920001b61816/1585931055799-SVY3S244GM2EE0U2KMDT/ke17ZwdGBToddI8pDm48kJUlZr2Ql5GtSKWrQpjur5t7gQa3H78H3Y0txjaiv_0fDoOvxcdMmMKkDsyUqMSsMWxHk725yiiHCCLfrh8O1z5QPOohDIaIeljMHgDF5CVlOqpeNLcJ80NK65_fV7S1UfNdxJhjhuaNor070w_QAc94zjGLGXCa1tSmDVMXf8RUVhMJRmnnhuU1v2M8fLFyJw/lauren-winter-sonia-skirt-grey_DETAIL.jpg?format=1500w'),
(50.00, 'Wide Pant', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'https://images.squarespace-cdn.com/content/v1/5d02d798cc25920001b61816/1560521363849-RX99J2RHCVOTM3N8HYGH/ke17ZwdGBToddI8pDm48kNgFyjlEyNHlSWEjE-QCU1p7gQa3H78H3Y0txjaiv_0fDoOvxcdMmMKkDsyUqMSsMWxHk725yiiHCCLfrh8O1z5QPOohDIaIeljMHgDF5CVlOqpeNLcJ80NK65_fV7S1UdLKTLgsLX9_T7LnpaostY9WYLb0IFNaX6bgMhY2dUNBWIB-7cQgYKo_bDpR6cEVkg/lauren-winter-wide-pant-natural_0178-v1-FINAL.jpg?format=750w', 'https://images.squarespace-cdn.com/content/v1/5d02d798cc25920001b61816/1585931090202-054CHYREFR7VY2FW2GY0/ke17ZwdGBToddI8pDm48kJUlZr2Ql5GtSKWrQpjur5t7gQa3H78H3Y0txjaiv_0fDoOvxcdMmMKkDsyUqMSsMWxHk725yiiHCCLfrh8O1z5QPOohDIaIeljMHgDF5CVlOqpeNLcJ80NK65_fV7S1UfNdxJhjhuaNor070w_QAc94zjGLGXCa1tSmDVMXf8RUVhMJRmnnhuU1v2M8fLFyJw/lauren-winter-wide-pant-natural_DETAIL.jpg?format=1500w'),
(50.00, 'Haori Jacket', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'https://images.squarespace-cdn.com/content/v1/5d02d798cc25920001b61816/1561469212344-XBYPU0UICG521PTL351M/ke17ZwdGBToddI8pDm48kOM0wi0zWgY49OChaGdbQod7gQa3H78H3Y0txjaiv_0fDoOvxcdMmMKkDsyUqMSsMWxHk725yiiHCCLfrh8O1z5QPOohDIaIeljMHgDF5CVlOqpeNLcJ80NK65_fV7S1Udq808UFTE3RUCYZpscC1JaI0xjbDb9OOCsv-L8MD1ND_7k-9-XsFQ9lvpTgv0wwCA/ulihu-blue-linen-crop-top_0320-v1-FINAL-1-copy.jpg?format=750w', 'https://images.squarespace-cdn.com/content/v1/5d02d798cc25920001b61816/1585931206829-IMVEZOOF8T5VRGT28AQW/ke17ZwdGBToddI8pDm48kJUlZr2Ql5GtSKWrQpjur5t7gQa3H78H3Y0txjaiv_0fDoOvxcdMmMKkDsyUqMSsMWxHk725yiiHCCLfrh8O1z5QPOohDIaIeljMHgDF5CVlOqpeNLcJ80NK65_fV7S1UfNdxJhjhuaNor070w_QAc94zjGLGXCa1tSmDVMXf8RUVhMJRmnnhuU1v2M8fLFyJw/lauren-winter-haori-jacket_DETAIL.jpg?format=2500w'),
(50.00, 'Wide Pant / Blue', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'https://images.squarespace-cdn.com/content/v1/5d02d798cc25920001b61816/1560521764586-0L1FNDRJKDTBBKDCJV8Z/ke17ZwdGBToddI8pDm48kNgFyjlEyNHlSWEjE-QCU1p7gQa3H78H3Y0txjaiv_0fDoOvxcdMmMKkDsyUqMSsMWxHk725yiiHCCLfrh8O1z5QPOohDIaIeljMHgDF5CVlOqpeNLcJ80NK65_fV7S1UdLKTLgsLX9_T7LnpaostY9WYLb0IFNaX6bgMhY2dUNBWIB-7cQgYKo_bDpR6cEVkg/ulihu-blue-linen-long-short_0346-v1-FINAL-copy.jpg?format=750w', 'https://images.squarespace-cdn.com/content/v1/5d02d798cc25920001b61816/1585931109239-Y70NLN4YZRZDIXAQCG4T/ke17ZwdGBToddI8pDm48kJUlZr2Ql5GtSKWrQpjur5t7gQa3H78H3Y0txjaiv_0fDoOvxcdMmMKkDsyUqMSsMWxHk725yiiHCCLfrh8O1z5QPOohDIaIeljMHgDF5CVlOqpeNLcJ80NK65_fV7S1UfNdxJhjhuaNor070w_QAc94zjGLGXCa1tSmDVMXf8RUVhMJRmnnhuU1v2M8fLFyJw/ulihu-blue-linen-long-short_DETAIL.jpg?format=1500w');";

if (mysqli_query($conn, $insert_sql)) {
    echo "Products inserted successfully<br>";
} else {
    echo "Failed insertion<br>";
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
        echo "Inventory inserted successfully<br>";
    } else {
        echo "Failed insertion<br>";
    }
}

mysqli_close($conn);
