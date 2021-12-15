<?php
include_once('connection.php');
$connobj = new connClass();
$conn = $connobj->conn;
$schExt = $connobj->schExt;
$orderNo = $_GET['order'];

$distqry = mysqli_query($conn,"SELECT * FROM orders WHERE orderNo='$orderNo' limit 1;");
if ($distqry_res = mysqli_fetch_assoc($distqry)) {
    $bdate= $distqry_res['bdate'];
}

$distqry = mysqli_query($conn,"SELECT * FROM distributor_info WHERE id=(SELECT userid FROM orders WHERE orderNo='$orderNo' limit 1);");
if ($distqry_res = mysqli_fetch_assoc($distqry)) {
    $cuId = $distqry_res['id'];
    $cuName = $distqry_res['dist_name'];
    $address= $distqry_res['dist_address'];
    $uniqueId= $distqry_res['dist_aadhar'];
}


function getIndianCurrency(float $number)
{
    $decimal = round($number - ($no = floor($number)), 2) * 100;
    $hundred = null;
    $digits_length = strlen($no);
    $i = 0;
    $str = array();
    $words = array(0 => '', 1 => 'one', 2 => 'two',
        3 => 'three', 4 => 'four', 5 => 'five', 6 => 'six',
        7 => 'seven', 8 => 'eight', 9 => 'nine',
        10 => 'ten', 11 => 'eleven', 12 => 'twelve',
        13 => 'thirteen', 14 => 'fourteen', 15 => 'fifteen',
        16 => 'sixteen', 17 => 'seventeen', 18 => 'eighteen',
        19 => 'nineteen', 20 => 'twenty', 30 => 'thirty',
        40 => 'forty', 50 => 'fifty', 60 => 'sixty',
        70 => 'seventy', 80 => 'eighty', 90 => 'ninety');
    $digits = array('', 'hundred','thousand','lakh', 'crore');
    while( $i < $digits_length ) {
        $divider = ($i == 2) ? 10 : 100;
        $number = floor($no % $divider);
        $no = floor($no / $divider);
        $i += $divider == 10 ? 1 : 2;
        if ($number) {
            $plural = (($counter = count($str)) && $number > 9) ? 's' : null;
            $hundred = ($counter == 1 && $str[0]) ? ' and ' : null;
            $str [] = ($number < 21) ? $words[$number].' '. $digits[$counter]. $plural.' '.$hundred:$words[floor($number / 10) * 10].' '.$words[$number % 10]. ' '.$digits[$counter].$plural.' '.$hundred;
        } else $str[] = null;
    }
    $Rupees = implode('', array_reverse($str));
    $paise = ($decimal > 0) ? "." . ($words[$decimal / 10] . " " . $words[$decimal % 10]) . ' Paise' : '';
    return ($Rupees ? $Rupees . 'Rupees ' : '') . $paise;
}

?>

<html>
<head>
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="assets/bower_components/font-awesome/css/font-awesome.min.css">
    <!-- jQuery 3 -->
    <script src="assets/bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap 3.3.7 -->
    <script src="assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <style>
        .company-profile{
            text-align: center;
        }
        p {
            margin: 0 0 1px;
        }
        th{
            text-align: center;
            font-size: 10px;
        }
        .table-bordered > tbody > tr > td, .table-bordered > tbody > tr > th, .table-bordered > tfoot > tr > td, .table-bordered > tfoot > tr > th, .table-bordered > thead > tr > td, .table-bordered > thead > tr > th {
            border: 0.5px solid black;
            font-size: 10px;
           
        }
        .table {
            width: 100%;
            max-width: 100%;
            margin-bottom: 0;
        }
        .pxfont{
            font-size: 10px;
        }
    </style>
</head>
<body>
<div class="container" style="padding: 0px;border: 2px solid #000;">
<div class="container">
    <div class="row" style="margin-top: 10px;">
        <div class="col-md-8">
            <div class="company-profile">
                <p style="font-weight: 800;font-size: 27px;"><img src="assets/images/fito_logo.png" style="width: 100px;height: 40px;"> &nbsp;FITO FMCG HEALTHY MARKET Pvt. Ltd.</p>
                <p style="font-size: 15px;padding-left: 151px;"># 3-146/1, LIC Colony, Palamaner, Chittoor. (Dist), Andhra Pradesh 514708, India.</p>
                <p style="font-size: 15px;padding-left: 151px;">Contact Number : 9441117070</p>
            </div>
        </div>
    </div>
</div>
    <div class="container" style="border-top: 1px solid black;border-bottom: 1px solid black;">
    <div class="row" style="margin-top: 2px;margin-bottom: 2px;">
        <p style="text-align: center;font-weight: 600;"> TAX INVOICE</p>
    </div>
    </div>
    <div class="container" style="border-bottom: 1px solid black;">
        <div class="row" style="margin-top: 2px;margin-bottom: 2px;">
            <p style="text-align: left;font-weight: 500;padding-left: 10px;"> GSTIN : 37AADCF2525M1Z1</p>
        </div>
    </div>
    <div class="container" style="">
        <div class="row" style="">
            <div class="col-md-8">
                <table class="table table-bordered" style="font-size: 10px;">
                <tr>
                    <td>Invoice No : </td>
                    <td><?php echo $orderNo; ?></td>
                    <td>CIN : </td>
                    <td>U74999AP2017PTC107110</td>
                    <td>Mode of Transport : </td>
                    <td>Self</td>
                </tr>
                <tr>
                    <td>Invoice Date : </td>
                    <td><?php echo $bdate; ?></td>
                    <td>PAN : </td>
                    <td>AADCF2525M</td>
                    <td>Place of Supply : </td>
                    <td>AP</td>
                </tr>
                </table>
        </div>
        </div>
    </div>
    <div class="container" style="">
        <div class="row" style="">
            <div class="col-md-8">
                <table class="table table-bordered" style="font-size: 13px;">
                <tr>
                    <th>Details of Receiver (Billed to)</th>
                    <th>Details of Consignee (Shipped to)</th>
                </tr>
            </table>
            </div>
        </div>
    </div>
    <div class="container" style="">
        <div class="row" style="">
            <div class="col-md-8">
                <table class="table table-bordered" style="font-size: 10px;">
                <tr>
                    <td>Cu ID No : </td>
                    <td><?php echo $cuId;?></td>
                    <td>Name : </td>
                    <td><?php echo $cuName;?></td>
                </tr>
                <tr>
                    <td>Name : </td>
                    <td><?php echo $cuName;?></td>
                    <td>Address : </td>
                    <td><?php echo $address;?></td>
                </tr>
                <tr>
                    <td>Address : </td>
                    <td><?php echo $address;?></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>GSTIN/ Unique ID : </td>
                    <td><?php echo $uniqueId;?></td>
                    <td></td>
                    <td></td>
                </tr>
            </table>
            </div>
        </div>
    </div>
    <div class="container" style="">
        <div class="col-md-8">
        <div class="row" style="">
            <table class="table table-bordered table-responsive" style="font-size: 8px;text-align: center;">
                <tr>
                    <th class="pxfont">S NO</th>
                    <th class="pxfont">Prod Code</th>
                    <th class="pxfont">Particulars</th>
                    <th class="pxfont">HSN</th>
                    <th class="pxfont">BASIC RATE</th>
                    <th>
                        <table class="table">
                            <tr>
                                <th colspan="2" class="pxfont">GST</th>
                            </tr>
                            <tr>
                                <th class="pxfont">Rate</th>
                                <th class="pxfont">Amt</th>
                            </tr>
                        </table>
                    </th>
                    <th>
                        <table class="table">
                            <tr>
                                <th colspan="2" class="pxfont">SGST</th>
                            </tr>
                            <tr>
                                <th class="pxfont">Rate</th>
                                <th class="pxfont">Amt</th>
                            </tr>
                        </table>
                    </th>
                    <th>
                        <table class="table">
                            <tr>
                                <th colspan="2" class="pxfont">IGST</th>
                            </tr>
                            <tr>
                                <th class="pxfont">Rate</th>
                                <th class="pxfont">Amt</th>
                            </tr>
                        </table>
                    </th>
                    <th>QTY
<!--                        <table class="table">-->
<!--                            <tr>-->
<!--                                <th colspan="2" class="pxfont">QTY</th>-->
<!--                            </tr>-->
<!--                            <tr>-->
<!--                                <th class="pxfont">Order</th>-->
<!--                                <th class="pxfont">Billing</th>-->
<!--                            </tr>-->
<!--                        </table>-->
                    </th>
                    <th class="pxfont">MRP</th>
                    <th class="pxfont">ADCP</th>
                    <th class="pxfont">BV</th>
                    <th class="pxfont">Total BVs</th>
                    <th class="pxfont">Total Amount</th>
                </tr>
                <?php
$slno = 0;
$basic_rate_total = '';$total_qty = '';$total_dp = '';$sTotal_bv = '';$total_bv = '';$total_amt = '';$total_mrp = '';
$basic_rate_total_0 = '';$basic_rate_total_5 = '';$basic_rate_total_12 = '';$basic_rate_total_18 = '';$basic_rate_total_28 = '';
$total_cgst_amt_0 = '';$total_cgst_amt_5 = '';$total_cgst_amt_12 = '';$total_cgst_amt_18 = '';$total_cgst_amt_28 = '';
$total_sgst_amt_0 = '';$total_sgst_amt_5 = '';$total_sgst_amt_12 = '';$total_sgst_amt_18 = '';$total_sgst_amt_28 = '';
$total_igst_amt_0 = '';$total_igst_amt_5 = '';$total_igst_amt_12 = '';$total_igst_amt_18 = '';$total_igst_amt_28 = '';
$distqry1 = mysqli_query($conn,"SELECT * FROM orders WHERE orderNo ='$orderNo';");
while ($distqry_res1 = mysqli_fetch_assoc($distqry1)) {
    $prod_code = $distqry_res1['product_code'];
    $qty = $distqry_res1['quantity'];
    $total_qty = floatval($total_qty)+floatval($qty);
//    echo $qty;

$distqry = mysqli_query($conn,"SELECT * FROM products WHERE slno ='$prod_code';");
while ($distqry_res = mysqli_fetch_assoc($distqry)) {

$gst = $distqry_res['gst'];

$cgst = floatval($gst)/2;
$sgst = floatval($gst)/2;

$dp = $distqry_res['dp'];
$mrp = $distqry_res['mrp'];


$total_dp = floatval($total_dp)+floatval($dp);
//$total_mrp = floatval($total_mrp)+floatval($mrp);

$subTotal_amt = $dp*$qty;
$subTotal_mrp = $mrp*$qty;

$total_amt = floatval($total_amt)+floatval($subTotal_amt);
$total_mrp = floatval($total_mrp)+floatval($subTotal_mrp);



$bv = $distqry_res['bv'];


$subTotal_bv = $bv*$qty;

$sTotal_bv = floatval($sTotal_bv)+floatval($bv);

$total_bv = floatval($total_bv)+floatval($subTotal_bv);



$basic_rate1 = floatval($dp)*100/(floatval((100+$gst)));

//$basic_rate1 = floatval($dp)-(floatval($dp)*floatval($gst)/100);

$basic_rate = number_format((float)$basic_rate1, 2, '.', '');

$basic_rate_total1 = floatval($basic_rate_total)+floatval($basic_rate);

$basic_rate_total = number_format((float)$basic_rate_total1, 2, '.', '');


//gst amount calculation
    //$cgst_amt = floatval(floatval($basic_rate)*floatval($cgst)/100);
    $cgst_amt = number_format((float)floatval(floatval($basic_rate)*floatval($cgst)/100), 2, '.', '');
    $sgst_amt = number_format((float)floatval(floatval($basic_rate)*floatval($cgst)/100), 2, '.', '');

if ($gst == 5){
    $basic_rate_total_5 = floatval($basic_rate_total_5)+floatval($basic_rate)*$qty;
    $total_cgst_amt_5 = floatval($total_cgst_amt_5)+floatval($cgst_amt)*$qty;
    $total_sgst_amt_5 = floatval($total_sgst_amt_5)+floatval($sgst_amt)*$qty;
}
    else if ($gst == 12){
        $basic_rate_total_12 = floatval($basic_rate_total_12)+floatval($basic_rate)*$qty;
        $total_cgst_amt_12 = floatval($total_cgst_amt_12)+floatval($cgst_amt)*$qty;
        $total_sgst_amt_12 = floatval($total_sgst_amt_12)+floatval($sgst_amt)*$qty;
        $total_igst_amt_12 = floatval($total_igst_amt_12)+floatval(0)*$qty;
    }
    else if ($gst == 18){
        $basic_rate_total_18 = floatval($basic_rate_total_18)+floatval($basic_rate)*$qty;
        $total_cgst_amt_18 = floatval($total_cgst_amt_18)+floatval($cgst_amt)*$qty;
        $total_sgst_amt_18 = floatval($total_sgst_amt_18)+floatval($sgst_amt)*$qty;
        $total_igst_amt_18 = floatval($total_igst_amt_18)+floatval(0)*$qty;
    }
    else if ($gst == 28){
        $basic_rate_total_28 = floatval($basic_rate_total_28)+floatval($basic_rate)*$qty;
        $total_cgst_amt_28 = floatval($total_cgst_amt_28)+floatval($cgst_amt)*$qty;
        $total_sgst_amt_28 = floatval($total_sgst_amt_28)+floatval($sgst_amt)*$qty;
        $total_igst_amt_28 = floatval($total_igst_amt_28)+floatval(0)*$qty;
    }
    else if ($gst == 0){
        $basic_rate_total_0 = floatval($basic_rate_total_0)+floatval($basic_rate)*$qty;
        $total_cgst_amt_0 = floatval($total_cgst_amt_0)+floatval($cgst_amt)*$qty;
        $total_sgst_amt_0 = floatval($total_sgst_amt_0)+floatval($sgst_amt)*$qty;
        $total_igst_amt_0 = floatval($total_igst_amt_0)+floatval(0)*$qty;
    }

    $slno++;
    ?>
<tr>
                    <td><?php echo "$slno;"; ?></td>
                    <td><?php echo $distqry_res['product_code']; ?></td>
                    <td><?php echo $distqry_res['product_name']; ?></td>
                    <td><?php echo $distqry_res['hsncode']; ?></td>
                    <td><?php echo $basic_rate ?></td>
                    <td>
                        <table class="table">
                            <tr>
                                <td class="pxfont"><?php echo $cgst ?></td>
                                <td class="pxfont"><?php echo $cgst_amt ?></td>
                            </tr>
                        </table>
                    </td>
                    <td>
                        <table class="table">
                            <tr>
                                 <td class="pxfont"><?php echo $sgst ?></td>
                                <td class="pxfont"><?php echo $sgst_amt ?></td>
                            </tr>
                        </table>
                    </td>
                    <td>
                        <table class="table">
                            <tr>
                               <td class="pxfont">0</td>
                                <td class="pxfont">0</td>
                            </tr>
                        </table>
                    </td>
                    <td><?php echo $qty; ?> </td>
                     <td><?php echo $mrp; ?></td>
                    <td><?php echo $dp; ?></td>
                    <td><?php echo $bv; ?></td>
                    <td><?php echo $subTotal_bv; ?></td>
                    <td><?php echo $subTotal_mrp; ?></td>
                </tr>
    <?php
}
}
                ?>
                
<!--                <tr>-->
<!--                    <th colspan="2">Total</th>-->
<!--                    <td></td>-->
<!--                    <td></td>-->
<!--                    <td>--><?php //echo $basic_rate_total; ?><!--</td>-->
<!--                    <td></td>-->
<!--                   <td></td>-->
<!--                    <td></td>-->
<!--                    <td>--><?php //echo $total_qty; ?><!--</td>-->
<!--                    <td colspan="2"></td>-->
<!--                    <td>--><?php //echo $total_mrp; ?><!--</td>-->
<!--                    <td>--><?php //echo $total_dp; ?><!--</td>-->
<!--                    <td>--><?php //echo $sTotal_bv; ?><!--</td>-->
<!--                    <td>--><?php //echo $total_bv; ?><!--</td>-->
<!--                    <td>--><?php //echo $total_amt; ?><!--</td>-->
<!--                </tr>-->
                <tr>
                    <th colspan="13" style="text-align: left;font-weight: bold;">Total Price</th>
                    <th style="font-weight: bold;"><?php echo $total_mrp; ?></th>

                </tr>
                <tr>
                    <th colspan="13" style="text-align: left;font-weight: bold;">Discount</th>
                    <th style="font-weight: bold;"><?php echo floatval($total_mrp - $total_amt) ?></th>

                </tr>
                <tr>
                    <th colspan="13" style="text-align: left;font-weight: bold;">Payable Amount</th>
                    <th style="font-weight: bold;"><?php echo $total_amt ?></th>

                </tr>
                <tr>
<!--                     <td colspan="13" style="text-align: left;font-size: 10px;font-weight: bold;"> Total amount in word :  <span style="text-transform: capitalize;">--><?php //echo getIndianCurrency($total_amt); ?><!--</span></td>-->
                    <td colspan="13"></td>
                </tr>
                <tr>
                    <td colspan="2"></td>
                    <td>BASIC</td>
                    <td>SGST</td>
                    <td>CGST</td>
                    <td>IGST</td>
                    <td colspan="7"></td>
                </tr>
                <tr>
                    <td colspan="2">0%</td>
                    <td><?php echo $basic_rate_total_0; ?></td>
                    <td><?php echo $total_sgst_amt_0; ?></td>
                    <td><?php echo $total_cgst_amt_0; ?></td>
                    <td><?php echo $total_igst_amt_0; ?></td>
                    <td colspan="7"></td>
                </tr>
                <tr>
                    <td colspan="2">5%</td>
                    <td><?php echo $basic_rate_total_5; ?></td>
                    <td><?php echo $total_sgst_amt_5; ?></td>
                    <td><?php echo $total_cgst_amt_5; ?></td>
                    <td><?php echo $total_igst_amt_5; ?></td>
                    <td colspan="7"></td>
                </tr>
                <tr>
                    <td colspan="2">12%</td>
                    <td><?php echo $basic_rate_total_12; ?></td>
                    <td><?php echo $total_sgst_amt_12; ?></td>
                    <td><?php echo $total_cgst_amt_12; ?></td>
                    <td><?php echo $total_igst_amt_12; ?></td>
                    <td colspan="7"></td>
                </tr>
                <tr>
                    <td colspan="2">18%</td>
                    <td><?php echo $basic_rate_total_18; ?></td>
                    <td><?php echo $total_sgst_amt_18; ?></td>
                    <td><?php echo $total_cgst_amt_18; ?></td>
                    <td><?php echo $total_igst_amt_18; ?></td>
                    <td colspan="7" style="text-align: left"> For :  FITO  FMCG HEALTHY MARKET PVT LTD</td>
                </tr>
                <tr>
                    <td colspan="2">28%</td>
                    <td><?php echo $basic_rate_total_28; ?></td>
                    <td><?php echo $total_sgst_amt_28; ?></td>
                    <td><?php echo $total_cgst_amt_28; ?></td>
                    <td><?php echo $total_igst_amt_28; ?></td>
                    <td colspan="7" style="text-align: left"> Authorized Signatory</td>
                </tr>
            </table>
        </div>
        </div>
    </div>
    <p style="padding-left: 5px;">
        <br>1. Seller is not responsible for any loss or damage of goods in transport.<br>
2. Please store cosmetic products at cool place and away from sunlight.<br>
3. Any inaccuracy in this bill must be notified immediately on its receipt.<br>
4. Any legal issues with regarding fitohm.com Jurisduction with palamaner court Chitoor Dt, AP. only.
    </p>
</div>
</body>
</html>




