<?php
session_start();
date_default_timezone_set('Asia/Kolkata');
include_once('admin/connection.php');
$connobj = new connClass();
$conn=$connobj->conn;
$schExt=$connobj->schExt;
if (!isset($_SESSION["user"])){
    header('Location: seller_login.php');
}
$logged_in_user =  $_SESSION["uid"];
//echo $logged_in_user;
include_once 'header.php';
?>
<link rel="stylesheet" href="admin/custom/dist/css/dropzone.css">
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
                <?php
                $qry = $conn->query("select * from fito_seller where slno='$logged_in_user'");
                $result = $qry->fetch_assoc();
                ?>
                <h2>
                    Welcome, <?php echo $result['store_name']?>
                    <span style="float: right;background: #e31212;font-size: 17px;padding: 2px 6px;color: white;border-radius: 5px;cursor: pointer;" id="logout_btn">Logout</span>
                </h2>
                <p class="text-center" style="font-size: 25px;font-weight: bold;letter-spacing: 1px;color: black;text-decoration: underline;">Your Shop Details
                    <span onclick="enable_edit_option();" style="text-decoration: none;float: right;font-size: 16px;color: white;background: #28844e;padding: 2px 17px 5px;border-radius: 5px;cursor: pointer;">Edit</span>
                    <span onclick="delete_seller();" style="text-decoration: none;float: right;font-size: 16px;color: white;background: #e31212;padding: 2px 17px 5px;border-radius: 5px;cursor: pointer;margin-right: 3px;">Delete</span>
                </p>
                <div class="form-group row">
                    <label for="enq_visited_person" class="col-md-4 col-form-label">Your Store Photo <span style="font-size: 22px;color: red;">*</span></label>
                    <div class="col-md-8">
                        <div class="row">
                        <?php
                        $filenames =  $result['filename'];
                        $filename_arr = explode(",", $filenames);
                        foreach ($filename_arr as $value) {
                            $file_path = 'uploads/tieupshop/'.$value;
                            ?>

                                <div class="col-md-4">
                                    <img src="<?php echo $file_path; ?>" style="width: 100%;height: 100px;padding: 5px;">
                                    <div class="remove_seller_img" onclick="remove_seller_img('<?php echo $value; ?>')" style="text-align: center;color: red;cursor: pointer;display: none">Remove</div>
                                </div>

                            <?php
                            }
                        ?>
                        </div>
                        <input type="file" class="form-control hide" id="seller_store_photo" multiple>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="enq_visited_person" class="col-md-4 col-form-label">Your Products Name <span style="font-size: 22px;color: red;">*</span></label>
                    <div class="col-md-8">
                        <input type="text" class="form-control" id="seller_store_product_name" placeholder="Your Products Name" value="<?php echo $result['products'] ?>" disabled>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="enq_visited_person" class="col-md-4 col-form-label">Your Shop Name <span style="font-size: 22px;color: red;">*</span></label>
                    <div class="col-md-8">
                        <input type="text" class="form-control" id="seller_store_name" placeholder="Shop Name" value="<?php echo $result['store_name'] ?>" disabled>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="enq_visited_person" class="col-md-4 col-form-label">Owner Name</label>
                    <div class="col-md-8">
                        <input type="text" class="form-control" id="seller_store_owner" placeholder="Owner Name" value="<?php echo $result['owner_name'] ?>" disabled>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="enq_visited_person" class="col-md-4 col-form-label">Area Name</label>
                    <div class="col-md-8">
                        <input type="text" class="form-control" id="seller_store_area" placeholder="Area Name" value="<?php echo $result['area'] ?>" disabled>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="enq_visited_person" class="col-md-4 col-form-label">Town and Village Name</label>
                    <div class="col-md-8">
                        <input type="text" class="form-control" id="seller_store_village" placeholder="Town and Village Name" value="<?php echo $result['town'] ?>" disabled>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="enq_visited_person" class="col-md-4 col-form-label">Phone No</label>
                    <div class="col-md-8">
                        <input type="text" class="form-control" id="seller_phone" placeholder="Phone No" value="<?php echo $result['phone'] ?>" disabled>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="enq_visited_person" class="col-md-4 col-form-label">Whatsapp No</label>
                    <div class="col-md-8">
                        <input type="text" class="form-control" id="seller_store_whatsapp" placeholder="Whatsapp No" value="<?php echo $result['whatsapp'] ?>" disabled>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-8">
                        <p id="seller_reg_error"></p>
                    </div>
                </div>
                <div class="form-group row">
                    <button class="btn btn-purple hide" id="seller_reg_btn" style="margin-left: 40%;color: #28844e;">Update</button>
                </div>

            </div>
        </div>
    </div>
</div>
<?php
include_once 'footer.php';
?>
<script src="admin/custom/dist/js/dropzone.js"></script>
<script src="admin/assets/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="admin/assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>

<!--<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>-->
<script src="https://cdn.datatables.net/buttons/1.6.0/js/dataTables.buttons.min.js"></script>

<script>
    $(document).ready(function (e) {
        var fad_product = 0;
        var productDropzone = new Dropzone("#add_product_image", {
            url: 'upload_product.php',
            autoProcessQueue:false,
            uploadMultiple: false,
            addRemoveLinks: true,
            parallelUploads: 10,
            maxFiles: 3,
            maxFilesize: 1,
            acceptedFiles: "image/*",
            dictDefaultMessage: 'Image size should be less than 1 MB and not more than 3 images..',
            init: function() {
                console.log('init');
                this.on("maxfilesexceeded", function (file) {
                    alert("No more files please!");
                    this.removeFile(file);
                });
                this.on("sending", function(file, xhr, formData) {
                    formData.append("product_name", $('#add_product_name').val());
                    formData.append("hsn", $('#add_product_hsn').val());
                    formData.append("gst", $('#add_product_gst').val());
                    formData.append("features", $('#add_product_feature').val());
                    formData.append("offer", $('#add_product_offer').val());
                    formData.append("mrp", $('#add_product_mrp').val());
                    formData.append("giving", $('#add_product_giving').val());
                    formData.append("retail", $('#add_product_retail').val());
                    formData.append("quantity", $('#add_product_qty').val());
                });
                this.on("addedfile", function(file) { fad_product=1; });
                this.on("removedfile", function(file) { fad_product=0; });
            },


        });

        $('#add_product_btn').click(function(){
            var product_name = $('#add_product_name').val();
            var hsn = $('#add_product_hsn').val();
            var gst = $('#add_product_gst').val();
            var features = $('#add_product_feature').val();
            var offer = $('#add_product_offer').val();
            var mrp = $('#add_product_mrp').val();
            var giving = $('#add_product_giving').val();
            var retail = $('#add_product_retail').val();
            var quantity = $('#add_product_qty').val();
            if (product_name == "" || hsn == "" || gst == "" || features == "" || mrp == "" || giving == "" || retail == "" || quantity == ""){
                $('#add_product_error').html('<span style="background: red;padding: 3px 7px;border-radius: 4px;font-weight: bold;letter-spacing: 1px;">Please Fill Required Fiels!</span>');
                return;
            }
            if (fad_product < 1){
                $('#add_product_error').html('<span style="background: red;padding: 3px 7px;border-radius: 4px;font-weight: bold;letter-spacing: 1px;">Please Select Images!</span>');
                return;
            }
            if (fad_product > 0){
                productDropzone.processQueue();
                productDropzone.on("success", function (file,response) {
                    $('#add_product_error').html('<span style="background: green;padding: 3px 7px;border-radius: 4px;font-weight: bold;letter-spacing: 1px;">Product added!</span>');
                    productDropzone.removeFile(file);
                });
            }
        });
    });
    $('#logout_btn').click(function(){
        $.ajax({
            method: "POST",
            dataType: 'json',
            url: "functions.php",
            data:{fid:3}
        })
            .done(function(msg){
                if (msg.res == 1){
                    window.location=msg.url;
                }
            });
    });

</script>

<script>
    function enable_edit_option() {
        $('.remove_seller_img').css("display","block");
        $('#seller_store_photo').removeClass('hide');
        $('#seller_store_product_name').removeAttr("disabled");
        $('#seller_store_name').removeAttr("disabled");
        $('#seller_store_owner').removeAttr("disabled");
        $('#seller_store_area').removeAttr("disabled");
        $('#seller_store_village').removeAttr("disabled");
        $('#seller_phone').removeAttr("disabled");
        $('#seller_store_whatsapp').removeAttr("disabled");
        $('#seller_reg_btn').removeClass('hide');
    }
    function remove_seller_img(img_name) {
        console.log(img_name);
        var shop_id = '<?php echo $logged_in_user;?>';
        $.ajax({
            method: "POST",
            dataType: 'json',
            url: "functions.php",
            data:{fid:13,img_name:img_name, shop_id:shop_id}
        })
            .done(function(msg){
                if (msg.res == 1){
                    window.location.reload();
                }
            });
    }
    $('#seller_reg_btn').click(function() {
        $('#seller_reg_error').html('');
        var produt_name = $('#seller_store_product_name').val();
        var store_name = $('#seller_store_name').val();
        var owner_name = $('#seller_store_owner').val();
        var area_name = $('#seller_store_area').val();
        var village = $('#seller_store_village').val();
        var phone = $('#seller_phone').val();
        var whatsapp = $('#seller_store_whatsapp').val();
        var shop_id = '<?php echo $logged_in_user;?>';


        var form_data = new FormData();

        form_data.append("fid", 14);
        // form_data.append("file", file);
        form_data.append("produt_name", produt_name);
        form_data.append("store_name", store_name);
        form_data.append("owner_name", owner_name);
        form_data.append("area_name", area_name);
        form_data.append("village", village);
        form_data.append("phone", phone);
        form_data.append("whatsapp", whatsapp);
        form_data.append("shop_id", shop_id);

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
    function delete_seller() {
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    method: "POST",
                    dataType: 'json',
                    url: "functions.php",
                    data:{fid:15}
                })
                    .done(function(msg){
                        if (msg.res == 1){
                            window.location=msg.url;
                        }
                    });
            }
        });

    }
</script>

