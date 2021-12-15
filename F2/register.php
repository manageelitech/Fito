<?php include_once 'header.php'; ?>
    <div class="container">
        <div class="breadcrumb">
            <div class="pull-left">
                <ul class="list-inline matter">
                    <li><a href="index.php">Home</a></li>
                    <li><a href="register.php">Register</a></li>
                </ul>
            </div>
            <div class="pull-right">
                <h2>Register Account</h2>
            </div>
        </div>
        <div class="commontop row">
            <div id="content" class="col-sm-12 login">
                <div class="col-md-6 col-sm-6 col-xs-12 bor hidden-xs">
                    <div class="donot">If you have an account already? So <a
                                href="login.php">Login Now</a>.
                    </div>
                    <p>And start and posting less than a minute</p>
                    <div class="or hide">
                        <span>or</span>
                        <hr>
                    </div>
                </div>
                <div class="col-sm-6 col-xs-12 border-left">
                    <h1>Sign Up</h1>
                    <form id='myForm' method='post' class='form-horizontal'>
                        <fieldset id="account">
                            <div class="form-group required">
                                <label class="control-label">Full Name</label> <br/>
                                <i class="la la-user"></i>
                                <input type="text" name="name" value="" placeholder="Full Name"
                                       id="name" class="form-control"/>
                            </div>
                            <div class="form-group required">
                                <label class="control-label">Phone</label> <br/>
                                <i class="la la-user"></i>
                                <input type="text" name="phone" value="" placeholder="Phone" id="phone"
                                       class="form-control"/>
                            </div>

                            <div class="form-group">
                                <label class="control-label">E-Mail</label> <br/>
                                <i class="la la-envelope-o"></i>
                                <input type="email" name="email" value="" placeholder="E-Mail" id="email"
                                       class="form-control"/>
                            </div>
                        </fieldset>
                        <fieldset>
                            <div class="form-group required">
                                <label class="control-label">Password</label> <br/>
                                <i class="la la-unlock"></i>
                                <input type="password" name="password" value="" placeholder="Create Password"
                                       id="password" class="form-control"/>
                            </div>
                            <div class="form-group required">
                                <label class="control-label">Confirm Password</label> <br/>
                                <i class="la la-unlock"></i>
                                <input type="password" name="cpassword" value="" placeholder="Password Confirm"
                                       id="cpassword" class="form-control"/>
                            </div>
                            <div class="" id="regError" style="color: red;"></div>
                            <div class="buttons">
                                <div class="form-group">
                                    <input type="checkbox" name="agree" value="1"/>
                                    I have read and agree to the <a href="#" class="agree"><b>Privacy Policy</b></a>
                                    &nbsp;
                                    <input type="button" value="Register" id="registerBtn" class="btn btn-primary"/>
                                </div>
                            </div>
                    </form>
                </div>

                <div class="clearfix"></div>

            </div>
        </div>
    </div>
    <!-- model plans start-->
    <!-- Modal -->
    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog modal-lg">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="classified_plan">
                        <div class="row m-auto text-center">
                            <div class="col-sm-4 princing-item green">
                                <div class="pricing-divider">
                                    <h3 class="text-light">Diamond</h3>

                                    <h4 class="my-0 display-2 text-light font-weight-normal mb-3">£2,500.00</h4>
                                </div>
                                <div class="card-body bg-white mt-0 shadow">
                                    <ul class="list-unstyled mb-5 position-relative">
                                        <li>23 <b>Classified</b></li>
                                        <li>2 year <b> Validity</b></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-sm-4 princing-item green">
                                <div class="pricing-divider">
                                    <h3 class="text-light">One Day package</h3>

                                    <h4 class="my-0 display-2 text-light font-weight-normal mb-3">£85.00</h4>
                                </div>
                                <div class="card-body bg-white mt-0 shadow">
                                    <ul class="list-unstyled mb-5 position-relative">
                                        <li>5 <b>Classified</b></li>
                                        <li>1 day <b> Validity</b></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-sm-4 princing-item green">
                                <div class="pricing-divider">
                                    <h3 class="text-light">Gold</h3>

                                    <h4 class="my-0 display-2 text-light font-weight-normal mb-3">£15.00</h4>
                                </div>
                                <div class="card-body bg-white mt-0 shadow">
                                    <ul class="list-unstyled mb-5 position-relative">
                                        <li>18 <b>Classified</b></li>
                                        <li>5 day <b> Validity</b></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>

    </div>

<?php include_once 'footer.php'; ?>

<script>
    $(document).ready(function() {
        $("#registerBtn").click(function() {
            var name = $('#name').val();
            var phone = $('#phone').val();
            var email = $('#email').val();
            var password = $('#password').val();
            var cpassword = $('#cpassword').val();
            if (name == ""){
                $('#regError').html('<span class="validation_error">Please enter your name!</span>');
                return;
       
            }
            if (name.length<3){
                $('#regError').html('<span class="validation_error">Name Should Be More Than 3 Characters!</span>');
                return;
       
            }
            if (phone == ""){
                $('#regError').html('<span class="validation_error">Please enter your Phone!</span>');
                return;
       
            }

            if (email == ""){
                $('#regError').html('<span class="validation_error">Please enter your email!</span>');
                return;
       
            }

            if (password == ""){
                $('#regError').html('<span class="validation_error">Please enter Password!</span>');
                return;
       
            }

            if (cpassword == ""){
                $('#regError').html('<span class="validation_error">Please enter Confirm Password!</span>');
                return;
       
            }

            if (password!=cpassword){
                $('#regError').html('<span class="validation_error">Password not matched</span>');
                return;
       
            }
            $.ajax({
                type: "POST",
                dataType: 'json',
                url: "functions.php",
                data: {fid : 1,name:name,phone:phone,email:email,password:password},
            })
                .done(function(response){
                    // console.log(response);
                    if (response.res == 1){
                        $('#regError').html('<span class="validation_success">'+response.msg+'</span>');
                       window.location.replace("login.php");
                    }else{
                        $('#regError').html('<span class="validation_error">'+response.msg+'</span>');
                    }

                });
        });
    });
</script>
