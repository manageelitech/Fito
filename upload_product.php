<?php
session_start();
date_default_timezone_set('Asia/Kolkata');
include_once('admin/connection.php');
$connobj = new connClass();
$conn=$connobj->conn;
$schExt=$connobj->schExt;
//include("createThumbNailHS.php");
if(!empty($_FILES)){
    if(isset($_POST['product_name']) && !empty($_POST['product_name'])) {
        $product_name = $conn->real_escape_string($_POST['product_name']);
    }
    $hsn = $conn->real_escape_string($_POST['hsn']);
    $gst = $conn->real_escape_string($_POST['gst']);
    $features = $conn->real_escape_string($_POST['features']);
    $offer = $conn->real_escape_string($_POST['offer']);
    $mrp = $conn->real_escape_string($_POST['mrp']);
    $giving = $conn->real_escape_string($_POST['giving']);
    $retail = $conn->real_escape_string($_POST['retail']);
    $quantity = $conn->real_escape_string($_POST['quantity']);

    $seller_id =$_SESSION["user"];

    $random_digit=rand(0000,9999);

    $targetDir = "admin/backend/products/";

    $fileName = $_FILES['file']['name'];

    $new_file_name=$random_digit.$fileName;

    $targetFile = $targetDir.$new_file_name;

    $file_name = $_FILES["file"]["name"];
    $file_type = $_FILES["file"]["type"];
    $temp_name = $_FILES["file"]["tmp_name"];
    $file_size = $_FILES["file"]["size"];
    $error = $_FILES["file"]["error"];
    if (!$temp_name)
    {
        echo "ERROR: Please browse for file before uploading";
        exit();
    }
    function compress_image($source_url, $destination_url, $quality)
    {
        $info = getimagesize($source_url);
        if ($info['mime'] == 'image/jpeg') $image = imagecreatefromjpeg($source_url);
        elseif ($info['mime'] == 'image/gif') $image = imagecreatefromgif($source_url);
        elseif ($info['mime'] == 'image/png') $image = imagecreatefrompng($source_url);
        imagejpeg($image, $destination_url, $quality);
        echo "Image uploaded successfully.";
    }
    if ($error > 0)
    {
        echo $error;
    }
    else if (($file_type == "image/gif") || ($file_type == "image/jpeg") || ($file_type == "image/png") || ($file_type == "image/pjpeg"))
    {
        $filename = compress_image($temp_name, $targetFile, 40);

    }
    else
    {
        echo "Uploaded image should be jpg or gif or png.";
    }

        $qry = $conn->query("select * from products where hsncode='$hsn' and seller_id='$seller_id'");
        $row = $qry->num_rows;
        $result = $qry->fetch_assoc();
        $product_image = $result['product_image'];
        $updateImageList = $product_image.','.$new_file_name;
        if ($row > 0){
            $update = $conn->query("update products set product_image='$updateImageList' where hsncode='$hsn' and seller_id='$seller_id'");
            if ($update){
                echo 'data updated';
                return;
            }
            else{
                echo "data not updated";
            }
        }
        $insert = $conn->query("INSERT INTO `products`(`product_name`, `hsncode`, `mrp`, `gst`, `product_image`, `product_quantity`, `product_desc`, `offer`, `giving`, `retail`,`seller_id`,status) VALUES ('$product_name','$hsn','$mrp','$gst','$new_file_name','$quantity','$features','$offer','$giving','$retail','$seller_id','0')");
        if ($insert){
            echo 'data inserted';
            return;
        }
        else{
            echo "INSERT INTO `products`(`product_name`, `hsncode`, `mrp`, `gst`, `product_image`, `product_quantity`, `product_desc`, `offer`, `giving`, `retail`,`seller_id`,'status') VALUES ('$product_name','$hsn','$mrp','$gst','$new_file_name','$quantity','$features','$offer','$giving','$retail','$seller_id','0')";
        }
        unlink($targetFile);
}

?>