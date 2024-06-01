<?php
// Include your database connection file or set up the connection here
include 'connection.php';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $productName = $_POST["productName"];
    $description = $_POST["description"];
    $productType = $_POST["productType"];

    // Process uploaded files
    $uploadDirectory = "uploads/"; // Change this to your actual upload directory

    $fileNames = [];
    foreach ($_FILES["files"]["tmp_name"] as $key => $tmp_name) {
        $fileName = $_FILES["files"]["name"][$key];
        $targetFilePath = $uploadDirectory . $fileName;
        move_uploaded_file($tmp_name, "../uploads/");
        $fileNames[] = $targetFilePath;
    }

    // Insert data into the respective table based on product type
    if ($productType == "ornament") {
        $tableName = "ornaments";
    } elseif ($productType == "diamond") {
        $tableName = "diamonds";
    } else {
        // Handle other product types if needed
        die("Invalid product type");
    }

    function random_string($length)
    {
        $key = '';
        $keys = array_merge(range(0, 9), range('a', 'z'));

        for ($i = 0; $i < $length; $i++) {
            $key .= $keys[array_rand($keys)];
        }

        return $key;
    }


    $imagePaths = implode(",", $fileNames);
    $token = random_string(50);
    // Insert data into the database
    $sql = "INSERT INTO $tableName (`token`, `name`, `description`, images) VALUES ('$token', '$productName', '$description', '$imagePaths')";
    $result = mysqli_query($con, $sql);

    if ($result) {
        echo "Data successfully uploaded.";
    } else {
        echo "Error Uploading Product: " . mysqli_error($con);
    }

    // Close the database connection
    mysqli_close($con);
}