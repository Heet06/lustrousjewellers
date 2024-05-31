<?php
try {
    $user = "if0_35586370";
    $password = "0p6n4BTuepZhTG";
    $server = "sql311.infinityfree.com";
    $db = "if0_35586370_lustrousjewellers";

    $con = mysqli_connect($server, $user, $password, $db);

    if (!$con) {
        echo "<script>alert('Connection Failed');</script>";
    }
} catch (\Throwable $th) {
    $user = "root";
    $password = "";
    $server = "localhost";
    $db = "lustrousjewellers";

    $con = mysqli_connect($server, $user, $password, $db);

    if (!$con) {
        echo "<script>alert('Connection Failed');</script>";
    }
}
