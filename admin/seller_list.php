<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type, Content-Range, Content-Disposition, Content-Description');
include_once('connection.php');
$connobj = new connClass();
$conn=$connobj->conn;
$schExt=$connobj->schExt;
$table='';
$table.=  '<div class="box-body table-responsive no-padding"><table  class="table table-hover" id="disttable">
                        <thead>
                        <tr>
                            <th class="hide">Id</th>
                            <th>SL No</th>
                            <th>User Id</th>
                            <th>Store Name</th>
                            <th>Business Type</th>
                            <th>Owner Name</th>
                            <th>Address</th>
                            <th>Mobile No</th>
                            <th>Whatsapp No</th>
                            <th>Joining Date</th>
                        </tr>
                        </thead>
                        <tbody>';
$slno = 0;
$qry=mysqli_query($conn,"SELECT * FROM fito_seller");
												while($res=mysqli_fetch_array($qry))
												{
													$id = $res["slno"];
													$username = $res["username"];
													$store_name = $res['store_name'];
													$business_type = $res['business_type'];
													$owner_name = $res['owner_name'];
													$address = $res['address'];
													$phone = $res['phone'];
													$whatsapp = $res['whatsapp'];
													$date = $res['date'];
													$slno++;
                                                    $table.='
            <tr>
                             <td class="hide">'.$id.'</td>
                            <td class="">'.$slno.'</td>
                            <td class="">'.$username.'</td>
                            <td class="">'.$store_name.'</td>
                            <td class="">'.$business_type.'</td>
                            <td class="">'.$owner_name.'</td>
                            <td class="">'.$address.'</td>
                            <td class="">'.$phone.'</td>
                            <td class="">'.$whatsapp.'</td>
                            <td class="">'.$date.'</td> 
                        </tr>';
                                                }
$table.='</tbody></table></div>';

echo json_encode(array("res"=> 1, "distlist" => $table));
?>