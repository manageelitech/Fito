<?php
date_default_timezone_set('Asia/Kolkata');
include_once('connection.php');
$connobj = new connClass();
$conn=$connobj->conn;
$schExt=$connobj->schExt;
if(isset($_POST['fid']) && !empty($_POST['fid']))
{
    $fid=mysqli_real_escape_string($conn,$_POST['fid']);
}
else
{
    return;
}
if(isset($_POST['incv']) && !empty($_POST['incv']))
{
    $inc=mysqli_real_escape_string($conn,$_POST['incv']);
    $inc=$_POST['incv'];
    $inc=$connobj->decryptIt($inc);

    $resq=mysqli_query($conn,"select count(*) from ".$schExt."userlogin where username='$inc'");
    $resy=mysqli_fetch_array($resq);
    if($resy[0]==0)
    {
        echo "select count(*) from ".$schExt."userlogin where username='$inc'";
        return;
    }
}
else
{
    echo 'incv missing';
    return;
}
switch ($fid)
{

    case 1://UpdateProfile
    {
        if(isset($_POST['incp']) && !empty($_POST['incp']))
        {
            $incp=mysqli_real_escape_string($conn,$_POST['incp']);
            $incp=$_POST['incp'];
            $incp=$connobj->decryptIt($incp);
        }
        else
        {
            echo 'No Password';
            return;
        }
        $resq=mysqli_query($conn,"select count(*) from ".$schExt."userlogin where username='$inc' and password='$incp'");
        $resy=mysqli_fetch_array($resq);
        if($resy[0]>0)
        {
            echo 'custom/dist/js/mainjs.js';
            return;
        }else
        {
            echo 'No Url';
            return;
        }

        break;
    }
}

?>
