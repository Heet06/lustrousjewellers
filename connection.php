<?php
$user = "root";
$password = "";
$server = "localhost";
$db = "lustrousjewellers";

$con = mysqli_connect($server, $user, $password, $db);

if (!$con) {
    echo "<script>alert('Connection Failed');</script>";
}