<?php
date_default_timezone_set('Asia/Kolkata');
include_once('admin/connection.php');
$connobj = new connClass();
$conn=$connobj->conn;
$schExt=$connobj->schExt;

include_once 'header.php';
?>

                <div class="inner-banner-main">
                    <img src="gallery/Gallery1.jpg">
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
<!--=== Content ===-->
<div class="container content margin-bottom-40">
<div class="service-block-v5 no-background">
<div class="row">
    <?php
    $sp=mysqli_query($conn,"select filename,title from gallery order by date desc");
    while($event_res=mysqli_fetch_array($sp))
    {
        ?>
        <div class="col-md-4">
            <a href="#"><img class="img-responsive img-bordered" src="admin/backend/gallery/<?php echo $event_res['filename'];?>" alt="About Fitohm" width="600" height="300" /></a>
        </div>
        <?php
    }
    ?>
</div>
<div class="row">&nbsp;</div>

<div class="row">&nbsp;</div>
<div class="row">


</div>
<!--/end row--></div>
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
        <script src="../assets/web/ajax.min1.js"></script>
        <script src="../assets/front/parallax-banner/js/jquery-ui.min.js"></script>
        <!-- References: https://github.com/fancyapps/fancyBox -->
        <link rel="stylesheet" href="../assets/web/fancyBox.css" media="screen">
        <script src="../assets/web/fancybox.min.js"></script>
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
        <script src="../assets/front/js/bootstrap.min.js"></script>
        <script src="../assets/front/js/product-js.js"></script>
        <script src="../assets/web/magnify-pop-up.min.js"></script>
        <script src="../assets/front/marque-slider/owl.carousel.js"></script>
        <script src='../assets/web/wow.min.js'></script>
        <script src="../assets/front/js/index.js"></script>
        <!-- BANNER START -->
        <link href="../assets/front/parallax-banner/css/parallax_classic.css" rel="stylesheet" type="text/css">
        <!--<script src="parallax-banner/js/jquery.min.js" type="text/javascript"></script>-->
        <script src="../assets/front/parallax-banner/js/parallax_classic.js" type="text/javascript"></script>
        <!-- ================================================================= -->
        <!-- JS Implementing Plugins -->
        <script type="text/javascript" src="../Unify/HTML/assets/plugins/back-to-top.js"></script>
        <script type="text/javascript" src="../assets/web/smoothscrool.js"></script>
        <script type="text/javascript" src="../Unify/HTML/assets/plugins/cube-portfolio/cubeportfolio/js/jquery.cubeportfolio.min.js"></script><!-- This -->
        <script type="text/javascript" src="../Unify/HTML/assets/plugins/fancybox/source/jquery.fancybox.pack.js"></script><!-- This -->
        <script type="text/javascript" src="../Unify/HTML/assets/plugins/owl-carousel/owl-carousel/owl.carousel.js"></script><!-- This -->
        <!-- JS Customization -->
        <script type="text/javascript" src="../Unify/HTML/assets/js/customca64.js?d=15oct"></script>
        <!-- JS Page Level -->
        <script type="text/javascript" src="../Unify/HTML/assets/js/app.js"></script>
        <script type="text/javascript" src="../Unify/HTML/assets/js/plugins/fancy-box.js"></script>
        <script type="text/javascript" src="../Unify/HTML/assets/js/plugins/style-switcher.js"></script>
        <script type="text/javascript" src="../Unify/HTML/assets/js/plugins/owl-recent-works.js"></script><!-- This -->
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

   
</script>
    <!-- Unify CSS-JS -->


    

</body>
</html>