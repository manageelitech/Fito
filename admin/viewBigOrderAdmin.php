<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type, Content-Range, Content-Disposition, Content-Description');
include_once('connection.php');
$connobj = new connClass();
$conn=$connobj->conn;
$schExt=$connobj->schExt;
$table='';
$table.=  '<div class="box-body table-responsive no-padding"><table  class="table table-hover" id="orderttable">
                        <thead>
                        <tr>
                            <th class="hide">Id</th>
                            <th>SL No</th>
                            <th>Userid</th>
                            <th>Product Name</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Subtotal</th>
                            <th>BP</th>
                            <th>TBP</th>
                            <th>Date</th>
                        </tr>
                        </thead>
                        <tbody>';
$slno = 0;
$totalbp = '';
$qry=mysqli_query($conn,"SELECT * FROM orders where status='ordered' and usertype='bigshoppee'");
while($res=mysqli_fetch_array($qry))
{
    $id=$res["slno"];
    $user=$res["userid"];
    $code=$res['product_code'];

    $prod_qry = mysqli_query($conn,"select product_name,mrp,bv from products where slno='$code'");{
    if ($prod_res = mysqli_fetch_array($prod_qry)){
        $name=$prod_res['product_name'];
        $price=$prod_res['mrp'];
        $bp= $prod_res['bv'];
    }
}
    $quantity = $res['quantity'];

    $date=date('l - d M Y', strtotime($res['date']));
    $subtotal = $price*$quantity;
    $subbp = $bp*$quantity;
    $totalbp = (int)$subbp+(int)$totalbp;

    $slno++;
    $table.='
            <tr>
                            <td class="hide">'.$id.'</td>
                            <td class="">'.$slno.'</td>
                            <td class="">'.$user.'</td>
                            <td class="">'.$name.'</td>
                            <td class="">'.$price.'</td>
                            <td class="">'.$quantity.'</td>
                            <td class="">'.$subtotal.'</td>
                            <td class="">'.$subbp.'</td>
                            <td class="">'.$totalbp.'</td>
                            <td class="">'.$date.'</td>
                        </tr>';
}
$table.='</tbody></table></div>';

echo json_encode(array("res"=> 1, "ordertlist" => $table));
?>