<?php
include_once 'header.php';
include_once('connection.php');
$connobj = new connClass();
$conn = $connobj->conn;
?>
<style>
/* Style the tab */
.tab {
    float: left;
    border: 1px solid #ccc;
    background-color: #f1f1f1;
    width: 50%;
    /*height: 300px;*/
}

/* Style the buttons inside the tab */
.tab button {
    display: block;

    background-color: inherit;
    color: black;
    padding: 22px 16px;
    width: 100%;
    border: none;
    outline: none;
    text-align: left;
    cursor: pointer;
    transition: 0.3s;
    font-size: 17px;
    border-bottom: 1px solid #ccc;
}

.tab button span {
    float: right;
}

/* Change background color of buttons on hover */
.tab button:hover {
    background-color: #ddd;
}

/* Create an active/current "tab button" class */
.tab button.active {
    background-color: #ccc;
}

/* Style the tab content */
.tabcontent {
    float: left;
    padding: 0;
    /*border: 1px solid #ccc;*/
    width: 50%;
    /*height: 300px;*/
    background-color: #db89e2;
    border: 1px solid #ccc;
    border-bottom: none;
}

.tabcontent h3 {
    display: block;
    background-color: inherit;
    color: black;
    padding: 22px 16px;
    width: 100%;
    border: none;
    outline: none;
    text-align: left;
    cursor: pointer;
    transition: 0.3s;
    font-size: 17px;
    border-bottom: 1px solid #ccc;
    margin-top: 0;
}

.tabcontent h3:hover {
    background-color: #ddd;
}
</style>

<div class="commontop" style="margin-top: 70px;">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-xs-12"
                style="border: 2px solid #ddd1d1;background-color: #f1f1f1;padding: 10px 50px;">
                <h1 style="font-weight: bold;">POST YOUR AD</h1>
                <form action="" id='add_post_form_properties' method='post' class='form-horizontal'>
                    <fieldset id="account">
                        <div class="form-group required">
                            <label class="control-label">Type Of Sell</label> <br />
                            <select class="form-control" id='add_post_form_properties_type_of_sale'>
                                <option value="Type Of Sell"
                                    style="background-color: rgb(245 180 211); font-weight: bold;">Type Of Sell</option>
                                <option value="For Direct Sell"
                                    style="background-color: rgb(245 180 211); font-weight: bold;"
                                    style="background-color: rgb(245 180 211); font-weight: bold;">For Direct Sell
                                </option>
                                <option value="Rent" style="background-color: rgb(245 180 211); font-weight: bold;">Rent
                                </option>
                                <option value="Martigage"
                                    style="background-color: rgb(245 180 211); font-weight: bold;">Martigage</option>
                                <option value="Others" style="background-color: rgb(245 180 211); font-weight: bold;">
                                    Others</option>
                            </select>
                        </div>
                        <div class="form-group required">
                            <label class="control-label">Property Type</label> <br />
                            <select class="form-control" id='add_post_form_properties_property_type'>
                                <option value="">Property Type</option>
                                <option value="House">House</option>
                                <option value="Agricultural Land">Agricultural Land</option>
                                <option value="Plot">Plot</option>
                                <option value="Apartment">Apartment</option>
                                <option value="Villas">Villas</option>
                                <option value="Farm House">Farm House</option>
                                <option value="Others">Others</option>


                        </div>

                        <div class="form-group required">
                            <label class="control-label">Model</label> <br />
                            <input type="text" class="form-control" placeholder="Model Name"
                                id='add_post_form_properties_model' style="display:none;">
                        </div>

                        <br>

                        <div class="form-group required">
                            <label class="control-label">Year</label> <br />
                            <input type="text" class="form-control" id='add_post_form_properties_year'>
                        </div>

                        <div class="form-group required">
                            <label class="control-label">Mesurement</label> <br />
                            <input type="text" class="form-control" id='add_post_form_properties_Measurement'>
                        </div>

                        <div class="form-group required">
                            <label class="control-label">Facing</label> <br />
                            <select class="form-control" id='add_post_form_properties_facing'>
                                <option value="North" style="background-color: rgb(245 180 211); font-weight: bold;">
                                    North</option>
                                <option value="South" style="background-color: rgb(245 180 211); font-weight: bold;"
                                    style="background-color: rgb(245 180 211); font-weight: bold;">South</option>
                                <option value="East" style="background-color: rgb(245 180 211); font-weight: bold;">East
                                </option>
                                <option value="West" style="background-color: rgb(245 180 211); font-weight: bold;">West
                                </option>
                                <option value="North East"
                                    style="background-color: rgb(245 180 211); font-weight: bold;">North East
                                </option>
                                <option value="North West"
                                    style="background-color: rgb(245 180 211); font-weight: bold;">North West
                                </option>
                                <option value="South East"
                                    style="background-color: rgb(245 180 211); font-weight: bold;">South East
                                </option>
                                <option value="South West"
                                    style="background-color: rgb(245 180 211); font-weight: bold;">South West
                                </option>
                            </select>
                        </div>


                        <div class="form-group required">
                            <label class="control-label">Total Floor</label> <br />
                            <select class="form-control" id='add_post_form_properties_total_floor'>
                                <option value="1" style="background-color: rgb(245 180 211); font-weight: bold;">1
                                </option>
                                <option value="2" style="background-color: rgb(245 180 211); font-weight: bold;"
                                    style="background-color: rgb(245 180 211); font-weight: bold;">2</option>
                                <option value="3" style="background-color: rgb(245 180 211); font-weight: bold;">3
                                </option>
                                <option value="4" style="background-color: rgb(245 180 211); font-weight: bold;">4
                                </option>
                                <option value="4+" style="background-color: rgb(245 180 211); font-weight: bold;">4+
                                </option>
                            </select>
                        </div>

                        <div class="form-group required">
                            <label class="control-label">Total Bedroom</label> <br />
                            <select class="form-control" id='add_post_form_properties_total_bedroom'>
                                <option value="1" style="background-color: rgb(245 180 211); font-weight: bold;">1
                                </option>
                                <option value="2" style="background-color: rgb(245 180 211); font-weight: bold;"
                                    style="background-color: rgb(245 180 211); font-weight: bold;">2</option>
                                <option value="3" style="background-color: rgb(245 180 211); font-weight: bold;">3
                                </option>
                                <option value="4" style="background-color: rgb(245 180 211); font-weight: bold;">4
                                </option>
                                <option value="4+" style="background-color: rgb(245 180 211); font-weight: bold;">4+
                                </option>
                            </select>
                        </div>

                        <div class="form-group required">
                            <label class="control-label">Total Bathroom</label> <br />
                            <select class="form-control" id='add_post_form_properties_total_bathroom'>
                                <option value="1" style="background-color: rgb(245 180 211); font-weight: bold;">1
                                </option>
                                <option value="2" style="background-color: rgb(245 180 211); font-weight: bold;"
                                    style="background-color: rgb(245 180 211); font-weight: bold;">2</option>
                                <option value="3" style="background-color: rgb(245 180 211); font-weight: bold;">3
                                </option>
                                <option value="4" style="background-color: rgb(245 180 211); font-weight: bold;">4
                                </option>
                                <option value="4+" style="background-color: rgb(245 180 211); font-weight: bold;">4+
                                </option>
                            </select>
                        </div>

                        <div class="form-group required">
                            <label class="control-label">Water Facilities</label> <br />
                            <select class="form-control" id='add_post_form_properties_water_facilities'>
                                <option value="Yes" style="background-color: rgb(245 180 211); font-weight: bold;">Yes
                                </option>
                                <option value="No" style="background-color: rgb(245 180 211); font-weight: bold;">No
                                </option>
                            </select>
                        </div>

                        <div class="form-group required">
                            <label class="control-label">Car Parking</label> <br />
                            <select class="form-control" id='add_post_form_properties_car_parking'>
                                <option value="Yes" style="background-color: rgb(245 180 211); font-weight: bold;">Yes
                                </option>
                                <option value="No" style="background-color: rgb(245 180 211); font-weight: bold;">No
                                </option>
                            </select>
                        </div>





                        <div class="form-group required">
                            <label class="control-label">No. of Owners</label> <br />
                            <label class="radio-inline">
                                <input type="radio" name="add_post_form_properties_owner" value="1st" checked> 1st
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="add_post_form_properties_owner" value="2nd"> 2nd
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="add_post_form_properties_owner" value="3rd"> 3rd
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="add_post_form_properties_owner" value="4th"> 4th
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="add_post_form_properties_owner" value="4+"> 4+
                            </label>
                        </div>

                        <div class="form-group required">
                            <label class="control-label">Ad title</label> <br />
                            <input type="text" class="form-control" id="add_post_form_properties_title">
                        </div>
                        <div class="form-group required">
                            <label class="control-label">Description </label> <br />
                            <textarea class="form-control" id="add_post_form_properties_desc"></textarea>
                        </div>
                        <div class="form-group required">
                            <label class="control-label">Sale Price</label> <br />
                            <input type="text" class="form-control" id="add_post_form_properties_price">
                        </div>
                        <div class="form-group required">
                            <label class="control-label">State</label> <br />
                            <select class="form-control" id='add_post_form_properties_state'>
                                <option value="">Select State</option>
                                <option value="Andhra Pradesh"
                                    style="background-color: rgb(245 180 211); font-weight: bold;">Andhra
                                    Pradesh
                                </option>
                                <option value="Arunachal Pradesh"
                                    style="background-color: rgb(245 180 211); font-weight: bold;">
                                    Arunachal Pradesh
                                </option>
                                <option value="Assam" style="background-color: rgb(245 180 211); font-weight: bold;">
                                    Assam</option>
                                <option value="Bihar" style="background-color: rgb(245 180 211); font-weight: bold;">
                                    Bihar</option>
                                <option value="Chhatisgarh"
                                    style="background-color: rgb(245 180 211); font-weight: bold;">
                                    Chhatisgarh</option>
                                <option value="Goa" style="background-color: rgb(245 180 211); font-weight: bold;">Goa
                                </option>
                                <option value="Gujarat" style="background-color: rgb(245 180 211); font-weight: bold;">
                                    Gujarat</option>
                                <option value="Jammu & Kashmir"
                                    style="background-color: rgb(245 180 211); font-weight: bold;">Jammu
                                    & Kashmir
                                </option>
                                <option value="Jharkhand"
                                    style="background-color: rgb(245 180 211); font-weight: bold;">Jharkhand
                                </option>
                                <option value="West Bengal"
                                    style="background-color: rgb(245 180 211); font-weight: bold;">West
                                    Bengal</option>
                                <option value="Karnataka"
                                    style="background-color: rgb(245 180 211); font-weight: bold;">Karnataka
                                </option>
                                <option value="Kerala" style="background-color: rgb(245 180 211); font-weight: bold;">
                                    Kerala</option>
                                <option value="Madhya Pradesh"
                                    style="background-color: rgb(245 180 211); font-weight: bold;">Madhya
                                    Pradesh
                                </option>
                                <option value="Maharashtra"
                                    style="background-color: rgb(245 180 211); font-weight: bold;">
                                    Maharashtra</option>
                                <option value="Manipur" style="background-color: rgb(245 180 211); font-weight: bold;">
                                    Manipur</option>
                                <option value="Meghalaya"
                                    style="background-color: rgb(245 180 211); font-weight: bold;">Meghalaya
                                </option>
                                <option value="Mizoram" style="background-color: rgb(245 180 211); font-weight: bold;">
                                    Mizoram</option>
                                <option value="Nagaland" style="background-color: rgb(245 180 211); font-weight: bold;">
                                    Nagaland</option>
                                <option value="Orissa" style="background-color: rgb(245 180 211); font-weight: bold;">
                                    Orissa</option>
                                <option value="Punjab" style="background-color: rgb(245 180 211); font-weight: bold;">
                                    Punjab</option>
                                <option value="Rajasthan"
                                    style="background-color: rgb(245 180 211); font-weight: bold;">Rajasthan
                                </option>
                                <option value="Sikkim" style="background-color: rgb(245 180 211); font-weight: bold;">
                                    Sikkim</option>
                                <option value="Tamil Nadu"
                                    style="background-color: rgb(245 180 211); font-weight: bold;">Tamil Nadu
                                </option>
                                <option value="Telangana"
                                    style="background-color: rgb(245 180 211); font-weight: bold;">Telangana
                                </option>
                                <option value="Tripura" style="background-color: rgb(245 180 211); font-weight: bold;">
                                    Tripura</option>
                                <option value="Uttarakhand"
                                    style="background-color: rgb(245 180 211); font-weight: bold;">
                                    Uttarakhand</option>
                                <option value="Kerala" style="background-color: rgb(245 180 211); font-weight: bold;">
                                    Kerala</option>
                                <option value="Delhi" style="background-color: rgb(245 180 211); font-weight: bold;">
                                    Delhi</option>
                            </select>
                        </div>


                        <div class="form-group required">
                            <label class="control-label">Property City</label> <br />
                            <input type="text" class="form-control" placeholder="City Name"
                                id="add_post_form_properties_city">
                        </div>

                        <div class="form-group required">
                            <label class="control-label">Near By Town Name</label> <br />
                            <input type="text" class="form-control" id='add_post_form_properties_near_town'>
                        </div>
                        <!-- 
                        <div class="form-group required">
                            <label class="control-label">Monthly Rent</label> <br/>
                            <input type="text" class="form-control" id="add_post_form_properties_price">
                        </div>
                        <div class="form-group required">
                            <label class="control-label">Martigage Price</label> <br/>
                            <input type="text" class="form-control" id="add_post_form_properties_price">
                        </div> -->
                        <div class="form-group required">
                            <label class="control-label">images</label> <br />
                            <input type="file" class="form-control" id="add_post_form_properties_files"
                                name="add_post_form_properties_files[]" multiple>
                        </div>

                        <h1>For Refferrer Amount (For Office PROOF Only)</h1>
                        <div class="form-group required">
                            <label class="control-label">Referrer Mediator or Owner </label> <br />
                            <label class="radio-inline">
                                <input type="radio" name="add_post_form_properties_referrer" value="Mediator" checked>
                                Mediator
                            </label>



                            <label class="radio-inline">
                                <input type="radio" name="add_post_form_properties_referrer" value="Owner"> Owner
                            </label>
                        </div>
                        <div class="form-group required">
                            <label class="control-label">Your Name</label> <br />
                            <input type="text" class="form-control" placeholder="Your Name"
                                id="add_post_form_properties_name">
                        </div>
                        <div class="form-group required">
                            <label class="control-label">Your Number</label> <br />
                            <input type="phone" class="form-control" placeholder="Phone"
                                id="add_post_form_properties_phone">
                        </div>
                        <div class="form-group required">
                            <label class="control-label">Your Town And Address</label> <br />
                            <input type="text" class="form-control" placeholder="Your Town & Address"
                                id="add_post_form_properties_town">
                        </div>


                        <div class="form-group required">
                            <label class="control-label">Document Xerox Submit</label> <br />
                            <label class="radio-inline">
                                <input type="radio" name="add_post_form_properties_Document_Xerox" value="Yes" checked>
                                Yes
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="add_post_form_properties_Document_Xerox" value="No"> No
                            </label>
                        </div>
                        <div class="form-group required">
                            <label class="control-label">Document Holder Name</label> <br />
                            <input type="text" class="form-control" id="add_post_form_properties_Document_Holder_Name">
                        </div>

                    </fieldset>
                    <div class="" id="regError" style="color: red;"></div>
                    <div class="buttons">
                        <div class="form-group">
                            <input type="button" value="Submit" id="add_post_form_properties_btnAdd"
                                class="btn btn-primary" />
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

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
// $('#add_post_form_properties_brand').on("change", function (e) {
//     e.preventDefault();
//     $('#add_post_form_properties_model').html('');
//     $('#add_post_form_properties_varient').html('');
//     let brand = $('#add_post_form_properties_brand').val();
//     getModel(brand);
// });
// $('#add_post_form_properties_model').on("change", function (e) {
//     e.preventDefault();
//     $('#add_post_form_properties_varient').html('');
//     let model = $('#add_post_form_properties_model').val();
//     getVarient(model);
// });

$('#add_post_form_properties_btnAdd').on("click", function(e) {
    e.preventDefault();
    var uid = localStorage.getItem('uid');

    // let model = $('#add_post_form_cars_model').val();


    var uid = localStorage.getItem('uid');
    var catid = '<?php echo $cat_id ?>';
    var subcatid = '<?php echo $sub_cat_id ?>';
    let type_of_sale = $('#add_post_form_properties_type_of_sale').val();
    // let model = $('#add_post_form_properties_model').val();
    let year = $('#add_post_form_properties_year').val();
    let Measurement = $('add_post_form_properties_Measurement').val();
    let Facing = $('#add_post_form_properties_facing').val();
    let Total_Floor = $('#add_post_form_properties_total_floor').val();
    let Total_Bedroom = $('#add_post_form_properties_total_bedroom').val();
    let Total_Bathroom = $('#add_post_form_properties_total_bathroom').val();
    let Water_Facilities = $('#add_post_form_properties_water_facilities').val();
    let Car_Parking = $('#add_post_form_properties_car_parking').val();
    let owner = $('input[name="add_post_form_properties_owner"]:checked').val();
    let referrer = $('input[name="add_post_form_properties_referrer"]:checked').val();
    let title = $('#add_post_form_properties_title').val();
    let desc = $('#add_post_form_properties_desc').val();
    let price = $('#add_post_form_properties_price').val();
    let state = $('#add_post_form_properties_state').val();
    let city = $('#add_post_form_properties_city').val();
    let name = $('#add_post_form_properties_name').val();
    let phone = $('#add_post_form_properties_phone').val();
    let town = $('#add_post_form_properties_town').val();
    let Document_Xerox = $('input[name="add_post_form_properties_Document_Xerox"]:checked').val();
    let Document_Holder_Name = $('#add_post_form_properties_Document_Holder_Name').val();

    // console.log(Document_Xerox,Document_Holder_Name);return;

    var form_data = new FormData();

    form_data.append("fid", 7);
    form_data.append("uid", uid);
    form_data.append("catid", catid);
    form_data.append("subcatid", subcatid);
    // form_data.append("type_of_sale", type_of_sale);
    // form_data.append("model", model);
    form_data.append("Year", year);
    form_data.append("Measurement", Measurement);
    form_data.append("Facing", Facing);
    form_data.append("Total_Floor", Total_Floor);
    form_data.append("Total_Bedroom", Total_Bedroom);
    form_data.append("Total_Bathroom", Total_Bathroom);
    form_data.append("Water_Facilities", Water_Facilities);
    form_data.append("Car_Parking", Car_Parking);
    form_data.append("owner", owner);
    form_data.append("referrer", referrer);
    form_data.append("title", title);
    form_data.append("desc", desc);
    form_data.append("price", price);
    form_data.append("uid", uid);
    form_data.append("state", state);
    form_data.append("city", city);
    form_data.append("name", name);
    form_data.append("phone", phone);
    form_data.append("town", town);
    form_data.append("Document_Xerox", Document_Xerox);
    form_data.append("Document_Holder_Name", Document_Holder_Name);



    // Read selected files
    var totalfiles = document.getElementById('add_post_form_properties_files').files.length;
    for (var index = 0; index < totalfiles; index++) {
        form_data.append("files[]", document.getElementById('add_post_form_properties_files').files[index]);
    }
    $.ajax({
        url: 'functions.php',
        type: 'post',
        data: form_data,
        dataType: 'json',
        contentType: false,
        processData: false,
        success: function(response) {
            if (response.res == 1) {
                Swal.fire(
                    'Good job!',
                    'Your post has been added successfully!',
                    'success'
                )
            } else {
                Swal.fire(
                    '',
                    'Something went wrong.Please contact your administrator!',
                    'error'
                )
            }
        }
    });
});



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