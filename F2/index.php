<?php
include_once 'header.php';
include_once('connection.php');
$connobj = new connClass();
$conn = $connobj->conn;
?>
<div class="container">
    <div class="row">
        <div id="content" class="col-sm-12">
            <div id="slideshow0" class="owl-carousel" style="opacity: 1;">
                <div class="item">
                    <a href="#"><img src="image/real.png" alt="slider4" class="img-responsive" /></a>
                </div>
                <div class="item">
                    <a href="#"><img src="image/real1.jpeg" alt="slider3" class="img-responsive" /></a>
                </div>
                <div class="item">
                    <a href="#"><img src="image/used.png" alt="slider3" class="img-responsive" /></a>
                </div>
                <div class="item">
                    <a href="#"><img src="image/used1.jpeg" alt="slider3" class="img-responsive" /></a>
                </div>
            </div>
            <script type="text/javascript">
            <!--
            $('#slideshow0').owlCarousel({
                items: 6,
                autoPlay: 3000,
                singleItem: true,
                navigation: true,
                navigationText: ['<i class="fa fa-chevron-left fa-5x"></i>',
                    '<i class="fa fa-chevron-right fa-5x"></i>'
                ],
                pagination: true
            });
            -->
            </script><!-- browse start here -->
            <div class="browse">
                <h2>Browse Category</h2>
                <hr />
                <div class="row">
                    <?php

$qry = $conn->query("SELECT * FROM `real_post_category`");
while($res = $qry->fetch_assoc()) {
    ?>

                    <div class="col-sm-3 col-md-2 col-xs-6 padd3">
                        <div class="browse-box" style="min-height: 205px;">
                            <div class="image">
                                <a href="products.php?cat=<?php echo $connobj->encryptIt($res['slno'])?>"><img
                                        src="images/cat_icons/<?php echo $res['slno'].'.png'?>" alt="Bike" title="Bike"
                                        class="img-responsive" /></a>
                            </div>
                            <h4><a
                                    href="products.php?cat=<?php echo $connobj->encryptIt($res['slno'])?>"><?php echo $res['name']?></a>
                            </h4>
                        </div>
                    </div>

                    <?php
}
?>

                </div>
            </div>
            <!-- browse end here -->
            <!--<div id="banner0" class="owl-carousel">-->
            <!--    <div class="item">-->
            <!--        <img src="image/cache/catalog/ads-1170x200.jpg" alt="banner1" class="img-responsive" />-->
            <!--      </div>-->
            <!--  </div>-->
            <script type="text/javascript">
            <!--
            $('#banner0').owlCarousel({
                items: 6,
                autoPlay: 3000,
                singleItem: true,
                navigation: false,
                pagination: false,
                transitionStyle: 'fade'
            });
            -->
            </script>
        </div>
    </div>
</div>


<?php include_once 'footer.php';?>