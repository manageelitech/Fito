<?php
session_start();
$cart = 0;
if (isset($_SESSION["guestcart"])){
    $sessionData = $_SESSION["guestcart"];
    $cart = sizeof($sessionData);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>fitohm.com </title>
    <meta name="keywords"
        content="Hair Care, Skin Care, Eye Care, Personal Care, Fitness and Nutrition, Health Care, Agriculture, Home Care" />
    <meta name="description"
        content="fitohm is the first Indian Direct Selling Company that uses multi-level marketing model that eliminates middlemen and with a wide network of associates is geared up to promote indigenous products and Indian culture." />
    <meta name="robots" content="index, follow" />
    <meta name="msvalidate.01" content="" />
    <meta name="google-site-verification" content="" />
    <link rel="canonical" href="#" />
    <link rel="apple-touch-icon-precomposed" href="content/frontend/images/favicon.png" />
    <link rel="shortcut icon" href="content/frontend/images/favicon.png" />




    <meta name="author" content="Powered by fitohm" />
    <meta property="fb:app_id" content="9441117070" />


    <!-- Schema.org markup for Google+ -->
    <meta itemprop="name" content="FITO FMCG Healthy Market Pvt. Ltd" />
    <meta itemprop="description"
        content="fitohm is the first Indian Direct Selling Company that uses multi-level marketing model that eliminates middlemen and with a wide network of associates is geared up to promote indigenous products and Indian culture." />
    <meta itemprop="image_src" />

    <meta property="og:type" content="website" />
    <meta property="og:url" content="hindex.html" />
    <meta property="og:title" content="FITO FMCG Healthy Market Pvt. Ltd" />
    <meta property="og:description"
        content="fitohm is the first Indian Direct Selling Company that uses multi-level marketing model that eliminates middlemen and with a wide network of associates is geared up to promote indigenous products and Indian culture." />
    <meta property="og:image" />

    <meta property="twitter:card" content="summary_large_image" />
    <meta property="twitter:url" content="index.html" />
    <meta property="twitter:title" content="FITO FMCG Healthy Market Pvt. Ltd" />
    <meta property="twitter:description"
        content="fitohm is the first Indian Direct Selling Company that uses multi-level marketing model that eliminates middlemen and with a wide network of associates is geared up to promote indigenous products and Indian culture." />
    <meta property="twitter:image" />

    <!-- Unify CSS-JS -->
    <link href="assets/web/googlefonts2.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/front/marque-slider/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/front/marque-slider/owl.theme.default.min.css">
    <!-- Bootstrap -->
    <link rel='stylesheet' href="assets/web/daneden-animate.css">
    <link href="unify/html/E-Commerce/assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Old CSS -->
<!--    <link rel="stylesheet" href="Unify/HTML/assets/css/style.css">-->
    <link href="assets/web/magnify-pop-up.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/web/maxcdn.css">
    <link href="assets/front/css/blog.css" rel="stylesheet">
    <link href="assets/front/css/style-animate.css" rel="stylesheet">
    <link href="assets/front/css/imc-style.css" rel="stylesheet">
    <!-- Old CSS -->
<!--    <link rel="stylesheet" href="Unify/HTML/assets/css/custom76c3.css?d=dec_24">-->
<!--    <link rel="stylesheet" href="Unify/HTML/assets/css/footers/footer-v1.css">-->
    <!-- ================================================== -->
    <!-- OLD -->
    <!-- CSS Gallery Plugins -->
<!--    <link rel="stylesheet" href="Unify/HTML/assets/plugins/cube-portfolio/cubeportfolio/css/cubeportfolio.min.css">-->
<!--    <link rel="stylesheet"-->
<!--        href="Unify/HTML/assets/plugins/cube-portfolio/cubeportfolio/custom/custom-cubeportfolio.css">-->

    <!-- CSS Error Page -->
<!--    <link rel="stylesheet" href="Unify/HTML/assets/css/pages/page_404_error.css">-->

    <!--    AOS ANIMATE-->
<!--    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">-->
    <link rel="stylesheet" href="admin/custom/sweetalert/sweetalert2.css">

    <!-- Unify CSS-JS -->
    <!-- Global site tag (gtag.js) - Google Analytics -->
<!--    <script async src="https://www.fitohm.com"></script>-->
<!--    <script>-->
<!--    window.dataLayer = window.dataLayer || [];-->
<!---->
<!--    function gtag() {-->
<!--        dataLayer.push(arguments);-->
<!--    }-->
<!--    gtag('js', new Date());-->
<!---->
<!--    gtag('config', 'UA-152006608-1');-->
<!--    </script>-->
<!---->
    <style>
    /*#pre-loader{*/
    /*    position: fixed;*/
    /*    width: 100%;*/
    /*    height: 100vh;*/
    /*    background: #fff url('https://mir-s3-cdn-cf.behance.net/project_modules/disp/b6e0b072897469.5bf6e79950d23.gif') no-repeat center;*/
    /*    z-index: 9999;*/
    /*}*/

    /* Paste this css to your style sheet file or under head tag */
    /* This only works with JavaScript,
        if it's not present, don't show loader */
    .no-js #loader {
        display: none;
    }

    .js #loader {
        display: block;
        position: absolute;
        left: 100px;
        top: 0;
    }

    .se-pre-con {
        position: fixed;
        left: 0px;
        top: 0px;
        width: 100%;
        height: 100%;
        z-index: 9999;
        background: #ffffffa3 url('https://i.pinimg.com/originals/48/6a/a0/486aa0fa1658b7522ecd8918908ece40.gif') no-repeat center;
    }

    .fade {
        opacity: 1;
    }
        .addToCartBtn{
            text-align: center;
            border: none;
            width: 100%;
            font-weight: bold;
            background: black;
            color: white;
            padding: 12px;
        }
    .addToCartBtn:hover{
        background: #ffcc01;
        color: #029833;
        transition: ease-in-out 0.5s;
    }
    .dropbtn {
        background-color: #4CAF50;
        color: white;
        padding: 16px;
        font-size: 16px;
        border: none;
    }

    .dropdown {
        position: relative;
        display: inline-block;
    }

    .dropdown-content {
        display: none;
        position: absolute;
        background-color: #f1f1f1;
        min-width: 160px;
        box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
        z-index: 1;
    }

    .dropdown-content a {
        color: black;
        padding: 12px 16px;
        text-decoration: none;
        display: block;
    }
    .sellers-main {
        min-height: 550px;
    }
    .sellers-btn-main-table {
        min-height: 108px;
    }

    .dropdown-content a:hover {background-color: #ddd;}

    .dropdown:hover .dropdown-content {display: block;}

    .dropdown:hover .dropbtn {background-color: #3e8e41;}
    </style>

    <style>
        .swiper-slide {
            width: 25%;
            height: 250px;
            box-shadow: 5px 7px 8px -8px gray;
        }

        .swiper-slide img {
            width: 100%;
            height: 250px;
        }

        .swiper-slide span {
            background: #0202027a;
            color: white;
            position: absolute;
            top: 89%;
            left: 0;
            text-align: center;
            width: 100%;
            padding: 4px 0;
            font-weight: bold;
            letter-spacing: 0.5px;
            text-transform: uppercase;
        }

        #open-popup {
            padding: 20px
        }

        .white-popup {
            position: relative;
            background: #FFF;
            padding: 40px;
            width: auto;
            max-width: 200px;
            margin: 20px auto;
            text-align: center;
        }
        @keyframes bgcolor {
            0% {
                background-color: #45a3e5
            }

            30% {
                background-color: #66bf39
            }

            60% {
                background-color: #eb670f
            }

            90% {
                background-color: #f35
            }

            100% {
                background-color: #864cbf
            }
        }
        .mySlides {display:none;}
    </style>

    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <link rel="stylesheet" href="assets/front/css/w3.css" />


<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-2606292533338273"
     crossorigin="anonymous"></script>

</head>

<body style="overflow-x:hidden;" class="header-fixed">

    <!--<div id="pre-loader"></div>-->

<!--    <div class="se-pre-con"></div>-->

    <div class="wrapper">




        <!--=== Header ===-->


        <header class="navbar-fixed-top navbar-home" id="header-sticky" style="background:#00f3ff !important;">


            <div class="container-fluid">
                <div class="row">
                    <div class="header-top-section">
                        <div class="col-sm-3">
                            <div class="header-top">

                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="header-top" style="text-align: right">
<!--                                <marquee style="color:#040400;">WELCOME &nbsp;TO &nbsp; FITO &nbsp; FMCG &nbsp; HEALTHY-->
<!--                                    &nbsp; MARKET &nbsp; PVT. &nbsp;LTD. </marquee>-->
                                <a href="F2/index.php" target="_blank"><span style="color: aliceblue;padding: 2px 18px;letter-spacing: 1px;border-radius: 4px;-webkit-animation: bgcolor 10s infinite;animation: bgcolor 5s infinite;animation-direction: normal;-webkit-animation-direction: alternate;animation-direction: alternate;"><i class="fa fa-home"></i> Real Estate</span></a>
                                <a href="F2/index.php" target="_blank"><span style="color: aliceblue;padding: 2px 18px;letter-spacing: 1px;border-radius: 4px;-webkit-animation: bgcolor 5s infinite;animation: bgcolor 10s infinite;animation-direction: normal;-webkit-animation-direction: alternate;animation-direction: alternate;"><i class="fa fa-recycle"></i> Used Products</span></a>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="header-top">
                                <div class="navbar-right" style="margin-right: 0;">
                                    <ul style="display: flex;list-style-type: none;">
                                    <li><a href="product_list.php">Product List</a></li> &nbsp;| &nbsp;
<!--                                    <li><a href="monthly_offers.php" target="_blank"><img-->
<!--                                                src="img/monthly.gif" style="width: 66%;height: 36px;"></a></li> |-->
                                        <li style="background: white;padding: 0px 5px;border-radius: 5px;"> <a href="cart.php">cart <sup style="background: #fecc04;padding: 1px 6px;border-radius: 50%;color: white;font-weight: bold;" id="cartCount"><?php echo $cart; ?></sup></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <!--navbar start-->
            <nav class="navbar navbar-default hidden-md hidden-sm hidden-xs" role="navigation" style="width: 80%;
    float: right;">
                <div class="container-fluid">
                    <div class="row">
                        <!-- Brand and toggle get grouped for better mobile display -->
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse"
                                data-target="#navbar-brand-centered">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                            <div class="navbar-brand" id="logo-change" style="    margin-top: -35px !important;
    margin-left: -230px;">
                                <a href="index.php">
                                    <img src="assets/front/images/fito_logo.png" class="img-responsive logo-white">
                                    <img src="assets/front/images/fito_logo.png" class="img-responsive logo-green">
                                </a>
                            </div>
                        </div>





                        <div class="collapse navbar-collapse" id="navbar-brand-centered">
                            <ul class="nav navbar-nav" style="width: 40%">
                                <li class="dropdown dropdown-w mega-dropdown ">
                                    <a class="dropdown-toggle" href="index.php" title="Care and Share">Home</a>


                                </li>
                                <li class="dropdown dropdown-w mega-dropdown ">
                                    <a class="dropdown-toggle" href="about.php" title="About Us">About us</a>
                                    <!--=== Slider ===-->

                                <li class="dropdown dropdown-w mega-dropdown ">
                                    <a class="dropdown-toggle" href="#" title="Products">Products</a>

                                    <div class="dropdown-menu mega-dropdown-menu nav-justified">
                                        <div class="container-fluid menu-inner">

                                            <div class="row new-product-menu">
                                                <div class="col-md-6">

                                                    <ul class="sub-menu">
                                                        <?php
                                                    $cat=mysqli_query($conn,"select * from product_category order by slno asc");
                                                    while($cat_res = mysqli_fetch_array($cat)){
                                                        $catname = $cat_res['name'];
                                                        $catid = connClass::encryptIt($cat_res['slno']);
                                                        $href = 'prod.php?catid='.$catid;
                                                        ?>
                                                        <li class="dropdown-header">
                                                            <a href="<?php echo $href; ?>"
                                                                title="provision care"><?php echo $catname; ?></a>
                                                        </li>
                                                        <?php
                                                    }
                                                    ?>


                                                    </ul>
                                                </div>
                                            </div>



                                        </div>
                                    </div>






                                </li>
                                <li class="dropdown dropdown-w mega-dropdown ">
                                    <a class="dropdown-toggle" href="gallery.php" title="Gallery">Gallery</a>


                                </li>


                            </ul>
                            <ul class="nav navbar-nav navbar-right" style="margin-right:0;width: 60%">
                                <li class="dropdown dropdown-w mega-dropdown" style="width: 18%">
                                    <a class="dropdown-toggle" href="legal.php" title="Special Offersb">LEGAL </a>




                                <li class="dropdown dropdown-w mega-dropdown" style="width: 18%">
                                    <a class="dropdown-toggle" href="business_plan.php" title="Business plan">Business
                                        Plan</a>
                                <li class="dropdown dropdown-w mega-dropdown ">
                                    <a class="dropdown-toggle" href="seller_reg.php" title="Fito Tipup"> Tie Up Shop</a>




                                <li class="dropdown dropdown-w mega-dropdown" style="width: 18%">
                                    <a class="dropdown-toggle" href="#" title="Contact u">Contact us</a>


                                    <div class="dropdown-menu mega-dropdown-menu nav-justified">
                                        <div class="container-fluid menu-inner">

                                            <div class="row new-product-menu">
                                                <div class="col-md-6">
                                                    <ul class="sub-menu">

                                                        <li class="dropdown-header">
                                                            <a href="contact.php" title="Contact Us">Contact us</a>

                                                        </li>
                                                        <li class="dropdown-header">
                                                            <a href="news.php" title="News">News</a>

                                                        </li>



                                                    </ul>
                                                </div>
                                            </div>



                                        </div>
                                    </div>
                                </li>



                                <li class="dropdown dropdown-w mega-dropdown" style="width: 18%">
                                    <a class="dropdown-toggle" href="admin/home.html" title="Login"
                                        target="_blank">Login</a>


                                </li>

                            </ul>

                        </div>


                    </div>
                </div>
            </nav>
            <style>
            .topnav {
                overflow: hidden;
                background-color: #00f3ff;
            }

            .topnav a {
                float: left;
                display: block;
                color: #333;
                text-align: center;
                padding: 14px 16px;
                text-decoration: none;
                font-size: 17px;
            }

            .active {
                background-color: #4CAF50;
                color: white;
            }

            .topnav .icon {
                display: none;
            }

            .dropdown {
                float: left;
                overflow: hidden;
            }

            .dropdown .dropbtn {
                font-size: 17px;
                border: none;
                outline: none;
                color: white;
                padding: 14px 16px;
                background-color: inherit;
                font-family: inherit;
                margin: 0;
            }

            .dropdown-content {
                display: none;
                position: absolute;
                background-color: #f9f9f9;
                min-width: 160px;
                box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
                z-index: 1;
            }

            .dropdown-content a {
                float: none;
                color: black;
                padding: 12px 16px;
                text-decoration: none;
                display: block;
                text-align: left;
            }

            .topnav a:hover,
            .dropdown:hover .dropbtn {
                background-color: #555;
                color: white;
            }

            .dropdown-content a:hover {
                background-color: #ddd;
                color: black;
            }

            #myTopnav {
                display: none;
            }

            .dropdown:hover .dropdown-content {
                display: block;
            }

            @media screen and (max-width: 600px) {

                .topnav a:not(:first-child),
                .dropdown .dropbtn {
                    display: none;
                }

                .topnav a.icon {
                    float: right;
                    display: block;
                }

                #myTopnav {
                    display: block;
                }
            }

            @media screen and (max-width: 600px) {
                .topnav.responsive {
                    position: relative;
                }

                .topnav.responsive .icon {
                    position: absolute;
                    right: 0;
                    top: 0;
                }

                .topnav.responsive a {
                    float: none;
                    display: block;
                    text-align: left;
                }

                .topnav.responsive .dropdown {
                    float: none;
                }

                .topnav.responsive .dropdown-content {
                    position: relative;
                }

                .topnav.responsive .dropdown .dropbtn {
                    display: block;
                    width: 100%;
                    text-align: left;
                }
            }
            </style>
            <!--navbar end-->
            <!--seprate menu-->
            <!--navbar mobile start-->
            <div class="topnav" id="myTopnav">
                <a href="index.php">
                    <img src="assets/front/images/fito_logo.png" class="img-responsive logo-green"
                        style="width: 100px;width: 75px;">
                </a>
                <a href="index.php" class="active">Home</a>
                <a href="about.php">About Us</a>
                <div class="dropdown">
                    <button class="dropbtn" style="color: black;">Products
                        <i class="fa fa-caret-down"></i>
                    </button>
                    <div class="dropdown-content">
                        <?php
                                                    $cat=mysqli_query($conn,"select * from product_category order by slno asc");
                                                    while($cat_res = mysqli_fetch_array($cat)){
                                                        $catname = $cat_res['name'];
                                                        $catid = connClass::encryptIt($cat_res['slno']);
                                                        $href = 'prod.php?catid='.$catid;
                                                        ?>
                        <a href="<?php echo $href; ?>"><?php echo $catname; ?></a>

                        <?php
                                                    }
                                                    ?>
                    </div>
                </div>
                <a href="gallery.php">Gallery</a>

                <a href="legal.php">Legal</a>
                <a href="business_plan.php">Business Plan</a>
                <a href="seller_reg.php">Tie Up Shop</a>
                <div class="dropdown">
                    <button class="dropbtn" style="color: black;">Contact Us
                        <i class="fa fa-caret-down"></i>
                    </button>
                    <div class="dropdown-content">
                        <a href="contact.php">Contact</a>
                        <a href="news.php">News</a>
                    </div>
                </div>
                <a href="admin/home.html" target="_blank">Login</a>
                <a href="javascript:void(0);" style="font-size:15px;" class="icon" onclick="myFunction()">&#9776;</a>
            </div>

            <script>
            function myFunction() {
                var x = document.getElementById("myTopnav");
                if (x.className === "topnav") {
                    x.className += " responsive";
                } else {
                    x.className = "topnav";
                }
            }
            </script>

            <!--navbar mobile end-->

        </header>

        <div class="clearfix"></div>


        <!-- Floating Social Media bar Starts -->
        <div class="float-sm">
            <!--<div class="fl-fl float-fb"><i class="fa fa-map-marker" aria-hidden="true"></i> <a href="distributors/index.html"> Locate a Distributor </a></div>-->
            <div class="fl-fl float-tw"><i class="fa fa-envelope" aria-hidden="true"></i> <a href="contact.php">Contact
                    Us </a></div>
            <div class="fl-fl float-gp"><i class="fa fa-phone" aria-hidden="true"></i> <a
                    href="tel:9441117070">9441117070</a></div>
            <div class="fl-fl float-rs"><i class="fa fa-share-alt" aria-hidden="true"></i> <a
                    href="https://www.facebook.com/fitofmcg/" target="_blank"><i class="fa fa-facebook"></i></a> <a
                    href="https://www.youtube.com/channel/UCOabTpV6U72331hdQ3PDnwQ/featured?view_as=subscriber"
                    target="_blank"><i class="fa fa-youtube"></i></a> <a href="https://twitter.com/fitofmcghm"
                    target="_blank"><i class="fa fa-twitter"></i></a></div>
        </div>



        <style>
        /* Floating Social Media Bar Style Starts Here */

        .fl-fl {
            background: #28844e;
            text-transform: uppercase;
            letter-spacing: 0px;
            padding: 4px;
            width: 220px;
            position: fixed;
            right: -180px;
            z-index: 1000;
            font: normal normal 12px Arial;
            -webkit-transition: all .25s ease;
            -moz-transition: all .25s ease;
            -ms-transition: all .25s ease;
            -o-transition: all .25s ease;
            transition: all .25s ease;
        }

        .float-sm .fa {
            font-size: 20px;
            color: #fff;
            padding: 10px 0;
            width: 40px;
            margin-left: 8px;
        }

        .fl-fl:hover {
            right: 0;
        }

        .fl-fl a {
            color: #fff !important;
            text-decoration: none;
            text-align: center;
            line-height: 43px !important;
            vertical-align: top !important;
        }

        .float-fb {
            top: 160px;
        }

        .float-tw {
            top: 215px;
        }

        .float-gp {
            top: 270px;
        }

        .float-rs {
            top: 325px;
        }

        .float-ig {
            top: 380px;
        }

        .float-pn {
            top: 435px;
        }

        .career-navigation ul {
            padding: 0;
            margin: 0;
        }

        .career-navigation ul li a {
            color: #747273;
            text-decoration: none;
        }

        .career-navigation .active a:after {
            content: '';
            background: #04a651;
            width: 100%;
            height: 4px;
            float: left;
        }

        .career-navigation,
        .career-video {
            width: 100%;
            height: auto;
            float: left;
            text-align: center;
        }

        .career-video {
            margin: 30px 0 10px;
            padding: 0 10%;
        }

        .career-navigation {
            background: #f2f2f2;
            margin-top: -70px;
        }

        .career-navigation li {
            list-style: none;
            padding: 20px 10px;
        }

        input[type="text"],
        select,
        textarea {
            color: black;
        }
        </style>
        <!--=== End Header ===-->

        <!--=== Product cashback css ===-->
        <style>
        .linear-wipe {
            text-align: center;

            background: linear-gradient(to right, #ff5858 20%, #FF0 40%, #FF0 60%, #ff5858 80%);
            background-size: 200% auto;

            color: #000;
            background-clip: text;
            text-fill-color: transparent;
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;

            animation: shine 1s linear infinite;

            @keyframes shine {
                to {
                    background-position: 200% center;
                }
            }
        }
        </style>
        <!--=== Product cashback css ===-->


        <!-- =================Custom CSS ============================ -->
        <style>

        </style>