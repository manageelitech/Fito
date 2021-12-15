<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type, Content-Range, Content-Disposition, Content-Description');
include_once('connection.php');
$connobj = new connClass();
$conn=$connobj->conn;
$schExt=$connobj->schExt;
$table='';
$table.=  '<div class="box-body table-responsive no-padding"><table  class="table table-hover" id="producttable">
                        <thead>
                        <tr>
                            <th class="hide">Id</th>
                            <th>SL No</th>
                            <th>Category Code</th>
                            <th>Category Name</th>
                            <th>Delete</th>
                            <th>Edit</th>
                        </tr>
                        </thead>
                        <tbody>';
$sl = 0;
$qry=mysqli_query($conn,"SELECT * FROM `product_category` ORDER by slno ASC ");
while($res=mysqli_fetch_array($qry))
{
    $sl++;
    $id=$res["slno"];
    $name=$res['name'];
    $table.='
            <tr>
                            <td class="hide">'.$id.'</td>
                            <td class="">'.$sl.'</td>
                            <td class="">'.$id.'</td>
                            <td class="">'.$name.'</td>
                            <td onclick="deleteCategory(this);"><a href="javascript:void(0)"><i class="fa fa-trash" style="color: red;font-size: 20px;"></i></a></td>
                            <td onclick="openUpdateCatModal(this);"><a href="javascript:void(0)"><i class="fa fa-pencil-square-o" style="color: blue;font-size: 20px;"></i></a></td>
                        </tr>';

}
$table.='</tbody></table></div>';

echo json_encode(array("res"=> 1, "productlist" => $table));
?>