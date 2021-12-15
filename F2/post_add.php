<?php
session_start();
include_once 'header.php';
include_once('connection.php');
$connobj = new connClass();
$conn = $connobj->conn;
?>
<style>
    /* Style the tab */
    .tab {
        float: left;
        border: 1px solid #ccc;
        background-color: #f1f1f1;
        width: 50%;
        /*height: 300px;*/
    }

    /* Style the buttons inside the tab */
    .tab button {
        display: block;
        background-color: inherit;
        color: black;
        padding: 22px 16px;
        width: 100%;
        border: none;
        outline: none;
        text-align: left;
        cursor: pointer;
        transition: 0.3s;
        font-size: 17px;
        border-bottom: 1px solid #ccc;
    }
    .tab button span{
        float: right;
    }

    /* Change background color of buttons on hover */
    .tab button:hover {
        background-color: #ddd;
    }

    /* Create an active/current "tab button" class */
    .tab button.active {
        background-color: #ccc;
    }

    /* Style the tab content */
    .tabcontent {
        float: left;
        padding: 0;
        /*border: 1px solid #ccc;*/
        width: 50%;
        /*height: 300px;*/
        background-color: #f1f1f1;
        border: 1px solid #ccc;
        border-bottom: none;
    }
    .tabcontent h3{
        display: block;
        background-color: inherit;
        color: black;
        padding: 22px 16px;
        width: 100%;
        border: none;
        outline: none;
        text-align: left;
        cursor: pointer;
        transition: 0.3s;
        font-size: 17px;
        border-bottom: 1px solid #ccc;
        margin-top: 0;
    }
    .tabcontent h3:hover {
        background-color: #ddd;
    }
</style>
<!-- ad-single start here -->
<div class="commontop" style="margin-top: 70px;">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-xs-12"  style="border: 2px solid #ddd1d1;background-color: #f1f1f1;">
                <h1>CHOOSE A CATEGORY</h1>
                <div class="tab">
                    <?php
                    $post_cat = $conn->query("SELECT * FROM `real_post_category` where status='ACTIVE'");
                    if($post_cat_res = $post_cat->fetch_assoc()){
                        $post_cat_id = $post_cat_res['slno'];
                        $post_cat_name = $post_cat_res['name'];
                        ?>
                        <button class="tablinks" onclick="openCity(event, '<?php echo $post_cat_id; ?>')" id="defaultOpen"><?php echo $post_cat_name; ?> <span><i class="fa fa-angle-right"></i></span></button>
                    <?php
                    }
                    while($post_cat_res = $post_cat->fetch_assoc()){
                        $post_cat_id = $post_cat_res['slno'];
                        $post_cat_name = $post_cat_res['name'];
                        ?>
                        <button class="tablinks" onclick="openCity(event, '<?php echo $post_cat_id; ?>')"><?php echo $post_cat_name; ?><span><i class="fa fa-angle-right"></i></span></button>
                    <?php
                    }

                    ?>
                </div>



                <?php
                $post_sub_cat_qry = $conn->query("SELECT distinct post_add_categoey FROM `real_post_sub_category` where status='ACTIVE'");
                while ($post_sub_cat_qry_res = $post_sub_cat_qry->fetch_assoc()){
                    $post_sub_cat_id = $post_sub_cat_qry_res['post_add_categoey'];
                    ?>
                    <div id="<?php echo $post_sub_cat_id; ?>" class="tabcontent">
                        <?php
                        $post_sub_cat = $conn->query("SELECT * FROM `real_post_sub_category` where status='ACTIVE' and post_add_categoey='$post_sub_cat_id'");
                        if ($post_sub_cat_res = $post_sub_cat->fetch_assoc()){
                            $post_sub_cat_name = $post_sub_cat_res['name'];
                            $sub_cat_id = $post_sub_cat_res['slno'];

                            $qry_cat = $conn->query("SELECT name FROM `real_post_category` where slno='$post_sub_cat_id'");
                            if ($qry_cat_res = $qry_cat->fetch_assoc()){
                                $cat_name = $qry_cat_res['name'];
                            }
                            $href = "add_post.php?cat=".$connobj->encryptIt($cat_name)."&catid=".$connobj->encryptIt($post_sub_cat_id)."&subcatid=".$connobj->encryptIt($sub_cat_id);
                            ?>
                               <a href="<?php echo $href;?>"> <h3 style="margin-top: 0"><?php echo $post_sub_cat_name; ?></h3></a>
                            <?php
                        }
                        while ($post_sub_cat_res = $post_sub_cat->fetch_assoc()){
                            $post_sub_cat_name = $post_sub_cat_res['name'];
                            $sub_cat_id = $post_sub_cat_res['slno'];
                            $qry_cat = $conn->query("SELECT name FROM `real_post_category` where slno='$post_sub_cat_id'");
                            if ($qry_cat_res = $qry_cat->fetch_assoc()){
                                $cat_name = $qry_cat_res['name'];
                            }
                            $href = "add_post.php?cat=".$connobj->encryptIt($cat_name)."&catid=".$connobj->encryptIt($post_sub_cat_id)."&subcatid=".$connobj->encryptIt($sub_cat_id);
                            ?>
                            <a href="<?php echo $href;?>"> <h3 style="margin-top: 0"><?php echo $post_sub_cat_name; ?></h3></a>
                            <?php
                        }
                        ?>
                    </div>
                <?php
                }

                ?>
            </div>
        </div>
    </div>
</div>

<!-- ad-single end here -->

<!-- footer start here -->
<script>
    $(document).ready(function (e) {
        if (localStorage.getItem('login_status') != 'true'){
            window.location.replace("login.php");
            return;
        }
        var uid = localStorage.getItem('uid');
        $.ajax({
            type: "POST",
            dataType: 'json',
            url: "functions.php",
            data: {fid : 3,uid:uid },
        })
            .done(function(response){
                $('#login_name').html(response.name);
                $('#login_phone').html(response.phone);
                var name = response.name;
                var res = name.split(" ");
                var namei;
                if (res.length > 1){
                   var namei =  res[0].charAt(0)+res[(res.length - 1)].charAt(0);
                }else {
                    var namei =  res[0].charAt(0);
                }
                $('#login_name_i').html(namei);
            });
    });
    function open_ad_post_form() {
        window.location.replace("add_post.php");
    }
</script>
<script>
    function openCity(evt, cityName) {
        var i, tabcontent, tablinks;
        tabcontent = document.getElementsByClassName("tabcontent");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }
        tablinks = document.getElementsByClassName("tablinks");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
        }
        document.getElementById(cityName).style.display = "block";
        evt.currentTarget.className += " active";
    }

    // Get the element with id="defaultOpen" and click on it
    document.getElementById("defaultOpen").click();
</script>
<?php
include_once 'footer.php';
?>
