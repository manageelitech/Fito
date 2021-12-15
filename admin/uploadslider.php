<?php
include_once('test/cors.php');
date_default_timezone_set('Asia/Kolkata');
include_once('connection.php');
$connobj = new connClass();
$conn=$connobj->conn;
$schExt=$connobj->schExt;
include("createThumbNailHS.php");
if(!empty($_FILES)){
    if(isset($_POST['title']) && !empty($_POST['title']))
    {
        $title=mysqli_real_escape_string($conn,$_POST['title']);
    }
    $random_digit=rand(0000,9999);
    $targetDir = "backend/banner/temp/";

    $fileName = $_FILES['file']['name'];

    $new_file_name=$random_digit.$fileName;

    $targetFile = $targetDir.$new_file_name;

    if(move_uploaded_file($_FILES['file']['tmp_name'],$targetFile)){

        $timg="backend/banner/thumb/".$new_file_name;
        createThumbs($targetFile,$timg,$_FILES["file"]["type"]);
        $timg="backend/banner/".$new_file_name;
        createThumbsl($targetFile,$timg,$_FILES["file"]["type"]);
        mysqli_query($conn,"insert into slider (title,filename,date) values('$title','$new_file_name',NOW())");
        unlink($targetFile);
        echo "insert into slider (title,filename,date) values('$title','$new_file_name',NOW())";
    }

}

?>