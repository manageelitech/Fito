<?php

// Start the session
session_start();
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type, Content-Range, Content-Disposition, Content-Description');
date_default_timezone_set('Asia/Kolkata');
include_once('admin/connection.php');
$connobj = new connClass();
$conn=$connobj->conn;
$schExt=$connobj->schExt;
if(isset($_POST['fid']) && !empty($_POST['fid']))
{
    $fid=mysqli_real_escape_string($conn,$_POST['fid']);
}
else
{
    return;
}

switch ($fid) {

    case 1://seller registration
    {
        if(isset($_POST['produt_name']) && !empty($_POST['produt_name']))
        {
            $produt_name = $conn->real_escape_string($_POST['produt_name']);
        }
        else
        {
            echo json_encode(array("res" => 0, "message" => "Please enter Product name"));
            return;
        }
        if(isset($_POST['area_name']) && !empty($_POST['area_name']))
        {
            $area_name = $conn->real_escape_string($_POST['area_name']);
        }
        else
        {
            echo json_encode(array("res" => 0, "message" => "Please enter area name"));
            return;
        }
        if(isset($_POST['owner_name']) && !empty($_POST['owner_name']))
        {
            $owner_name = $conn->real_escape_string($_POST['owner_name']);
        }
        else
        {
            echo json_encode(array("res" => 0, "message" => "Please enter owner name"));
            return;
        }
        if(isset($_POST['village']) && !empty($_POST['village']))
        {
            $village = $conn->real_escape_string($_POST['village']);
        }
        else
        {
            echo json_encode(array("res" => 0, "message" => "Please enter village name"));
            return;
        }
        if(isset($_POST['store_name']) && !empty($_POST['store_name']))
        {
            $store_name = $conn->real_escape_string($_POST['store_name']);
        }
        else
        {
            echo json_encode(array("res" => 0, "message" => "Please enter store name"));
            return;
        }
        if(isset($_POST['phone']) && !empty($_POST['phone']))
        {
            $phone = $conn->real_escape_string($_POST['phone']);
        }
        else
        {
            echo json_encode(array("res" => 0, "message" => "Please enter phone number"));
            return;
        }
        if(isset($_POST['whatsapp']) && !empty($_POST['whatsapp']))
        {
            $whatsapp = $conn->real_escape_string($_POST['whatsapp']);
        }
        else
        {
            echo json_encode(array("res" => 0, "message" => "Please enter whatsapp number"));
            return;
        }
        if(isset($_POST['store_name']) && !empty($_POST['store_name']))
        {
            $store_name = $conn->real_escape_string($_POST['store_name']);
        }
        else
        {
            echo json_encode(array("res" => 0, "message" => "Please enter store name"));
            return;
        }
        $random_number = random_int(100000, 999999);
        $file = $_FILES['file']['name'];
        $filename = $random_number.$file;

        //user validation
        $qry = $conn->query("select * from fito_seller where phone='$phone'");
        $resultRow = $qry->num_rows;
        if ($resultRow > 0){
            echo json_encode(array("res" => 4, "message" => "You are already registered with this phone No"));
            return;
        }
        //get last username
        $getLastUsernName = $conn->query("select username from fito_seller ORDER BY slno DESC LIMIT 1");
        $resultRow = $getLastUsernName->num_rows;
        if ($resultRow > 0){
            $lastUsernameResult = $getLastUsernName->fetch_assoc();
            $lastUsername = $lastUsernameResult['username'];
            $lastUid = substr($lastUsername,2);
            $username = (int)$lastUid + 1;
        }
        else{
            $username = 1000;
        }
//        $path = 'uploads/tieupshop/'.$filename;

        $countfiles = count($_FILES['files']['name']);
       if($countfiles < 2){
           echo json_encode(array("res" => 2, "message" => "Please choose at least 3 images"));
           return;
       }

        $upload_location = "uploads/tieupshop/";

        $files_arr = array();

        // Loop all files
        for($index = 0;$index < $countfiles;$index++){
            $random_number = random_int(100000, 999999);
            if(isset($_FILES['files']['name'][$index]) && $_FILES['files']['name'][$index] != ''){
                // File name
                $file = $_FILES['files']['name'][$index];
                $filename = $random_number.$file;

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

        //insert details
        $insert = $conn->query("INSERT INTO `fito_seller`(`store_name`, `owner_name`, `phone`, `whatsapp`, `username`, `password`, `products`, `area`, `town`, `filename`) VALUES ('$store_name','$owner_name','$phone','$whatsapp','TS$username','TS999','$produt_name','$area_name','$village','$images')");
        if ($insert){
            echo json_encode(array("res" => 1, "message" => "Your Rgistration Cmpleted Succeessfully! <br> Your Username is : TS".$username." and Password is : TS999."));
            return;
        }
        else{
            echo json_encode(array("res" => 2, "message" => "Something went wrong..."));
            return;
        }
        break;
    }

    case 2://seller_login
    {
        if(isset($_POST['username']) && !empty($_POST['username']))
        {
            $username = $conn->real_escape_string($_POST['username']);
        }
        else
        {
            echo json_encode(array("res" => 0, "message" => "Username Missing..."));
            return;
        }
        if(isset($_POST['password']) && !empty($_POST['password']))
        {
            $password = $conn->real_escape_string($_POST['password']);
        }
        else
        {
            echo json_encode(array("res" => 0, "message" => "Password Missing..."));
            return;
        }

        $getLastUsernName = $conn->query("select * from fito_seller where username='$username' and password='$password'");
        $resultRow = $getLastUsernName->num_rows;
        if ($resultRow > 0){
            if ($getLastUsernName_res = $getLastUsernName->fetch_assoc()){
                // Set session variables
                $_SESSION["user"] = $username;
                $_SESSION["uid"] = $getLastUsernName_res['slno'];
            }
            echo json_encode(array("res" => 1, "message" => "Login Success!","url"=>"seller_home.php"));
            return;
        }
        else{
            echo json_encode(array("res" => 2, "message" => "Invalid Credentials!"));
            return;
        }
        break;
    }
    case 3://seller_logou
    {
        session_destroy();
        echo json_encode(array("res" => 1, "message" => "logged out","url"=>"seller_login.php"));
        break;
    }
    case 4:
    {
        if(isset($_POST['name']) && !empty($_POST['name']))
        {
            $encname = $conn->real_escape_string($_POST['name']);
            $name = $connobj->decryptIt($conn->real_escape_string($_POST['name']));
        }
        else
        {
            echo json_encode(array("res" => 0, "message" => "Product Missing"));
            return;
        }
            $uid = $connobj->decryptIt($conn->real_escape_string($_POST['uid']));
            $usertype = $conn->real_escape_string($_POST['usertype']);
//            echo $usertype;
//            return;

        if ($uid == "" || $usertype != 'dist'){
          $sessionData = array();
          //check session exist or not
            if (isset($_SESSION["guestcart"])){
                $sessionData = $_SESSION["guestcart"];
            }
            //check product is already in cart or not
            if (in_array($encname, $sessionData))
            {
                echo json_encode(array("res" => 1, "message" => "This product is already in your cart!"));
                return;
            }
            else
            {
                array_push($sessionData,$encname);
            }
            $_SESSION['guestcart'] = $sessionData;
            echo json_encode(array("res" => 2, "message" => "Product added to cart!", "item"=> sizeof($sessionData)));
            return;
        }
        else{
            $cartCheck = mysqli_query($conn,"SELECT `product_code`,COUNT(*) as count FROM `cart` WHERE userid='$uid' and product_code='$name' AND usertype='$usertype' and status='cart'");
            $cartCheck_result = mysqli_fetch_assoc($cartCheck);
            if ($cartCheck_result['count'] > 0){
                echo json_encode(array("res" => 1));
                return;
            }

            $qry = mysqli_query($conn,"INSERT INTO `cart`(`userid`,`product_code`, `quantity`, `status`, `usertype`) VALUES ('$uid','$name','1','cart','$usertype')");
            if ($qry>0){
                $cartCount = $conn->query("SELECT DISTINCT product_code FROM `cart` where userid='$uid' AND status='cart'");
                $item = $cartCount->num_rows;
                echo json_encode(array("res" => 2, "item"=>$item));
            }
        }
        break;
    }
    case 5:
    {
        if (isset($_POST['uid']) && !empty($_POST['uid'])) {
            $encuid = $conn->real_escape_string($_POST['uid']);
            $uid = $connobj->decryptIt($conn->real_escape_string($_POST['uid']));
        } else {
            echo json_encode(array("res" => 0, "message" => "User Missing"));
            return;
        }
        $cartCount = $conn->query("SELECT product_code FROM `cart` where userid='$uid' AND status='cart'");
        $item = $cartCount->num_rows;
        echo json_encode(array("res" => 1, "item"=>$item));
        break;
    }
    case 6:
    {
        if (isset($_SESSION["guestcart"])){
            $sessionData = $_SESSION["guestcart"];
        }
        $qty = 0;
        $totalprice = '';
        if (sizeof($sessionData) == 0){
            $cartResult = '<div class="col-md-12" style="margin-top: 20px;box-shadow: 2px 2px 2px 2px gray;">
            <h3 style="font-family: \'ZCOOL XiaoWei\', serif;color: #a1a5a8;letter-spacing: 1.5px;word-spacing: 1px;">MY CART</h3><hr>
            <p style="text-align: center;color: red;">NO PRODUCT IN YOUR CART...</p></div>';
            echo json_encode(array("res" => 1, "cart"=>$sessionData ,"cartArea"=>$cartResult));
            return;
        }
        $qtyArr = array();
        $cartResult = '<div class="col-md-8" style="margin-top: 20px;box-shadow: 2px 2px 2px 2px gray;">
            <h3 style="font-family: \'ZCOOL XiaoWei\', serif;color: #a1a5a8;letter-spacing: 1.5px;word-spacing: 1px;">MY CART</h3><hr>';
        foreach ($sessionData as $items){
            $prodid = $connobj->decryptIt($items);
            $qty++;
            $qry = $conn->query("select * from products where slno = '$prodid'");
            $result = $qry->fetch_assoc();
            $totalprice = floatval($totalprice) + floatval($result["dp"]);
//            print_r($result);
            $qtyArr [] = $result["slno"];
            $cartResult .= ' 
            <div class="row" style="text-align: justify;">
                <div class="col-md-3 col-sm-3">
                    <img src="admin/backend/products/'.$result["product_image"].'" style="width: 130px;height: 130px;">
                </div>
                <div class="col-md-9 col-sm-9">
                    <h4 style="font-family: \'ZCOOL XiaoWei\', serif;letter-spacing: 0.5px;">'.$result["product_name"].'</h4>
                    <p style="font-family: \'ZCOOL XiaoWei\', serif;color: #5b636a;letter-spacing: 0.5px;word-spacing: 4px;line-height: 25px;">'.$result["product_desc"].'</p>
                    <h4>₹ <span id="priceSec'.$result["slno"].'">'.$result["dp"].'</span></h4>
                    <span class="pull-left disabled" id="decreaseCartQty" onclick="decreaseCartQty('.$result["slno"].')">
                        <img src="img/Knob-Remove-icon.png" style="border: 1.5px solid gray;background: transparent;cursor: pointer;padding: 1px;margin-top: 0px;height: 40px;margin-right: 4px;border-radius: 50%;">
                    </span>
                    <input type="text" id="cartQtytextBox'.$result["slno"].'" value="1" class="pull-left" style="height: 40px;width: 40px;text-align: center;border: 1.5px solid gray;border-radius: 50%;">
                    <span class="pull-left" id="increaseCartQty" onclick="increaseCartQty('.$result["slno"].')">
                                <img src="img/Knob-Add-icon.png" style="border: 1.5px solid gray;background: transparent;margin-top: 0px;cursor: pointer;height: 40px;padding: 1px;margin-left: 4px;border-radius: 50%;">
                    </span>&nbsp;&nbsp;
                    <span><button id="removeGuestCartbtn" onclick="removeCart(\''.$items.'\')" class="btn btn-warning">REMOVE</button>
                        </span>
                     
                </div>
                <div class="row">
                    <!--                            <a href="checkout"><button class="btn custombtm">CHECKOUT</button></a>-->
                </div>
            </div><hr>';
        }
        $cartResult .= '</div><div class="col-md-3 col-xs-12" style="margin-top: 20px;box-shadow: 2px 2px 2px 2px gray;margin-left: 20px;">
            <div class="row">
                <h3 style="font-family: \'ZCOOL XiaoWei\', serif;color: #a1a5a8;letter-spacing: 1.5px;word-spacing: 1px;">PRICE DETAIL</h3>
                <hr>
                <p style="font-family: \'ZCOOL XiaoWei\', serif;letter-spacing: 1.5px;word-spacing: 1px;">Price(<span id="totalQty">'.$qty.'</span> item)<span style="float: right;">₹ <span id="totalPrice">'.$totalprice.'</span></span></p>
                <hr>
                <p style="font-family: \'ZCOOL XiaoWei\', serif;letter-spacing: 1.5px;word-spacing: 1px;">Delivery Fee<span style="float: right;">₹ 0.00</span></p>
                <hr>
                <p style="font-weight: bold;font-family: \'ZCOOL XiaoWei\', serif;letter-spacing: 1.5px;word-spacing: 1px;">Total Payable<span style="float: right;">₹ <span id="subtotalPrice">'.$totalprice. '</span></span></p>
            </div>
            <div class="row">
                <a href="javascript:void(0)"><button class="btn custombtm" onclick="proceeOrder();">CHECKOUT</button></a>
            </div>
        </div>';
        $_SESSION["cartQty"] = $qtyArr;
        echo json_encode(array("res" => 1, "cart"=>$sessionData ,"cartArea"=>$cartResult, "qty" => $qtyArr));
        break;
    }
    case 7:
    {
        if (isset($_POST['prodId']) && !empty($_POST['prodId'])) {
            $encprodId = $conn->real_escape_string($_POST['prodId']);
            $prodId = $connobj->decryptIt($conn->real_escape_string($_POST['prodId']));
        } else {
            echo json_encode(array("res" => 0));
            return;
        }
        $encuid = $conn->real_escape_string($_POST['uid']);
        $uid = $connobj->decryptIt($conn->real_escape_string($_POST['uid']));
        if ($uid == ""){
            if (isset($_SESSION["guestcart"])){
                $sessionData = $_SESSION["guestcart"];
            }
            $newSessionArray = \array_diff($sessionData,[$encprodId]);
            session_destroy();
            session_start();
            $_SESSION['guestcart'] = $newSessionArray;
            echo json_encode(array("res" => 1, "session"=>$newSessionArray));
            return;
        }
        else{
            $update = $conn->query("delete from cart where userid='$uid' and product_code='$prodId'");
            echo json_encode(array("res" => 1));
            return;
        }
        break;
    }
    case 8:
    {
        $encuid = $conn->real_escape_string($_POST['uid']);
        $uid = $connobj->decryptIt($conn->real_escape_string($_POST['uid']));
        if ($uid == ""){
            if (isset($_SESSION["cartQty"])){
                $cartQty = $_SESSION["cartQty"];
            }
            echo json_encode(array("res" => 1, "cartQty"=>$cartQty));
            return;
        }
        else{
            $cartQty = array();
            $qry = $conn->query("select product_code from cart where userid='$uid' and status='cart'");
//            $result = $qry->fetch_array();
            while ($result = $qry->fetch_assoc()){
                $cartQty [] = $result["product_code"];
            }
            echo json_encode(array("res" => 1, "cartQty"=>$cartQty));
            return;
        }
        break;
    }

    case 9:
    {
        if (isset($_POST['name']) && !empty($_POST['name'])) {
            $name = $conn->real_escape_string($_POST['name']);
        } else {
            echo json_encode(array("res" => 0, "text" => "Name Missing"));
            return;
        }
        if (isset($_POST['phone']) && !empty($_POST['phone'])) {
            $phone = $conn->real_escape_string($_POST['phone']);
        } else {
            echo json_encode(array("res" => 0, "text" => "Phone No Missing"));
            return;
        }
        if (isset($_POST['address']) && !empty($_POST['address'])) {
            $address = $conn->real_escape_string($_POST['address']);
        } else {
            echo json_encode(array("res" => 0, "text" => "Address Missing"));
            return;
        }
        $email = $conn->real_escape_string($_POST['email']);

        if (isset($_SESSION["guestcart"])){
            $sessionData = $_SESSION["guestcart"];
        }
        if (isset($_SESSION["cartItem"])){
            $cartQty = $_SESSION["cartItem"];
        }
        for ($p = 0; $p < sizeof($sessionData); $p++){
            $product_code = $connobj->decryptIt($sessionData[$p]);
            $quantity = $cartQty[$p];
//            echo "INSERT INTO `guest_cart`(`product_code`, `quantity`, `status`, `usertype`, `name`, `phone`, `email`, `address`) VALUES ('$product_code','$quantity','Ordered','guest','$name','$phone','$email','$address')".'<br>';
            $insert = $conn->query("INSERT INTO `guest_cart`(`product_code`, `quantity`, `status`, `usertype`, `name`, `phone`, `email`, `address`) VALUES ('$product_code','$quantity','Ordered','guest','$name','$phone','$email','$address')");
        }
        session_destroy();
        echo json_encode(array("res" => 1));
        break;
    }

    case 10:
    {
        $encuid = $conn->real_escape_string($_POST['uid']);
        $uid = $connobj->decryptIt($conn->real_escape_string($_POST['uid']));
        if ($uid == "") {
            $cartItem = $_POST['cartItem'];
            $_SESSION['cartItem'] = $cartItem;
            echo json_encode(array("res" => 1, "url" => 'proceed_order.php'));
            return;
        }
        else{
            $cartItem = $_POST['cartItem'];
            $cart = $_POST['cart'];
            $utype = $_POST['utype'];
            for ($cu = 0; $cu < sizeof($cartItem); $cu++){
                $qty = $cartItem[$cu];
                $product_code = $cart[$cu];

                $insert = $conn->query("INSERT INTO `orders`(`userid`, `product_code`, `quantity`, `usertype`, `date`,`status`,`order_from`) VALUES ('$uid', '$product_code', '$qty', '$utype', NOW(),'ordered','web')");

                $conn->query("delete from cart where  `product_code`='$product_code' and userid='$uid'");
            }
            echo json_encode(array("res" => 2, "url" => 'index.php'));
            return;
        }
        break;
    }

    case 11:
    {
        if (isset($_POST['uid']) && !empty($_POST['uid'])) {
            $encuid = $conn->real_escape_string($_POST['uid']);
            $uid = $connobj->decryptIt($conn->real_escape_string($_POST['uid']));
        } else {
            echo json_encode(array("res" => 0, "text" => "User Missing"));
            return;
        }
       $qry = $conn->query("select * from cart where userid='$uid' and status='cart'");
        $row = $qry->num_rows;
//        $result = $qry->fetch_assoc();
        $qty = 0;
        $totalprice = '';
        if ($row == 0){
            $cartResult = '<div class="col-md-12" style="margin-top: 20px;box-shadow: 2px 2px 2px 2px gray;">
            <h3 style="font-family: \'ZCOOL XiaoWei\', serif;color: #a1a5a8;letter-spacing: 1.5px;word-spacing: 1px;">MY CART</h3><hr>
            <p style="text-align: center;color: red;">NO PRODUCT IN YOUR CART...</p></div>';
            echo json_encode(array("res" => 1 ,"cartArea"=>$cartResult));
            return;
        }
        $cartResult = '<div class="col-md-8" style="margin-top: 20px;box-shadow: 2px 2px 2px 2px gray;">
            <h3 style="font-family: \'ZCOOL XiaoWei\', serif;color: #a1a5a8;letter-spacing: 1.5px;word-spacing: 1px;">MY CART</h3><hr>';
//        echo $row;
//        return;
        while ($result = $qry->fetch_assoc()) {
            $product_code = $result['product_code'];
            $items = $connobj->encryptIt($product_code);
            $quantity = $result['quantity'];
            $qty = (int)$qty + (int)$quantity;
            $prod_qry = $conn->query("select * from products where slno = '$product_code'");
            $prod_result = $prod_qry->fetch_assoc();
            //print_r($prod_result).'<br><br>';
          //  return;
            $price = floatval($prod_result['dp']) * floatval($quantity);
            $totalprice = floatval($totalprice) + floatval($price);
            $cartResult .= ' 
            <div class="row" style="text-align: justify;">
                <div class="col-md-3 col-sm-3">
                    <img src="admin/backend/products/'.$prod_result["product_image"].'" style="width: 130px;height: 130px;">
                </div>
                <div class="col-md-9 col-sm-9">
                    <h4 style="font-family: \'ZCOOL XiaoWei\', serif;letter-spacing: 0.5px;">'.$prod_result["product_name"].'</h4>
                    <p style="font-family: \'ZCOOL XiaoWei\', serif;color: #5b636a;letter-spacing: 0.5px;word-spacing: 4px;line-height: 25px;">'.$prod_result["product_desc"].'</p>
                    <h4>₹ <span id="priceSec'.$prod_result["slno"].'">'.$price.'</span></h4>
                    <span class="pull-left disabled" id="decreaseCartQty" onclick="decreaseCartQty('.$prod_result["slno"].')">
                        <img src="img/Knob-Remove-icon.png" style="border: 1.5px solid gray;background: transparent;cursor: pointer;padding: 1px;margin-top: 0px;height: 40px;margin-right: 4px;border-radius: 50%;">
                    </span>
                    <input type="text" id="cartQtytextBox'.$prod_result["slno"].'" value="'.$quantity.'" class="pull-left" style="height: 40px;width: 40px;text-align: center;border: 1.5px solid gray;border-radius: 50%;">
                    <span class="pull-left" id="increaseCartQty" onclick="increaseCartQty('.$prod_result["slno"].')">
                                <img src="img/Knob-Add-icon.png" style="border: 1.5px solid gray;background: transparent;margin-top: 0px;cursor: pointer;height: 40px;padding: 1px;margin-left: 4px;border-radius: 50%;">
                    </span>&nbsp;&nbsp;
                  <span><button id="removeGuestCartbtn" onclick="removeCart(\''.$items.'\')" class="btn btn-warning">REMOVE</button>
                       </span>
                     
                </div>
                <div class="row">
                    <!--                            <a href="checkout"><button class="btn custombtm">CHECKOUT</button></a>-->
                </div>
            </div><hr>';
        }
        $cartResult .= '</div><div class="col-md-3 col-xs-12" style="margin-top: 20px;box-shadow: 2px 2px 2px 2px gray;margin-left: 20px;">
            <div class="row">
                <h3 style="font-family: \'ZCOOL XiaoWei\', serif;color: #a1a5a8;letter-spacing: 1.5px;word-spacing: 1px;">PRICE DETAIL</h3>
                <hr>
                <p style="font-family: \'ZCOOL XiaoWei\', serif;letter-spacing: 1.5px;word-spacing: 1px;">Price(<span id="totalQty">'.$qty.'</span> item)<span style="float: right;">₹ <span id="totalPrice">'.$totalprice.'</span></span></p>
                <hr>
                <p style="font-family: \'ZCOOL XiaoWei\', serif;letter-spacing: 1.5px;word-spacing: 1px;">Delivery Fee<span style="float: right;">₹ 0.00</span></p>
                <hr>
                <p style="font-weight: bold;font-family: \'ZCOOL XiaoWei\', serif;letter-spacing: 1.5px;word-spacing: 1px;">Total Payable<span style="float: right;">₹ <span id="subtotalPrice">'.$totalprice. '</span></span></p>
            </div>
            <div class="row">
                <a href="javascript:void(0)"><button class="btn custombtm" onclick="proceeOrder();">CHECKOUT</button></a>
            </div>
        </div>';
        echo json_encode(array("res" => 1, "cartArea"=>$cartResult));
        return;
        break;
    }

    case 12:
    {
        if (isset($_POST['uid']) && !empty($_POST['uid'])) {
            $encuid = $conn->real_escape_string($_POST['uid']);
            $uid = $connobj->decryptIt($conn->real_escape_string($_POST['uid']));
        } else {
            echo json_encode(array("res" => 0, "text" => "User Missing"));
            return;
        }

        if (isset($_SESSION["cartItem"])){
            $cartQty = $_SESSION["cartItem"];
        }
        for ($p = 0; $p < sizeof($cartQty); $p++){
            $product_code = $connobj->decryptIt($sessionData[$p]);
            $quantity = $cartQty[$p];
//            echo "INSERT INTO `guest_cart`(`product_code`, `quantity`, `status`, `usertype`, `name`, `phone`, `email`, `address`) VALUES ('$product_code','$quantity','Ordered','guest','$name','$phone','$email','$address')".'<br>';
//            $insert = $conn->query("INSERT INTO `guest_cart`(`product_code`, `quantity`, `status`, `usertype`, `name`, `phone`, `email`, `address`) VALUES ('$product_code','$quantity','Ordered','guest','$name','$phone','$email','$address')");
        }
//        session_destroy();
        echo json_encode(array("res" => 1,'cart'=>$cartQty));
        break;
    }
    case 13:
    {
        $img_name = $conn->real_escape_string($_POST['img_name']);
        $shop_id = $conn->real_escape_string($_POST['shop_id']);
        $qry = $conn->query("select filename from fito_seller where slno=".$shop_id);
        if ($res = $qry->fetch_assoc()){
            $filenames = $res['filename'];
            $file_arr = explode(",", $filenames);
            if (($key = array_search($img_name, $file_arr)) !== false) {
                unset($file_arr[$key]);
            }
            $files = implode(",", $file_arr);
           $update = $conn->query("update fito_seller set filename='$files' where slno= '$shop_id'");
            if ($update){
                echo json_encode(array("res" => 1));
            }else{
                echo json_encode(array("res" => 0));
            }

            return;
        }
        break;
    }
    case 14://seller registration
    {
        if(isset($_POST['produt_name']) && !empty($_POST['produt_name']))
        {
            $produt_name = $conn->real_escape_string($_POST['produt_name']);
        }
        else
        {
            echo json_encode(array("res" => 0, "message" => "Please enter Product name"));
            return;
        }
        if(isset($_POST['area_name']) && !empty($_POST['area_name']))
        {
            $area_name = $conn->real_escape_string($_POST['area_name']);
        }
        else
        {
            echo json_encode(array("res" => 0, "message" => "Please enter area name"));
            return;
        }
        if(isset($_POST['owner_name']) && !empty($_POST['owner_name']))
        {
            $owner_name = $conn->real_escape_string($_POST['owner_name']);
        }
        else
        {
            echo json_encode(array("res" => 0, "message" => "Please enter owner name"));
            return;
        }
        if(isset($_POST['village']) && !empty($_POST['village']))
        {
            $village = $conn->real_escape_string($_POST['village']);
        }
        else
        {
            echo json_encode(array("res" => 0, "message" => "Please enter village name"));
            return;
        }
        if(isset($_POST['store_name']) && !empty($_POST['store_name']))
        {
            $store_name = $conn->real_escape_string($_POST['store_name']);
        }
        else
        {
            echo json_encode(array("res" => 0, "message" => "Please enter store name"));
            return;
        }
        if(isset($_POST['phone']) && !empty($_POST['phone']))
        {
            $phone = $conn->real_escape_string($_POST['phone']);
        }
        else
        {
            echo json_encode(array("res" => 0, "message" => "Please enter phone number"));
            return;
        }
        if(isset($_POST['whatsapp']) && !empty($_POST['whatsapp']))
        {
            $whatsapp = $conn->real_escape_string($_POST['whatsapp']);
        }
        else
        {
            echo json_encode(array("res" => 0, "message" => "Please enter whatsapp number"));
            return;
        }
        if(isset($_POST['store_name']) && !empty($_POST['store_name']))
        {
            $store_name = $conn->real_escape_string($_POST['store_name']);
        }
        else
        {
            echo json_encode(array("res" => 0, "message" => "Please enter store name"));
            return;
        }
        if(isset($_POST['shop_id']) && !empty($_POST['shop_id']))
        {
            $shop_id = $conn->real_escape_string($_POST['shop_id']);
        }
        else
        {
            echo json_encode(array("res" => 0, "message" => "Please shop id"));
            return;
        }
//        $random_number = random_int(100000, 999999);
//        if(isset($_FILES['files'])){
//        $file = $_FILES['file']['name'];
//        }
//        $file = $_FILES['file']['name'];
//        $filename = $random_number.$file;
        if(isset($_FILES['files'])){
            $countfiles = count($_FILES['files']['name']);
        }else{
            $countfiles = 0;
        }

        $upload_location = "uploads/tieupshop/";

        $files_arr = array();

        // Loop all files
        for($index = 0;$index < $countfiles;$index++){
            $random_number = random_int(100000, 999999);
            if(isset($_FILES['files']['name'][$index]) && $_FILES['files']['name'][$index] != ''){
                // File name
                $file = $_FILES['files']['name'][$index];
                $filename = $random_number.$file;

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

        //get all files
        $qry = $conn->query("select filename from fito_seller where slno=".$shop_id);
        if ($res = $qry->fetch_assoc()) {
            $filenames = $res['filename'];
        }
        if (strlen($images) > 0){
            $lates_files = $images.','.$filenames;
        }else{
            $lates_files = $filenames;
        }
//        echo $lates_files;die();

        //insert details
        $update = $conn->query("update `fito_seller` set `store_name` = '$store_name',`owner_name` = '$owner_name', `phone` = '$phone', `whatsapp` ='$whatsapp', `products` = '$produt_name', `area` = '$area_name',`town` = '$village', filename = '$lates_files' where slno='$shop_id'");
        if ($update){
            echo json_encode(array("res" => 1, "message" => "Your Shop Details Updated Successfully...."));
            return;
        }
        else{
            echo json_encode(array("res" => 2, "message" => "Something went wrong please try after sometime..."));
            return;
        }
        break;
    }
    case 15://delete seller details
        {
            $logged_in_user = $_SESSION["uid"];
            $delete = $conn->query("delete from fito_seller where slno='$logged_in_user'");
            if ($delete) {
            echo json_encode(array("res" => 1, "message" => "logged out", "url" => "seller_login.php"));
            session_destroy();
        }
        break;
    }
}