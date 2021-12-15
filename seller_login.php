<?php
session_start();
date_default_timezone_set('Asia/Kolkata');
include_once('admin/connection.php');
$connobj = new connClass();
$conn=$connobj->conn;
$schExt=$connobj->schExt;
if (isset($_SESSION["user"])){
    header('Location: seller_home.php');
}
include_once 'header.php';
?>
<style>
.seller_form_area{
    margin-top: 156px;
    background: aliceblue;
    margin-bottom: 20px;
}
    .btn{
        background: #28844e;
    }
    label{
        color: black;
    }
</style>
<div class="container-fluid" style="background: aliceblue">
    <div class="container seller_form_area">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8" style="background: #00f3ff82;padding: 10px 30px;border-radius: 10px;">
                <div class="form-group row">
                    <p style="color: black;">Don't have a account <span><a href="seller_reg.php" style="color: red;">Register</a></span></p>
                </div>
                <p class="text-center" style="font-size: 25px;font-weight: bold;letter-spacing: 1px;color: black;text-decoration: underline;">Fito Tie Up Login</p>
                <div class="form-group row">
                    <label for="seller_login_username" class="col-md-4 col-form-label">Username</label>
                    <div class="col-md-8">
                        <input type="text" class="form-control" id="seller_login_username" placeholder="Username" style="text-transform: uppercase">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="enq_visited_person" class="col-md-4 col-form-label">Password</label>
                    <div class="col-md-8">
                        <input type="password" class="form-control" id="seller_login_password" placeholder="password" style="text-transform: uppercase">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="enq_visited_person" class="col-md-4 col-form-label"></label>
                    <div class="col-md-8">
                        <p id="seller_login_error"></p>
                    </div>
                </div>
                <div class="form-group row">
                    <button class="btn btn-purple" id="seller_login_btn" style="margin-left: 40%;">Login</button>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
include_once 'footer.php';
?>
<script src="admin/assets/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="admin/assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>

<!--<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>-->
<script src="https://cdn.datatables.net/buttons/1.6.0/js/dataTables.buttons.min.js"></script>

<script>
    $('#seller_login_btn').click(function(){
        $('#seller_reg_error').html('');
        var username = $('#seller_login_username').val();
        var password = $('#seller_login_password').val();
        if (username == "" || password == ""){
            $('#seller_login_error').html('<span style="background: red;padding: 3px 7px;border-radius: 4px;font-weight: bold;letter-spacing: 1px;">Please enter username and password</span>');
            return;
        }
        $.ajax({
            method: "POST",
            dataType: 'json',
            url: "functions.php",
            data:{fid:2,username:username,password:password}
        })
            .done(function(msg){
                if (msg.res == 1){
                    $('#seller_reg_error').html('<span style="background: green;padding: 3px 7px;border-radius: 4px;font-weight: bold;letter-spacing: 1px;">'+msg.message+'</span>');
                    window.location=msg.url;
                }
                else {
                    $('#seller_reg_error').html('<span style="background: red;padding: 3px 7px;border-radius: 4px;font-weight: bold;letter-spacing: 1px;">'+msg.message+'</span>');
                    return;
                }
            });
    });
</script>

