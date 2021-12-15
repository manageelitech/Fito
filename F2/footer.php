<!-- footer start here -->
<footer class="footer2">
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <h5>Information</h5>
                <ul class="list-unstyled">
                    <li><a href="#"><i class="fa fa-caret-right" aria-hidden="true"></i>About Us</a></li>
                    <li><a href="#"><i class="fa fa-caret-right" aria-hidden="true"></i>Delivery Information</a></li>
                    <li><a href="#"><i class="fa fa-caret-right" aria-hidden="true"></i>Privacy Policy</a></li>
                    <li><a href="#"><i class="fa fa-caret-right" aria-hidden="true"></i>Terms &amp; Conditions</a></li>
                </ul>
            </div>
            <div class="col-md-3 col-sm-3 col-xs-12">
                <h5>Useful Links</h5>
                <ul class="list-unstyled links">
                    <li><a href="#"><i class="fa fa-caret-right" aria-hidden="true"></i>Dashboard</a></li>
                    <li><a href="#"><i class="fa fa-caret-right" aria-hidden="true"></i>Myads</a></li>
                    <li><a href="#"><i class="fa fa-caret-right" aria-hidden="true"></i>My Setting</a></li>
                    <li><a href="#"><i class="fa fa-caret-right" aria-hidden="true"></i>Contact Us</a></li>
                </ul>
            </div>
            <div class="col-md-3 col-sm-3 col-xs-12">
                <h5>Contact Us</h5>
                <ul class="list-unstyled links">
                    <!--                    <li><i class="fa fa-home" aria-hidden="true"></i>FITOHM</li>-->
                    <li><i class="fa fa-map-marker" aria-hidden="true"></i>FITO FMCG Healthy Market Pvt. Ltd.
                        Office: # H.No. 3-146/1,LIC, Colony,PALAMANER
                        Chittoor,ANDHRA PRADESH.
                        PIN CODE:-517408
                    </li>
                    <li><i class="fa fa-mobile" aria-hidden="true"></i>+919441117070</li>
                    <li><i class="fa fa-mobile" aria-hidden="true"></i>+918309125267</li>
                    <li><i class="fa fa-envelope" aria-hidden="true"></i>fitohm2020@gmail.com</li>
                </ul>
            </div>
            <div class="col-md-3 col-sm-3 col-xs-12">
                <h5>Bank Details</h5>
                <p>
                    NAME : FITO FMCG HEALTHY Pvt. Ltd<br>
                    ACC NO : Bank A/C: 5830201000095<br>
                    IFSC : CNRB0005830<br>
                    BANK : Canara Bank<br>
                    BRANCH : Palamaner Br.<br>
                </p>
                <!--                <ul class="list-inline social">-->
                <!--                    <li class="diamond-shape"><a href="#" target="new"><i class="fa fa-facebook"></i></a></li>-->
                <!--                    <li class="diamond-shape"><a href="#" target="new"><i class="fa fa-twitter" aria-hidden="true"></i></a>-->
                <!--                    </li>-->
                <!--                    <li class="diamond-shape"><a href="#" target="new"><i class="fa fa-google"-->
                <!--                                                                          aria-hidden="true"></i></a></li>-->
                <!--                    <li class="diamond-shape"><a href="#" target="new"><i class="fa fa-instagram"-->
                <!--                                                                          aria-hidden="true"></i></a></li>-->
                <!--                    <li class="diamond-shape"><a href="#" target="new"><i class="fa fa-linkedin" aria-hidden="true"></i></a>-->
                <!--                    </li>-->
                <!--                    <li class="diamond-shape"><a href="#" target="new"><i class="fa fa-youtube" aria-hidden="true"></i></a>-->
                <!--                    </li>-->
                <!--                </ul>-->
            </div>
        </div>
    </div>
    <div class="powered">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-xs-12 text-center">
                    <p><span> FITOHM</span> &copy; 2021. All rights reserved.</p>
                </div>
            </div>
        </div>
    </div>

    <script>
        if (localStorage.getItem('login_status') == 'true') {
            $('#top_head_menu').html(
            '<li class="logins"><a href="dashboard.php"><i class="la la-plus-square"></i> <span>My profile</span></a></li>\n' +
            '                    <li><a href="javascript:void(0);" onclick="logout_user();"><i class="la la-key"></i> <span>Logout</span></a></li>\n'
            );
        }else {
            $('#top_head_menu').html(
                '<li class="logins"><a href="login.php"><i class="la la-plus-square"></i> <span>Login</span></a></li>\n' +
                '                    <li><a href="register.php"><i class="la la-key"></i> <span>Register</span></a></li>\n'
        );
        }
        $(".inner-switch").on("click", function () {
            if ($("body").hasClass("dark")) {
                $("body").removeClass("dark");
                $(".inner-switch").text("OFF");
            } else {
                $("body").addClass("dark");
                $(".inner-switch").text("ON");
            }
        });
        function logout_user() {
            localStorage.clear();
            window.location.replace("login.php");
        }

    </script>
</footer>
<!-- footer end here -->
</body>

</html>