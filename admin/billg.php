<?php
include_once('connection.php');
$connobj = new connClass();
$conn=$connobj->conn;
$schExt=$connobj->schExt;
$orderNo = $_GET['order'];
require_once 'fpdf17/fpdf.php';
$pdf = new FPDF('p','mm','A4');

$pdf->AddPage();
$pdf->SetFont('Arial','bold','14');
$pdf->Cell(130,7,'FITOHM Healthy Market',0,0);
$pdf->Cell(59,7,'INVOICE',0,1);//end of line

$pdf->SetFont('Arial','','9');

$qry = mysqli_query($conn, "SELECT userid,bdate FROM `orders` where orderNo='$orderNo'");
if ($res = mysqli_fetch_array($qry)) {
    $id = $res['userid'];
    $date=date('d/m/Y', strtotime($res['bdate']));

    }

$pdf->Cell(130,4,'FITO FMCG Healthy Market Pvt. Ltd.',0,0);
$pdf->Cell(20,4,'Order No ',0,0);
$pdf->Cell(34,4,': '.$orderNo,0,1);//end of line

$pdf->Cell(130,4,'Office: # H.No. 3-146/1,LIC Colony,PALAMANER',0,0);
$pdf->Cell(20,4,'Invoice Date ',0,0);
$pdf->Cell(29,4,': '.$date,0,1);//end of line

$pdf->Cell(130,4,'Chittoor,ANDHRA PRADESH. PIN CODE:-517408',0,0);
$pdf->Cell(20,4,'User ID ',0,0);
$pdf->Cell(29,4,': '.$id,0,1);//end of line


$pdf->SetFont('Arial','bold','11');
$pdf->Cell(100,10,' ',0,1);//end of line
$pdf->Cell(100,10,' ORDER DETAILS',0,1);//end of line



$pdf->Cell(10,7,'S No',1,0);
$pdf->Cell(100,7,'Product Name',1,0);
$pdf->Cell(20,7,'Price',1,0);
$pdf->Cell(20,7,'Quantity',1,0);
$pdf->Cell(20,7,'Subtotal',1,0);
$pdf->Cell(20,7,'BV',1,1);//end of line

$pdf->SetFont('Arial','','9');

$slno = 1;
$totalprice ='';
$totalbv ='';
$qry = mysqli_query($conn, "SELECT * FROM `orders` where orderNo='$orderNo'");
while ($res = mysqli_fetch_array($qry)) {
    $code = $res['product_code'];
    $qty = $res['quantity'];


    $qry1 = mysqli_query($conn, "SELECT bv,product_name,dp FROM `products` where slno='$code'");
    if ($res1 = mysqli_fetch_array($qry1)) {
        $bv = $res1['bv'];
        $name = $res1['product_name'];
        $price = $res1['dp'];
        $subtotal = (int)$qty*(int)$price;
    }
    $tbv = $bv*$qty;
    $totalprice = (int)$totalprice+(int)$subtotal;
    $totalbv = (int)$totalbv+(int)$tbv;

    $pdf->Cell(10,5,$slno,1,0);
    $pdf->Cell(100,5,$name,1,0);
    $pdf->Cell(20,5,$price,1,0);
    $pdf->Cell(20,5,$qty,1,0);
    $pdf->Cell(20,5,$subtotal,1,0);
    $pdf->Cell(20,5,$tbv,1,1);//end of line

    $slno++;
}
$pdf->Cell(130,5,'',0,0);
$pdf->Cell(20,5,'Total',1,0);
$pdf->Cell(20,5,$totalprice,1,0);
$pdf->Cell(20,5,$totalbv,1,1);//end of line


$pdf->Output();
?>