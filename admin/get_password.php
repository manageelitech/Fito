<?php
include_once('connection.php');
include_once("sendsms-get.php");
$connobj = new connClass();
$conn=$connobj->conn;
$schExt=$connobj->schExt;

if(isset($_POST['mobile_no']) && !empty($_POST['mobile_no'])) {
    $mobile_no = mysqli_real_escape_string($conn, $_POST['mobile_no']);
}
else
{
    echo 4;
    return;
}

$qry=mysqli_query($conn,"SELECT * from userlogin WHERE username=(select id from distributor_info where dist_mobile='$mobile_no')");
if($res=mysqli_fetch_array($qry)){
    $password = $res['password'];
    $username = $res['username'];
    sendsms($mobile_no, "Your  User ID : ".$username." and Password : ".$password);
    echo json_encode(array("res" => "1", "password" => $password, "username" => $username));
}
else{
    echo json_encode(array("res" => "2", "mobile" => $mobile_no));
}
?>