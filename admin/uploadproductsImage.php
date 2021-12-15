<?php
include_once('test/cors.php');
date_default_timezone_set('Asia/Kolkata');
include_once('connection.php');
$connobj = new connClass();
$conn=$connobj->conn;
$schExt=$connobj->schExt;
include("createThumbNailHS.php");
if(!empty($_FILES)) {
    if (isset($_POST['code']) && !empty($_POST['code'])) {
        $code = mysqli_real_escape_string($conn, $_POST['code']);
    }
    else{
        echo 0;
        return;
    }


    $random_digit = rand(0000, 9999);
    $targetDir = "backend/products/temp/";

    $fileName = $_FILES['file']['name'];

    $new_file_name = $random_digit . $fileName;

    $targetFile = $targetDir . $new_file_name;

    if (move_uploaded_file($_FILES['file']['tmp_name'], $targetFile)) {

        $timg = "backend/products/thumb/" . $new_file_name;
        createThumbs($targetFile, $timg, $_FILES["file"]["type"]);
        $timg = "backend/products/" . $new_file_name;
        createThumbproducts($targetFile, $timg, $_FILES["file"]["type"]);
        mysqli_query($conn, "update products set product_image='$new_file_name' where product_code='$code'");
        unlink($targetFile);

        echo "update products set product_image='$new_file_name' where product_code='$code'";
    }
}
?>