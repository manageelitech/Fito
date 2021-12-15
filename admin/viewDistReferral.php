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
                            <th>Homeshoppee Id</th>
                            <th>BV</th>
                            <th>Purchse Date</th>
                            <th>Added Date</th>
                            <th>Delete</th>
                        </tr>
                        </thead>
                        <tbody>';
$slno = 0;
$qry=mysqli_query($conn,"SELECT * FROM referal_bv");
												while($res=mysqli_fetch_array($qry))
												{
													$id=$res["slno"];;
													$dist_id = $res['dist_id'];
													$home_id = $res['homeshoppee_id'];
													$bv=$res['bv'];
													$purchase = $res['date'];
													$added = $res['added_date'];
													$slno++;
                                                    $table.='
            <tr>
                             <td class="hide">'.$id.'</td>
                            <td class="">'.$slno.'</td>
                            <td class="">'.$dist_id.'</td>
                            <td class="">'.$home_id.'</td>
                            <td class="">'.$bv.'</td>
                            <td class="">'.$purchase.'</td>
                            <td class="">'.$added.'</td>
                            <td onclick="deleteDistReferal(this);"><a href="javascript:void(0)"><i class="fa fa-trash" style="color: red;font-size: 20px;"></i></a></td> 
                        </tr>';
                                                }
$table.='</tbody></table></div>';

echo json_encode(array("res"=> 1, "distlist" => $table));
?>