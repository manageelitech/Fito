<?php
require_once("dbcontroller.php");
$db_handle = new DBController();
if(!empty($_POST["keyword"])) {
$query ="SELECT * FROM products WHERE product_name like '%" . $_POST["keyword"] . "%' ORDER BY product_name LIMIT 0,10";
$result = $db_handle->runQuery($query);
if(!empty($result)) {
?>
<ul id="country-list" style="z-index: 1;">
<?php
foreach($result as $country) {
?>
<li onClick="selectCountry('<?php echo $country["product_code"]; ?>');"><?php echo $country["product_name"].'<br> MRP : '.$country["mrp"].' ADCP : '.$country["dp"]; ?></li>
<?php } ?>
</ul>
<?php } } ?>