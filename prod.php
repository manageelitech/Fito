<?php
date_default_timezone_set('Asia/Kolkata');
include_once('admin/connection.php');
$connobj = new connClass();
$conn=$connobj->conn;
$schExt=$connobj->schExt;
$cat = mysqli_real_escape_string($conn, $_GET['catid']);
//echo $cat;
include_once 'header.php';
?>



<!--=== End Content ===-->

<div class="banner-main">

    <div class="carousel fade-carousel slide" data-ride="carousel" data-interval="4000" id="bs-carousel">
        <!-- Overlay
          <div class="overlay"></div>
        -->
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <?php
            $count=1;
            $sp=mysqli_query($conn,"select filename,title from slider order by date desc");
            if($event_res=mysqli_fetch_array($sp))
            {
//                echo $event_res['filename'];
                ?>
                <li data-target="#bs-carousel" data-slide-to="0" class="active"></li>
                <?php
            }
            while($event_res=mysqli_fetch_array($sp))
            {
//                echo $event_res['filename'];
                ?>
                <li data-target="#bs-carousel" data-slide-to="<?php echo $count;?>"></li>
                <?php
                $count++;
            }
            ?>
            <!--                        <li data-target="#bs-carousel" data-slide-to="0" class="active"></li>-->
            <!--                        <li data-target="#bs-carousel" data-slide-to="1"></li>-->
            <!--                        <li data-target="#bs-carousel" data-slide-to="2"></li>-->
            <!--                        <li data-target="#bs-carousel" data-slide-to="3"></li>-->
            <!--                        <li data-target="#bs-carousel" data-slide-to="4"></li>-->
            <!--                        <li data-target="#bs-carousel" data-slide-to="5"></li>-->
        </ol>


        <!-- Wrapper for slides -->
        <div class="carousel-inner">
            <!--=== Slider ===-->
            <?php
            $sp=mysqli_query($conn,"select filename,title from slider order by date desc");
            if($event_res=mysqli_fetch_array($sp))
            {
//                echo $event_res['filename'];
                ?>
                <div class="item slides active respMe">
                    <div class="slide-1">
                        <img src="admin/backend/banner/<?php echo $event_res['filename'];?>" style="transition: transform 0s ease, opacity .0s ease-out;">
                    </div>

                    <div class="hero">

                        <hgroup>
                            <h1>
                                <?php
                                echo $event_res['title'];
                                ?>
                            </h1>
                            <h3></h3>
                        </hgroup>

                    </div>
                </div>
                <?php
            }
            while($event_res=mysqli_fetch_array($sp))
            {
//                echo $event_res['filename'];
                ?>
                <div class="item slides">
                    <div class="slide-1">
                        <img src="admin/backend/banner/<?php echo $event_res['filename'];?>" style="transition: transform 0s ease, opacity .0s ease-out;">
                    </div>

                    <div class="hero">

                        <hgroup>
                            <h1>
                                <?php
                                echo $event_res['title'];
                                ?>
                            </h1>
                            <h3></h3>
                        </hgroup>

                    </div>
                </div>
                <?php
            }
            ?>
        </div>
    </div>
</div>
<!--end banner-->

<div class="row margin-top-20">
    <?php
    /*
    if(isset($_POST['search'])) {
         $valueToSearch = $_POST['valueToSearch'];

$sp=mysqli_query($conn,"select * from products WHERE CONCAT(`id`, `product_name`) LIKE '%".$valueToSearch."%'";



}
*/

    ?>
    <div class="col-sm-6 col-sm-offset-3">
        <form method="posr">
            <div class="input-group input-group-sm">
                <input type="text" class="form-control"  name="search_box" id="search_box" autocomplete="off">
                <span class="input-group-btn">
                        <button type="button" name="search" class="btn btn-success btn-flat">Search</button>
                    </span>
            </div>

        </form>
    </div>
</div><br>

<section class="section-padding">
    <div class="container-fluid">
             <?php
                    $cat=mysqli_query($conn,"select * from product_category where slno='".$connobj->decryptIt($_GET['catid'])."'");
                    if($cat_res = mysqli_fetch_assoc($cat)) {
                        $catname = $cat_res['name'];
                        $catid = $connobj->encryptIt($cat_res['slno']);
                        $href = 'prod.php?catid='.$catid;
                        ?>
                        <p style="text-align: center;font-weight: bold;font-size: 19px;"><a href="<?php echo $href; ?>" class="" style="color: #fc4903;"><?php echo $catname?></a></p>>
                    <?php
                    }
                    ?>
        <div class="col-xs-12 center-menu" style="border:solid 0px black;">
            <div class="col-xs-12 center-menu" style="background:blue">
            <ul class="list-inline text-center" style="display: block;visibility: visible;">

                    <?php
                    $subcat=mysqli_query($conn,"select * from product_sub_category where catid='".$connobj->decryptIt($_GET['catid'])."'");
                    while($subcat_res = mysqli_fetch_assoc($subcat)) {
                        $catid = $connobj->encryptIt($subcat_res['catid']);
                        $subcatid = $connobj->encryptIt($subcat_res['slno']);
                        $href = 'prod1.php?catid='.$catid.'&&subcat='.$subcatid;
                        ?>
                        <li><a href="<?php echo $href; ?>" class="" style="font-weight: bold;"><?php echo $subcat_res['name']?></a></li>
                    <?php
                    }
                    ?>

                </ul>
            </div>


        </div>
</section>

<section class="section-padding">
    <div class="container-fluid">
        <div class="row" id="dynamic_content">

        </div>
    </div>

</section>


<style>
    @media all and (max-width: 400px) and (min-width: 250px) {
        /* @media only screen and (max-width: 250px) {*/
        /* For mobile phones: */
        .fade-carousel .carousel-inner .item{
            height: 128px !important;
        }
        .carousel-indicators{
            display:none !important;
        }
    }
</style>

<section class="section-padding hide">
    <div class="container-fluid">
        <div class="row">
            <!--bounceInUp animated-data-wow-delay=".25s"-->
            <div class="col-md-12">
                <div class="seller-heading-txt wow " >
                    New Products
                </div>
            </div>
        </div>









    </div>
</section>




<style>
    .img-circle {
        border-radius: 50%;
    }

    .img-circle {
        border-radius: 0;
    }

    .ratio {
        background-position: center center;
        background-repeat: no-repeat;
        background-size: cover;
        height: 0;
        padding-bottom: 100%;
        position: relative;
        width: 100%;
    }

    .img-circle {
        border-radius: 50%;
    }

    .img-responsive {
        display: block;
        height: auto;
        max-width: 100%;
    }
</style>






<section class="blog-section wow bounceInUp animated hide" data-wow-delay=".25s">
    <div class="page-row-stories">
        <div class="owl-carousel">
            <div class="item">
                <a href="news/index.html"><img src="public/Slides/V1/Home-Page/Home-Blog/Ayurvedic-Health-Supplements-The-True-Supplements-to-Life-min-v1.jpg" alt="Get enlightened and lead a healthy and prosperous life. Explore to know more."></a>


            </div>
            <div class="item">
                <a href="news/index.html"><img src="public/Slides/V1/Home-Page/Home-Blog/Boost-your-beauty-inside-out-with-Ayurvedas-Personal-Care-Products-min-v1.jpg" alt=""></a>


            </div>
            <div class="item">
                <a href="news/index.html"><img src="public/Slides/V1/Home-Page/Home-Blog/Skin-Care-with-Ayurveda-min-v1.jpg" alt=""></a>


            </div>
            <div class="item">
                <a href="news/index.html"><img src="public/Slides/V1/Home-Page/Home-Blog/The-Journey-of-Ayurveda-min-v1.jpg" alt=""></a>


            </div>
            <div class="item">
                <a href="news/index.html"><img src="public/Slides/V1/Home-Page/Home-Blog/Unlock-the-secret-to-beautiful-hair-with-Ayurveda-min-v1.jpg" alt=""></a>


            </div>
            <div class="item">
                <a href="news/index.html"><img src="public/Slides/V1/Home-Page/Home-Blog/A-Cup-of-Detox-Anti-oxidant-tea-by-IMC300-v1.jpg" alt=""></a>


            </div>
        </div>
        <div class="info-holder">
            <div class="blog-info">

                <h3>Get enlightened and lead a healthy and prosperous life. Explore to know more.</h3>
                <a href="news/index.php" class="blog-link-btn">
                    <i class="fa fa-arrow-right" aria-hidden="true"></i>
                </a>
            </div>
        </div>
    </div>
</section>






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
<script src="assets/web/ajax.min1.js"></script>
<script src="assets/front/parallax-banner/js/jquery-ui.min.js"></script>
<!-- References: https://github.com/fancyapps/fancyBox -->
<link rel="stylesheet" href="assets/web/fancyBox.css" media="screen">
<script src="assets/web/fancybox.min.js"></script>
<style>
    .errorClass {
        border-bottom: 1px solid #df271f !important;
    }
</style>
<script>
    $(document).ready(function () {
        //FANCYBOX
        //https://github.com/fancyapps/fancyBox
        $(".fancybox").fancybox({
            openEffect: "none",
            closeEffect: "none"
        });
    });
</script>
<script>
    jQuery(function () {

        jQuery('#parallax_classic_bullets').parallax_classic({
            skin: 'bullets',
            width: 1920,
            height: 800,
            width100Proc: true,
            defaultEasing: 'easeOutElastic',
            autoPlay: 14,
            responsive: true,
            autoHideBottomNav: false,
            showPreviewThumbs: true,
            autoHideNavArrows: false,
            showCircleTimer: true,
            showCircleTimerIE8IE7: false,
            myloaderTime: 1,
            scrollSlideDuration: 1.8,
            scrollSlideEasing: 'easeInQuint',
            thumbsWrapperMarginBottom: 20
        });


    });
</script>
<script src="assets/front/js/bootstrap.min.js"></script>
<script src="assets/front/js/product-js.js"></script>
<script src="assets/web/magnify-pop-up.min.js"></script>
<script src="assets/front/marque-slider/owl.carousel.js"></script>
<script src='assets/web/wow.min.js'></script>
<script src="assets/front/js/index.js"></script>
<!-- BANNER START -->
<link href="assets/front/parallax-banner/css/parallax_classic.css" rel="stylesheet" type="text/css">
<!--<script src="parallax-banner/js/jquery.min.js" type="text/javascript"></script>-->
<script src="assets/front/parallax-banner/js/parallax_classic.js" type="text/javascript"></script>
<!-- ================================================================= -->
<!-- JS Implementing Plugins -->
<script type="text/javascript" src="Unify/HTML/assets/plugins/back-to-top.js"></script>
<script type="text/javascript" src="assets/web/smoothscrool.js"></script>
<script type="text/javascript" src="Unify/HTML/assets/plugins/cube-portfolio/cubeportfolio/js/jquery.cubeportfolio.min.js"></script><!-- This -->
<script type="text/javascript" src="Unify/HTML/assets/plugins/fancybox/source/jquery.fancybox.pack.js"></script><!-- This -->
<script type="text/javascript" src="Unify/HTML/assets/plugins/owl-carousel/owl-carousel/owl.carousel.js"></script><!-- This -->
<!-- JS Customization -->
<script type="text/javascript" src="Unify/HTML/assets/js/customca64.js?d=15oct"></script>
<!-- JS Page Level -->
<script type="text/javascript" src="Unify/HTML/assets/js/app.js"></script>
<script type="text/javascript" src="Unify/HTML/assets/js/plugins/fancy-box.js"></script>
<script type="text/javascript" src="Unify/HTML/assets/js/plugins/style-switcher.js"></script>
<script type="text/javascript" src="Unify/HTML/assets/js/plugins/owl-recent-works.js"></script><!-- This -->
<script>
    var owl = $('.owl-carousel');
    owl.owlCarousel({
        margin: 0,
        autoplay: true,
        autoplayTimeout: 1000,
        autoplayHoverPause: true,
        loop: true,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 2
            },
            1000: {
                items: 4
            }
        }
    })
</script>
<!---------- =================================================== -->
<script>
    jQuery(document).ready(function () {
        jQuery('.popup-gallery').magnificPopup({
            delegate: 'a',
            type: 'image',
            callbacks: {
                elementParse: function (item) {
                    // Function will fire for each target element
                    // "item.el" is a target DOM element (if present)
                    // "item.src" is a source that you may modify
                    console.log(item.el.context.className);
                    if (item.el.context.className == 'video') {
                        item.type = 'iframe',
                            item.iframe = {
                                patterns: {
                                    youtube: {
                                        index: 'youtube.com/', // String that detects type of video (in this case YouTube). Simply via url.indexOf(index).

                                        id: 'v=', // String that splits URL in a two parts, second part should be %id%
                                        // Or null - full URL will be returned
                                        // Or a function that should return %id%, for example:
                                        // id: function(url) { return 'parsed id'; }

                                        src: '//www.youtube.com/embed/%id%?autoplay=1' // URL that will be set as a source for iframe.
                                    },
                                    vimeo: {
                                        index: 'vimeo.com/',
                                        id: '/',
                                        src: '//player.vimeo.com/video/%id%?autoplay=1'
                                    },
                                    gmaps: {
                                        index: '//maps.google.',
                                        src: '%id%&output=embed'
                                    }
                                }
                            }
                    } else {
                        item.type = 'image',
                            item.tLoading = 'Loading image #%curr%...',
                            item.mainClass = 'mfp-img-mobile',
                            item.image = {
                                tError: '<a href="%url%">The image #%curr%</a> could not be loaded.'
                            }
                    }

                }
            },
            gallery: {
                enabled: true,
                navigateByImgClick: true,
                preload: [0, 1] // Will preload 0 - before current, and 1 after the current image
            }

        });

    });
</script>
<script>

    $(document).ready(function () {
        $('.dropdown-img-hover').hover(function () {

            $(this).prev().toggleClass('active');

        });
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


    $('.carousel').carousel({
        interval: 10000
    })

</script>
<script>
    $('#search').submit(function() {
        e.preventDefault();  // Don't redirect yet!
        window.location.href = "/search/" + $("#table_filter").val();

    });
    $('#searchBtn').click(function() {
        var temp=$("#table_filter").val();
        if ( $.trim(temp).length >1)
        {
            window.location.href = "/search/" + $("#table_filter").val();
        }else{
            $('#table_filter').addClass('errorClass');
        }
    });


</script>
<script>
    $(document).ready(function () {
        $('.curent-opening-Modal').click(function () {
            $('#Mymodal').modal('show')
        });
    });
</script>
<script>
    // Replace source
    $('img').on("error", function() {

        //$(this).attr('src', '//Content/frontend/images/imc-avatar.png');
    });

    $('.img-product').on("error", function () {

        $(this).attr('src', 'https://dummyimage.com/550x482/e3e3e3/14ad00.jpg&amp;text=IMC+Product');
    });


</script>
<!-- Go to www.addthis.com/dashboard to customize your tools -->


<script type="text/javascript">
    jQuery(document).ready(function () {
        $(".home-newsletter-btn").on("click", function () {
            //alert("Delegated Button Clicked")

            $(".home-newsletter-btn").hide();

            $("#error_msg").show();
            $("#error_msg").html("Please wait...");
            $.ajax({
                type: "POST",
                url: "/Subscribe.aspx?email=" + $("#email").val(),
                data: "{email: \"" + $("#email").val() + "\" }",
                contentType: "application/json; charset=utf-8",
                dataType: "json",
                success: function (data) {
                    //alert(data.status);
                    //$("#error_msg").hide();
                    $("#error_msg").html("You are subscribed.");
                    $(".home-newsletter-btn").show();
                    $("#email").val("");
                },
                failure: function (response) {
                    //alert(response);
                    $("#error_msg").hide();
                    $(".home-newsletter-btn").show();
                }
            });
        });

    });
</script>

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

    /*
    $(document).ready(function() {
        var s = $(".sticker");
        var pos = s.position();
        $(window).scroll(function() {
            var windowpos = $(window).scrollTop();
            if (windowpos >= pos.top & windowpos <=1000) {
                s.addClass("stick");
            } else {
                s.removeClass("stick");
            }
        });
    });
    */

    $(document).ready(function(){

        //load_products(1);
        var catid = getUrlParameter('catid');
        // alert(catid);
        $.ajax({
            url:"prodfetch.php",
            method:"POST",
            data:{page:1,catid:catid,query:''},
            success:function(data)
            {
                $('#dynamic_content').html(data);
            }
        });

        function load_products(page, query = '')
        {
            $.ajax({
                url:"prodfetch.php",
                method:"POST",
                data:{page:page, query:query},
                success:function(data)
                {
                    $('#dynamic_content').html(data);
                }
            });
        }

        $(document).on('click', '.page-link', function(){
            var page = $(this).data('page_number');
            var query = $('#search_box').val();
            //load_products(page, query);
            $.ajax({
                url:"prodfetch.php",
                method:"POST",
                data:{page:page,catid:catid,query:query},
                success:function(data)
                {
                    $('#dynamic_content').html(data);
                }
            });
        });

        $('#search_box').keyup(function(){
            var query = $('#search_box').val();
            //load_products(1, query);
            $.ajax({
                url:"prodfetch.php",
                method:"POST",
                data:{page:1,catid:catid,query:query},
                success:function(data)
                {
                    $('#dynamic_content').html(data);
                }
            });
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
<!-- Unify CSS-JS -->




</body>


</html>