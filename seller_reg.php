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
}
    .col-form-label{
        color: #000000 !important;
    }
</style>
<div class="container-fluid" style="background: aliceblue">
    <div class="container seller_form_area">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8" style="background: #00f3ff82;padding: 10px 30px;border-radius: 10px;">
                <div class="form-group row">
                    <p style="color: black;">Already have a account <span><a href="seller_login.php" style="color: red;">Login</a></span></p>
                </div>
                <p class="text-center" style="font-size: 25px;font-weight: bold;letter-spacing: 1px;color: black;text-decoration: underline;"> Tie Up Shops Registration</p>
                <div class="form-group row">
                    <label for="enq_visited_person" class="col-md-4 col-form-label">Your Store Photo <span style="font-size: 22px;color: red;">*</span></label>
                    <div class="col-md-8">
                        <input type="file" class="form-control" id="seller_store_photo" multiple>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="enq_visited_person" class="col-md-4 col-form-label">Your Products Name <span style="font-size: 22px;color: red;">*</span></label>
                    <div class="col-md-8">
                        <input type="text" class="form-control" id="seller_store_product_name" placeholder="Your Products Name">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="enq_visited_person" class="col-md-4 col-form-label">Your Shop Name <span style="font-size: 22px;color: red;">*</span></label>
                    <div class="col-md-8">
                        <input type="text" class="form-control" id="seller_store_name" placeholder="Shop Name">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="enq_visited_person" class="col-md-4 col-form-label">Owner Name</label>
                    <div class="col-md-8">
                        <input type="text" class="form-control" id="seller_store_owner" placeholder="Owner Name">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="enq_visited_person" class="col-md-4 col-form-label">Area Name</label>
                    <div class="col-md-8">
                        <input type="text" class="form-control" id="seller_store_area" placeholder="Area Name">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="enq_visited_person" class="col-md-4 col-form-label">Town and Village Name</label>
                    <div class="col-md-8">
                        <input type="text" class="form-control" id="seller_store_village" placeholder="Town and Village Name">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="enq_visited_person" class="col-md-4 col-form-label">Phone No</label>
                    <div class="col-md-8">
                        <input type="text" class="form-control" id="seller_phone" placeholder="Phone No">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="enq_visited_person" class="col-md-4 col-form-label">Whatsapp No</label>
                    <div class="col-md-8">
                        <input type="text" class="form-control" id="seller_store_whatsapp" placeholder="Whatsapp No">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="enq_visited_person" class="col-md-4 col-form-label">I Agree </label>
                    <div class="col-md-8">
                        <select id="seller_reg_agree" class="form-control">
                            <option value="Yes">Yes</option>
                            <option value="No">No</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-8">
                        <p id="seller_reg_error"></p>
                    </div>
                </div>
                <div class="form-group row">
                    <button class="btn btn-purple" id="seller_reg_btn" style="margin-left: 40%;color: #28844e;">Register</button>
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
$('#seller_reg_btn').click(function() {
    $('#seller_reg_error').html('');
    var produt_name = $('#seller_store_product_name').val();
    var store_name = $('#seller_store_name').val();
    var owner_name = $('#seller_store_owner').val();
    var area_name = $('#seller_store_area').val();
    var village = $('#seller_store_village').val();
    var phone = $('#seller_phone').val();
    var whatsapp = $('#seller_store_whatsapp').val();
    var agree = $('#seller_reg_agree').val();
    // var file = $('#seller_store_photo')[0].files[0];

    if (agree != 'Yes'){
        $('#seller_reg_error').html('<span style="background: red;padding: 3px 7px;border-radius: 4px;font-weight: bold;letter-spacing: 1px;">Please select yes.</span>');
        return;
    }

    var form_data = new FormData();

    form_data.append("fid", 1);
    // form_data.append("file", file);
    form_data.append("produt_name", produt_name);
    form_data.append("store_name", store_name);
    form_data.append("owner_name", owner_name);
    form_data.append("area_name", area_name);
    form_data.append("village", village);
    form_data.append("phone", phone);
    form_data.append("whatsapp", whatsapp);

    var totalfiles = document.getElementById('seller_store_photo').files.length;
    for (var index = 0; index < totalfiles; index++) {
        form_data.append("files[]", document.getElementById('seller_store_photo').files[index]);
    }

    $.ajax({
        url: 'functions.php',
        type: 'post',
        data: form_data,
        dataType: 'json',
        contentType: false,
        processData: false,
        success: function (msg) {
            if (msg.res == 1) {
                $('#seller_reg_error').html('<span style="background: green;padding: 3px 7px;border-radius: 4px;font-weight: bold;letter-spacing: 1px;">' + msg.message + '</span>');
                return;
            } else {
                $('#seller_reg_error').html('<span style="background: red;padding: 3px 7px;border-radius: 4px;font-weight: bold;letter-spacing: 1px;">' + msg.message + '</span>');
                return;
            }
        }
    });
});
</script>

