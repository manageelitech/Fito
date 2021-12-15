<?php
include '../db_config/dbconfig.php';

$query= "SELECT * FROM `orders` LIMIT 1,10";
$found=mysqli_query($con,$query);
$rowcount=mysqli_num_rows($found);
$result=array();
if($rowcount>0){
    while($row = mysqli_fetch_array($found)){
        $result[]= [
            "orderNo"=>$row['orderNo'],
            "slno"=>$row['slno'],
        ];
    }
}

if(mysqli_error($con)){
    echo(mysqli_error($con));
}
else{
    echo(json_encode($result));
}
