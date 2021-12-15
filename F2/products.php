<?php
include_once 'header.php';
include_once('connection.php');
$connobj = new connClass();
$conn = $connobj->conn;
$catid = $connobj->decryptIt($_GET['cat']);
?>
<link href="css/style.css" rel="stylesheet" type="text/css" />
<link href="css/style_orange.css" title="style_orange" rel="alternate stylesheet" type="text/css" />
<link href="css/style_blue.css" title="style_blue" rel="alternate stylesheet" type="text/css" />
<link href="css/responsive.css" rel="stylesheet" type="text/css" />
<link href="css/ele-style.css" rel="stylesheet" type="text/css" />
<!-- font-awesome -->
<link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
<!-- line-awesome -->
<link href="line-awesome/css/line-awesome.min.css" rel="stylesheet" type="text/css" />
<!-- crousel css -->
<link href="js/owl-carousel/owl.carousel.min.css" rel="stylesheet" type="text/css" />
<!--bootstrap select-->
<link href="js/dist/css/bootstrap-select.css" rel="stylesheet" type="text/css" />
<!-- content start here -->
<div class="maincategory">
    <div class="container">
        <div class="row">
            <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                <div class="left">
                    <div class="category">
                        <h1>Categories</h1>
                        <ul class="list-unstyled">
                            <?php
                            $post_cat = $conn->query("SELECT * FROM `real_post_category` where status='ACTIVE'");
                            while($post_cat_res = $post_cat->fetch_assoc()){
                                $post_cat_id = $post_cat_res['slno'];
                                $post_cat_name = $post_cat_res['name'];
                                ?>
                            <li><a href="products.php?cat=<?php echo $connobj->encryptIt($post_cat_res['slno'])?>"><i
                                        class="fa fa-circle-o"></i>
                                    <?php echo $post_cat_name; ?></a></li>
                            <?php
                            }

                            ?>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-lg-10 col-sm-9 col-md-9 padd0 col-xs-12 catebox">
                <div class="row">
                    <?php
                    $products = $conn->query("select *,DATEDIFF(CURDATE(), DATE_FORMAT(FROM_UNIXTIME(UNIX_TIMESTAMP(`date`)), '%Y-%m-%d')) AS days from real_products where status='ACTIVE' and cat_id='$catid'");
                    while($products_res = $products->fetch_assoc()){
                        $cat_id = $products_res['cat_id'];
                        $sub_cat_id = $products_res['sub_cat_id'];
                        $images = $products_res['images'];
                        $days = $products_res['days'];
                        if ($days == 0){
                            $days = 'Today';
                        }elseif($days == 1){
                            $days .= ' day ago';
                        }
                        else{
                            $days .= ' days ago';
                        }
                        $image =  explode(',', $images);
                        $cat = $conn->query("select name from real_post_category where slno='$cat_id'");
                        if ($cat_res = $cat->fetch_assoc()){
                            $cat_name = $cat_res['name'];
                        }
                        $sub_cat = $conn->query("select name from real_post_sub_category where slno='$sub_cat_id'");
                        if ($sub_cat_res = $sub_cat->fetch_assoc()){
                            $sub_cat_name = $sub_cat_res['name'];
                        }
                        ?>
                    <div class="product-layout product-grid col-lg-3 col-md-4 col-sm-6 col-xs-12 cols">
                        <div class="product-thumb">
                            <div class="image">
                                <a href="#"><img src="upload/<?php echo $image[0] ?>"
                                        alt="<?php echo $products_res['title']; ?>"
                                        title="<?php echo $products_res['title']; ?>" style="width: 300px;"></a>
                                <div class="onhover"> ₹ <?php echo $products_res['price']; ?></div>
                            </div>
                            <div class="caption">
                                <h4><a href="#"><?php echo $products_res['title']; ?></a></h4>
                                <p class="des">Category : <?php echo $cat_name; ?></p>
                                <p class="des">Sub Category : <?php echo $sub_cat_name; ?></p>
                                <ul class="list-unstyled">
                                    <li><i class="la la-map-marker"></i>
                                        <?php echo $products_res['state'].','.$products_res['city']; ?></li>
                                    <li><i class="la la-clock-o"></i> <?php echo $days; ?></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <?php
                    }
                    ?>
                </div>

                <div class="text-center icon">
                    <i class="la la-spinner fa-spin"></i>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- content end here -->

<!-- footer start here -->
<script>
$(document).ready(function(e) {
    // if (localStorage.getItem('login_status') != 'true'){
    //     window.location.replace("login.php");
    //     return;
    // }
    var uid = localStorage.getItem('uid');
    $.ajax({
            type: "POST",
            dataType: 'json',
            url: "functions.php",
            data: {
                fid: 3,
                uid: uid
            },
        })
        .done(function(response) {
            $('#login_name').html(response.name);
            $('#login_phone').html(response.phone);
            var name = response.name;
            var res = name.split(" ");
            var namei;
            if (res.length > 1) {
                var namei = res[0].charAt(0) + res[(res.length - 1)].charAt(0);
            } else {
                var namei = res[0].charAt(0);
            }
            $('#login_name_i').html(namei);
        });
});

function hide_dash_sec() {
    $('#myadd_section').addClass('hide');
    $('#mysetting_section').addClass('hide');
    $('#main').addClass('hide');
    $('#myfav_section').addClass('hide');
    $('#mysearch_section').addClass('hide');
    $('#mymessage_section').addClass('hide');

    $('#myadd_section_li').removeClass('active');
    $('#mysetting_section_li').removeClass('active');
    $('#main_li').removeClass('active');
    $('#myfav_section_li').removeClass('active');
    $('#mysearch_section_li').removeClass('active');
    $('#mymessage_section_li').removeClass('active');
}

function get_dash_section(section) {
    hide_dash_sec();
    $('#' + section).removeClass('hide');
    $('#' + section + '_li').addClass('active');
}
</script>

<?php
include_once 'footer.php';
?>