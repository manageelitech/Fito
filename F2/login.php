<?php include_once 'header.php'; ?>
<div class="container">
  <div class="breadcrumb">
    <div class="pull-left">
        <ul class="list-inline matter">
                    <li><a href="index.php">Home</a></li>
                    <li><a href="login.php">Login</a></li>
                  </ul>
    </div>
    <div class="pull-right">
				<h2>Account Login</h2>
		</div>
  </div>
      <div class="commontop row">                <div id="content" class="col-sm-12 login">
        <div class="col-md-6 col-sm-6 col-xs-12 bor hidden-xs">
            <h2>New Customer</h2>
            <div class="donot">Do not have an account?              <a href="register.php">Create your account</a>
			</div>
            <p>It takes less than a minute</p>
			<div class="or hide">
				<span>or</span>
				<hr>
			</div>
		</div>
        <div class="col-sm-6 col-xs-12 border-left">
            <h1>Login</h1>
            <form method="post" id="login-form" enctype="multipart/form-data">
              <div class="form-group required">
			    <label class="control-label"> Phone<span>(required, at least 3 characters)</span></label> <br/>
                <i class="la la-user"></i>
                <input type="text" name="phone" value="" placeholder="Phone" id="uname" class="form-control" name="phone" required/>
				                 </div>
              <div class="form-group required">
			   <label class="control-label">Password</label> <br/>
                <i class="la la-unlock"></i>
                <input type="password" name="password" value="" placeholder="Password" id="password" class="form-control" name="password" />

             </div>
                <div class="" id="loginError"></div>
                <div class="" id="loginSuccess"></div>
             <div class="links">
                <a href="javascript:void(0)">Forgot Password?</a>
              </div>
              <input type="button" value="Login Now" id="loginBtn" class="btn btn-primary submit" />
                          </form>
        </div>
       <div class="clearfix"></div>

  </div>
    </div>
</div>
<script>
    $(document).ready(function (e) {
        // console.log(localStorage.getItem('login_status'));return;
        if (localStorage.getItem('login_status') == 'true') {
            window.location.replace("dashboard.php");
            return;
        }
    });
    $("#loginBtn").click(function(e) {
        $('#loginError').html('');
        $('#loginSuccess').html('');
        var phone = $('#uname').val();
        var password = $('#password').val();
        if (phone == ""){
            $('#loginError').html('<span class="validation_error">Please enter username</span>');
            return;

        }
        if (password == ""){
            $('#loginError').html('<span class="validation_error">Please enter password</span>');
            return;

        }
        $.ajax({
            type: "POST",
            dataType: 'json',
            url: "functions.php",
            data: {fid : 2,phone:phone,password:password},
        })
            .done(function(response){
                console.log(response);
                if (response.res == 1){
                    $('#loginSuccess').html('<span class="validation_success">Login Success!</span>');
                    localStorage.setItem('uid',response.user);
                    localStorage.setItem('login_status',response.login_status);
                    window.location.replace("dashboard.php");
                }else{
                    $('#loginError').html('<span class="validation_error">Invalid Credential!</span>');
                }
            });
    });
</script>
<?php include_once 'footer.php'; ?>

