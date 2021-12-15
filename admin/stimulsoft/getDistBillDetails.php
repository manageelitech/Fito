<?php

include_once('../connection.php');
$connobj = new connClass();
$conn=$connobj->conn;
$schExt=$connobj->schExt;

$orderNo = mysqli_real_escape_string($conn,$_POST['selId']);
// $orderNo = 'FITO000045';

$order_data = array();
$orderQry = mysqli_query($conn,"select * from orders where orderNo='$orderNo'");
while ($order_res = mysqli_fetch_assoc($orderQry)){
    $bdate = strtotime($order_res['bdate']);
    $order_data[] = array(
        "orderNo"=>$order_res['orderNo'],
        "slno"=>$order_res['slno'],
        "userid"=>$order_res['userid'],
        "product_code"=>$order_res['product_code'],
        "quantity"=>$order_res['quantity'],
        "usertype"=>$order_res['usertype'],
        "date"=>$order_res['date'],
        "price"=>$order_res['price'],
        "status"=>$order_res['status'],
        "bdate"=>date('d-M-Y', $bdate),
        "seller"=>$order_res['seller'],
    );
   $dist_id = $order_res["userid"];
}

// echo $dist_id;return;
$dist_data = array();
$distQry = mysqli_query($conn,"select * from distributor_info where id='$dist_id'");
if ($dist_res = mysqli_fetch_assoc($distQry)){
    $dist_data = array(
        "id"=>$dist_res['id'],
        "dist_name"=>$dist_res['dist_name'],
        "dist_mobile"=>$dist_res['dist_mobile'],
        "dist_aadhar"=>$dist_res['dist_aadhar'],
        "dist_pan"=>$dist_res['dist_pan'],
        "dist_address"=>$dist_res['dist_address'],
        "dist_email"=>$dist_res['dist_email'],
    );
}
$product_det = array();
$first_total_arr = array();
$total_gs_arr = array();
$slno = 0;
$basic_rate_total = '';$total_qty = '';$total_dp = '';$sTotal_bv = '';$total_bv = '';$total_amt = '';$total_mrp = '';
$basic_rate_total_0 = '';$basic_rate_total_5 = '';$basic_rate_total_12 = '';$basic_rate_total_18 = '';$basic_rate_total_28 = '';
$total_cgst_amt_0 = '';$total_cgst_amt_5 = '';$total_cgst_amt_12 = '';$total_cgst_amt_18 = '';$total_cgst_amt_28 = '';
$total_sgst_amt_0 = '';$total_sgst_amt_5 = '';$total_sgst_amt_12 = '';$total_sgst_amt_18 = '';$total_sgst_amt_28 = '';
$total_igst_amt_0 = '';$total_igst_amt_5 = '';$total_igst_amt_12 = '';$total_igst_amt_18 = '';$total_igst_amt_28 = '';
$orderQry = mysqli_query($conn,"select * from orders where orderNo='$orderNo'");
while ($order_res = mysqli_fetch_assoc($orderQry)){
    $product_id = $order_res['product_code'];
    $qty = $order_res['quantity'];
//    echo $product_id.'<br>';
   $slno++;
    $productQry = mysqli_query($conn,"select * from products where slno='$product_id'");
    while ($product_res = mysqli_fetch_assoc($productQry)){
        //gst calculation
        $gst = $product_res['gst'];
        $cgst = floatval($gst)/2;
        $sgst = floatval($gst)/2;
        //price and bv's calculations
        $dp = $product_res['dp'];
        $mrp = $product_res['mrp'];
        $total_dp = floatval($total_dp)+floatval($dp);
        $subTotal_amt = $dp*$qty;
        $subTotal_mrp = $mrp*$qty;
        $total_amt = floatval($total_amt)+floatval($subTotal_amt);
        $total_mrp = floatval($total_mrp)+floatval($subTotal_mrp);
        $bv = $product_res['bv'];
        $subTotal_bv = $bv*$qty;
        $sTotal_bv = floatval($sTotal_bv)+floatval($bv);
        $total_bv = floatval($total_bv)+floatval($subTotal_bv);
        //basic rate calculation
        $basic_rate1 = floatval($dp)*100/(floatval((100+$gst)));
        $basic_rate = number_format((float)$basic_rate1, 2, '.', '');
        $sbasic_rate = number_format((float)($basic_rate*$qty), 2, '.', '');
        $basic_rate_total1 = floatval($basic_rate_total)+floatval($basic_rate);
        $basic_rate_total = number_format((float)$basic_rate_total1, 2, '.', '');
        //gst amount calculation
        $cgst_amt = number_format((float)floatval(floatval($basic_rate)*floatval($cgst)/100), 2, '.', '');
        $sgst_amt = number_format((float)floatval(floatval($basic_rate)*floatval($cgst)/100), 2, '.', '');

        //Total GST amount calculation
        if ($gst == 5){
            $basic_rate_total_5 = number_format(floatval($basic_rate_total_5)+floatval($basic_rate)*$qty, 2, '.', '');
            $total_cgst_amt_5 = number_format(floatval($total_cgst_amt_5)+floatval($cgst_amt)*$qty, 2, '.', '');
            $total_sgst_amt_5 = number_format(floatval($total_sgst_amt_5)+floatval($sgst_amt)*$qty, 2, '.', '');
        }
        else if ($gst == 12){
            $basic_rate_total_12 = number_format(floatval($basic_rate_total_12)+floatval($basic_rate)*$qty, 2, '.', '');
            $total_cgst_amt_12 = number_format(floatval($total_cgst_amt_12)+floatval($cgst_amt)*$qty, 2, '.', '');
            $total_sgst_amt_12 = number_format(floatval($total_sgst_amt_12)+floatval($sgst_amt)*$qty, 2, '.', '');
            $total_igst_amt_12 = floatval($total_igst_amt_12)+floatval(0)*$qty;
        }
        else if ($gst == 18){
            $basic_rate_total_18 = number_format(floatval($basic_rate_total_18)+floatval($basic_rate)*$qty, 2, '.', '');
            $total_cgst_amt_18 = number_format(floatval($total_cgst_amt_18)+floatval($cgst_amt)*$qty, 2, '.', '');
            $total_sgst_amt_18 = number_format(floatval($total_sgst_amt_18)+floatval($sgst_amt)*$qty, 2, '.', '');
            $total_igst_amt_18 = number_format(floatval($total_igst_amt_18)+floatval(0)*$qty);
        }
        else if ($gst == 28){
            $basic_rate_total_28 = number_format(floatval($basic_rate_total_28)+floatval($basic_rate)*$qty, 2, '.', '');
            $total_cgst_amt_28 = number_format(floatval($total_cgst_amt_28)+floatval($cgst_amt)*$qty, 2, '.', '');
            $total_sgst_amt_28 = number_format(floatval($total_sgst_amt_28)+floatval($sgst_amt)*$qty, 2, '.', '');
            $total_igst_amt_28 = number_format(floatval($total_igst_amt_28)+floatval(0)*$qty);
        }
        else if ($gst == 0){
            $basic_rate_total_0 = floatval($basic_rate_total_0)+floatval($basic_rate)*$qty;
            $total_cgst_amt_0 = floatval($total_cgst_amt_0)+floatval($cgst_amt)*$qty;
            $total_sgst_amt_0 = floatval($total_sgst_amt_0)+floatval($sgst_amt)*$qty;
            $total_igst_amt_0 = floatval($total_igst_amt_0)+floatval(0)*$qty;
        }

        $product_det[] = array(
            "slno"=>$slno,
            "product_code"=>$product_res['product_code'],
            "product_name"=>$product_res['product_name'],
            "hsncode"=>$product_res['hsncode'],
            "dp"=>$product_res['dp'],
            "gst"=>$product_res['gst'],
            "basic_rate"=>$sbasic_rate,
            "cgst"=>$cgst,
            "cgst_amt"=>$cgst_amt,
            "sgst"=>$sgst,
            "sgst_amt"=>$sgst_amt,
            "qty"=>$qty,
            "mrp"=>$mrp,
            "adcp"=>$dp,
            "bv"=>$bv,
            "subtotal_amt" => $subTotal_amt,
            "subtotal_bv"=>$subTotal_bv,
            "subtotal_mrp"=>$subTotal_mrp,
        );
    }
    $first_total_arr = array(
        "total_basic"=>$basic_rate_total,
        "total_qty"=>$total_qty,
        "total_mrp"=>$total_mrp,
        "total_adcp"=>$total_amt,
        "total_sbv"=>$sTotal_bv,
        "total_bv"=>$total_bv,
        "total_mrp"=>$total_mrp,
        "discount"=>floatval($total_mrp - $total_amt),
    );
    $total_gs_arr = array(
        'basic_rate_0'=>$basic_rate_total_0,
        'basic_sgst_0'=>$total_sgst_amt_0,
        'basic_cgst_0'=>$total_cgst_amt_0,
        'basic_igst_0'=>$total_igst_amt_0,
        'basic_rate_5'=>$basic_rate_total_5,
        'basic_sgst_5'=>$total_sgst_amt_5,
        'basic_cgst_5'=>$total_cgst_amt_5,
        'basic_igst_5'=>$total_igst_amt_5,
        'basic_rate_12'=>$basic_rate_total_12,
        'basic_sgst_12'=>$total_sgst_amt_12,
        'basic_cgst_12'=>$total_cgst_amt_12,
        'basic_igst_12'=>$total_igst_amt_12,
        'basic_rate_18'=>$basic_rate_total_18,
        'basic_sgst_18'=>$total_sgst_amt_18,
        'basic_cgst_18'=>$total_cgst_amt_18,
        'basic_igst_18'=>$total_igst_amt_18,
        'basic_rate_28'=>$basic_rate_total_28,
        'basic_sgst_28'=>$total_sgst_amt_28,
        'basic_cgst_28'=>$total_cgst_amt_28,
        'basic_igst_28'=>$total_igst_amt_28,
    );
}
$output=array(
    'dist'=>$dist_data,
    'order'=>$order_data,
    'product'=>$product_det,
    'total1'=>$first_total_arr,
    'total_gs_arr'=>$total_gs_arr,
);
echo(json_encode($output));
// echo '<pre>';
// var_dump($output);
// echo '</pre>';

?>