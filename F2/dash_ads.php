<div class="inner-ads">
    <div class="links">
        <ul class="list-inline pull-left">
            <li><a href="#">All Ads</a></li>
            <li><a href="#">Active</a></li>
            <li><a href="#">Inactive</a></li>
            <li><a href="#">Moderated</a></li>
        </ul>
        <ul class="list-inline pull-right">
            <li><a href="#">Inactive</a></li>
            <li><a href="#">Active</a></li>
            <li><a href="#">Delete</a></li>
        </ul>
    </div>
    <?php
    $products = $conn->query("select *,DATEDIFF(CURDATE(), DATE_FORMAT(FROM_UNIXTIME(UNIX_TIMESTAMP(`date`)), '%Y-%m-%d')) AS days from real_products where status='ACTIVE' and uid='$user_id'");
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
        <div class="product-layout product-list">
            <div class="product-thumb">
                <div class="image">
                    <a href="#"><img src="upload/<?php echo $cat_id."/".$sub_cat_id."/".$image[0] ?>" alt="<?php echo $products_res['title']; ?>" title="<?php echo $products_res['title']; ?>" class="img-fluid" style="width: 266px;"></a>
                </div>
                <div class="caption">
                    <h4><a href="#"><?php echo $products_res['title']; ?></a></h4>
                    <p class="des">Category : <?php echo $cat_name; ?></p>
                    <p class="des">Sub Category : <?php echo $sub_cat_name; ?></p>
                    <ul class="list-unstyled">
                        <li><i class="la la-map-marker"></i> <?php echo $products_res['state'].','.$products_res['city']; ?></li>
                        <li><i class="la la-clock-o"></i> <?php echo $days; ?></li>
                    </ul>
                    <hr>
                    <p class="des"><?php echo $products_res['description']; ?></p>
                    <div class="button-group text-center visible-xs">
                        <button type="button">₹ <?php echo $products_res['price']; ?></button>
                        <button type="button"><i class="la la-eye"></i></button>
                        <button type="button"><i class="la la-pencil"></i></button>
                        <button type="button"><i class="la la-cloud-upload"></i></button>
                        <button type="button"><i class="la la-trash-o"></i></button>
                        <button type="button"><i class="la la-circle"></i></button>
                    </div>
                </div>
                <div class="button-group text-center hidden-xs">
                    <button type="button">₹ <?php echo $products_res['price']; ?></button>
                    <button type="button"><i class="la la-eye"></i></button>
                    <button type="button"><i class="la la-pencil"></i></button>
                    <button type="button"><i class="la la-cloud-upload"></i></button>
                    <button type="button"><i class="la la-trash-o"></i></button>
                    <button type="button"><i class="la la-circle"></i></button>
                </div>
            </div>
        </div>
    <?php
    }
    ?>
</div>