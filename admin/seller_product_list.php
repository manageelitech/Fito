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
                            <th>Name</th>
                            <th>HSN Code</th>
                            <th>MRP</th>
                            <th>Offer</th>
                            <th>Giving Proce</th>
                            <th>Retail Price</th>
                            <th>GST %</th>
                            <th>Stock</th>
                            <th>Seller</th>
                            <th>Delete</th>
                            <th>Update</th>
                        </tr>
                        </thead>
                        <tbody>';
$slno = 0;
$qry=mysqli_query($conn,"SELECT * FROM products where status=0");
while($res=mysqli_fetch_array($qry))
{
    $id=$res["slno"];
    $code=$res['product_code'];
    $name=$res['product_name'];
    $category=$res['category'];
    $cat_qry = mysqli_query($conn,"select * from product_category where slno='$category'");
    if ($cat_res = mysqli_fetch_array($cat_qry)){
        $category = $cat_res['name'];
    }
    $sub_category=$res['sub_category'];
    $cat_qry = mysqli_query($conn,"select * from product_sub_category where slno='$sub_category'");
    if ($cat_res = mysqli_fetch_array($cat_qry)){
        $sub_category = $cat_res['name'];
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
    $offer = $res['offer'];
    $giving = $res['giving'];
    $retail = $res['retail'];
    $seller_id = $res['seller_id'];
    $slno++;
    $table.='
            <tr>
                            <td class="hide">'.$id.'</td>
                            <td class="">'.$slno.'</td>
                            <td class="">'.$name.'</td>
                            <td class="">'.$hsncode.'</td>
                            <td class="">'.$mrp.'</td>
                            <td class="">'.$offer.'</td>
                            <td class="">'.$giving.'</td>
                            <td class="">'.$retail.'</td>
                            <td class="">'.$gst.'</td>
                            <td class="">'.$qty.'</td>
                            <td class="">'.$seller_id.'</td>
                            <td onclick="deleteProduct(this);"><a href="javascript:void(0)"><i class="fa fa-trash" style="color: red;font-size: 20px;"></i></a></td>
                            <td onclick="updateProduct(this);"><a href="javascript:void(0)"><i class="fa fa-edit" style="color: blue;font-size: 20px;"></i></a></td>
                        </tr>';
}
$table.='</tbody></table></div>';

echo json_encode(array("res"=> 1, "productlist" => $table));
?>