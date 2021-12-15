<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type, Content-Range, Content-Disposition, Content-Description');
include_once('connection.php');
include_once('funcls.php');
$connobj = new connClass();
$conn=$connobj->conn;
$schExt=$connobj->schExt;
$obj = new Myclass();

$goldenColor = '#ecd93c';
$table='';
$uid = mysqli_real_escape_string($conn,$_POST['uid']);
$rank = '';
$rankqry = mysqli_query($conn,"SELECT awardNo FROM `reward_status` WHERE rewardstatus='Completed' and userid='$uid' order BY slno DESC LIMIT 1 ");
if($rankRow = mysqli_fetch_assoc($rankqry)) {
    if ($rankRow['awardNo'] == 11) {
        $rank = 'Director';
    } else if ($rankRow['awardNo'] == 12) {
        $rank = 'Silver Director';
    } else if ($rankRow['awardNo'] == 13) {
        $rank = 'Gold Director';
    } else if ($rankRow['awardNo'] == 14) {
        $rank = 'Diamond Director';
    } else if ($rankRow['awardNo'] == 15) {
        $rank = 'Crown Director';
    }
}
else{
    $rank = 'Distributor';
}

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
            <div class="box-header">
              <h3 class="box-title">MY TEAM & STATUS</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover table-bordered table-responsive" style="font-weight: bold;text-align: center;">
                <tbody>';
            $dist_qry = mysqli_query($conn,"select * from distributor_info where id='$uid'");
            if ($dist_res = mysqli_fetch_array($dist_qry)) {
                $name = $dist_res['dist_name'];
                $table.= '<tr>
                  <th style="border: 2px solid black;" class="goldenbg">RANK - '.$rank.'</th>
                  <th style="border: 2px solid black;">SBV(PC)</th>
                  <th style="border: 2px solid black;"> SBV(Total)</th>
                  <th style="border: 2px solid black;">Last Cut of total (M) GBV</th>
                </tr>';
            }
        $bv_qry = mysqli_query($conn,"select * from distributor_bp where userid='$uid'");
        if ($bv_res = mysqli_fetch_array($bv_qry)) {
        $cbp = $bv_res['CBP'];
        $tbp = floatval($bv_res['TBP'])+floatval($bv_res['CBP']);
        $totalbp = floatval($bv_res['TGBP']);


        //echo $obj->getTree($uid);

            $totalTeamCGbv = '';
            $totalTeamPGbv = '';
            $down_qry = mysqli_query($conn,"select * from distributor_info where sponsor_id='$uid'");
            while ($down_res = mysqli_fetch_array($down_qry)) {
                $dname = $down_res['dist_name'];
                $id = $down_res['id'];

                foreach ($obj->getData($id) as $mem){
                    $bv_qry = mysqli_query($conn,"select CBP,TBP from distributor_bp where userid='$mem'");
                    if ($bv_res = mysqli_fetch_array($bv_qry)) {
                        $totalTeamPGbv = floatval($totalTeamPGbv)+floatval($bv_res['TBP']);
//                        echo 'ui : '.$mem.'-'.(int)$bv_res['TBP'].'<br>';
                    }
                }
            }

//            echo $totalTeamPGbv;
            $totalTeamMGbv = floatval($totalTeamPGbv)/2;


            $table.= '<tr>
                  <td style="border: 2px solid black;">ID : '.$uid.'&nbsp;&nbsp; NAME : '.$name.' </td>';
            if ($cbp<50){
                $table.= '
                  <td style="border: 2px solid black;color: white;background: #dd4b39;">'.$cbp.'</td>';
            }
            else{
                $table.= '
                  <td style="border: 2px solid black;color: white;background: #00a65a;">'.$cbp.'</td>';
            }
                  $table.='<td style="border: 2px solid black;">'.$tbp.'</td>
                  <td style="border: 2px solid black;">'.$totalTeamMGbv.'</td>
                </tr>';
        }
        else{
            $table.= '<tr>
                  <td style="border: 2px solid black;">ID : '.$uid.'&nbsp;&nbsp; NAME : '.$name.' </td>';
                $table.= '
                  <td style="border: 2px solid black;color: white;background: #dd4b39;">Nill</td>';
            $table.='<td style="border: 2px solid black;">Nill</td>
                  <td style="border: 2px solid black;">Nill</td>
                </tr>';
        }

               $table.= ' <tr>
                <td colspan="4" style="border: 2px solid black;background: #0d32f9;color: white;text-align: center;font-weight: bold;">Down Line Team Status</td>
                </tr></tbody></table>';
$table.= '<table class="table table-hover table-bordered table-responsive" style="font-weight: bold;text-align: center;">
                <tbody><tr>
                  <th style="border: 2px solid black;">1<sup>st</sup> Level NAMES</th>
                  <th style="border: 2px solid black;">ID No</th>
                  <th style="border: 2px solid black;">(PC)SBV</th>
                  <th style="border: 2px solid black;">All Total SBV</th>
                  <th style="border: 2px solid black;">(LC) TOTAL (M)GBV</th>
                  <th style="border: 2px solid black;">(PC) TOTAL (M)GBV</th>
                  <th style="border: 2px solid black;">GRAND TOTAL (M) GBV</th>
                </tr>';
$gtotal='';
$grandtotal='';
            $down_qry = mysqli_query($conn,"select * from distributor_info where sponsor_id='$uid'");
            while ($down_res = mysqli_fetch_array($down_qry)) {
            $dname = $down_res['dist_name'];
            $id = $down_res['id'];
            $table.= '<tr>
                  <td style="border: 2px solid black;text-align: left">'.$dname.' </td>
                  <td style="border: 2px solid black;">'.$id.'</td>';
//            var_dump( '<br>'.getData($id));


                $totalTeamCGbv = '';
                $totalTeamPGbv = '';
                foreach ($obj->getData($id) as $mem){
                    $bv_qry = mysqli_query($conn,"select CBP,TBP from distributor_bp where userid='$mem'");
                    if ($bv_res = mysqli_fetch_array($bv_qry)) {
                        $totalTeamCGbv = floatval($totalTeamCGbv)+floatval($bv_res['CBP']);
                        $totalTeamPGbv = floatval($totalTeamPGbv)+floatval($bv_res['TBP']);
//                        echo 'ui : '.$mem.'-'.(int)$bv_res['TBP'].'<br>';
                    }
//                    echo $mem;
                }
//                echo '<br>';
                $totalTeamCMGbv = floatval($totalTeamCGbv)/2;
                $totalTeamPMGbv = floatval($totalTeamPGbv)/2;
                $teamGrandMgbv = floatval($totalTeamCMGbv)+floatval($totalTeamPMGbv);


                $bv_qry1 = mysqli_query($conn,"select * from distributor_bp where userid='$id'");
                if ($bv_res1 = mysqli_fetch_array($bv_qry1)) {
                    $csbv = $bv_res1['CBP'];
                    $tsbv = floatval($bv_res1['TBP'])+floatval($bv_res1['CBP']);


                    $gbp1 = $bv_res1['CGBP'];
                    $pmgbv = $bv_res1['TGBP'];
                    $totalgbv = floatval($bv_res1['CGBP'])+floatval($bv_res1['TGBP']);
                    $gtotal = floatval($tsbv)+floatval($totalgbv);
                    $grandtotal = floatval($grandtotal)+floatval($teamGrandMgbv)+floatval(floatval($csbv)/2);
                    $teamGrandMgbv = floatval($teamGrandMgbv)+floatval(floatval($csbv)/2);
                    if ($csbv<10){
                        $table.= '
                  <td style="border: 2px solid black;color: white;background: #dd4b39;">'.$csbv.'</td>';
                    }
                    else{
                        $table.= '
                  <td style="border: 2px solid black;color: white;background: #00a65a;">'.$csbv.'</td>';
                    }
                    $table.= '
                   <td style="border: 2px solid black;">'.$tsbv.'</td>
                   <td style="border: 2px solid black;">'.$totalTeamPMGbv.'</td>
                   <td style="border: 2px solid black;">'.$totalTeamCMGbv.'</td>
                  <td style="border: 2px solid black;">'.$teamGrandMgbv.'</td> ';
                }
                else{
                    $table.= '
                  <td style="border: 2px solid black;"></td>
                   <td style="border: 2px solid black;"></td>
                   <td style="border: 2px solid black;"></td>
                   <td style="border: 2px solid black;"></td>
                  <td style="border: 2px solid black;"></td>';
                }

                $table.='</tr>';
}
                $table.='<tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <th style="border: 2px solid black;">GRAND TOTAL</th>
                    <td style="border: 2px solid black;">'.$grandtotal.'</td>
                    </tr>';
              $table.='</tbody></table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>
            ';

echo json_encode(array("res"=> 1, "team" => $table));

//function getData($id){
//    $down_qry = mysqli_query($conn,"select * from distributor_info where sponsor_id='$id'");
//    while ($down_res = mysqli_fetch_array($down_qry)) {
//
//    }
//}
?>