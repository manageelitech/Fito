<?php
include_once('test/cors.php');
date_default_timezone_set('Asia/Kolkata');
include("createThumbNailHS.php");
include_once('connection.php');
$connobj = new connClass();
$conn=$connobj->conn;
$schExt=$connobj->schExt;
if(!empty($_FILES)){


    if(isset($_POST['title']) && !empty($_POST['title']))

    {

        $title=mysqli_real_escape_string($conn,$_POST['title']);

    }else

    {

        return;

    }

    $random_digit=rand(0000,9999);

    $isc=0;
    $targetDir="";
    $allowedTypes = array(IMAGETYPE_PNG, IMAGETYPE_JPEG, IMAGETYPE_GIF);
    $detectedType = exif_imagetype($_FILES['file']['tmp_name']);
    if(in_array($detectedType, $allowedTypes))
    {
        $targetDir = "backend/downloads/tmp/";
        $isc=1;
    }
    else
    {
        $targetDir = "backend/downloads/";
        $isc=0;
    }
    $fileName = $_FILES['file']['name'];

    $new_file_name=$random_digit.$fileName;

    $targetFile = $targetDir.$new_file_name;
    $nfilename="backend/downloads/".$new_file_name;
    $date=date('Y-m-d H:i:s');

    if(move_uploaded_file($_FILES['file']['tmp_name'],$targetFile)){

        if($isc==1)
        {
            $timg="backend/downloads/thumb/".$new_file_name;
            createThumbnb($targetFile,$timg,$_FILES["file"]["type"]);
            $timg="backend/downloads/".$new_file_name;
            createThumbs($targetFile,$timg,$_FILES["file"]["type"]);
            unlink($targetFile);
        }
        mysqli_query($conn,"insert into downloads(name,filename,date) values('$title','$new_file_name',NOW())");

    }
echo "insert into downloads(name,filename,date) values('$title','$new_file_name',NOW())";
}

?>