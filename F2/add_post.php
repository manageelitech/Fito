<?php
include_once 'header.php';
include_once('connection.php');
$connobj = new connClass();
$conn = $connobj->conn;

$cat_name = $connobj->decryptIt($_GET['cat']);
$cat_id = $connobj->decryptIt($_GET['catid']);
$sub_cat_id = $connobj->decryptIt($_GET['subcatid']);
// echo $cat_name.'---'.$cat_id.'---'.$sub_cat_id;
$page_name = $cat_name;
$page = '';
if (file_exists($page_name.'.php')){
    $page = $page_name.'.php';
}else{
    $page = 'Furniture.php';
}
include_once $page;
//echo $page_name.'.php';
?>

<!-- ad-single end here -->

<!-- footer start here -->
<script>
$(document).ready(function(e) {
    if (localStorage.getItem('login_status') != 'true') {
        window.location.replace("login.php");
        return;
    }
    var uid = localStorage.getItem('uid');
    $.ajax({
            type: "POST",
            dataType: 'json',
            url: "functions.php",
            data: {
                fid: 3,
                uid: uid
            },
        })
        .done(function(response) {
            $('#login_name').html(response.name);
            $('#login_phone').html(response.phone);
            var name = response.name;
            var res = name.split(" ");
            var namei;
            if (res.length > 1) {
                var namei = res[0].charAt(0) + res[(res.length - 1)].charAt(0);
            } else {
                var namei = res[0].charAt(0);
            }
            $('#login_name_i').html(namei);
        });
});
</script>
<script>
function openCity(evt, cityName) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(cityName).style.display = "block";
    evt.currentTarget.className += " active";
}

// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpen").click();
</script>
<script>
// $('#add_post_form_cars_brand').on("change", function (e) {
//     e.preventDefault();
//     $('#add_post_form_cars_model').html('');
//     $('#add_post_form_cars_varient').html('');
//     let brand = $('#add_post_form_cars_brand').val();
//     getModel(brand);
// });
// $('#add_post_form_cars_model').on("change", function (e) {
//     e.preventDefault();
//     $('#add_post_form_cars_varient').html('');
//     let model = $('#add_post_form_cars_model').val();
//     getVarient(model);
// });
// $('#add_post_form_cars_btnAdd').on("click", function (e) {
//     e.preventDefault();
//     var uid = localStorage.getItem('uid');
//     let brand = $('#add_post_form_cars_brand').val();
//     let model = $('#add_post_form_cars_model').val();
//     let varient = $('#add_post_form_cars_varient').val();
//     let year = $('#add_post_form_cars_year').val();
//     let fuel = $('input[name="add_post_form_cars_fuel"]:checked').val();
//     let transmission = $('input[name="add_post_form_cars_transmission"]:checked').val();
//     let owner = $('input[name="add_post_form_cars_owner"]:checked').val();
//     let referrer = $('input[name="add_post_form_cars_referrer"]:checked').val();
//     let title = $('#add_post_form_cars_title').val();
//     let desc = $('#add_post_form_cars_desc').val();
//     let price = $('#add_post_form_cars_price').val();
//     let state = $('#add_post_form_cars_state').val();
//     let city = $('#add_post_form_cars_city').val();

//     var form_data = new FormData();

//     form_data.append("fid", 6);
//     form_data.append("brand", brand);
//     form_data.append("model", model);
//     form_data.append("varient", varient);
//     form_data.append("fuel", fuel);
//     form_data.append("transmission", transmission);
//     form_data.append("owner", owner);
//     form_data.append("referrer", referrer);
//     form_data.append("title", title);
//     form_data.append("desc", desc);
//     form_data.append("price", price);
//     form_data.append("uid", uid);
//     form_data.append("state", state);
//     form_data.append("city", city);
//     // Read selected files
//     var totalfiles = document.getElementById('add_post_form_cars_files').files.length;
//     for (var index = 0; index < totalfiles; index++) {
//         form_data.append("files[]", document.getElementById('add_post_form_cars_files').files[index]);
//     }
//     $.ajax({
//         url: 'functions.php',
//         type: 'post',
//         data: form_data,
//         dataType: 'json',
//         contentType: false,
//         processData: false,
//         success: function (response) {
//             console.log(response);
//         }
//     });
// });



// function getModel(brand) {
//     $.ajax({
//         type: "POST",
//         dataType: 'json',
//         url: "functions.php",
//         data: {fid : 4,brand:brand },
//     })
//         .done(function(response){
//             $('#add_post_form_cars_model').html(response.model);
//         });
// }
// function getVarient(model) {
//     $.ajax({
//         type: "POST",
//         dataType: 'json',
//         url: "functions.php",
//         data: {fid : 5,model:model },
//     })
//         .done(function(response){
//             $('#add_post_form_cars_varient').html(response.varient);
//         });
// }
</script>
<?php
include_once 'footer.php';
?>