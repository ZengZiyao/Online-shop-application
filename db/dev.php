<?php
// echo "cleanning";
// $sql = "DROP TABLE IF EXISTS Transactions";
// if (!mysqli_query($conn, $sql)) {
//     echo "Failed drop";
// }
// $sql = "DROP TABLE IF EXISTS Invoices";
// if (!mysqli_query($conn, $sql)) {
//     echo "Failed drop";
// }
// $sql = "DROP TABLE IF EXISTS ShopItem";
// if (!mysqli_query($conn, $sql)) {
//     echo "Failed drop";
// }
// $sql = "DROP TABLE IF EXISTS Images";
// if (!mysqli_query($conn, $sql)) {
//     echo "Failed drop";
// }
// $sql = "DROP TABLE IF EXISTS Inventories";
// if (!mysqli_query($conn, $sql)) {
//     echo "Failed drop";
// }
// $sql = "DROP TABLE IF EXISTS Products";
// if (!mysqli_query($conn, $sql)) {
//     echo "Failed drop";
// }
// $sql = "DROP TABLE IF EXISTS Users";
// if (!mysqli_query($conn, $sql)) {
//     echo "Failed drop";
// }
include "init_user.php";
include "init_message.php";
include "init_product.php";
include "init_inventory.php";
include "init_txn.php";
include "insert_product.php";
include "mock_user.php";
include "mock_txn.php";
