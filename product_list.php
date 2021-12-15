<?php
date_default_timezone_set('Asia/Kolkata');
include_once('admin/connection.php');
$connobj = new connClass();
$conn=$connobj->conn;
$schExt=$connobj->schExt;

include_once 'header.php';
?>
<style>
#producttable_wrapper{
    margin-top: 126px;
    background: aliceblue;
}
</style>
<?php

$table='';
$table.=  '<table class="table table-hover" id="producttable" style="background: aliceblue;color: black;">
                        <thead>
                        <tr>
                            <th class="hide">Id</th>
                            <th>SL No</th>
                            <th>Code</th>
                            <th>Name</th>
                            <th>MRP</th>
                            <th>DP</th>
                            <th>BV</th>
                        </tr>
                        </thead>
                        <tbody>';
$slno = 0;
$qry=mysqli_query($conn,"SELECT * FROM products where status=1");
while($res=mysqli_fetch_array($qry))
{
    $id=$res["slno"];
    $code=$res['product_code'];
    $name=$res['product_name'];
    $category=$res['category'];
    $cat_qry = mysqli_query($conn,"select * from product_category where id='$category'");
    if ($cat_res = mysqli_fetch_array($cat_qry)){
        $category = $cat_res['name'];
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
                            <td class="">'.$mrp.'</td>
                            <td class="">'.$dp.'</td>
                            <td class="">'.$bv.'</td>
                        </tr>';
}
$table.='</tbody></table></div>';

echo $table;

?>

<?php

include_once 'footer.php';

?>
<script src="admin/assets/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="admin/assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>

<!--<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>-->
<script src="https://cdn.datatables.net/buttons/1.6.0/js/dataTables.buttons.min.js"></script>

<script>
$('document').ready(function(){
    $('#producttable').DataTable();
    //alert('hi');
});
</script>

