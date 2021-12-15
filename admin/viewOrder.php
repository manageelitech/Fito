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
$table.=  '<div class="box-body table-responsive no-padding"><table  class="table table-hover" id="orderttable">
                        <thead>
                        <tr>
                            <th class="hide">Id</th>
                            <th>SL No</th>
                            <th>Product Name</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Subtotal</th>
                            <th>BV</th>
                            <th>Date</th>
                            <th>Remove</th>
                        </tr>
                        </thead>
                        <tbody>';
$slno = 0;
$qry=mysqli_query($conn,"SELECT * FROM orders where userid='$uid' and status='ordered'");
while($res=mysqli_fetch_array($qry))
{
    $id=$res["slno"];
    $code=$res['product_code'];

    $prod_qry = mysqli_query($conn,"select product_name,mrp,bv,dp from products where slno='$code'");{
    if ($prod_res = mysqli_fetch_array($prod_qry)){
        $name=$prod_res['product_name'];
        $price=$prod_res['dp'];
        $bv=$prod_res['bv'];
    }
}
    $quantity = $res['quantity'];
    $date=date('l - d M Y', strtotime($res['date']));
    $subtotal = $price*$quantity;
    $totalbv = $bv*$quantity;

    $slno++;
    $table.='
            <tr>
                            <td class="hide">'.$id.'</td>
                            <td class="">'.$slno.'</td>
                            <td class="">'.$name.'</td>
                            <td class="">'.$price.'</td>
                            <td class="">'.$quantity.'</td>
                            <td class="">'.$subtotal.'</td>
                            <td class="">'.$totalbv.'</td>
                            <td class="">'.$date.'</td>
                            <td onclick="deleteOrder(this);"><a href="javascript:void(0)"><i class="fa fa-remove" style="color: red;font-size: 20px;text-align: center;"></i></a></td>
                        </tr>';
}
$table.='</tbody></table></div>';

echo json_encode(array("res"=> 1, "ordertlist" => $table));
?>