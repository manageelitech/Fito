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
$table.= '
<style>
.goldenbg{
background: #ecd93c;
}
.green{
background: #35a737;
}
.pink{
background: #ff3ca1;
}
</style>
<div class="row">
        <div class="col-xs-12">
          <div class="box">         
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover table-bordered table-responsive" style="font-weight: bold;text-align: center;">
                <tbody>';
               $table.= ' <tr>
                <td colspan="4" style="border: 2px solid black;background: #58bc38;color: white;text-align: center;font-weight: bold;font-size: 20px;">DOWNLINE LEVEL INCOME</td>
                </tr></tbody></table>';
$table.= '<table class="table table-hover table-bordered table-responsive" style="font-weight: bold;text-align: center;">
                <tbody><tr>
                  <th style="border: 2px solid black;">S NO</th>
                  <th style="border: 2px solid black;">Level</th>
                  <th style="border: 2px solid black;">Team Members</th>
                  <th style="border: 2px solid black;">Total GBV</th>
                  <th style="border: 2px solid black;">Matching GBV</th>
                  <th style="border: 2px solid black;">Percentage</th>
                  <th style="border: 2px solid black;">Earned Amount /Rs.</th>
                  <th style="border: 2px solid black;">Referral </th>
                </tr>';
            $sponsid = '';
            $count = 0;
            $total_gbv='';
$matching_gbv='';
$totalmatching_gbv = '';
$earned_amt = '';
$ref_bal = 0;
$total_ref_bal = 0;
$percent = '80%';
$totalearned_amt =0.00;
                    $down_qry = mysqli_query($conn,"SELECT id FROM  distributor_info WHERE sponsor_id = '$uid'");
                    while ($down_res = mysqli_fetch_array($down_qry)){
                        $sponsid = $sponsid."'".$down_res['id']."'".',';
                        $id = $down_res['id'];
                        $count++;

                        $down_qry1 = mysqli_query($conn,"SELECT CBP FROM  distributor_bp WHERE userid='$id'");
                        if ($down_res1 = mysqli_fetch_array($down_qry1)){
                            $total_gbv = floatval($total_gbv)+floatval($down_res1['CBP']);
                            $matching_gbv = floatval($total_gbv/2);
                            $earned_amt = $matching_gbv*0.8;
//                            $earned_amt = number_format($earned_amt, 2);

                        }
                        $ref_qry = mysqli_query($conn,"SELECT joinin_ref FROM  distributor_info WHERE id='$id'");
                        if ($ref_res = mysqli_fetch_array($ref_qry)){
                            $ref_bal = floatval($ref_bal)+floatval($ref_res['joinin_ref']);
                        }

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
$total_ref_bal = floatval($total_ref_bal)+floatval($ref_bal);
$table.= '<tr>
                   <td style="border: 2px solid black;">1</td>
                   <td style="border: 2px solid black;">LEVEL 1</td>
                   <td style="border: 2px solid black;">'.$count.'</td>
                  <td style="border: 2px solid black;">'.$total_gbv.'</td>
                  <td style="border: 2px solid black;">'.$matching_gbv.'</td>
                  <td style="border: 2px solid black;">'.$percent.'</td>
                  <td style="border: 2px solid black;">'.$earned_amt.'</td>
                  <td style="border: 2px solid black;">'.$ref_bal.'</td></tr>';


//LEVEL 2
$count = 0;
$total_gbv='';
$matching_gbv='';
$sponsid1='';
$earned_amt = '';
$ref_bal = 0;
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
    $ref_qry = mysqli_query($conn,"SELECT joinin_ref FROM  distributor_info WHERE id='$id'");
    if ($ref_res = mysqli_fetch_array($ref_qry)){
        $ref_bal = floatval($ref_bal)+floatval($ref_res['joinin_ref']);
    }

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
if ($sponsid1 == ''){
    $sponsid1 = "'FITO000'";
}
$total_ref_bal = floatval($total_ref_bal)+floatval($ref_bal);
$table.= '<tr>
                   <td style="border: 2px solid black;">2</td>
                   <td style="border: 2px solid black;">LEVEL 2</td>
                   <td style="border: 2px solid black;">'.$count.'</td>
                  <td style="border: 2px solid black;">'.$total_gbv.'</td>
                  <td style="border: 2px solid black;">'.$matching_gbv.'</td>
                  <td style="border: 2px solid black;">'.$percent.'</td>
                  <td style="border: 2px solid black;">'.$earned_amt.'</td>
                  <td style="border: 2px solid black;">'.$ref_bal.'</td></tr>';

//LEVEL 3

$count = 0;
$total_gbv='';
$matching_gbv='';
$sponsid2 = '';
$earned_amt = '';
$ref_bal = 0;
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
    $ref_qry = mysqli_query($conn,"SELECT joinin_ref FROM  distributor_info WHERE id='$id'");
    if ($ref_res = mysqli_fetch_array($ref_qry)){
        $ref_bal = floatval($ref_bal)+floatval($ref_res['joinin_ref']);
    }

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
$total_ref_bal = floatval($total_ref_bal)+floatval($ref_bal);
$table.= '<tr>
                   <td style="border: 2px solid black;">3</td>
                   <td style="border: 2px solid black;">LEVEL 3</td>
                   <td style="border: 2px solid black;">'.$count.'</td>
                  <td style="border: 2px solid black;">'.$total_gbv.'</td>
                  <td style="border: 2px solid black;">'.$matching_gbv.'</td>
                  <td style="border: 2px solid black;">'.$percent.'</td>
                  <td style="border: 2px solid black;">'.$earned_amt.'</td>
                  <td style="border: 2px solid black;">'.$ref_bal.'</td></tr>';

//LEVEL 4

$count = 0;
$total_gbv='';
$matching_gbv='';
$sponsid3 = '';
$earned_amt = '';
$ref_bal = 0;
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
    $ref_qry = mysqli_query($conn,"SELECT joinin_ref FROM  distributor_info WHERE id='$id'");
    if ($ref_res = mysqli_fetch_array($ref_qry)){
        $ref_bal = floatval($ref_bal)+floatval($ref_res['joinin_ref']);
    }

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
$total_ref_bal = floatval($total_ref_bal)+floatval($ref_bal);
$table.= '<tr>
                   <td style="border: 2px solid black;">4</td>
                   <td style="border: 2px solid black;">LEVEL 4</td>
                   <td style="border: 2px solid black;">'.$count.'</td>
                  <td style="border: 2px solid black;">'.$total_gbv.'</td>
                  <td style="border: 2px solid black;">'.$matching_gbv.'</td>
                  <td style="border: 2px solid black;">'.$percent.'</td>
                  <td style="border: 2px solid black;">'.$earned_amt.'</td>
                  <td style="border: 2px solid black;">'.$ref_bal.'</td></tr>';

//LEVEL 5

$count = 0;
$total_gbv='';
$matching_gbv='';
$sponsid4 = '';
$earned_amt = '';
$ref_bal = 0;
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
    $ref_qry = mysqli_query($conn,"SELECT joinin_ref FROM  distributor_info WHERE id='$id'");
    if ($ref_res = mysqli_fetch_array($ref_qry)){
        $ref_bal = floatval($ref_bal)+floatval($ref_res['joinin_ref']);
    }

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
$total_ref_bal = floatval($total_ref_bal)+floatval($ref_bal);
$table.= '<tr>
                   <td style="border: 2px solid black;">5</td>
                   <td style="border: 2px solid black;">LEVEL 5</td>
                   <td style="border: 2px solid black;">'.$count.'</td>
                  <td style="border: 2px solid black;">'.$total_gbv.'</td>
                  <td style="border: 2px solid black;">'.$matching_gbv.'</td>
                  <td style="border: 2px solid black;">'.$percent.'</td>
                  <td style="border: 2px solid black;">'.$earned_amt.'</td>
                  <td style="border: 2px solid black;">'.$ref_bal.'</td></tr>';

//LEVEL 6

$count = 0;
$total_gbv='';
$matching_gbv='';
$sponsid5 = '';
$earned_amt = '';
$ref_bal = 0;
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
    $ref_qry = mysqli_query($conn,"SELECT joinin_ref FROM  distributor_info WHERE id='$id'");
    if ($ref_res = mysqli_fetch_array($ref_qry)){
        $ref_bal = floatval($ref_bal)+floatval($ref_res['joinin_ref']);
    }

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
$total_ref_bal = floatval($total_ref_bal)+floatval($ref_bal);
$table.= '<tr>
                   <td style="border: 2px solid black;">6</td>
                   <td style="border: 2px solid black;">LEVEL 6</td>
                   <td style="border: 2px solid black;">'.$count.'</td>
                  <td style="border: 2px solid black;">'.$total_gbv.'</td>
                  <td style="border: 2px solid black;">'.$matching_gbv.'</td>
                  <td style="border: 2px solid black;">'.$percent.'</td>
                  <td style="border: 2px solid black;">'.$earned_amt.'</td>
                  <td style="border: 2px solid black;">'.$ref_bal.'</td></tr>';

//LEVEL 7

$count = 0;
$total_gbv='';
$matching_gbv='';
$sponsid6 = '';
$earned_amt = '';
$ref_bal = 0;
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
    $ref_qry = mysqli_query($conn,"SELECT joinin_ref FROM  distributor_info WHERE id='$id'");
    if ($ref_res = mysqli_fetch_array($ref_qry)){
        $ref_bal = floatval($ref_bal)+floatval($ref_res['joinin_ref']);
    }

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
$total_ref_bal = floatval($total_ref_bal)+floatval($ref_bal);
$table.= '<tr>
                   <td style="border: 2px solid black;">7</td>
                   <td style="border: 2px solid black;">LEVEL 7</td>
                   <td style="border: 2px solid black;">'.$count.'</td>
                  <td style="border: 2px solid black;">'.$total_gbv.'</td>
                  <td style="border: 2px solid black;">'.$matching_gbv.'</td>
                  <td style="border: 2px solid black;">'.$percent.'</td>
                  <td style="border: 2px solid black;">'.$earned_amt.'</td>
                  <td style="border: 2px solid black;">'.$ref_bal.'</td></tr>';

$table.= '<tr>
                   <td style="border-left: 2px solid black;border-bottom: 2px solid black;"></td>
                   <td style="border-bottom: 2px solid black;"></td>
                   <td style="border-bottom: 2px solid black;"></td>
                   <td style="border-bottom: 2px solid black;"></td>
                  <td style="border: 2px solid black;">'.$totalmatching_gbv.'</td>
                  <td style="border: 2px solid black;">Total</td>
                  <td style="border: 2px solid black;">'.$totalearned_amt.'</td>
                  <td style="border: 2px solid black;">'.$total_ref_bal.'</td></tr>';
                  if($totalearned_amt >= 5000){
                      $tds_amt = floatval($totalearned_amt*0.05);
                  }
                  else{
                      $tds_amt = 0;
                  }


$service_amt = floatval($totalearned_amt*0.05);

$table.= '<tr>
                   <td style="border-left: 2px solid black;border-bottom: 2px solid black;"></td>
                   <td style="border-bottom: 2px solid black;"></td>
                   <td style="border-bottom: 2px solid black;"></td>
                   <td style="border-bottom: 2px solid black;"></td>
                   <td style="border-bottom: 2px solid black;"></td>
                  <td style="border: 2px solid black;">TDS 5%(above 5000)</td>
                  <td style="border: 2px solid black;">'.$tds_amt.'</td></tr>
                  <tr>
                   <td style="border-left: 2px solid black;border-bottom: 2px solid black;"></td>
                   <td style="border-bottom: 2px solid black;"></td>
                   <td style="border-bottom: 2px solid black;"></td>
                   <td style="border-bottom: 2px solid black;"></td>
                   <td style="border-bottom: 2px solid black;"></td>
                  <td style="border: 2px solid black;">Service Charge 5%</td>
                  <td style="border: 2px solid black;">'.$service_amt.'</td></tr>
                  ';
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

echo json_encode(array("res"=> 1, "team" => $table));
?>