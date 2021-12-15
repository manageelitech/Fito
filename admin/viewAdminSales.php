<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type, Content-Range, Content-Disposition, Content-Description');
include_once('connection.php');
$connobj = new connClass();
$conn=$connobj->conn;
$schExt=$connobj->schExt;
$table='';
$userid = '';
$uid = mysqli_real_escape_string($conn,$_POST['uid']);
$table.=  '<div class="box-body table-responsive no-padding"><table  class="table table-hover" id="Adminsalestable">
                        <thead>
                        <tr>
                            <th>SL No</th>
                            <th>Order No</th>
                            <th>Amount</th>
                            <th>Date</th>
                            <th>Invoice</th>
                        </tr>
                        </thead>
                        <tbody>';
$slno = 0;
$qry=mysqli_query($conn,"SELECT distinct orderNo FROM orders where seller='$uid'");
while($res=mysqli_fetch_array($qry))
{
    $orderNo=$res['orderNo'];

    $price = '';
    $quantity = '';
    $qry1=mysqli_query($conn,"SELECT * FROM orders where orderNo='$orderNo'");
    if($res1=mysqli_fetch_array($qry1))
    {
        $p = $res1['quantity']*$res1['price'];
        $price = (int)$price+(int)$p;
        $quantity = (int)$quantity+(int)$res1['quantity'];
        $date=date('l - d M Y', strtotime($res1['bdate']));
        $subtotal = $price*$quantity;
        $userid = $res1['userid'];
    }
$chk_user = mysqli_query($conn,"select usertype from userlogin where username='$userid'");
if($chk_user_res = mysqli_fetch_assoc($chk_user)){
    $usertype = $chk_user_res['usertype'];
}
if($usertype == 'dist'){
    $href = 'stimulsoft/viewer.php?order='.$orderNo;
}
else{
    $href = 'billg.php?order='.$orderNo;
}
// echo $href;
// return;
    $slno++;
    $table.='
            <tr>
                          
                            <td class="">'.$slno.'</td>
                            <td class="">'.$orderNo.'</td>
                            <td class="">'.$price.'</td>
                            <td class="">'.$date.'</td>
                        
                            <td class=""><a href="'.$href.'" target="_blank" style="color: #4c23e1;">VIEW INVOICE</a></td>
                             
                        </tr>';
}
$table.='</tbody></table></div>';

echo json_encode(array("res"=> 1, "Adminsaleslist" => $table));
?>