<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type, Content-Range, Content-Disposition, Content-Description');
include_once('connection.php');
$connobj = new connClass();
$conn=$connobj->conn;
$schExt=$connobj->schExt;
$table='';
$table.=  '<div class="box-body table-responsive no-padding"><table  class="table table-hover" id="homeshoppeetable">
                        <thead>
                        <tr>
                            <th class="hide">Id</th>
                            <th>SL No</th>
                            <th>Owner</th>
                            <th>Username</th>
                            <th>Home Shop</th>
                            <th>Mobile</th>
                            <th>Email</th>
                            <th>Aadhar</th>
                            <th>PAN</th>
                            <th>Address</th>
                            <th>Bank Name</th>
                            <th>Account No</th>
                            <th>Branch</th>
                            <th>IFSC</th>
                            <th>Date</th>
                            <th>Status</th>
                            <th>Delete</th>
                            <th>Update</th>
                        </tr>
                        </thead>
                        <tbody>';
$slno = 0;
$qry=mysqli_query($conn,"SELECT * FROM homeshoppee_info");
while($res=mysqli_fetch_array($qry)) {
    $id = $res["slno"];
    $owner = $res["owner_name"];
    $username = $res["username"];
    $homeshop = $res["homeshop_name"];
    $mobile_no = $res["mobile_no"];
    $email = $res["email"];
    $aadhar = $res["aadhar"];
    $pan = $res["pan"];
    $address = $res["address"];
    $bank_name = $res["bank_name"];
    $accNo = $res["accNo"];
    $bank_branch = $res["bank_branch"];
    $ifsc = $res["ifsc"];
    $date = $res["date"];
    $status = $res["status"];
    $slno++;
    $table .= '
            <tr>
                            <td class="hide">' . $id . '</td>
                            <td class="">' . $slno . '</td>
                            <td class="">' . $owner . '</td>
                            <td class="">' . $username . '</td>
                            <td class="">' . $homeshop . '</td>
                            <td class="">' . $mobile_no . '</td>
                            <td class="">' . $email . '</td>
                            <td class="">' . $aadhar . '</td>
                            <td class="">' . $pan . '</td>
                            <td class="">' . $address . '</td>
                            <td class="">' . $bank_name . '</td>
                            <td class="">' . $accNo . '</td>
                            <td class="">' . $bank_branch . '</td>
                            <td class="">' . $ifsc . '</td>
                            <td class="">' . $date . '</td>
                            <td class="">' . $status . '</td>
                            <td onclick="deleteHomeshoppee(this);"><a href="javascript:void(0)"><i class="fa fa-trash" style="color: red;font-size: 20px;"></i></a></td>
                            <td onclick="updateHomeshoppee(this);"><a href="javascript:void(0)"><i class="fa fa-edit" style="color: blue;font-size: 20px;"></i></a></td>
                        </tr>';
}
$table.='</tbody></table></div>';

echo json_encode(array("res"=> 1, "homeshoppeelist" => $table));
?>