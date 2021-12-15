<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type, Content-Range, Content-Disposition, Content-Description');
include_once('connection.php');
$connobj = new connClass();
$conn=$connobj->conn;
$schExt=$connobj->schExt;
$uid = mysqli_real_escape_string($conn,$_POST['uid']);
//laptop row color
$lapcount = mysqli_query($conn,"SELECT COUNT(*) as count,distributor_bp.userid, distributor_bp.TGBP,distributor_info.sponsor_id FROM distributor_bp LEFT JOIN distributor_info ON distributor_bp.userid = distributor_info.id WHERE distributor_info.sponsor_id='$uid' AND TGBP>=3000");
$lapcountrow = mysqli_fetch_assoc($lapcount);
//echo $lapcountrow['count'];

$lapstatus = mysqli_query($conn,"select count(*) as count from reward_status where userid='$uid' and rewardstatus='Completed' and awardNo='11'");
$lapstatusrow = mysqli_fetch_assoc($lapstatus);
//echo $lapstatusrow['count'];
$laprowbgcolor = '';
if ($lapcountrow['count']>=2 && $lapstatusrow['count'] == 0){
    $laprowbgcolor = '#69c44c';
}
else if ($lapcountrow['count']<2 && $lapstatusrow['count']==0){
    $laprowbgcolor = '#69c44c';
}
else if ($lapcountrow['count']>=2 && $lapstatusrow['count']>0){
    $laprowbgcolor = '#87db6c9e';
}
else{
    $laprowbgcolor = '#fff';
}

//bike row color
$lapcount = mysqli_query($conn,"SELECT COUNT(*) as count,distributor_bp.userid, distributor_bp.TGBP,distributor_info.sponsor_id FROM distributor_bp LEFT JOIN distributor_info ON distributor_bp.userid = distributor_info.id WHERE distributor_info.sponsor_id='$uid' AND TGBP>=5000");
$lapcountrow = mysqli_fetch_assoc($lapcount);
//echo $lapcountrow['count'];

$lapstatus = mysqli_query($conn,"select count(*) as count from reward_status where userid='$uid' and rewardstatus='Completed' and awardNo='12'");
$lapstatusrow = mysqli_fetch_assoc($lapstatus);
//echo $lapstatusrow['count'];
$bikerowbgcolor = '';
if ($lapcountrow['count']>=3 && $lapstatusrow['count'] == 0 && $laprowbgcolor != '#69c44c'){
    $bikerowbgcolor = '#69c44c';
}
else if ($lapcountrow['count']<3 && $lapstatusrow['count']==0 && $laprowbgcolor != '#69c44c'){
    $bikerowbgcolor = '#69c44c';
}
else if ($lapcountrow['count']>=3 && $lapstatusrow['count']>0){
    $bikerowbgcolor = '#87db6c9e';
}
else{
    $bikerowbgcolor = '#fff';
}

//tour row color
$lapcount = mysqli_query($conn,"SELECT COUNT(*) as count,distributor_bp.userid, distributor_bp.TGBP,distributor_info.sponsor_id FROM distributor_bp LEFT JOIN distributor_info ON distributor_bp.userid = distributor_info.id WHERE distributor_info.sponsor_id='$uid' AND TGBP>=10000");
$lapcountrow = mysqli_fetch_assoc($lapcount);
//echo $lapcountrow['count'];

$lapstatus = mysqli_query($conn,"select count(*) as count from reward_status where userid='$uid' and rewardstatus='Completed' and awardNo='13'");
$lapstatusrow = mysqli_fetch_assoc($lapstatus);
//echo $lapstatusrow['count'];
$tourrowbgcolor = '';
if ($lapcountrow['count']>=4 && $lapstatusrow['count'] == 0 && $laprowbgcolor != '#69c44c' && $bikerowbgcolor != '#69c44c'){
    $tourrowbgcolor = '#69c44c';
}
else if ($lapcountrow['count']<4 && $lapstatusrow['count']==0 && $laprowbgcolor != '#69c44c' && $bikerowbgcolor != '#69c44c'){
    $tourrowbgcolor = '#69c44c';
}
else if ($lapcountrow['count']>=4 && $lapstatusrow['count']>0){
    $tourrowbgcolor = '#87db6c9e';
}
else{
    $tourrowbgcolor = '#fff';
}

//car row color
$lapcount = mysqli_query($conn,"SELECT COUNT(*) as count,distributor_bp.userid, distributor_bp.TGBP,distributor_info.sponsor_id FROM distributor_bp LEFT JOIN distributor_info ON distributor_bp.userid = distributor_info.id WHERE distributor_info.sponsor_id='$uid' AND TGBP>=15000");
$lapcountrow = mysqli_fetch_assoc($lapcount);
//echo $lapcountrow['count'];

$lapstatus = mysqli_query($conn,"select count(*) as count from reward_status where userid='$uid' and rewardstatus='Completed' and awardNo='14'");
$lapstatusrow = mysqli_fetch_assoc($lapstatus);
//echo $lapstatusrow['count'];
$carrowbgcolor = '';
if ($lapcountrow['count']>=5 && $lapstatusrow['count'] == 0 && $laprowbgcolor != '#69c44c' && $bikerowbgcolor != '#69c44c' && $tourrowbgcolor != '#69c44c'){
    $carrowbgcolor = '#69c44c';
}
else if ($lapcountrow['count']<5 && $lapstatusrow['count']==0 && $laprowbgcolor != '#69c44c' && $bikerowbgcolor != '#69c44c' && $tourrowbgcolor != '#69c44c'){
    $carrowbgcolor = '#69c44c';
}
else if ($lapcountrow['count']>=5 && $lapstatusrow['count']>0){
    $carrowbgcolor = '#87db6c9e';
}
else{
    $carrowbgcolor = '#fff';
}

//house row color
$lapcount = mysqli_query($conn,"SELECT COUNT(*) as count,distributor_bp.userid, distributor_bp.TGBP,distributor_info.sponsor_id FROM distributor_bp LEFT JOIN distributor_info ON distributor_bp.userid = distributor_info.id WHERE distributor_info.sponsor_id='$uid' AND TGBP>=20000");
$lapcountrow = mysqli_fetch_assoc($lapcount);
//echo $lapcountrow['count'];

$lapstatus = mysqli_query($conn,"select count(*) as count from reward_status where userid='$uid' and rewardstatus='Completed' and awardNo='15'");
$lapstatusrow = mysqli_fetch_assoc($lapstatus);
//echo $lapstatusrow['count'];
$houserowbgcolor = '';
if ($lapcountrow['count']>=6 && $lapstatusrow['count'] == 0 && $laprowbgcolor != '#69c44c' && $bikerowbgcolor != '#69c44c' && $tourrowbgcolor != '#69c44c' && $carrowbgcolor != '#69c44c'){
    $houserowbgcolor = '#69c44c';
}
else if ($lapcountrow['count']<6 && $lapstatusrow['count']==0 && $laprowbgcolor != '#69c44c' && $bikerowbgcolor != '#69c44c' && $tourrowbgcolor != '#69c44c' && $carrowbgcolor != '#69c44c'){
    $houserowbgcolor = '#69c44c';
}
else if ($lapcountrow['count']>=6 && $lapstatusrow['count']>0){
    $houserowbgcolor = '#87db6c9e';
}
else{
    $houserowbgcolor = '#fff';
}


$table='';

$table.= '
<style>
th{
text-align: center;
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
                <td colspan="4" style="border: 2px solid black;background: #58bc38;color: white;text-align: center;font-weight: bold;font-size: 20px;">AWARDS & REWARDS</td>
                </tr></tbody></table>';
$table.= '<table class="table table-hover table-bordered table-responsive" style="font-weight: bold;text-align: center;">
                <tbody>
                <tr style="background: #ffc6a5d1;">
                  <th style="border: 2px solid black;">S NO</th>
                  <th style="border: 2px solid black;">Awards</th>
                  <th style="border: 2px solid black;">GVBs</th>
                  <th style="border: 2px solid black;">Rank</th>
                  <th style="border: 2px solid black;"> Amount <sub>(Rs)</sub></th>
                </tr>
               <tr style="background: '.$laprowbgcolor.'">
                  <td style="border: 2px solid black;">1</td>
                  <td style="border: 2px solid black;">LAPTOP FUND</td>
                  <td style="border: 2px solid black;">3000<sub>(2DL)</sub></td>
                  <td style="border: 2px solid black;">Director</td>
                  <td style="border: 2px solid black;"> Nill</td>
                </tr>
                <tr style="background: '.$bikerowbgcolor.'">
                  <td style="border: 2px solid black;">2</td>
                  <td style="border: 2px solid black;">BIKE FUND</td>
                  <td style="border: 2px solid black;">5000<sub>(3DL)</sub></td>
                  <td style="border: 2px solid black;">Silver Director</td>
                  <td style="border: 2px solid black;"> Nill</td>
                </tr>
                 <tr style="background: '.$tourrowbgcolor.'">
                  <td style="border: 2px solid black;">3</td>
                  <td style="border: 2px solid black;">TOUR FUND</td>
                  <td style="border: 2px solid black;">10000<sub>(4DL)</sub></td>
                  <td style="border: 2px solid black;">Gold Director</td>
                  <td style="border: 2px solid black;"> Nill</td>
                </tr>
                <tr style="background: '.$carrowbgcolor.'">
                  <td style="border: 2px solid black;">4</td>
                  <td style="border: 2px solid black;">CAR FUND</td>
                  <td style="border: 2px solid black;">15000<sub>(5DL)</sub></td>
                  <td style="border: 2px solid black;">Diamond Director</td>
                  <td style="border: 2px solid black;"> Nill</td>
                </tr>
                 <tr style="background: '.$houserowbgcolor.'">
                  <td style="border: 2px solid black;">5</td>
                  <td style="border: 2px solid black;">HOUSE FUND</td>
                  <td style="border: 2px solid black;">20000<sub>(6DL)</sub></td>
                  <td style="border: 2px solid black;">Crown Director</td>
                  <td style="border: 2px solid black;"> Nill</td>
                </tr>
                ';


              $table.='</tbody></table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>
            ';

//Gift1 Background Color
 $giftBv = mysqli_query($conn,"select count(*) as count from distributor_bp where userid='$uid' and TBP>=1000");
 $giftbvRow = mysqli_fetch_assoc($giftBv);

$giftStatus = mysqli_query($conn,"select count(*) as count from gift_status where userid='$uid' and giftdNo='21' and giftstatus='Completed'");
$giftStatusRow = mysqli_fetch_assoc($giftStatus);


$gift1Color = '';
if ($giftbvRow['count']>0 && $giftStatusRow['count'] == 0){
    $gift1Color = '#69c44c';
}
else if ($giftbvRow['count']==0 && $giftStatusRow['count']==0){
    $gift1Color = '#69c44c';
}
else if ($giftbvRow['count']>0 && $giftStatusRow['count']>0){
    $gift1Color = '#87db6c9e';
}
else{
    $gift1Color = '#fff';
}
//Gift2 Background Color
$giftBv = mysqli_query($conn,"select count(*) as count from distributor_bp where userid='$uid' and TBP>=3000");
$giftbvRow = mysqli_fetch_assoc($giftBv);

$giftStatus = mysqli_query($conn,"select count(*) as count from gift_status where userid='$uid' and giftdNo='22' and giftstatus='Completed'");
$giftStatusRow = mysqli_fetch_assoc($giftStatus);


$gift2Color = '';
if ($giftbvRow['count']>0 && $giftStatusRow['count'] == 0 && $gift1Color != '#69c44c'){
    $gift2Color = '#69c44c';
}
else if ($giftbvRow['count']==0 && $giftStatusRow['count']==0 && $gift1Color != '#69c44c'){
    $gift2Color = '#69c44c';
}
else if ($giftbvRow['count']>0 && $giftStatusRow['count']>0){
    $gift2Color = '#87db6c9e';
}
else{
    $gift2Color = '#fff';
}

//Gift3 Background Color
$giftBv = mysqli_query($conn,"select count(*) as count from distributor_bp where userid='$uid' and TBP>=6000");
$giftbvRow = mysqli_fetch_assoc($giftBv);

$giftStatus = mysqli_query($conn,"select count(*) as count from gift_status where userid='$uid' and giftdNo='23' and giftstatus='Completed'");
$giftStatusRow = mysqli_fetch_assoc($giftStatus);


$gift3Color = '';
if ($giftbvRow['count']>0 && $giftStatusRow['count'] == 0 && $gift1Color != '#69c44c' && $gift2Color != '#69c44c'){
    $gift3Color = '#69c44c';
}
else if ($giftbvRow['count']==0 && $giftStatusRow['count']==0 && $gift1Color != '#69c44c' && $gift2Color != '#69c44c'){
    $gift3Color = '#69c44c';
}
else if ($giftbvRow['count']>0 && $giftStatusRow['count']>0){
    $gift3Color = '#87db6c9e';
}
else{
    $gift3Color = '#fff';
}

//Gift4 Background Color
$giftBv = mysqli_query($conn,"select count(*) as count from distributor_bp where userid='$uid' and TBP>=10000");
$giftbvRow = mysqli_fetch_assoc($giftBv);

$giftStatus = mysqli_query($conn,"select count(*) as count from gift_status where userid='$uid' and giftdNo='24' and giftstatus='Completed'");
$giftStatusRow = mysqli_fetch_assoc($giftStatus);


$gift4Color = '';
if ($giftbvRow['count']>0 && $giftStatusRow['count'] == 0 && $gift1Color != '#69c44c' && $gift2Color != '#69c44c' && $gift3Color != '#69c44c'){
    $gift4Color = '#69c44c';
}
else if ($giftbvRow['count']==0 && $giftStatusRow['count']==0 && $gift1Color != '#69c44c' && $gift2Color != '#69c44c' && $gift3Color != '#69c44c'){
    $gift4Color = '#69c44c';
}
else if ($giftbvRow['count']>0 && $giftStatusRow['count']>0){
    $gift4Color = '#87db6c9e';
}
else{
    $gift4Color = '#fff';
}

$table.= '
<style>

</style>
<div class="row">
        <div class="col-xs-12">
          <div class="box">         
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover table-bordered table-responsive" style="font-weight: bold;text-align: center;">
                <tbody>';
$table.= ' <tr>
                <td colspan="4" style="border: 2px solid black;background: #58bc38;color: white;text-align: center;font-weight: bold;font-size: 20px;">GIFT FUNDS</td>
                </tr></tbody></table>';
$table.= '<table class="table table-hover table-bordered table-responsive" style="font-weight: bold;text-align: center;">
                <tbody>
                <tr style="background: #ffc6a5d1;">
                  <th style="border: 2px solid black;">S NO</th>
                  <th style="border: 2px solid black;">Gift</th>
                  <th style="border: 2px solid black;">Self BVs</th>
                  <th style="border: 2px solid black;">Rank</th>
                  <th style="border: 2px solid black;"> Amount <sub>(Rs)</sub></th>
                </tr>
                <tr style="background: '.$gift1Color.';">
                  <td style="border: 2px solid black;">1</td>
                  <td style="border: 2px solid black;">
                    <select class="form-control" style="background: '.$gift1Color.';">
                        <option value="11">Dinner Set</option>
                        <option value="12">Saree along with blouse, Leg Chains, Bangles and Leg rings suit clotthes</option>
                        <option value="13">Suit Cloth</option>
                        <option value="14">Burner Gas Stove</option>
                    </select>
                   </td>
                  <td style="border: 2px solid black;">1000</td>
                  <td style="border: 2px solid black;">Self Star</td>
                  <td style="border: 2px solid black;"> Nill</td>
                </tr>
                <tr style="background: '.$gift2Color.';">
                  <td style="border: 2px solid black;">2</td>
                  <td style="border: 2px solid black;">
                    <select class="form-control" style="background: '.$gift2Color.';">
                        <option value="21">Mixer Grinder</option>
                        <option value="22">Wet Grinder</option>
                    </select>
                   </td>
                  <td style="border: 2px solid black;">3000</td>
                  <td style="border: 2px solid black;">Self Diamond</td>
                  <td style="border: 2px solid black;"> Nill</td>
                </tr>
                 <tr style="background: '.$gift3Color.';">
                  <td style="border: 2px solid black;">3</td>
                  <td style="border: 2px solid black;">Refrigerator</td>
                  <td style="border: 2px solid black;">6000</td>
                  <td style="border: 2px solid black;">Self Blue Diamond</td>
                  <td style="border: 2px solid black;"> Nill</td>
                </tr>
                <tr style="background: '.$gift4Color.';">
                  <td style="border: 2px solid black;">4</td>
                  <td style="border: 2px solid black;">Washing Machine</td>
                  <td style="border: 2px solid black;">10000</td>
                  <td style="border: 2px solid black;">Self Royal Diamond</td>
                  <td style="border: 2px solid black;"> Nill</td>
                </tr>
                ';


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