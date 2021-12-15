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
                            <th>Product Name</th>
                            <th>MRP</th>
                            <th>DP</th>
                            <th>Qty</th>
                            <th>Amount</th>
                            <th>Mobile No</th>
                            <th>Email</th>
                            <th>Date</th>
                            <th>Address</th>
                        </tr>
                        </thead>
                        <tbody>';
$slno = 1;
    $qry=mysqli_query($conn,"SELECT *,DATE_FORMAT(date,'%d/%m/%Y') AS orderdate FROM guest_cart where status='Confirmed' order by date desc");
    while($res=mysqli_fetch_assoc($qry))
    {
        $product_code = $res["product_code"];
        $prod = $conn->query("select * from products where slno='$product_code'");
        $prod_res = $prod->fetch_assoc();
        $amount = floatval($prod_res["dp"] * $res["quantity"]);
        $table .='<tr>
<td class="hide">'.$res["slno"].'</td>
<td>'.$slno.'</td>
<td>'.$prod_res["product_name"].'</td>
<td>'.$prod_res["mrp"].'</td>
<td>'.$prod_res["dp"].'</td>
<td>'.$res["quantity"].'</td>
<td>'.$amount.'</td>
<td>'.$res["phone"].'</td>
<td>'.$res["email"].'</td>
<td>'.$res["orderdate"].'</td>
<td>'.$res["address"].'</td>
</tr>';
        $slno++;
    }


$table.='</tbody></table></div>';

echo json_encode(array("res"=> 1, "ordertlist" => $table));
?>