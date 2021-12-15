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
                            <th>Mobile No</th>
                            <th>Email</th>
                            <th>Address</th>
                            <th>Date</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>';
$slno = 1;
$qry1 = mysqli_query($conn,"SELECT distinct phone FROM guest_cart where status='ordered'");
while($res1 = mysqli_fetch_assoc($qry1)){
    $userid = $res1['phone'];
    $qry=mysqli_query($conn,"SELECT *,DATE_FORMAT(date,'%d/%m/%Y') AS orderdate FROM guest_cart where status='ordered' and phone ='$userid'");
    if($res=mysqli_fetch_assoc($qry))
    {
        $userid = $res["phone"];
        $table .='<tr>
<td class="hide">'.$res["slno"].'</td>
<td>'.$slno.'</td>
<td>'.$res["phone"].'</td>
<td>'.$res["email"].'</td>
<td>'.$res["address"].'</td>
<td>'.$res["orderdate"].'</td>
<td><button class="btn btn-primary" onclick="proceed_web_guest_order(\''.$userid.'\')">Proceed Order</button></td>
</tr>';
        $slno++;
    }
}


$table.='</tbody></table></div>';

echo json_encode(array("res"=> 1, "ordertlist" => $table));
?>