<?php
date_default_timezone_set('Asia/Kolkata');
include_once('connection.php');
$connobj = new connClass();
$conn=$connobj->conn;
$schExt=$connobj->schExt;
$usertype = $connobj->decryptIt($_GET['usertype']);
$loginHead = '';$headTitle='';
if ($usertype =="admin"){
    $loginHead = 'ADMIN LOGIN';
    $headTitle = 'ADMIN LOGIN';
}
else if ($usertype =="dist"){
    $loginHead = 'DISTRIBUTOR LOGIN';
    $headTitle = 'DISTRIBUTOR LOGIN';
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php echo $headTitle;?></title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="assets/bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="assets/bower_components/Ionicons/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="assets/dist/css/AdminLTE.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="assets/plugins/iCheck/square/blue.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition login-page" style="background: #9343f4;">
<div class="login-box">
    <div class="login-logo" >
        <a href="#" style="color: #ffffff;"><b id="loginHead"><?php echo $loginHead;?></b></a>
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body">
        <p class="login-box-msg">Sign in to start your session</p>

            <div class="form-group has-feedback">
                <input type="text" class="form-control" id="uname" placeholder="Username">
                <span class="glyphicon glyphicon-user form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input type="password" class="form-control" id="pwd" placeholder="Password">
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
        <div class="row">
            <div id="errormsg" style="color: red;text-align: center;">

            </div>
        </div>
            <div class="row">
                <div class="col-xs-8">
                    <div class="checkbox icheck">
                        <a href="#">I forgot my password</a><br>
                    </div>
                </div>
                <!-- /.col -->
                <div class="col-xs-4">
                    <button type="button" id="loginBtn" class="btn btn-primary btn-block btn-flat" style="box-shadow: 2px 2px 2px 2px #2e59bf;">Sign In</button>
                </div>
                <!-- /.col -->
            </div>
    </div>
    <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 3 -->
<script src="assets/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="assets/plugins/iCheck/icheck.min.js"></script>
<script>
    $(function () {
        $('input').iCheck({
            checkboxClass: 'icheckbox_square-blue',
            radioClass: 'iradio_square-blue',
            increaseArea: '20%' /* optional */
        });
    });
</script>


<script type="text/javascript">

    // Ajax post
//    $(document).ready(function(){
//        $("#loginBtn").click(function(){
//            var user_name = $("#uname").val();
//            var password = $("#pwd").val();
//            // Returns error message when submitted without req fields.
//            if(user_name==''||password=='')
//            {
//                $("#errormsg").removeClass('hide');
//                $("#errormsg").html("All fields are required");
//            }
//            else
//            {
//                // AJAX Code To Submit Form.
//                $.ajax({
//                    type: "POST",
//                    url:  "<?php //echo base_url(); ?>//" + "main/login",
//                    data: {name: user_name, pwd: password},
//                    cache: false,
//                    success: function(result){
////                        alert(result);
//                        if(result==1){
//                            $("#errormsg").removeClass('hide');
//                            $("#errormsg").html("Login Success");
//                            window.location.replace("<?php //echo base_url(); ?>//" + "main/dashboard");
////
//                        }
//                        else
//                        {
//                            $("#errormsg").removeClass('hide');
//                            $("#errormsg").html("Invalid Login Details");
//                        }
//                    }
//                });
//            }
//            return false;
//        });
//
//
//        //Enter key press after entering password
//        $('#pwd').keypress(function(event){
//            var keycode = (event.keyCode ? event.keyCode : event.which);
//            if(keycode == '13'){
//                var user_name = $("#uname").val();
//                var password = $("#pwd").val();
//                // Returns error message when submitted without req fields.
//                if(user_name==''||password=='')
//                {
//                    $("#errormsg").removeClass('hide');
//                    $("#errormsg").html("All fields are required");
//                }
//                else
//                {
//                    // AJAX Code To Submit Form.
//                    $.ajax({
//                        type: "POST",
//                        url:  "<?php //echo base_url(); ?>//" + "main/login",
//                        data: {name: user_name, pwd: password},
//                        cache: false,
//                        success: function(result){
////                        alert(result);
//                            if(result==1){
//                                $("#errormsg").removeClass('hide');
//                                $("#errormsg").html("Login Success");
//                                window.location.replace("<?php //echo base_url(); ?>//" + "main/dashboard");
////
//                            }
//                            else
//                            {
//                                $("#errormsg").removeClass('hide');
//                                $("#errormsg").html("Invalid Login Details");
//                            }
//                        }
//                    });
//                }
//                return false;
//            }
//        });
//    });
</script>
<script>
    $(document).ready(function () {
        // alert('hi');
        if(localStorage.getItem('LOGIN_STATUSmlm')=='true' && localStorage.getItem('DISP_NAMEmlm')!="")
        {
            window.location = "main.html";
        }
        // var usertype = getUrlParameter('usertype');
        // if (usertype == "dist"){
        //     $('#loginHead').html('DISTRIBUTOR LOGIN');
        //     document.title = 'DISTRIBUTOR LOGIN';
        // }
        // else if (usertype == "admin"){
        //     $('#loginHead').html('ADMIN LOGIN');
        //     document.title = 'ADMIN LOGIN';
        // }
        $('#loginBtn').on('click', function (e) {
            e.preventDefault();
            var user_name = $("#uname").val();
           var password = $("#pwd").val();
           console.log(user_name+'-'+password);
           // Returns error message when submitted without req fields.
           if(user_name==''||password=='')
           {
               $("#errormsg").removeClass('hide');
               $("#errormsg").html("All fields are required");
           }
           else {
               $.ajax
               ({
                   method: "POST",
                   url: "loginproc.php",
                   dataType:'json',
                   data:{uname: user_name,pass: password}
               })
                   .done(function(msg)
                   {
                       console.log(msg);
                       if(msg.tp==1)
                       {
                           $('#password').val("");
                           $('#errormsg').html('Invalid Username or Password..');
                       }
                       else if(msg.tp==2)
                       {
                           $('#errormsg').html('Login Success . Please wait to redirect...');
                           localStorage.setItem('LOGIN_STATUSmlm',msg.LOGIN_STATUS);
                           localStorage.setItem('DISP_NAMEmlm',msg.DISP_NAME);
                           localStorage.setItem('USERTYPEmlm',msg.USERTYPE);
                           localStorage.setItem('UID',msg.UID);
                           localStorage.setItem('INC',msg.inc);
                           localStorage.setItem('INCP',msg.incp);

                           window.location = "main.html";
                       }
                   });
           }
        });
    });
    var getUrlParameter = function getUrlParameter(sParam) {
        var sPageURL = window.location.search.substring(1),
            sURLVariables = sPageURL.split('&'),
            sParameterName,
            i;

        for (i = 0; i < sURLVariables.length; i++) {
            sParameterName = sURLVariables[i].split('=');

            if (sParameterName[0] === sParam) {
                return sParameterName[1] === undefined ? true : decodeURIComponent(sParameterName[1]);
            }
        }
    };
</script>
</body>
</html>
