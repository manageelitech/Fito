<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type, Content-Range, Content-Disposition, Content-Description');
include_once('connection.php');
$connobj = new connClass();
$conn=$connobj->conn;
$schExt=$connobj->schExt;
$table='';
$table.=  '<div class="box-body table-responsive no-padding"><table  class="table table-hover" id="pageimgtable">
                        <thead>
                        <tr>
                            <th class="hide">Id</th>
                            <th>Delete</th>
                            <th>Page Name</th>
                            <th>Date</th>
                            <th>Image</th>
                        </tr>
                        </thead>
                        <tbody>';

$qry=mysqli_query($conn,"SELECT id,title, date,filename,pagename FROM pageimg order by date desc");
												while($res=mysqli_fetch_array($qry))
												{
													$id=$res["id"];
													$title=$res['title'];
													$posttime=$res['date'];
													$file=$res['filename'];
													$pagename=$res['pagename'];
                                                    $table.='
            <tr>
                            <td class="hide">'.$id.'</td>
                            <td onclick="deletepageimg(this);"><a href="javascript:void(0)"><i class="fa fa-trash" style="color: red;font-size: 20px;"></i></a></td>
                            <td class="">'.$pagename.'</td>
                            <td class="">'.$posttime.'</td>
                            <td style="width: 15%;"><img src="backend/pages/'.$file.'" style="widows: 200px;height: 150px;;"></td>
                        </tr>';
                                                }
$table.='</tbody></table></div>';

echo json_encode(array("res"=> 1, "pageimglist" => $table));
?>