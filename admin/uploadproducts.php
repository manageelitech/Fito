<?php
include_once('test/cors.php');
date_default_timezone_set('Asia/Kolkata');
include_once('connection.php');
$connobj = new connClass();
$conn=$connobj->conn;
$schExt=$connobj->schExt;
include("createThumbNailHS.php");
if(!empty($_FILES)) {
    if (isset($_POST['category']) && !empty($_POST['category'])) {
        $category = mysqli_real_escape_string($conn, $_POST['category']);
    }
    if (isset($_POST['subcategory']) && !empty($_POST['subcategory'])) {
        $subcategory = mysqli_real_escape_string($conn, $_POST['subcategory']);
    }
    if (isset($_POST['code']) && !empty($_POST['code'])) {
        $code = mysqli_real_escape_string($conn, $_POST['code']);
    }
    if (isset($_POST['name']) && !empty($_POST['name'])) {
        $name = mysqli_real_escape_string($conn, $_POST['name']);
    }
    if (isset($_POST['desc']) && !empty($_POST['desc'])) {
        $desc = mysqli_real_escape_string($conn, $_POST['desc']);
    }
    if (isset($_POST['hsncode']) && !empty($_POST['hsncode'])) {
        $hsncode = mysqli_real_escape_string($conn, $_POST['hsncode']);
    }
    if (isset($_POST['mrp']) && !empty($_POST['mrp'])) {
        $mrp = mysqli_real_escape_string($conn, $_POST['mrp']);
    }
    if (isset($_POST['dp']) && !empty($_POST['dp'])) {
        $dp = mysqli_real_escape_string($conn, $_POST['dp']);
    }
    if (isset($_POST['bv']) && !empty($_POST['bv'])) {
        $bv = mysqli_real_escape_string($conn, $_POST['bv']);
    }
    if (isset($_POST['bsper']) && !empty($_POST['bsper'])) {
        $bsper = mysqli_real_escape_string($conn, $_POST['bsper']);
    }
    if (isset($_POST['hsper']) && !empty($_POST['hsper'])) {
        $hsper = mysqli_real_escape_string($conn, $_POST['hsper']);
    }
    if (isset($_POST['gst']) && !empty($_POST['gst'])) {
        $gst = mysqli_real_escape_string($conn, $_POST['gst']);
    }
    if (isset($_POST['qty']) && !empty($_POST['qty'])) {
        $qty = mysqli_real_escape_string($conn, $_POST['qty']);
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
        mysqli_query($conn, "insert into products (`product_code`, `product_name`,`category`, `product_desc`, `hsncode`, `mrp`, `dp`, `bv`, `bsper`, `hsper`, `gst`, `addeddate`, `updateddate`, `product_image`, `product_quantity`,sub_category) values('$code','$name','$category','$desc','$hsncode','$mrp','$dp','$bv','$bsper','$hsper','$gst',NOW(),'','$new_file_name','$qty','$subcategory')");
        unlink($targetFile);

        echo 1;
    }
}
?>