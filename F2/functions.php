<?php
session_start();
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type, Content-Range, Content-Disposition, Content-Description');
date_default_timezone_set('Asia/Kolkata');
include_once('connection.php');
$connobj = new connClass();
$conn = $connobj->conn;

if(isset($_POST['fid']) && !empty($_POST['fid']))
{
    $fid = mysqli_real_escape_string($conn,$_POST['fid']);
}
else
{
    return;
}

switch ($fid) {

    case 1:
    {
       $name = $_POST['name'];
       $phone = $_POST['phone'];
       $email = $_POST['email'];
       $password = $_POST['password'];
       $qry = $conn->query("select * from real_user_details where username = '$phone'");
       $rows = $qry->num_rows;
       if ($rows > 0){
           echo json_encode(array("res" => 3, "msg" => "User with this phone number already exits!"));
           return;
       }
       $insert = $conn->query("INSERT INTO `real_user_details`(`username`, `password`, `name`, `phone`, `email`) VALUES ('$phone','$password','$name','$phone','$email')");
       if ($insert){
           echo json_encode(array("res" => 1, "msg" => "Registered successfully"));
       }
       else{
           echo json_encode(array("res" => 2, "msg" => "Something went wrong"));
       }
        break;
    }
    case 2:
    {
        $phone = $_POST['phone'];
        $password = $_POST['password'];
        $qry = $conn->query("select * from `real_user_details` where username = '$phone' and password='$password'");
        $rows = $qry->num_rows;
        if ($rows > 0){
            $res = $qry->fetch_assoc();
            $_SESSION["uid"] = $connobj->encryptIt($res['slno']);
            echo json_encode(array("res" => 1, "msg" => "Login Success",'user'=>$res['slno'],'login_status'=>true));
        }
        else{
            echo json_encode(array("res" => 2, "msg" => "Invalid Credentials",'login_status'=>false));
        }
        break;
    }
    case 3:
    {
        $uid = $_POST['uid'];
        $qry = $conn->query("select * from `real_user_details` where slno = '$uid'");
        $rows = $qry->num_rows;
        if ($rows > 0){
            $res = $qry->fetch_assoc();
            echo json_encode(array("res" => 1, "msg" => "Login Success",'name'=>$res['name'],'phone'=>$res['phone']));
        }
        else{
            echo json_encode(array("res" => 2, "msg" => "Not Logged In"));
        }
        break;
    }
    case 4:
    {
        $brand = $connobj->decryptIt($_POST['brand']);
        $model = '<option value="">Select Model</option>';
        $qry = $conn->query("select * from `real_model` where brand_id = '$brand'");
        while($res = $qry->fetch_assoc()){
            $model_id = $connobj->encryptIt($res['slno']);
            $model_name = $res['name'];
            $model .= '<option value="'.$model_id.'">'.$model_name.'</option>';
        }
        echo json_encode(array("res" => 1, "model" => $model));
        break;
    }
    case 5:
    {
        $model = $connobj->decryptIt($_POST['model']);
        $varient = '<option value="">Select Varient</option>';
        $qry = $conn->query("select * from `real_varient` where model_id = '$model'");
        while($res = $qry->fetch_assoc()){
            $varient_id = $connobj->encryptIt($res['slno']);
            $varient_name = $res['name'];
            $varient .= '<option value="'.$varient_id.'">'.$varient_name.'</option>';
        }
        echo json_encode(array("res" => 1, "varient" => $varient));
        break;
    }
    case 6:
        {
            $brand = $_POST['brand'];
            $uid = $_POST['uid'];
            $catid = $_POST['catid'];
            $subcatid = $_POST['subcatid'];
            $model = $_POST['model'];
            $varient = $_POST['varient'];
            $fuel = $_POST['fuel'];
            $transmission = $_POST['transmission'];
            $owner = $_POST['owner'];
            $referrer = $_POST['referrer'];
            $title = $_POST['title'];
            $desc = $_POST['desc'];
            $price = $_POST['price'];
            $state = $_POST['state'];
            $city = $_POST['city'];
            $name = $_POST['name'];
            $phone = $_POST['phone'];
            $town = $_POST['town'];
            $Document_Xerox = $_POST['Document_Xerox'];
            $Document_Holder_Name = $_POST['Document_Holder_Name'];
            
    
    
            $countfiles = count($_FILES['files']['name']);
    
            $upload_location = "upload/";
    
            $files_arr = array();
    
            // Loop all files
            for($index = 0;$index < $countfiles;$index++){
                $random_number = rand(10000,100000);
                if(isset($_FILES['files']['name'][$index]) && $_FILES['files']['name'][$index] != ''){
                    // File name
                    $file = $_FILES['files']['name'][$index];
                    $filename = $random_number.$file;
                    // 458964abc.jpg
    
                    // Get extension
                    $ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
    
                    // Valid image extension
                    $valid_ext = array("png","jpeg","jpg");
    
                    // Check extension
                    if(in_array($ext, $valid_ext)){
    
                        // File path
                        $path = $upload_location.$filename;
    
                        // Upload file
                        if(move_uploaded_file($_FILES['files']['tmp_name'][$index],$path)){
                            $files_arr[] = $filename;
                        }
                    }
                }
            }
            $images = implode(",",$files_arr);
            $insert = $conn->query("INSERT INTO `real_products`(`uid`,`cat_id`, `sub_cat_id`, `brand_name`, `model_id`, `varient_id`, `fuel`, `transmission`, `owner_type`, `referrer`, `title`, `description`, `price`, `state`, `city`, `images`, `name`, `phone`, `town`, `Document_Xerox`, `Document_Holder_Name`) VALUES ('$uid','$catid','$subcatid','$brand','$model','$varient','$fuel','$transmission','$owner','$referrer','$title','$desc','$price','$state','$city','$images','$name','$phone','$town','$Document_Xerox','$Document_Holder_Name')");
            if($insert){
                echo json_encode(array("res"=>1));
            }
            else{
                echo json_encode(array("res"=>2));
            }
            break;
        }
case 7:
            {
              
            
                
            
                $uid = $_POST['uid'];
                $catid = $_POST['catid'];
                $subcatid = $_POST['subcatid'];
                $Year = $_POST['Year'];
                $Measurement = $_POST['Measurement'];
                $Facing = $_POST['Facing'];
                $Total_Floor = $_POST['Total_Floor'];
                $Total_Bedroom = $_POST['Total_Bedroom'];
                $Total_Bathroom = $_POST['Total_Bathroom'];
                $Water_Facilities = $_POST['Water_Facilities'];
                $Car_Parking = $_POST['Car_Parking'];
                $owner = $_POST['owner'];
                $referrer = $_POST['referrer'];
                $title = $_POST['title'];
                $desc = $_POST['desc'];
                $price = $_POST['price'];
                // $uid = $_POST['uid'];
                $state = $_POST['state'];
                $city = $_POST['city'];
                $name = $_POST['name'];
                $phone = $_POST['phone'];
                $town = $_POST['town'];
                $Document_Xerox = $_POST['Document_Xerox'];
                $Document_Holder_Name = $_POST['Document_Holder_Name'];

               
                
        
        
                $countfiles = count($_FILES['files']['name']);
        
                $upload_location = "upload/";
        
                $files_arr = array();
        
                // Loop all files
                for($index = 0;$index < $countfiles;$index++){
                     
                        // echo rand(10000,100000);die;
                    $random_number = rand(10000,100000);
                    if(isset($_FILES['files']['name'][$index]) && $_FILES['files']['name'][$index] != ''){
                        // File name
                        // print_r($_FILES['files']);die;
                        $file = $_FILES['files']['name'][$index];
                        $filename = $random_number.$file;
                        // 458964abc.jpg
        
                        // Get extension
                        $ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
        
                        // Valid image extension
                        $valid_ext = array("png","jpeg","jpg");
        
                        // Check extension
                        if(in_array($ext, $valid_ext)){
        
                            // File path
                            $path = $upload_location.$filename;
        
                            // Upload file
                            
                            if(move_uploaded_file($_FILES['files']['tmp_name'][$index],$path)){
                                $files_arr[] = $filename;
                            }
                        }
                    }
                }
                // echo "INSERT INTO `real_products` (`uid`,`cat_id`, `sub_cat_id`, `Year`,`Measurement`,`Facing`,`Total_Floor`,`Total_Bedroom`,`Total_Bathroom`,`Water_Facilities`, `Car_Parking`, `owner_type`, `referrer`, `title`, `description`, `price`, `state`, `city`, `images`, `name`, `phone`, `town`, `Document_Xerox`, `Document_Holder_Name`) VALUES ('$uid','$catid','$subcatid','$Year','$Measurement','$Facing','$Total_Floor','$Total_Bedroom','$Total_Bathroom','$Water_Facilities','$Car_Parking','$owner','$referrer','$title','$desc','$price','$state','$city','$images','$name','$phone','$town','$Document_Xerox','$Document_Holder_Name')";die;
                $images = implode(",",$files_arr);
                $insert = $conn->query("INSERT INTO `real_products` (`uid`,`cat_id`, `sub_cat_id`, `Year`,`Measurement`,`Facing`,`Total_Floor`,`Total_Bedroom`,`Total_Bathroom`,`Water_Facilities`, `Car_Parking`, `owner_type`, `referrer`, `title`, `description`, `price`, `state`, `city`, `images`, `name`, `phone`, `town`, `Document_Xerox`, `Document_Holder_Name`) VALUES ('$uid','$catid','$subcatid','$Year','$Measurement','$Facing','$Total_Floor','$Total_Bedroom','$Total_Bathroom','$Water_Facilities','$Car_Parking','$owner','$referrer','$title','$desc','$price','$state','$city','$images','$name','$phone','$town','$Document_Xerox','$Document_Holder_Name')");
                if($insert){
                    echo json_encode(array("res"=>1));
                }
                else{
                    echo json_encode(array("res"=>2));
                }
                break;
            }

case 8:
    {
        $uid = $_POST['uid'];
        $catid = $_POST['catid'];
        $subcatid = $_POST['subcatid'];
        $brand = $_POST['brand'];
        $model = $_POST['model'];
        // $varient = $_POST['varient'];
        $fuel = $_POST['fuel'];
        // $transmission = $_POST['transmission'];
        $owner = $_POST['owner'];
        $referrer = $_POST['referrer'];
        $title = $_POST['title'];
        $desc = $_POST['desc'];
        $price = $_POST['price'];
        $uid = $_POST['uid'];
        $state = $_POST['state'];
        $city = $_POST['city'];
        $name = $_POST['name'];
        $phone = $_POST['phone'];
        $town = $_POST['town'];
        $Document_Xerox = $_POST['Document_Xerox'];
        $Document_Holder_Name = $_POST['Document_Holder_Name'];
        


        $countfiles = count($_FILES['files']['name']);

        $upload_location = "upload/";

        $files_arr = array();

        // Loop all files
        for($index = 0;$index < $countfiles;$index++){
            $random_number = rand(10000,100000);
            if(isset($_FILES['files']['name'][$index]) && $_FILES['files']['name'][$index] != ''){
                // File name
                $file = $_FILES['files']['name'][$index];
                $filename = $random_number.$file;
                // 458964abc.jpg

                // Get extension
                $ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));

                // Valid image extension
                $valid_ext = array("png","jpeg","jpg");

                // Check extension
                if(in_array($ext, $valid_ext)){

                    // File path
                    $path = $upload_location.$filename;

                    // Upload file
                    if(move_uploaded_file($_FILES['files']['tmp_name'][$index],$path)){
                        $files_arr[] = $filename;
                    }
                }
            }
        }
        $images = implode(",",$files_arr);
        $insert = $conn->query("INSERT INTO `real_products`(`uid`,`cat_id`, `sub_cat_id`, `brand_name`, `model_id`,  `fuel`, `owner_type`, `referrer`, `title`, `description`, `price`, `state`, `city`, `images`, `name`, `phone`, `town`, `Document_Xerox`, `Document_Holder_Name`) VALUES ('$uid','$catid','$subcatid','$brand','$model','$fuel','$owner','$referrer','$title','$desc','$price','$state','$city','$images','$name','$phone','$town','$Document_Xerox','$Document_Holder_Name')");
        if($insert){
            echo json_encode(array("res"=>1));
        }
        else{
            echo json_encode(array("res"=>2));
        }
        break;
    }

    case 9:
        {
            $brand = $_POST['brand'];
            $model = $_POST['model'];
  
            $owner = $_POST['owner'];
            $referrer = $_POST['referrer'];
            $title = $_POST['title'];
            $desc = $_POST['desc'];
            $price = $_POST['price'];
            $uid = $_POST['uid'];
            $state = $_POST['state'];
            $city = $_POST['city'];
            $name = $_POST['name'];
            $phone = $_POST['phone'];
            $town = $_POST['town'];
            $Document_Xerox = $_POST['Document_Xerox'];
            $Document_Holder_Name = $_POST['Document_Holder_Name'];
            
    
    
            $countfiles = count($_FILES['files']['name']);
    
            $upload_location = "upload/";
    
            $files_arr = array();
    
            // Loop all files
            for($index = 0;$index < $countfiles;$index++){
                $random_number = rand(10000,100000);
                if(isset($_FILES['files']['name'][$index]) && $_FILES['files']['name'][$index] != ''){
                    // File name
                    $file = $_FILES['files']['name'][$index];
                    $filename = $random_number.$file;
                    // 458964abc.jpg
    
                    // Get extension
                    $ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
    
                    // Valid image extension
                    $valid_ext = array("png","jpeg","jpg");
    
                    // Check extension
                    if(in_array($ext, $valid_ext)){
    
                        // File path
                        $path = $upload_location.$filename;
    
                        // Upload file
                        if(move_uploaded_file($_FILES['files']['tmp_name'][$index],$path)){
                            $files_arr[] = $filename;
                        }
                    }
                }
            }
            $images = implode(",",$files_arr);
            $insert = $conn->query("INSERT INTO `real_products`(`cat_id`, `sub_cat_id`, `brand_name`, `model_id`,  `owner_type`, `referrer`, `title`, `description`, `price`, `state`, `city`, `images`, `name`, `phone`, `town`, `Document_Xerox`, `Document_Holder_Name`) VALUES ('1','1','$brand','$model','$owner','$referrer','$title','$desc','$price','$images','$state','$city','$name','$phone','$town','$Document_Xerox','$Document_Holder_Name')");
            if($insert){
                echo json_encode(array("res"=>1));
            }
            else{
                echo json_encode(array("res"=>2));
            }
            break;
        }

        case 10:
            {
                $uid = $_POST['uid'];
                $catid = $_POST['catid'];
                $subcatid = $_POST['subcatid'];
                $brand = $_POST['brand'];
                $model = $_POST['model'];
                
             
                $owner = $_POST['owner'];
                $referrer = $_POST['referrer'];
                $title = $_POST['title'];
                $desc = $_POST['desc'];
                $price = $_POST['price'];
                $uid = $_POST['uid'];
                $state = $_POST['state'];
                $city = $_POST['city'];
                $name = $_POST['name'];
                $phone = $_POST['phone'];
                $town = $_POST['town'];
                $Document_Xerox = $_POST['Document_Xerox'];
                $Document_Holder_Name = $_POST['Document_Holder_Name'];
                
        
        
                $countfiles = count($_FILES['files']['name']);
        
                $upload_location = "upload/";
        
                $files_arr = array();
        
                // Loop all files
                for($index = 0;$index < $countfiles;$index++){
                    $random_number = rand(10000,100000);
                    if(isset($_FILES['files']['name'][$index]) && $_FILES['files']['name'][$index] != ''){
                        // File name
                        $file = $_FILES['files']['name'][$index];
                        $filename = $random_number.$file;
                        // 458964abc.jpg
        
                        // Get extension
                        $ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
        
                        // Valid image extension
                        $valid_ext = array("png","jpeg","jpg");
        
                        // Check extension
                        if(in_array($ext, $valid_ext)){
        
                            // File path
                            $path = $upload_location.$filename;
        
                            // Upload file
                            if(move_uploaded_file($_FILES['files']['tmp_name'][$index],$path)){
                                $files_arr[] = $filename;
                            }
                        }
                    }
                }
                $images = implode(",",$files_arr);
                $insert = $conn->query("INSERT INTO `real_products`(`uid`,`cat_id`, `sub_cat_id`,`brand_name`, `model_id`,   `owner_type`, `referrer`, `title`, `description`, `price`, `state`, `city`, `images`, `name`, `phone`, `town`, `Document_Xerox`, `Document_Holder_Name`) VALUES ('$uid','$catid','$subcatid','$brand','$model','$owner','$referrer','$title','$desc','$price','$state','$city','$images','$name','$phone','$town','$Document_Xerox','$Document_Holder_Name')");
                if($insert){
                    echo json_encode(array("res"=>1));
                }
                else{
                    echo json_encode(array("res"=>2));
                }
                break;
            }

        }

?>