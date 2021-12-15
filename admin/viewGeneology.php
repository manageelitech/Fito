<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type, Content-Range, Content-Disposition, Content-Description');
include_once('connection.php');
$connobj = new connClass();
$conn=$connobj->conn;
$schExt=$connobj->schExt;
$table='';
if(isset($_POST['uid']) && !empty($_POST['uid']))
{
    $uid=mysqli_real_escape_string($conn,$_POST['uid']);
}
$table.=  '<div class="box-body table-responsive no-padding"><table  class="table table-hover" id="geneologytable">
                        <thead>
                        <tr>
                             <th>1<sup>st</sup> Level Name</th>
                              <th>User Id</th>
                            <th>Sponsor Name</th>
                            <th>Sponsor Id</th>
                            <th>Email</th>
                            <th>Mobile No</th>
                            <th>Joining Date</th>
                            <th>Aadhar No</th>
                            <th>PAN No</th>
                            <th>Address</th>
                            <th>ACC NO</th>
                            <th>Bank Name</th>
                            <th>Branch</th>
                            <th>IFSC</th>
                            <th>Nominee Name</th>
                            <th>Nominee Mobile</th>
                            <th>Nominee Relation</th>
                            <th>View Details</th>
                        </tr>
                        </thead>
                        <tbody>';

$qry=mysqli_query($conn,"SELECT * FROM distributor_info where sponsor_id='".$uid."' order by date desc");
while($res=mysqli_fetch_array($qry))
{
    $id=$res["slno"];
    $name=$res['dist_name'];
    $username=$res['id'];
    $sponsorid=$res['sponsor_id'];
    $sponsor_name=$res['sponsor_name'];
    $email=$res['dist_email'];
    $mobile=$res['dist_mobile'];
    $date=$res['date'];
    $dist_aadhar=$res['dist_aadhar'];
    $dist_pan=$res['dist_pan'];
    $dist_address=$res['dist_address'];
    $dist_accNo=$res['dist_accNo'];
    $dist_bank_name=$res['dist_bank_name'];
    $dist_bank_branch =$res['dist_bank_branch'];
    $dist_bank_ifsc=$res['dist_bank_ifsc'];
    $nominee_name=$res['nominee_name'];
    $nominee_mobile=$res['nominee_mobile'];
    $nominee_relation=$res['nominee_relation'];
    $table.='
            <tr>
                            <td class="">'.$name.'</td>
                            <td class="">'.$username.'</td>
                            <td class="">'.$sponsor_name.'</td>
                            <td class="">'.$sponsorid.'</td>
                            <td class="">'.$email.'</td>
                            <td class="">'.$mobile.'</td>
                            <td class="">'.$date.'</td>
                            <td class="">'.$dist_aadhar.'</td>
                            <td class="">'.$dist_pan.'</td>
                            <td class="">'.$dist_address.'</td>
                            <td class="">'.$dist_accNo.'</td>
                            <td class="">'.$dist_bank_name.'</td>
                            <td class="">'.$dist_bank_branch.'</td>
                            <td class="">'.$dist_bank_ifsc.'</td>
                            <td class="">'.$nominee_name.'</td>
                            <td class="">'.$nominee_mobile.'</td>
                            <td class="">'.$nominee_relation.'</td>
                           <td onclick="viewGeneologyDetails(this);"><a href="javascript:void(0)"><span style="color: #d9741b;font-weight: 550;">VIEW DETAILS</span></a></td>
                        </tr>';
}
$table.='</tbody></table></div>';

echo json_encode(array("res"=> 1, "geneologylist" => $table));
?>