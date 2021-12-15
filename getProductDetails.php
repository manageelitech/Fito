<?php
include_once('admin/connection.php');
$connobj = new connClass();
$conn=$connobj->conn;
$schExt=$connobj->schExt;

if(isset($_POST['id']) && !empty($_POST['id']))
    {
        $id = mysqli_real_escape_string($conn,$_POST['id']);
    }
// echo $id;
$pdesc = '';
$qry = mysqli_query($conn,"select * from products where slno='$id'");
if($qry_res = mysqli_fetch_assoc($qry)){
    $product_name = $qry_res['product_name'];
    $product_desc = $qry_res['product_desc'];
    $mrp = $qry_res['mrp'];
    $dp = $qry_res['dp'];
    $bv = $qry_res['bv'];
    $product_image = $qry_res['product_image'];

    $pdesc = '<div class="row">
                    <button type="button" class="close" onclick="closeModal()" data-dismiss="modal"
                        style="color: black;margin-right: 10px;">×</button>
                    <div class="col-md-5">
                        <img src="admin/backend/products/'.$product_image.'" style="width: 100%;height: 250px;">
                    </div>
                    <div class="col-md-7">
                        <p style="color:black;font-size: 20px;font-weight: bold;letter-spacing: 1px;"> '.$product_name.' </p>
                        <p style="color:black;">'.$product_desc.'</p>
                        <p style="color: black;font-weight: bold;word-spacing: 3px;font-size: 15px;">MRP : '.$mrp.'Rs | ADCP :
                            '.$dp.'Rs | BV : '.$bv.'p</p>
                    </div>
                </div>
';
}
echo $pdesc;
?>