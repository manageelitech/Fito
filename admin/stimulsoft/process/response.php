<?php
include '../db_config/dbconfig.php';
if(isset($_POST['selId'])){

    $query= "SELECT * FROM `orders` WHERE `slno`='".$_POST['selId']."'";
    $found=mysqli_query($con,$query);
    $rowcount=mysqli_num_rows($found);
    $result=array();
    if($rowcount>0){
        while($row = mysqli_fetch_array($found)){
            $result= array(
                "orderNo"=>$row['orderNo'],
                "slno"=>$row['slno'],
                "userid"=>$row['userid'],
                "product_code"=>$row['product_code'],
                "quantity"=>$row['quantity'],
                "usertype"=>$row['usertype'],
                "date"=>$row['date'],
                "price"=>$row['price'],
                "status"=>$row['status'],
                "bdate"=>$row['bdate'],
                "seller"=>$row['seller'],
            );
        }
    }

    if(mysqli_error($con)){
        echo(mysqli_error($con));
    }
    else{
        $sample=array(
            'val1'=>'value1',
            'val2'=>'value2',
            'val3'=>'value3',
        );
        $output=array(
            'sample'=>$sample,
            'order'=>$result,
        );
        echo(json_encode($output));
    }
}