<?php
session_name("Authentication");
session_start();
include 'connection.php';

if (isset($_POST['selectedProducts'])) {
    $selectedProducts = $_POST['selectedProducts'];

    // Remove existing products from homescreen table
    $deleteQuery = "DELETE FROM homescreen";
    mysqli_query($con, $deleteQuery);

    // Insert new selected products into homescreen table
    foreach ($selectedProducts as $product) {
        $insertQuery = "INSERT INTO homescreen SELECT * FROM ornaments WHERE token = '$product' UNION ALL SELECT * FROM diamonds WHERE token = '$product'";
        mysqli_query($con, $insertQuery);
    }

    echo "Products updated successfully";
} else {
    echo "Invalid request";
}