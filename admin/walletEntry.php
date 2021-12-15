<?php
include_once('connection.php');
$connobj = new connClass();
$conn=$connobj->conn;
$schExt=$connobj->schExt;
$count = 0;
$qry1 = mysqli_query($conn,"select id from distributor_info");
while ($qry1res = mysqli_fetch_assoc($qry1)) {
    $dist_id = $qry1res['id'];
//    echo $qry1res['count'];
    $count++;
    $qry = mysqli_query($conn,"select count(*) as count, id from distributor_info where sponsor_id='$dist_id'");
    if ($qryres = mysqli_fetch_assoc($qry)) {
        $wallet = 1000 + 500*$qryres['count'];
        echo  $count.') '.$dist_id.'-'.$qryres['count'].'-'.$wallet.'<br>';
        mysqli_query($conn,"insert into distributor_wallet (userid,`wallet`,total) values ('$dist_id','$wallet','$wallet')");
    }
}

?>
