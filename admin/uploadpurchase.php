<?php
include_once('test/cors.php');
date_default_timezone_set('Asia/Kolkata');
include_once('connection.php');
$connobj = new connClass();
$conn=$connobj->conn;
$schExt=$connobj->schExt;
include("createThumbNailHS.php");
if(!empty($_FILES)){
    if(isset($_POST['invno']) && !empty($_POST['invno']))
    {
        $invno=mysqli_real_escape_string($conn,$_POST['invno']);
    }
    if(isset($_POST['date']) && !empty($_POST['date']))
    {
        $date=mysqli_real_escape_string($conn,$_POST['date']);
    }
    $random_digit=rand(0000,9999);
    $targetDir = "backend/purchase/temp/";

    $fileName = $_FILES['file']['name'];

    $new_file_name=$random_digit.$fileName;

    $targetFile = $targetDir.$new_file_name;

    if(move_uploaded_file($_FILES['file']['tmp_name'],$targetFile)){

        $timg="backend/purchase/thumb/".$new_file_name;
        createThumbs($targetFile,$timg,$_FILES["file"]["type"]);
        $timg="backend/purchase/".$new_file_name;
        createThumbsup($targetFile,$timg,$_FILES["file"]["type"]);
        mysqli_query($conn,"INSERT INTO `purchaseinvoice`(`invno`, `date`, `file`) VALUES ('$invno','$date','$new_file_name')");
        unlink($targetFile);
        echo "INSERT INTO `purchaseinvoice`(`invno`, `date`, `file`) VALUES ('$invno','$date','$new_file_name')";

    }

}

?>