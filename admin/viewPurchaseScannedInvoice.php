<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type, Content-Range, Content-Disposition, Content-Description');
include_once('connection.php');
$connobj = new connClass();
$conn=$connobj->conn;
$schExt=$connobj->schExt;
$table='';
$table.=  '<div class="box-body table-responsive no-padding"><table  class="table table-hover" id="scannedtable">
                        <thead>
                        <tr>
                            <th class="hide">Id</th>
                            <th>Delete</th>
                            <th>Invoice No</th>
                            <th>Date</th>
                            <th>File</th>
                        </tr>
                        </thead>
                        <tbody>';

$qry=mysqli_query($conn,"SELECT * FROM purchaseinvoice order by date desc");
												while($res=mysqli_fetch_array($qry))
												{
													$id=$res["slno"];
													$invno=$res['invno'];
													$date=$res['date'];
													$file=$res['file'];
                                                    $table.='
            <tr>
                            <td class="hide">'.$id.'</td>
                            <td onclick="deleteSacnned(this);"><a href="javascript:void(0)"><i class="fa fa-trash" style="color: red;font-size: 20px;"></i></a></td>
                            <td class="">'.$invno.'</td>
                            <td class="">'.$date.'</td>
                            <td class=""><a href="backend/purchase/'.$file.'" target="_blank"  style="color: darkblue;">View File</a></td>
                            
                        </tr>';
                                                }
$table.='</tbody></table></div>';

echo json_encode(array("res"=> 1, "scannedlist" => $table));
?>