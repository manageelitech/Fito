<?php
include_once('test/cors.php');
date_default_timezone_set('Asia/Kolkata');
include_once('connection.php');
$connobj = new connClass();
$conn=$connobj->conn;
$schExt=$connobj->schExt;
include("createThumbNailHS.php");
if(!empty($_FILES)){
    if(isset($_POST['pagename']) && !empty($_POST['pagename']))
    {
        $pagename=mysqli_real_escape_string($conn,$_POST['pagename']);
    }
    $random_digit=rand(0000,9999);
    $targetDir = "backend/pages/temp/";

    $fileName = $_FILES['file']['name'];

    $new_file_name=$random_digit.$fileName;

    $targetFile = $targetDir.$new_file_name;

    if(move_uploaded_file($_FILES['file']['tmp_name'],$targetFile)){

        $timg="backend/pages/thumb/".$new_file_name;
        createThumbs($targetFile,$timg,$_FILES["file"]["type"]);
        $timg="backend/pages/".$new_file_name;
        createThumbsup($targetFile,$timg,$_FILES["file"]["type"]);
        mysqli_query($conn,"insert into pageimg (title,filename,date,pagename) values('','$new_file_name',NOW(),'$pagename')");
        unlink($targetFile);

    }
echo "insert into pageimg (title,filename,date,pagename) values('','$new_file_name',NOW(),'$pagename')";
}

?>