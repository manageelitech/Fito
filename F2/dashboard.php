<?php
session_start();
include_once 'header.php';
include_once('connection.php');
$connobj = new connClass();
$conn = $connobj->conn;
$user_id = $connobj->decryptIt($_SESSION["uid"]);
?>

<!-- ad-single start here -->
<div class="commontop" style="margin-top: 70px;">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-xs-12">
                <div class="dashboard">
                    <div class="profile">
                        <div class="col-sm-6 col-xs-12">
                            <div>
                                <span style="background: #fed700;font-size: 100px;color: white;font-weight: bolder;border-radius: 50%;padding: 17px;" id="login_name_i">MA</span>
                            </div>
                            <div class="col-sm-6 col-xs-12 padd0">
                                <h4 id="login_name"></h4>
                                <div class="common">
                                    <p class="des"><i class="la la-mobile-phone"></i> <span id="login_phone"></span></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-xs-12 padd0">

                            <ul class="list-inline">
                                <li class="active" id="main_li"><a href="javascript:void(0)" onclick="get_dash_section('main')"><img src="images/dashboard/grid.png" alt="image" title="image" /><p>Dashboard</p></a></li>
                                <li class="" id="myadd_section_li"><a href="javascript:void(0)" onclick="get_dash_section('myadd_section')"><img src="images/dashboard/card.png" alt="image" title="image" /><p>My Ads</p></a></li>
                                <li class="" id="mysearch_section_li"><a href="javascript:void(0)" onclick="get_dash_section('mysearch_section')"><img src="images/dashboard/search.png" alt="image" title="image" /><p>My Searches</p></a></li>
                                <li class="" id="myfav_section_li"><a href="javascript:void(0)" onclick="get_dash_section('myfav_section')"><img src="images/dashboard/heart.png" alt="image" title="image" /><p>Favourite Ads</p></a></li>
                                <li class="" id="mymessage_section_li"><a href="javascript:void(0)" onclick="get_dash_section('mymessage_section')"><img src="images/dashboard/message.png" alt="image" title="image" /><p>Messages</p></a></li>
                                <li class="" id="mysetting_section_li"><a href="javascript:void(0)" onclick="get_dash_section('mysetting_section')"><img src="images/dashboard/setting.png" alt="image" title="image" /><p>Setting</p></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="hide" id="main"></div>
                    <div class="hide" id="mysearch_section"></div>
                    <div class="hide" id="myfav_section"></div>
                    <div class="hide" id="mymessage_section"></div>
                    <div class="hide" id="myadd_section">
                        <?php include_once 'dash_ads.php'?>
                    </div>
                    <div class="hide" id="mysetting_section">
                        <?php include_once 'dash_settings.php'?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- ad-single end here -->

<!-- footer start here -->
<script>
    $(document).ready(function (e) {
        if (localStorage.getItem('login_status') != 'true'){
            window.location.replace("login.php");
            return;
        }
        var uid = localStorage.getItem('uid');
        $.ajax({
            type: "POST",
            dataType: 'json',
            url: "functions.php",
            data: {fid : 3,uid:uid },
        })
            .done(function(response){
                $('#login_name').html(response.name);
                $('#login_phone').html(response.phone);
                var name = response.name;
                var res = name.split(" ");
                var namei;
                if (res.length > 1){
                   var namei =  res[0].charAt(0)+res[(res.length - 1)].charAt(0);
                }else {
                    var namei =  res[0].charAt(0);
                }
                $('#login_name_i').html(namei);
            });
    });
    function hide_dash_sec() {
        $('#myadd_section').addClass('hide');
        $('#mysetting_section').addClass('hide');
        $('#main').addClass('hide');
        $('#myfav_section').addClass('hide');
        $('#mysearch_section').addClass('hide');
        $('#mymessage_section').addClass('hide');

        $('#myadd_section_li').removeClass('active');
        $('#mysetting_section_li').removeClass('active');
        $('#main_li').removeClass('active');
        $('#myfav_section_li').removeClass('active');
        $('#mysearch_section_li').removeClass('active');
        $('#mymessage_section_li').removeClass('active');
    }
    function get_dash_section(section) {
        hide_dash_sec();
        $('#'+section).removeClass('hide');
        $('#'+section+'_li').addClass('active');
    }
</script>

<?php
include_once 'footer.php';
?>
