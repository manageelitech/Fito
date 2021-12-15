<?php
$servername = "localhost";
$username = "root";
$password = "";
$db = "fitohm";


// $conn = mysqli_connect($servername, $username, $password,$db);
$conn = mysqli_connect("sql207.epizy.com", "epiz_26882708", "q6bSiHHKHj", "epiz_26882708_fitohm");



$bv_qry = mysqli_query($conn,"select userid,CBP,TBP from distributor_bp");
while ($bv_res = mysqli_fetch_array($bv_qry)) {
    $user = $bv_res['userid'];
    $cbp = $bv_res['CBP'];
    $tbp = $bv_res['TBP'];

    //calculation for end of month
    $pbp = floatval($tbp)+floatval($cbp);
    mysqli_query($conn,"update distributor_bp set CBP='0', TBP='$pbp' where userid='$user'");

    //echo 'User : '.$user.'- CBP : '.$cbp.'- TBP : '.$tbp.'<br>';
    }
?>