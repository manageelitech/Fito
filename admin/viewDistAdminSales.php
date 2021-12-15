<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type, Content-Range, Content-Disposition, Content-Description');
include_once('connection.php');
$connobj = new connClass();
$conn=$connobj->conn;
$schExt=$connobj->schExt;
$table='';
$uid = mysqli_real_escape_string($conn,$_POST['uid']);
$table.=  '<div class="box-body table-responsive no-padding"><table  class="table table-hover" id="Admindistsalestable">
                        <thead>
                        <tr>
                            <th>SL No</th>
                            <th>User ID</th>
                            <th>Order No</th>
                            <th>Amount</th>
                            <th>Date</th>
                            <th>Invoice</th>
                        </tr>
                        </thead>
                        <tbody>';
$slno = 0;

$qry=mysqli_query($conn,"SELECT DISTINCT orders.orderNo FROM orders LEFT JOIN userlogin ON userlogin.username = orders.userid WHERE userlogin.usertype='dist' and orders.status='confirm'");
while($res=mysqli_fetch_array($qry))
{
    $orderNo=$res['orderNo'];

    $price = '';
    $quantity = '';
    $qry1=mysqli_query($conn,"SELECT * FROM orders where orderNo='$orderNo'");
    while($res1=mysqli_fetch_array($qry1))
    {
        $p = $res1['quantity']*$res1['price'];
        $user = $res1['userid'];
        $price = (int)$price+(int)$p;
        $quantity = (int)$quantity+(int)$res1['quantity'];
        $date=date('l - d M Y', strtotime($res1['bdate']));
        $subtotal = $price*$quantity;
    }

    $slno++;
    $table.='
            <tr>
                          
                            <td class="">'.$slno.'</td>
                            <td class="">'.$user.'</td>
                            <td class="">'.$orderNo.'</td>
                            <td class="">'.$price.'</td>
                            <td class="">'.$date.'</td>
                            <td class=""><a href="stimulsoft/viewer.php?order='.$orderNo.'" target="_blank" style="color: #4c23e1;">VIEW INVOICE</a></td>
                        </tr>';
}
$table.='</tbody></table></div>';

echo json_encode(array("res"=> 1, "Admindistsaleslist" => $table));
?>