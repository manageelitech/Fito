<?php
date_default_timezone_set('Asia/Kolkata');
include_once('admin/connection.php');
$connobj = new connClass();
$conn=$connobj->conn;
$schExt=$connobj->schExt;

include_once 'header.php';
?>
                <div class="inner-banner-main">
                    <img src="contact-us/cimg.jpg">
                    <div class="inner-banner-txt">
                        <hgroup>
                            <h1>
                                
                            </h1>
                            <h2></h2>
                        </hgroup>
                    </div>
                </div>
                <div class="clearfix"></div>



<!--=== Breadcrumbs ===-->
<!--/breadcrumbs-->
<!--=== End Breadcrumbs ===-->
<div class="container content profile">
    <div class="row">
        <div class="profile-body">
            <div class="headline">
            <p style="color: white;font-size: 20px;font-weight: bold;">COMPANY</p>
                <div class="col-sm-6 md-margin-bottom-20">
                    <div class="panel panel-profile no-bg">
                        <div class="panel-heading overflow-h">
                            <h2 class="panel-title heading-sm pull-left color-green"><i class="fa fa-map-marker"></i> Corporate Office</h2>
                            <div class="panel-body no-padding " data-mcs-theme="minimal-dark">
                                <div class="profile-post">
                                    <div class="profile-event contact-us-new-1"> <span class="c-name">fitohmpvt.ltd.</span>
                                    <ul class="list-unstyled who margin-bottom-30">
                                    <li><a href="#" style="color:black"><i class="fa fa-home"></i> Office: # H.No. 3-146/1,LIC Colony,PALAMANER Chittoor,ANDHRA PRADESH.</a>-517408</li>
                                    <li><a href="#" style="color:black"><i class="fa fa-phone"></i>Mob. No-: 8309125267,9441117070</a></li>
                                    <li><a href="mailto:info@imcbusiness.com" style="color:black"><i class="fa fa-envelope"></i>fitohm2020@gmail.com</a></li>
                                    <li><a href="../hindex.html" style="color:black"><i class="fa fa-globe"></i>https://www.fitohm.com.com</a></li>
                                    </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 md-margin-bottom-20">
                    <div class="panel panel-profile no-bg">
                        <div class="panel-heading overflow-h">
                            <h2 class="panel-title heading-sm pull-left color-green"><i class="fa fa-map-marker"></i> Warehouse</h2>
                            <div class="panel-body no-padding " data-mcs-theme="minimal-dark">
                                <div class="profile-post">
                                    <div class="profile-event contact-us-new-1"> <span class="c-name">FITO FMCG Healthy Market Pvt. Ltd..</span>
                                    <ul class="list-unstyled who margin-bottom-30">
                                    <li><a href="#" style="color:black"><i class="fa fa-home"></i> Office: # H.No. 3-146/1,LIC Colony,PALAMANER Chittoor,ANDHRA PRADESH.&nbsp;</a></li>
                                    <li><a href="#" style="color:black">517408</a></li>
                                    <li><a href="#" style="color:black"><i class="fa fa-phone"></i>Mob.No:-8309125267,9441117070</a></li>
                                    <li><a href="mailto:hdrsales@imcbusiness.com" style="color:black"><i class="fa fa-envelope"></i>fitohm2020@gmail.com<br /></a></li>
                                    <li><a href="../hindex.html" style="color:black"><i class="fa fa-globe"></i>https://www.fitohm.com</a></li>
                                    </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<style>

input[type=text], select, textarea {
  width: 100%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
  margin-top: 6px;
  margin-bottom: 16px;
  resize: vertical;
}

input[type=submit] {
  background-color: #4CAF50;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type=submit]:hover {
  background-color: #45a049;
}

.container {
  border-radius: 5px;
  /* background-color: #f2f2f2; */
  padding: 20px;
}
.contactBtn{
    border: 1px solid black;
  border-radius: 3px;
  width: 100px;
  height: 30px;
  display: block;
  color: black;

  background: linear-gradient(to right, green 50%, white 50%);
  background-size: 200% 100%;
  background-position: right bottom;
  transition: all 1s ease-out;
}
.contactBtn:hover{
    background-position: left bottom;
    color: white;
}
</style>
    </style>
    <div class="row">
        <div class="profile-body">
            <div class="headline">
            <p style="color: white;font-size: 20px;font-weight: bold;">CONTACT US</p>
                <div class="col-sm-6 md-margin-bottom-20">
                    <div class="panel panel-profile no-bg">
                        <div class="panel-heading overflow-h">
                            <h2 class="panel-title heading-sm pull-left color-green"><i class="fa fa-envelope"></i>&nbsp; Mail Us</h2>
                            <div class="panel-body no-padding " data-mcs-theme="minimal-dark">
                                <div class="profile-post">
                                    <div class="profile-event contact-us-new-1"> <span class="c-name"></span>
                                    <form action="/action_page.php">
                                        <label for="fname"> Name</label>
                                        <input type="text" id="fname" name="firstname" placeholder="Your name..">

                                        <label for="lname">Email</label>
                                        <input type="text" id="email" name="lastname" placeholder="Your last name..">

                                        <label for="subject">Message</label>
                                        <textarea id="subject" name="subject" placeholder="Write something.." style="height:200px"></textarea>

                                        <!-- <input type="button" id="contactMail" value="Submit"> -->
                                        <button type="button" id="contactMail" class="btn contactBtn">Submit</button>
                                    </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 md-margin-bottom-20">
                    <div class="panel panel-profile no-bg">
                        <div class="panel-heading overflow-h">
                            <h2 class="panel-title heading-sm pull-left color-green"><i class="fa fa-map-marker"></i> Our Location</h2>
                            <div class="panel-body no-padding " data-mcs-theme="minimal-dark">
                                <div class="profile-post">
                                    <div class="profile-event contact-us-new-1"> <span class="c-name">FITO FMCG Healthy Market Pvt. Ltd..</span>
                                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3884.4960489149194!2d78.74323551482436!3d13.194143490710077!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMTPCsDExJzM4LjkiTiA3OMKwNDQnNDMuNSJF!5e0!3m2!1sen!2sin!4v1600976635337!5m2!1sen!2sin" width="100%" height="400" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!--=== End Content ===-->

<?php include_once 'footer.php'; ?>

  </div>
    <script type="text/javascript">
        var LanguageCode = "en";
        var DateFormat = "MM/dd/yyyy";
        var TimeFormat = "hh:mm tt";
        var ToConfirmSubmitPressOK = "To confirm submit press OK";
    </script>

    <!-- Unify CSS-JS -->
        <style>
        /*changes by akash shori*/
        .img-responsive-dummy {
            display: block;
            max-width: 150px;
            height: auto;
            margin: 32px 0px 0px 56px;
        }
    </style>
        <!-- JS Global Compulsory -->
        <script type="text/javascript" src="../Unify/HTML/assets/plugins/jquery/jquery.min.js"></script>
        <script type="text/javascript" src="../Unify/HTML/assets/plugins/jquery/jquery-migrate.min.js"></script>
        <script type="text/javascript" src="../Unify/HTML/assets/plugins/bootstrap/js/bootstrap.min.js"></script>
        <!-- JS Implementing Plugins -->
        <script type="text/javascript" src="../Unify/HTML/assets/plugins/back-to-top.js"></script>
        <script type="text/javascript" src="../assets/web/smoothscrool.js"></script>
        <script type="text/javascript" src="../assets/web/googleMap.js"></script>
        <script type="text/javascript" src="../Unify/HTML/assets/plugins/gmap/gmap.js"></script>
        <script type="text/javascript" src="../Unify/HTML/assets/plugins/owl-carousel/owl-carousel/owl.carousel.js"></script>
        <script type="text/javascript" src="../Unify/HTML/assets/plugins/sky-forms-pro/skyforms/js/jquery.form.min.js"></script>
        <script type="text/javascript" src="../Unify/HTML/assets/plugins/sky-forms-pro/skyforms/js/jquery.validate.min.js"></script>
        <script type="text/javascript" src="../Unify/HTML/assets/js/custom.js"></script>
        <!-- JS Page Level -->
        <script type="text/javascript" src="../Unify/HTML/assets/js/app.js"></script>
        <script type="text/javascript" src="../Unify/HTML/assets/js/forms/login.js"></script>
        <script type="text/javascript" src="../Unify/HTML/assets/js/forms/contact.js"></script>
        <script type="text/javascript" src="../Unify/HTML/assets/js/pages/page_contacts.js"></script>
        <script type="text/javascript" src="../Unify/HTML/assets/js/plugins/owl-carousel.js"></script>
        <script type="text/javascript" src="../Unify/HTML/assets/js/plugins/style-switcher.js"></script>
        <script type="text/javascript">
            jQuery(document).ready(function () {
                App.init();
                ContactPage.initMap();
                LoginForm.initLoginForm();
                ContactForm.initContactForm();
                OwlCarousel.initOwlCarousel();
                StyleSwitcher.initStyleSwitcher();
                //changes by akash shori
                $('.dropdown-header').hover(function () {
                    $('.dropdown-header').find('img').each(function () {
                        if ($(this).hasClass('img-responsive-dummy')) {
                            $(this).addClass('img-responsive');
                            $(this).removeClass('img-responsive-dummy');
                        }
                    });
                    $(this).find('img').addClass('img-responsive-dummy');
                    $(this).find('img').removeClass('img-responsive');
                });
            });
        </script>
        <!--[if lt IE 9]>
            <script src="/Unify/HTML/assets/plugins/respond.js"></script>
            <script src="/Unify/HTML/assets/plugins/html5shiv.js"></script>
            <script src="/Unify/HTML/assets/plugins/placeholder-IE-fixes.js"></script>
            <script src="/Unify/HTML/assets/plugins/sky-forms-pro/skyforms/js/sky-forms-ie8.js"></script>
            <![endif]-->
        <!--[if lt IE 10]>
            <script src="/Unify/HTML/assets/plugins/sky-forms-pro/skyforms/js/jquery.placeholder.min.js"></script>
            <![endif]-->



<!---->
<script>
	 //var  get_detail_path='/subscribe/';
	$(document).ready(function(){
        $(".dropdown-w").hover(
        function() {
            $('.dropdown-menu', this).not('.in .dropdown-menu').stop(true,true).show();
            $(this).toggleClass('open');
            },
        function() {
            $('.dropdown-menu', this).not('.in .dropdown-menu').stop(true,true).hide();
            $(this).toggleClass('open');
            }
        );

        $('.list-toggle-btn-m').click(function () {
            $('.list-inline').toggleClass('list-inline-active');
        });

        //Changes By Akash Shori
        $('#close_myModal').click(function () {
            $('#myModal').css('display','none');
        });
        
    });



</script>

<script type='text/javascript'>

    (function ($) {
        $(document).ready(function () {
            //alert(0);
            $('ul.dropdown-menu-m [data-toggle=dropdown]').on('click', function (event) {
                //alert(1);
                event.preventDefault();
                event.stopPropagation();
                $(this).parent().siblings().removeClass('open');
                $(this).parent().toggleClass('open');
            });
        });
    })(jQuery);

</script>

<script>
    $(window).scroll(function () {
        if ($(this).scrollTop() > 5) {
            $("#header-sticky").addClass("fixed-me");
        } else {
            $("#header-sticky").removeClass("fixed-me");
        }

        if ($(this).scrollTop() > 5) {
            $("#logo-change").addClass("changelogo");
        } else {
            $("#logo-change").removeClass("changelogo");
        }
    });
$("#contactMail").click(function(){
  //alert("The paragraph was clicked.");
  var name = $("#fname").val();
  var email = $("#email").val();
  var subject = $("#subject").val();
  if(name == "" || email == "" || subject == ""){
    alert('Fill all fields');
    return;
  }
        $.ajax({
                url:"send_mail.php",
                method:"POST",
                data:{name:name, email:email, subject:subject},
                success:function(data)
                {
                    //console.log(data);
                    alert('Your mail has been sent');
                }
            });
}); 
</script>
    <!-- Unify CSS-JS -->


    

</body>
</html>