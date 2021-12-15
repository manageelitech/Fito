<?php

include_once('connection.php');
$connobj = new connClass();
$conn=$connobj->conn;
$schExt=$connobj->schExt;

$total_count = 0;
$update_count = 0;
$insert_count = 0;
if(isset($_POST["product_code"]))
{
    $product_code = $_POST["product_code"];
    $product_name = $_POST["product_name"];
    $hsn = $_POST["hsn"];
    $gst = $_POST["gst"];
    $mrp = $_POST["mrp"];
    $dp = $_POST["dp"];
    $bv = $_POST["bv"];
    $category = $_POST["category"];
    $sub_category = $_POST["sub_category"];
    $quantity = $_POST["quantity"];
    $image = $_POST["image"];
    $description = $_POST["description"];

    for($count = 0; $count < count($product_code); $count++)
    {
        $checkqry = $conn->query("select * from products where product_code = '".$product_code[$count]."'");
        $rows = $checkqry->num_rows;
        if ($rows > 0){
//            $update = $conn->query("update products set mrp = '".$mrp[$count]."',dp = '".$dp[$count]."',bv = '".$bv[$count]."',category = '".$category[$count]."',sub_category = '".$sub_category[$count]."',product_quantity = '".$quantity[$count]."',product_image = '".$image[$count]."',product_desc = '".$description[$count]."' where product_code = '".$product_code[$count]."'");
            $update = $conn->query("update products set mrp = '".$mrp[$count]."',dp = '".$dp[$count]."',bv = '".$bv[$count]."' where product_code = '".$product_code[$count]."'");
            $update_count++;
        }
        else{
            $insert = $conn->query("INSERT INTO `products`(`product_code`, `product_name`, `category`, `sub_category`, `hsncode`, `mrp`, `dp`, `bv`, `gst`, `product_image`,  `product_quantity`,product_desc) VALUES ('".$product_code[$count]."','".$product_name[$count]."','".$category[$count]."','".$sub_category[$count]."','".$hsn[$count]."','".$mrp[$count]."','".$dp[$count]."','".$bv[$count]."','".$gst[$count]."','".$image[$count]."','".$quantity[$count]."','".$description[$count]."')");
            $insert_count++;
        }
        $total_count++;
    }
}
echo json_encode(array("total" => $total_count, "update" => $update_count, "insert" => $insert_count));

?>