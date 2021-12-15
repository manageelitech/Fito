<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type, Content-Range, Content-Disposition, Content-Description');
include_once('connection.php');
$connobj = new connClass();
$conn=$connobj->conn;
$schExt=$connobj->schExt;
$goldenColor = '#ecd93c';
$table='';
$uid = mysqli_real_escape_string($conn,$_POST['uid']);

$sponsid = '';
$count = 0;
$total_gbv='';
$matching_gbv='';
$totalmatching_gbv = '';
$earned_amt = '';
$percent = '80%';
$totalearned_amt =0.00;
$down_qry = mysqli_query($conn,"SELECT id FROM  distributor_info WHERE sponsor_id = '$uid'");
while ($down_res = mysqli_fetch_array($down_qry)){
    $id = $down_res['id'];
    $sponsid = $sponsid."'".$down_res['id']."'".',';
    $count++;

    $down_qry1 = mysqli_query($conn,"SELECT CBP FROM  distributor_bp WHERE userid='$id'");
    if ($down_res1 = mysqli_fetch_array($down_qry1)){
        $total_gbv = floatval($total_gbv)+floatval($down_res1['CBP']);
        $matching_gbv = floatval($total_gbv/2);
        $earned_amt = $matching_gbv*0.8;

    }
//                        echo "SELECT TGBP FROM  distributor_bp WHERE userid='$id'<br>";

}
$totalearned_amt = floatval($totalearned_amt)+floatval($earned_amt);
$totalmatching_gbv = floatval($totalmatching_gbv)+floatval($matching_gbv);
$sponsid = rtrim($sponsid, ',');
if ($count == 0){
    $count = 'Nill';
}
if ($total_gbv == ''){
    $total_gbv = 'Nill';
}
if ($matching_gbv == ''){
    $matching_gbv = 'Nill';
    $earned_amt = 'Nill';
    $percent = 'Nill';
}
if ($sponsid == ''){
    $sponsid = "'FITO000'";
}


//LEVEL 2
$count = 0;
$total_gbv='';
$matching_gbv='';
$sponsid1='';
$earned_amt = '';
$percent = '40%';

$down_qry = mysqli_query($conn,"SELECT id FROM  distributor_info WHERE sponsor_id in ($sponsid)");
while ($down_res = mysqli_fetch_array($down_qry)){
    $sponsid1 = $sponsid1."'".$down_res['id']."'".',';
    $id = $down_res['id'];
    $count++;

    $down_qry1 = mysqli_query($conn,"SELECT CBP FROM  distributor_bp WHERE userid='$id'");
    if ($down_res1 = mysqli_fetch_array($down_qry1)){
        $total_gbv = floatval($total_gbv)+floatval($down_res1['CBP']);
        $matching_gbv = floatval($total_gbv/2);
        $earned_amt = $matching_gbv*0.4;
    }
//                        echo "SELECT TGBP FROM  distributor_bp WHERE userid='$id'<br>";

}
$totalearned_amt = floatval($totalearned_amt)+floatval($earned_amt);
$totalmatching_gbv = floatval($totalmatching_gbv)+floatval($matching_gbv);
$sponsid1 = rtrim($sponsid1, ',');
if ($count == 0){
    $count = 'Nill';
}
if ($total_gbv == ''){
    $total_gbv = 'Nill';
}
if ($matching_gbv == ''){
    $matching_gbv = 'Nill';
    $earned_amt = 'Nill';
    $percent = 'Nill';
}
if ($sponsid1 == '') {
    $sponsid1 = "'FITO000'";
}

//LEVEL 3

$count = 0;
$total_gbv='';
$matching_gbv='';
$sponsid2 = '';
$earned_amt = '';
$percent = '10%';
$down_qry = mysqli_query($conn,"SELECT id FROM  distributor_info WHERE sponsor_id in ($sponsid1)");
while ($down_res = mysqli_fetch_array($down_qry)){
    $sponsid2 = $sponsid2."'".$down_res['id']."'".',';
    $id = $down_res['id'];
    $count++;

    $down_qry1 = mysqli_query($conn,"SELECT CBP FROM  distributor_bp WHERE userid='$id'");
    if ($down_res1 = mysqli_fetch_array($down_qry1)){
        $total_gbv = floatval($total_gbv)+floatval($down_res1['CBP']);
        $matching_gbv = floatval($total_gbv/2);
        $earned_amt = $matching_gbv*0.1;
    }
//                        echo "SELECT TGBP FROM  distributor_bp WHERE userid='$id'<br>";

}
$totalearned_amt = floatval($totalearned_amt)+floatval($earned_amt);
$totalmatching_gbv = floatval($totalmatching_gbv)+floatval($matching_gbv);
$sponsid2 = rtrim($sponsid2, ',');
if ($count == 0){
    $count = 'Nill';
}
if ($total_gbv == ''){
    $total_gbv = 'Nill';
}
if ($matching_gbv == ''){
    $matching_gbv = 'Nill';
    $earned_amt = 'Nill';
    $percent = 'Nill';
}
if ($sponsid2 == ''){
    $sponsid2 = "'FITO000'";
}

//LEVEL 4

$count = 0;
$total_gbv='';
$matching_gbv='';
$sponsid3 = '';
$earned_amt = '';
$percent = '10%';
$down_qry = mysqli_query($conn,"SELECT id FROM  distributor_info WHERE sponsor_id in ($sponsid2)");
while ($down_res = mysqli_fetch_array($down_qry)){
    $sponsid3 = $sponsid3."'".$down_res['id']."'".',';
    $id = $down_res['id'];
    $count++;

    $down_qry1 = mysqli_query($conn,"SELECT CBP FROM  distributor_bp WHERE userid='$id'");
    if ($down_res1 = mysqli_fetch_array($down_qry1)){
        $total_gbv = floatval($total_gbv)+floatval($down_res1['CBP']);
        $matching_gbv = floatval($total_gbv/2);
        $earned_amt = $matching_gbv*0.1;
    }
//                        echo "SELECT TGBP FROM  distributor_bp WHERE userid='$id'<br>";

}
$totalearned_amt = floatval($totalearned_amt)+floatval($earned_amt);
$totalmatching_gbv = floatval($totalmatching_gbv)+floatval($matching_gbv);
$sponsid3 = rtrim($sponsid3, ',');
if ($count == 0){
    $count = 'Nill';
}
if ($total_gbv == ''){
    $total_gbv = 'Nill';
}
if ($matching_gbv == ''){
    $matching_gbv = 'Nill';
    $earned_amt = 'Nill';
    $percent = 'Nill';
}
if ($sponsid3 == ''){
    $sponsid3 = "'FITO000'";
}

//LEVEL 5

$count = 0;
$total_gbv='';
$matching_gbv='';
$sponsid4 = '';
$earned_amt = '';
$percent = '10%';
$down_qry = mysqli_query($conn,"SELECT id FROM  distributor_info WHERE sponsor_id in ($sponsid3)");
while ($down_res = mysqli_fetch_array($down_qry)){
    $sponsid4 = $sponsid4."'".$down_res['id']."'".',';
    $id = $down_res['id'];
    $count++;

    $down_qry1 = mysqli_query($conn,"SELECT CBP FROM  distributor_bp WHERE userid='$id'");
    if ($down_res1 = mysqli_fetch_array($down_qry1)){
        $total_gbv = floatval($total_gbv)+floatval($down_res1['CBP']);
        $matching_gbv = floatval($total_gbv/2);
        $earned_amt = $matching_gbv*0.1;
    }
//                        echo "SELECT TGBP FROM  distributor_bp WHERE userid='$id'<br>";

}
$totalearned_amt = floatval($totalearned_amt)+floatval($earned_amt);
$totalmatching_gbv = floatval($totalmatching_gbv)+floatval($matching_gbv);
$sponsid4 = rtrim($sponsid4, ',');
if ($count == 0){
    $count = 'Nill';
}
if ($total_gbv == ''){
    $total_gbv = 'Nill';
}
if ($matching_gbv == ''){
    $matching_gbv = 'Nill';
    $earned_amt = 'Nill';
    $percent = 'Nill';
}
if ($sponsid4 == ''){
    $sponsid4 = "'FITO000'";
}

//LEVEL 6

$count = 0;
$total_gbv='';
$matching_gbv='';
$sponsid5 = '';
$earned_amt = '';
$percent = '10%';
$down_qry = mysqli_query($conn,"SELECT id FROM  distributor_info WHERE sponsor_id in ($sponsid4)");
while ($down_res = mysqli_fetch_array($down_qry)){
    $sponsid5 = $sponsid5."'".$down_res['id']."'".',';
    $id = $down_res['id'];
    $count++;

    $down_qry1 = mysqli_query($conn,"SELECT CBP FROM  distributor_bp WHERE userid='$id'");
    if ($down_res1 = mysqli_fetch_array($down_qry1)){
        $total_gbv = floatval($total_gbv)+floatval($down_res1['CBP']);
        $matching_gbv = floatval($total_gbv/2);
        $earned_amt = $matching_gbv*0.1;
    }
//                        echo "SELECT TGBP FROM  distributor_bp WHERE userid='$id'<br>";

}
$totalearned_amt = floatval($totalearned_amt)+floatval($earned_amt);
$totalmatching_gbv = floatval($totalmatching_gbv)+floatval($matching_gbv);
$sponsid5 = rtrim($sponsid5, ',');
if ($count == 0){
    $count = 'Nill';
}
if ($total_gbv == ''){
    $total_gbv = 'Nill';
}
if ($matching_gbv == ''){
    $matching_gbv = 'Nill';
    $earned_amt = 'Nill';
    $percent = 'Nill';
}
if ($sponsid5 == ''){
    $sponsid5 = "'FITO000'";
}
$table.= '<tr>
                   <td style="border: 2px solid black;">6</td>
                   <td style="border: 2px solid black;">LEVEL 6</td>
                   <td style="border: 2px solid black;">'.$count.'</td>
                  <td style="border: 2px solid black;">'.$total_gbv.'</td>
                  <td style="border: 2px solid black;">'.$matching_gbv.'</td>
                  <td style="border: 2px solid black;">'.$percent.'</td>
                  <td style="border: 2px solid black;">'.$earned_amt.'</td></tr>';

//LEVEL 7

$count = 0;
$total_gbv='';
$matching_gbv='';
$sponsid6 = '';
$earned_amt = '';
$service_amt = '';
$down_qry = mysqli_query($conn,"SELECT id FROM  distributor_info WHERE sponsor_id in ($sponsid5)");
while ($down_res = mysqli_fetch_array($down_qry)){
    $sponsid6 = $sponsid6."'".$down_res['id']."'".',';
    $id = $down_res['id'];
    $count++;

    $down_qry1 = mysqli_query($conn,"SELECT CBP FROM  distributor_bp WHERE userid='$id'");
    if ($down_res1 = mysqli_fetch_array($down_qry1)){
        $total_gbv = floatval($total_gbv)+floatval($down_res1['CBP']);
        $matching_gbv = floatval($total_gbv/2);
        $earned_amt = $matching_gbv*0.1;
    }
//                        echo "SELECT TGBP FROM  distributor_bp WHERE userid='$id'<br>";

}
$totalearned_amt = floatval($totalearned_amt)+floatval($earned_amt);
$totalmatching_gbv = floatval($totalmatching_gbv)+floatval($matching_gbv);
$sponsid6 = rtrim($sponsid6, ',');
if ($count == 0){
    $count = 'Nill';
}
if ($total_gbv == ''){
    $total_gbv = 'Nill';
}
if ($matching_gbv == ''){
    $matching_gbv = 'Nill';
    $earned_amt = 'Nill';
    $percent = 'Nill';
}
if ($sponsid6 == ''){
    $sponsid6 = "'FITO000'";
}
if($totalearned_amt >= 5000){
    $tds_amt = floatval($totalearned_amt*0.05);
}
else{
    $tds_amt = 0;
}

$service_amt = floatval($totalearned_amt*0.05);


$net_amt = floatval($totalearned_amt-$tds_amt-$service_amt);
$table.= '<tr>
                   <td style="border-left: 2px solid black;border-bottom: 2px solid black;"></td>
                   <td style="border-bottom: 2px solid black;"></td>
                   <td style="border-bottom: 2px solid black;"></td>
                   <td style="border-bottom: 2px solid black;"></td>
                   <td style="border-bottom: 2px solid black;"></td>
                  <td style="border: 2px solid black;">Net Amount</td>
                  <td style="border: 2px solid black;">'.$net_amt.'</td></tr>';

$table.='</tbody></table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>
            ';
$balance_amt = number_format($net_amt, 2);

if ($net_amt >= 200){
    $data.=  '
                    <p>
                    <span style="background: #338c0b;color: white;padding: 5px 10px;border-radius: 4px;font-weight: bold;">Available Balance : ₹ '.$balance_amt.'</span>
</p>';
    $data.=  '<span style="color: white;background: #338c0b;padding: 5px 10px;cursor: pointer;">Click here to redeem your balace</span>';
}
else{
    $data.=  '
                    <p>
                    <span style="background: #ff7800;color: white;padding: 5px 10px;border-radius: 4px;font-weight: bold;">Available Balance : ₹ '.$balance_amt.'</span>
</p>';
    $data.=  '<span style="color: red;">* You are not eligible for payout.</span>';
}


echo json_encode(array("res"=> 1,"balance"=>$data));
?>