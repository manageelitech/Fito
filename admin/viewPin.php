<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type, Content-Range, Content-Disposition, Content-Description');
include_once('connection.php');
$connobj = new connClass();
$conn=$connobj->conn;
$schExt=$connobj->schExt;
$table='';
$table.=  '<div class="box-body table-responsive no-padding"><table  class="table table-hover" id="pinttable">
                        <thead>
                        <tr>
                            <th class="">SL No.</th>
                            <th>USER</th>
                            <th>PIN</th>
                            <th>STATUS</th>
                        </tr>
                        </thead>
                        <tbody>';

$qry=mysqli_query($conn,"SELECT * FROM distributor_pin where status='Active'");
while($res=mysqli_fetch_array($qry))
{
    $id=$res["slno"];
    $user=$res['userid'];
    $pin=$res['pin'];
    $status=$res['status'];

    $table.='
            <tr>
                            <td class="">'.$id.'</td>
                            <td class="">'.$user.'</td>
                            <td class="">'.$pin.'</td>
                            <td class="">'.$status.'</td>
                        </tr>';
}
$table.='</tbody></table></div>';

echo json_encode(array("res"=> 1, "pinlist" => $table));
?>