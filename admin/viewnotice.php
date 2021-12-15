<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type, Content-Range, Content-Disposition, Content-Description');
include_once('connection.php');
$connobj = new connClass();
$conn=$connobj->conn;
$schExt=$connobj->schExt;
$table='';
$table.=  '<div class="box-body table-responsive no-padding"><table  class="table table-hover" id="noticetable">
                        <thead>
                        <tr>
                            <th class="hide">Id</th>
                            <th>Delete</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Date</th>
                            <th>File</th>
                        </tr>
                        </thead>
                        <tbody>';

$qry=mysqli_query($conn,"SELECT id,title,description,date,filename FROM latest_notice order by date desc");
												while($res=mysqli_fetch_array($qry))
												{
													$id=$res["id"];
													$title=$res['title'];
													$desc=$res['description'];
													$posttime=$res['date'];
													$file=$res['filename'];
                                                    $table.='
            <tr>
                            <td class="hide">'.$id.'</td>
                            <td onclick="deleteNotice(this);"><a href="javascript:void(0)"><i class="fa fa-trash" style="color: red;font-size: 20px;"></i></a></td>
                            <td class="">'.$title.'</td>
                            <td class="">'.$desc.'</td>
                            <td class="">'.$posttime.'</td>';
                                                    if ($file!="")
                                                    {
                                                        $table.= '<td style="width: 15%;"><img src="backend/notice/'.$file.'" style="widows: 200px;height: 150px;"></td>';
                                                    }
                                                    else
                                                    {
                                                        $table.= '<td style="width: 15%;">NO FILE</td>';
                                                    }
                       $table.= '</tr>';
                                                }
$table.='</tbody></table></div>';

echo json_encode(array("res"=> 1, "noticelist" => $table));
?>