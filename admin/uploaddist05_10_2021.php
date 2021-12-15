<?php
include_once('test/cors.php');
date_default_timezone_set('Asia/Kolkata');
include_once('connection.php');
include_once("sendsms-get.php");
$connobj = new connClass();
$conn=$connobj->conn;
$schExt=$connobj->schExt;
include("createThumbNailHS.php");
if(!empty($_FILES)){
    if(isset($_POST['sponsor_id']) && !empty($_POST['sponsor_id']))
    {
        $sponsor_id=mysqli_real_escape_string($conn,$_POST['sponsor_id']);
    }
    if(isset($_POST['dist_name']) && !empty($_POST['dist_name']))
    {
        $dist_name = mysqli_real_escape_string($conn,$_POST['dist_name']);
    }
    if(isset($_POST['dist_mobile']) && !empty($_POST['dist_mobile']))
    {
        $dist_mobile = mysqli_real_escape_string($conn,$_POST['dist_mobile']);
    }

        $dist_aadhar = mysqli_real_escape_string($conn,$_POST['dist_aadhar']);


        $dist_pan = mysqli_real_escape_string($conn,$_POST['dist_pan']);

    if(isset($_POST['dist_address']) && !empty($_POST['dist_address']))
    {
        $dist_address = mysqli_real_escape_string($conn,$_POST['dist_address']);
    }

        $dist_email = mysqli_real_escape_string($conn,$_POST['dist_email']);

    if(isset($_POST['sponsor_name']) && !empty($_POST['sponsor_name']))
    {
        $sponsor_name = mysqli_real_escape_string($conn,$_POST['sponsor_name']);
    }

        $dist_bgroup = mysqli_real_escape_string($conn,$_POST['dist_bgroup']);


        $account = mysqli_real_escape_string($conn,$_POST['account']);


        $bname = mysqli_real_escape_string($conn,$_POST['bname']);


        $branch = mysqli_real_escape_string($conn,$_POST['branch']);


        $ifsc = mysqli_real_escape_string($conn,$_POST['ifsc']);

    if(isset($_POST['nominee_name']) && !empty($_POST['nominee_name']))
    {
        $nominee_name = mysqli_real_escape_string($conn,$_POST['nominee_name']);
    }
    if(isset($_POST['nominee_mobile']) && !empty($_POST['nominee_mobile']))
    {
        $nominee_mobile = mysqli_real_escape_string($conn,$_POST['nominee_mobile']);
    }
    if(isset($_POST['nominee_age']) && !empty($_POST['nominee_age']))
    {
        $nominee_age = mysqli_real_escape_string($conn,$_POST['nominee_age']);
    }
    if(isset($_POST['nominee_relation']) && !empty($_POST['nominee_relation']))
    {
        $nominee_relation = mysqli_real_escape_string($conn,$_POST['nominee_relation']);
    }
    if(isset($_POST['distpin']) && !empty($_POST['distpin']))
    {
        $distpin = mysqli_real_escape_string($conn,$_POST['distpin']);
    }
    if(isset($_POST['dob']) && !empty($_POST['dob']))
    {
        $dob = mysqli_real_escape_string($conn,$_POST['dob']);
    }
    if(isset($_POST['distType']) && !empty($_POST['distType']))
    {
        $distType = mysqli_real_escape_string($conn,$_POST['distType']);
    }

//    generate random string
    function generateRandomString($length) {
        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
//    generate random string


    $random_digit=rand(0000,9999);
//    $username_digit=rand(0000,999999);
//    $username = 'FITO2020'.$username_digit.generateRandomString(5);
    $targetDir = "backend/distributor/temp/";

    $fileName = $_FILES['file']['name'];

    $new_file_name=$random_digit.$fileName;

    $targetFile = $targetDir.$new_file_name;

    $lastuid = '';
    $lastuid1 = '';
    $lastuid2 = '';
   $qry = mysqli_query($conn, "SELECT MAX(username) as username FROM `userlogin`");
    if ($res = mysqli_fetch_array($qry)) {
      $lastuid1 = $res['username'];
      if (startsWith( $lastuid1, "HFITO" )){
          $qry1 = mysqli_query($conn, "SELECT MAX(username) as username FROM `userlogin` where username like 'FITO%'");
          if ($res1 = mysqli_fetch_array($qry1)) {
              $lastuid2 = $res1['username'];
          }
      }
      else{
          $lastuid1 = $res['username'];
      }
    }
//    echo $lastuid1.$lastuid2;die;
    $last1 = (int) filter_var($lastuid1, FILTER_SANITIZE_NUMBER_INT);
    $last2 = (int) filter_var($lastuid2, FILTER_SANITIZE_NUMBER_INT);
    if ($last1 > $last2){
        $last = $last1;
    }else{
        $last = $last2;
    }
//    echo $last;die;

    //$last = (int) filter_var($lastuid, FILTER_SANITIZE_NUMBER_INT);
    $username_digit = $last + 1;
    $username = 'FITO'.$username_digit;


//    echo "insert into distributor_wallet (userid,`current`,total) values ('$username','1000','1000')";
//    return;
    if(move_uploaded_file($_FILES['file']['tmp_name'],$targetFile)){

        $timg="backend/distributor/thumb/".$new_file_name;
        createThumbs($targetFile,$timg,$_FILES["file"]["type"]);
        $timg="backend/distributor/".$new_file_name;
        createThumbdistributor($targetFile,$timg,$_FILES["file"]["type"]);
        mysqli_query($conn,"insert into distributor_info (`sponsor_id`,`id`, `dist_name`, `dist_mobile`, `dist_aadhar`, `dist_pan`, `dist_address`, `dist_email`, `sponsor_name`, `photo`, `bgroup`, `dist_accNo`, `dist_bank_name`, `dist_bank_branch`, `dist_bank_ifsc`, `nominee_name`, `nominee_mobile`, `nominee_age`, `nominee_relation`, `status`, `date`, `activation_pin`, `dob`,joining_type) values('$sponsor_id','$username','$dist_name','$dist_mobile','$dist_aadhar','$dist_pan','$dist_address','$dist_email','$sponsor_name','$new_file_name','$dist_bgroup','$account','$bname','$branch','$ifsc','$nominee_name','$nominee_mobile','$nominee_age','$nominee_relation','active',NOW(),'$distpin','$dob','$distType')");

        mysqli_query($conn,"insert into userlogin (`username`, `password`, `displayname`, `usertype`) values('$username','FITO999','$dist_name','dist')");

        mysqli_query($conn,"UPDATE `distributor_pin` SET `userid`='$sponsor_id',`status`='Active' WHERE pin='$distpin'");


        //add joining referral points
        $sponser_id = $username;
        $join_type = $distType;
        $isRefApplicable = 0;
        updateReferalPoints($sponser_id,$join_type,$conn);

        //wallet update and insert
        mysqli_query($conn,"insert into distributor_wallet (userid,`wallet`,total) values ('$username','1000','1000')");

        $sponser_wallet = mysqli_query($conn,"select * from distributor_wallet where userid='$sponsor_id'");
        if ($sponser_wallet_res = mysqli_fetch_assoc($sponser_wallet)){
            $updated_current = (int)$sponser_wallet_res['wallet']+ 500;
            $updated_total = (int)$sponser_wallet_res['total'] + 500;
//            echo "update distributor_wallet set `wallet`='$updated_current' and total = '$updated_total' where userid='$sponsor_id'";
            mysqli_query($conn,"UPDATE `distributor_wallet` SET `wallet`='$updated_current',`total`='$updated_total' WHERE userid='$sponsor_id'");
        }
        else{
            mysqli_query($conn,"insert into distributor_wallet (userid,`wallet`,total) values ('$sponsor_id','500','500')");
        }

        unlink($targetFile);
        //sendsms($dist_mobile, "Registration Success \n User ID : ".$username."\n Password : FITO999 \n Rs 1000 coupon added in your wallet");
        echo "Registration Success \n User ID : ".$username."\n Password : FITO999 \n 1000 ₹ coupon added in your wallet";

        // Sending email
        $subject = 'FITOHM Registration Details';
        $headers = "MIME-Version: 1.0" . "\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\n";

        $htmlContent = ' 
    <html> 
    <head> 
        <title></title> 
    </head> 
    <body> 
        <h1>Your login credential are as </h1> 
        <table cellspacing="0" style="border: 2px dashed #FB4314; width: 100%;"> 
            <tr> 
                <th>Username :</th><td>'.$username.'</td> 
            </tr> 
            <tr style="background-color: #e0e0e0;"> 
                <th>Password :</th><td>FITO999</td> 
            </tr> 
        </table> 
    </body> 
    </html>';

// send email HTML
//        if(mail($dist_email, $subject, $htmlContent, $headers)){
//            echo 'Your mail has been sent successfully.';
//        } else{
//            echo 'Unable to send email. Please try again.';
//        }
    }
}
function startsWith ($string, $startString)
{
    $len = strlen($startString);
    return (substr($string, 0, $len) === $startString);
}
function updateReferalPoints($id,$jt,$con){
    $dist_id = $id;
    $referral_amt = 0;
    $referral_amt0  = array("1" => 0, "2" => 0, "3" => 0, "4" => 0, "5" => 0, "6" => 0, "7" => 0);
    $referral_amt1  = array("1" => 50, "2" => 20, "3" => 10, "4" => 10, "5" => 10, "6" => 10, "7" => 10);
    $referral_amt2 = array("1" => 100, "2" => 40, "3" => 20, "4" => 20, "5" => 20, "6" => 20, "7" => 20);
    for ($i = 1;$i<=7; $i++){
        //echo $id.'<br>';
        $qry1 = $con->query("select sponsor_id,joining_type from distributor_info where id = '$dist_id'");
        if ($res1 = $qry1->fetch_assoc()){
            $sponsor_id = $res1["sponsor_id"];
            $qry = $con->query("select joining_type from distributor_info where id = '$sponsor_id'");
            if ($res = $qry->fetch_assoc()){
                $sponsorj = $res["joining_type"];
                if ($sponsorj == 0){
                    $isRefApplicable = 0;
                    $referral_amt = $referral_amt0[$i];
                }
                else if ($sponsorj > 0){
                    $isRefApplicable = 1;
                    if ($sponsorj == 1){
                        if ($jt == 1){
                            $referral_amt = $referral_amt1[$i];
                        }else if ($jt == 2){
                            $referral_amt = $referral_amt1[$i];
                        }
                    }else if ($sponsorj == 2){
                        if ($jt == 1){
                            $referral_amt = $referral_amt1[$i];
                        }else if ($jt == 2){
                            $referral_amt = $referral_amt2[$i];
                        }
                    }
                }
            }
//        echo 'LEVEL '.$i.'-'.$sponsor_id.' type '.$sponsorj.' Ref Amount : '.$referral_amt.'<br>';
            $dist_id = $sponsor_id;

            $update = $con->query("UPDATE `distributor_info` SET `joinin_ref`='$referral_amt' WHERE id='$sponsor_id'");
        }
    }
}
?>