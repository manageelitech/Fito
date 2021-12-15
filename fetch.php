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

$query = "SELECT * FROM products ";

if ($_POST['query'] != '') {
    $query .= '
  WHERE product_name LIKE "%' . str_replace(' ', '%', $_POST['query']) . '%" 
  ';
}

$query .= 'ORDER BY slno ASC ';

//echo $query;

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
        $prodname = $row['product_name'];
        $imgname = $row['product_image'];
        $product_desc = $row['product_desc'];
        $mrp = $row['mrp'];
        $dp = $row['dp'];
        $bv = $row['bv'];
        $encid = $connobj->encryptIt($id);
        $output .= '
    <div class="col-md-3 col-sm-6">
                        <!-bounceInUp animated-data-wow-delay=".25s"-->
                        <div class="sellers-main wow " >
                            <div class="sellers-img-main"><a href="javascript:void(0)" onclick="showModal('.$id.');"><img src="admin/backend/products/'.$imgname.'" class="img-responsive" alt="'.$prodname.'"  style="width: 100%;height: 300px;"/></a></div>
                            <div class="sellers-hover-main" data-aos="zoom-in-right" data-aos="flip-left" data-aos-easing="ease-out-cubic" data-aos-duration="2000" style="display: none;">
                                <div class="hover-star-main">
                                    <ul>
                                        <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                        <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                        <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                        <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                        <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                    </ul>
                                </div>
                                <div class="seller-hover-hedding" >'.$prodname.'</div>
                                <div class="seller-hover-para">
                                    '.$prodname.'<br>MRP: '.$mrp.' Rs   | <abbr title="After discount coupon
 price">ADCP</abbr>:'.$dp.' Rs  | Bv:'.$bv.' p
                                </div>
                            </div>
                            <!--<div class="btn-hover" data-aos="zoom-in-right" data-aos="flip-left" data-aos-easing="ease-out-cubic" data-aos-duration="2000"><a href="#"><span> '.$prodname.'<br>Mrp: '.$mrp.' Rs   | <abbr title="After discount coupon
 price">ADCP</abbr>:'.$dp.' Rs  | Bv:'.$bv.' p <span class="btn-arrow"></span></span></a></div>-->

                            <div class="sellers-btn-main-table">
                                <a href="#"> <div class="sellers-btn-main">'.$prodname.'<br>MRP: '.$mrp.' Rs   | <abbr title="After discount coupon
 price">ADCP</abbr>:'.$dp.' Rs  | Bv:'.$bv.' p</div></a>
                            </div>
                            <div class="linear-wipe"><h1 style="font-size: 18px;font-weight: bold;">Cashback : 50%</h1></div>
                            <button class="btn addToCartBtn" onclick="addToCart(\''.$encid.'\')">ADD TO CART</button>
                           
                        </div>
                    </div>
    ';
    }
} else {
    $output .= '
  <p style="text-align: center;font-size: 30px;">NO PRODUCTS AVALABLE</p>
  ';
}

$output .= '

<br />
<div class="container">
<div class="row">
<div align="center">
  <ul class="pagination" style="width: 100%;">
';

$total_links = ceil($total_data / $limit);
$previous_link = '';
$next_link = '';
$page_link = '';

//echo $total_links;
$page_array = array();
if ($total_links > 4) {
    if ($page < 5) {
        for ($count = 1; $count <= 5; $count++) {
            $page_array[] = $count;
        }
        $page_array[] = '...';
        $page_array[] = $total_links;
    } else {
        $end_limit = $total_links - 5;
        if ($page > $end_limit) {
            $page_array[] = 1;
            $page_array[] = '...';
            for ($count = $end_limit; $count <= $total_links; $count++) {
                $page_array[] = $count;
            }
        } else {
            $page_array[] = 1;
            $page_array[] = '...';
            for ($count = $page - 1; $count <= $page + 1; $count++) {
                $page_array[] = $count;
            }
            $page_array[] = '...';
            $page_array[] = $total_links;
        }
    }
} else {
    for ($count = 1; $count <= $total_links; $count++) {
        $page_array[] = $count;
    }
}

for ($count = 0; $count < count($page_array); $count++) {
    if ($page == $page_array[$count]) {
        $page_link .= '
    <li class="page-item active">
      <a class="page-link" href="#">' . $page_array[$count] . ' <span class="sr-only">(current)</span></a>
    </li>
    ';

        $previous_id = $page_array[$count] - 1;
        if ($previous_id > 0) {
            $previous_link = '<li class="page-item"><a class="page-link" href="javascript:void(0)" data-page_number="' . $previous_id . '">Previous</a></li>';
        } else {
            $previous_link = '
      <li class="page-item disabled">
        <a class="page-link" href="#">Previous</a>
      </li>
      ';
        }
        $next_id = $page_array[$count] + 1;
        if ($next_id >= $total_links) {
            $next_link = '
      <li class="page-item disabled">
        <a class="page-link" href="#">Next</a>
      </li>
        ';
        } else {
            $next_link = '<li class="page-item"><a class="page-link" href="javascript:void(0)" data-page_number="' . $next_id . '">Next</a></li>';
        }
    } else {
        if ($page_array[$count] == '...') {
            $page_link .= '
      <li class="page-item disabled">
          <a class="page-link" href="#">...</a>
      </li>
      ';
        } else {
            $page_link .= '
      <li class="page-item"><a class="page-link" href="javascript:void(0)" data-page_number="' . $page_array[$count] . '">' . $page_array[$count] . '</a></li>
      ';
        }
    }
}

$output .= $previous_link . $page_link . $next_link;
$output .= '
  </ul>
</div>
</div>
</div>
';

echo $output;

?>