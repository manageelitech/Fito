<?php
date_default_timezone_set('Asia/Kolkata');
include_once('connection.php');
$connobj = new connClass();
$conn=$connobj->conn;
$schExt=$connobj->schExt;
include("createThumbNailHS.php");
if(!empty($_FILES)){

    $targetDir = "backend/products/temp/";

    $fileName = $_FILES['file']['name'];

    $new_file_name = $fileName;

    $targetFile = $targetDir.$new_file_name;

    if(move_uploaded_file($_FILES['file']['tmp_name'],$targetFile)){

        $timg="backend/products/".$new_file_name;
        createThumbs($targetFile,$timg,$_FILES["file"]["type"]);
        $timg="backend/products/".$new_file_name;
        createThumbsup($targetFile,$timg,$_FILES["file"]["type"]);

        unlink($targetFile);

    }

}

?>