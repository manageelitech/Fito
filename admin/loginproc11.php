<?php
include_once('connection.php');
$connobj = new connClass();
$conn=$connobj->conn;
$schExt=$connobj->schExt;

if(isset($_POST['uname']) && !empty($_POST['uname'])) {
    $uname = mysqli_real_escape_string($conn, $_POST['uname']);
}
else
{
    echo 4;
    return;
}
if(isset($_POST['pass']) && !empty($_POST['pass'])) {
    $pass = mysqli_real_escape_string($conn, $_POST['pass']);
}
else
{
    echo 5;
    return;
}
$qry=mysqli_query($conn,"SELECT username,password,displayname,slno,usertype from userlogin WHERE username='$uname' and password='$pass'");
if($res=mysqli_fetch_array($qry))
{
    if($res['password']==$pass)
    {
        echo json_encode(array("tp" => "2", "LOGIN_STATUS" => true, "DISP_NAME" => $res['displayname'], "USERTYPE" => $res['usertype'], "LOGIN_NAME" => $res['displayname'],"UID"=>$res['username'],"inc"=>$connobj->encryptIt($res['username']),"incp"=>$connobj->encryptIt($res['password'])));
        return;
    }
    else
    {
        echo json_encode(array("tp"=> "1", "LOGIN_STATUS" => false, "DISP_NAME" => '', "LOGIN_NAME" => '', "UID" => '', "USERTYPE" => ''));
        return;
    }
}
else {
    echo json_encode(array("tp" => "3", "LOGIN_STATUS" => false, "DISP_NAME" => '', "LOGIN_NAME" => '', "UID" => ""));
    return;
}