<?php
date_default_timezone_set('Asia/Kolkata');
include_once('admin/connection.php');
$connobj = new connClass();
$conn=$connobj->conn;
$schExt=$connobj->schExt;

include_once 'header.php';

?>
<div class="row" style="margin-top: 100px;margin-left: 10px;margin-right: 10px;color: white;">
    <h2>Monthly Offers</h2>
    <?php
    $month = date('m');
    $mo_qry = mysqli_query($conn,"select * from monthly_offers where month='$month'");
    while ($mo_res = mysqli_fetch_array($mo_qry)){
        echo $mo_res['desccription'];
    }
    ?>
</div>
<?php
include_once 'footer.php';
?>


