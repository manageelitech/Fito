<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>-->
<!--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>-->
<style>

    .swiper-container {
        width: 100%;
        height: 100%;
    }

    .swiper-slide {
        text-align: center;
        font-size: 18px;
        background: #fff;

        /* Center slide text vertically */
        display: -webkit-box;
        display: -ms-flexbox;
        display: -webkit-flex;
        display: flex;
        -webkit-box-pack: center;
        -ms-flex-pack: center;
        -webkit-justify-content: center;
        justify-content: center;
        -webkit-box-align: center;
        -ms-flex-align: center;
        -webkit-align-items: center;
        align-items: center;
    }

    .swiper-slide img {
        display: block;
        width: 100%;
        height: 100%;
        object-fit: cover;
    }
    .red_bold{
        color: red;
        font-weight: bold;
    }
    .green_bold{
        color: green;
        font-weight: bold;
    }
    .red_light{
        color: red;
    }
    .green_light{
        color: green;
    }
</style>
<!--<link-->
<!--    rel="stylesheet"-->
<!--    href="https://unpkg.com/swiper/swiper-bundle.min.css"-->
<!--/>-->
<?php
include_once('admin/connection.php');
$connobj = new connClass();
$conn=$connobj->conn;
$schExt=$connobj->schExt;

//$connect = new PDO("mysql:host=localhost; dbname=fitohm", "root", "");
 $connect = new PDO("mysql:host=localhost; dbname=onlineba_fitohm", "onlineba_minhaj", "minhaj@#123456");

/*function get_total_row($connect)
{
  $query = "
  SELECT * FROM tbl_webslesson_post
  ";
  $statement = $connect->prepare($query);
  $statement->execute();
  return $statement->rowCount();
}

$total_record = get_total_row($connect);*/

$limit = '20';
$page = 1;
if ($_POST['page'] > 1) {
    $start = (($_POST['page'] - 1) * $limit);
    $page = $_POST['page'];
} else {
    $start = 0;
}

$query = "SELECT * FROM fito_seller ";

if ($_POST['query'] != '') {
    $query .= '
  WHERE area LIKE "%' . str_replace(' ', '%', $_POST['query']) . '%"
  ';
    $query .= '
  || store_name LIKE "%' . str_replace(' ', '%', $_POST['query']) . '%"
  ';
    $query .= '
  || town LIKE "%' . str_replace(' ', '%', $_POST['query']) . '%"
  ';
    $query .= '
  || products LIKE "%' . str_replace(' ', '%', $_POST['query']) . '%"
  ';
}

$query .= 'ORDER BY slno ASC ';

//echo $query;
//return;
$filter_query = $query . 'LIMIT ' . $start . ', ' . $limit . '';

$statement = $connect->prepare($query);
$statement->execute();
$total_data = $statement->rowCount();

$statement = $connect->prepare($filter_query);
$statement->execute();
$result = $statement->fetchAll();
$total_filter_data = $statement->rowCount();

$output = '
<!--<label>Total Records - ' . $total_data . '</label>-->

';
if ($total_data > 0) {
    foreach ($result as $row) {
        $id = $row['slno'];
        $shopname= $row['store_name'];
        $owner_name = $row['owner_name'];
        $products= $row['products'];
        $area = $row['area'];
        $town = $row['town'];
        $phone = $row['phone'];
        $whatsapp = $row['whatsapp'];
        $filename = $row['filename'];
        $fileArray = explode(',',$filename);

        $output .= '
    <div class="col-md-3 col-sm-6">
                <div class="card" style="color: black;padding: 14px;">';
        $output .= '
<div class="swiper-container prodSwiper" style="height: 200px;">
      <div class="swiper-wrapper">';
        foreach ($fileArray as $value){
            $path = 'uploads/tieupshop/'.$value;
            $output .= '<div class="swiper-slide"><img src="'.$path.'"></div>';
        }

      $output .='</div>
      <div class="swiper-button-next"></div>
      <div class="swiper-button-prev"></div>
    </div>';

                     $output .='<p class="red_bold">Available Products <br/><span class="green_bold">'.$products.'</span></p>
<address class="red_bold"><i class="fa fa-map-marker"></i>
                        <span class="red_bold">Area : </span> <span class="green_bold">'.$area.'</span>
                    </address>
                    <address class="red_bold"><i class="fa fa-map-marker"></i>
                        <span>Near Town and Village : </span> <span class="green_bold">'.$town.'</span>
                    </address>
<p class="red_light"><i class="fa fa-shopping-cart"></i> <span>Shop Name : </span> <span class="green_light">'.$shopname.'</span></p>
                    <p class="red_light"><i class="fa fa-user"></i> <span>Owner Name :</span> <span class="green_light">'.$owner_name.'</span></p>
                    <p style="color: #73716a;"><i class="fa fa-mobile"></i> '.$phone.'</p>
                    
                    <div class="" style="text-align: center;">
                        <span style="color: #73716a;"><a href="tel:'.$phone.'"><img src="img/call.png" style="width: 40px;"></a></span>
                        <span style="color: #73716a;"><a href="https://wa.me/'.$whatsapp.'"" target="_blank"><img src="img/whatsapp.jpg" style="width: 40px;"></a></span>
                        <span style="color: #73716a;"><a href="javascript:void(0);"><img src="img/email.png" style="width: 40px;"></a></span>
                    </div>
                </div>
                
            </div>
    ';
    }
} else {
    $output .= '
  <p style="text-align: center;font-size: 30px;">NO SHOP AVALABLE</p>
  ';
}

echo $output;

?>
<!-- Swiper JS -->
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

<!-- Initialize Swiper -->
<script>
    var swiper = new Swiper(".prodSwiper", {
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
    });
</script>
