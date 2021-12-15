<!DOCTYPE html>
<html dir="ltr" lang="en">
<!--<![endif]-->
<meta http-equiv="content-type" content="text/html;charset=utf-8" />

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>FITO REAL STATE AND USED PRODUCTS</title>
    <base />
    <meta name="description" content="Classified" />
    <meta name="keywords" content="Classified " />
    <script src="catalog/view/javascript/jquery/jquery-2.1.1.min.js" type="text/javascript"></script>

    <link href="catalog/view/javascript/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen" />
    <script src="catalog/view/javascript/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <link href="catalog/view/javascript/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link href="catalog/view/javascript/jquery-confirm.min.css" rel="stylesheet" type="text/css" />
    <link href="catalog/view/theme/default/line-awesome/css/line-awesome.min.css" rel="stylesheet" type="text/css" />
    <link href="catalog/view/javascript/js/fastselect.min.css" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,900" rel="stylesheet">
    <link href="catalog/view/theme/default/stylesheet/newstyle.css" rel="stylesheet">
    <link href="catalog/view/theme/default/stylesheet/ele-style.css" rel="stylesheet">

    <!--theme stylesheet-->
    <link href="catalog/view/theme/default/stylesheet/style.css" rel="stylesheet">
    <link href="catalog/view/theme/default/stylesheet/responsive.css" rel="stylesheet" type="text/css" />
    <script src="catalog/view/javascript/jquery-confirm.min.js" type="text/javascript"></script>
    <link href="catalog/view/javascript/jquery/owl-carousel/owl.carousel.css" type="text/css" rel="stylesheet"
        media="screen" />
    <link href="catalog/view/javascript/dist/css/bootstrap-select.css" rel="stylesheet">
    <script src="catalog/view/javascript/dist/js/bootstrap-select.js" type="text/javascript"></script>
    <script src="catalog/view/javascript/jquery/owl-carousel/owl.carousel.min.js" type="text/javascript"></script>

    <link href="catalog/view/javascript/jquery/owl-carousel/owl.carousel.css" type="text/css" rel="stylesheet"
        media="screen" />
    <link href="catalog/view/javascript/jquery/owl-carousel/owl.transitions.css" type="text/css" rel="stylesheet"
        media="screen" />


    <link href="image/catalog/icon.png" rel="icon" />
    <script src="catalog/view/javascript/jquery/owl-carousel/owl.carousel.min.js" type="text/javascript"></script>

    <meta property="og:title" content="Classified" />


    <meta property="og:description" content="Classified" />
    <!--share links code end-->
    <!--    <script src="catalog/view/javascript/classifiedjs/common.js" type="text/javascript"></script>-->


    <link rel="apple-touch-icon-precomposed" href="../content/frontend/images/favicon.png" />
    <link rel="shortcut icon" href="../content/frontend/images/favicon.png" />
    <script src="validation.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.8/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.8/dist/sweetalert2.all.min.js"></script>

    <style>
    .validation_error {
        color: red;
        border: 1px solid red;
        padding: 2px 6px;
        background: #e1b3b3;
    }

    .validation_success {
        color: green;
        border: 1px solid green;
        padding: 2px 6px;
        background: #b7e1b3;
    }
    </style>
</head>

<body class="common-home">
    <!--  <div class="switch">Dark mode:              -->
    <!--        <span class="inner-switch">OFF</span>-->
    <!--    </div>-->
    <!--top start here -->
    <div class="topnew">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-xs-12">
                    <ul class="list-inline icon" id="top_head_menu">
                        <!--                    <li class="logins"><a href="login.php"><i class="la la-plus-square"></i> <span>Login</span></a></li>-->
                        <!--                    <li><a href="register.php"><i class="la la-key"></i> <span>Register</span></a></li>-->
                        <!--                    <li class="logins"><a href="javascript:void(0);"><i class="la la-user-md"></i> <span>Md Minhaj Ansari</span></a></li>-->
                        <!--                    <li><a href="javascript:void(0);" onclick="logout_user();"><i class="la la-power-off"></i> <span>Logout</span></a></li>-->
                    </ul>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="topnav" id="myTopnav">
                        <ul class="list-inline">
                            <li class="logins"><a href="#"><i class="la la-home"></i> <span>Real State</span></a></li>
                            <li class="logins"><a href="#"><i class="la la-recycle"></i> <span>Used Products</span></a>
                            </li>
                            <li><a href="javascript:void(0);" class="icons" onclick="myFunction()">&#9776;</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--top end here -->
    <!-- header start here-->
    <header class="header1">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-3 col-xs-12">
                    <div id="logo">
                        <a href="index.php"><img src="image/fito_logo.png" title="Fito Real Estate"
                                alt="Fito Real Estate" class="img-responsive" /></a>
                    </div>
                </div>
                <div class="col-md-7 col-sm-7 col-xs-12 ">
                    <div class="form-horizontal row category" id="formsearch">
                        <div class="form-group">

                            <div class="col-sm-3 paddright">
                                <select class="selectpicker form-control bs-select-hidden classified_searchdata"
                                    name="classified_category_id">
                                    <option value="">Select Category</option>
                                    <option value="2">Bike</option>
                                    <option value="8">Car</option>
                                    <option value="5">Computer</option>
                                    <option value="11">Education</option>
                                    <option value="24">Electonics</option>
                                    <option value="15">Fashion</option>
                                    <option value="20">Furniture</option>
                                    <option value="13">Jobs</option>
                                    <option value="22">Mobile</option>
                                    <option value="16">pet</option>
                                    <option value="37">Real Estate</option>
                                    <option value="26">Services</option>
                                </select>
                            </div>
                            <div class="col-sm-9 search">
                                <div id="search" class="input-group">
                                    <input id="serch-input" type="text" name="filter_name" value=""
                                        placeholder="Enter keyword" class="form-control input-lg" />
                                    <span class="input-group-btn">
                                        <button class="btn btn-default btn-lg  searchbtn" type="button"
                                            id="findsearch"><i class="icon_search"></i> </button>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-md-2 col-sm-2 col-xs-12 center">
                    <button class="btn-primary btn-block" type="button" onclick="goToPost()"><i
                            class="la la-edit"></i>Post Add</button>
                </div>
            </div>
        </div>
    </header>
    <!-- header end here -->

    <script>
    function myFunction() {
        "use strict";
        var x = document.getElementById("myTopnav");
        if (x.className === "topnav") {
            x.className += " responsive";
        } else {
            x.className = "topnav";
        }
    }

    function goToPost() {
        window.location.replace("post_add.php");
    }
    </script>