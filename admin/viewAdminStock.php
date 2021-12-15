<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type, Content-Range, Content-Disposition, Content-Description');
include_once('connection.php');
$connobj = new connClass();
$conn=$connobj->conn;
$schExt=$connobj->schExt;
$table='';
$uid = mysqli_real_escape_string($conn,$_POST['uid']);
$table.=  '<div class="box-body table-responsive no-padding"><table  class="table table-hover" id="adminstocktable">
                        <thead>
                        <tr>
                            <th class="hide">Id</th>
                            <th>SL No</th>
                            <th>Code</th>
                            <th>Name</th>
                            <th>Category</th>
                            <th>HSN Code</th>
                            <th>MRP</th>
                            <th>DP</th>
                            <th>BV</th>
                            <th>Big Shop %</th>
                            <th>Home Shop %</th>
                            <th>GST %</th>
                            <th>Quantity</th>
                        </tr>
                        </thead>
                        <tbody>';
$slno = 0;
$qry=mysqli_query($conn,"SELECT * FROM products");
while($res=mysqli_fetch_array($qry))
{
    $id=$res["slno"];
    $code=$res['product_code'];
    $name=$res['product_name'];
    $category=$res['category'];
    $cat_qry = mysqli_query($conn,"select * from product_category where id='$category'");{
    if ($cat_res = mysqli_fetch_array($cat_qry)){
        $category = $cat_res['name'];
    }
}
    $product_desc=$res['product_desc'];
    $hsncode=$res['hsncode'];
    $mrp=$res['mrp'];
    $dp=$res['dp'];
    $bv=$res['bv'];
    $bsper=$res['bsper'];
    $hsper=$res['hsper'];
    $gst=$res['gst'];
    $addeddate=$res['addeddate'];
    $updateddate=$res['updateddate'];
    $file=$res['product_image'];
    $qty=$res['product_quantity'];
    $slno++;
    $table.='
            <tr>
                            <td class="hide">'.$id.'</td>
                            <td class="">'.$slno.'</td>
                            <td class="">'.$code.'</td>
                            <td class="">'.$name.'</td>
                            <td class="">'.$category.'</td>
                            <td class="">'.$hsncode.'</td>
                            <td class="">'.$mrp.'</td>
                            <td class="">'.$dp.'</td>
                            <td class="">'.$bv.'</td>
                            <td class="">'.$bsper.'</td>
                            <td class="">'.$hsper.'</td>
                            <td class="">'.$gst.'</td>
                            <td class="">'.$qty.'</td>
                        </tr>';
}
$table.='</tbody></table></div>';

echo json_encode(array("res"=> 1, "adminstocklist" => $table));
?>