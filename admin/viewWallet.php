<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type, Content-Range, Content-Disposition, Content-Description');
include_once('connection.php');
$connobj = new connClass();
$conn=$connobj->conn;
$schExt=$connobj->schExt;
$data='';
$uid = mysqli_real_escape_string($conn,$_POST['uid']);
//$uid = 'FITO2021';
$qry=mysqli_query($conn,"SELECT * from distributor_wallet where userid='$uid'");
if($res=mysqli_fetch_array($qry))
{
    $current = $res['wallet'];
    $total = $res['total'];
    $used = floatval($total)-floatval($current);
    $data.=  '<p><span>Total Earned :</span> <span>Rs '.$total.'</span></p>
                 <p><span>Total Used :</span> <span>Rs '.$used.'</span></p>
                    <p><span>Balance :</span> <span>Rs '.$current.'</span></p>
';
}
else{
    $data.=  '<p><span>Total Earned :</span> <span>Rs 0</span></p>
                    <p><span>Total Used :</span> <span>Rs 0</span></p>
                    <p><span>Balance :</span> <span>Rs 0</span></p>
';
}


echo json_encode(array("res"=> 1, "wallet" => $data));
?>