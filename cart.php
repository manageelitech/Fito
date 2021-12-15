<?php
//session_start();
date_default_timezone_set('Asia/Kolkata');
include_once('admin/connection.php');
$connobj = new connClass();
$conn=$connobj->conn;
$schExt=$connobj->schExt;

include_once 'header.php';
if (isset($_SESSION["guestcart"])){
    $sessionData = $_SESSION["guestcart"];
    $cart = sizeof($sessionData);
}

?>
<style>
.seller_form_area{
    margin-top: 156px;
    background: aliceblue;
}
.wrapper{
    background: white;
}
p, li, li a, S label {
    color: black;
    padding: 0 5px;
}
.custombtm
{
    background: #fb641b;

    box-shadow: 0 1px 2px 0
    rgba(0,0,0,.2);

    border: none;

    color:  #fff;

    padding: 10px 28px;

    font-size: 20px;

    font-weight: 500;

    letter-spacing: 1px;


    word-spacing: 7px;

    margin-top: 6px;

    margin-bottom: 20px;

    float: right;

    font-weight: bolder;

    margin-top: 20px;
    letter-spacing: 4px;
    font-family: 'ZCOOL XiaoWei', serif;
}
    h3,h4,p{
        color: black;
    }
</style>
<div class="container" style="margin-top: 130px;margin-bottom: 20px;">
<!--    --><?php //print_r($sessionData); ?>
    <div class="row" id="cartArea">

    </div>
</div>
<?php
include_once 'footer.php';
?>
<script src="admin/assets/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="admin/assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>

<!--<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>-->
<script src="https://cdn.datatables.net/buttons/1.6.0/js/dataTables.buttons.min.js"></script>
<script type="application/javascript">
    $(document).ready(function () {
        if(localStorage.getItem('LOGIN_STATUSmlm') !='true'){
            $.ajax({
                method: "POST",
                dataType: 'json',
                url: "functions.php",
                data:{fid:6}
            })
                .done(function(msg){
                    // console.log(msg);
                    $('#cartArea').html(msg.cartArea);
                });
        }
        else {
            var uid = localStorage.getItem('INC');
            $.ajax({
                method: "POST",
                dataType: 'json',
                url: "functions.php",
                data:{fid:11, uid:uid}
            })
                .done(function(msg){
                    // console.log(msg);
                    $('#cartArea').html(msg.cartArea);
                });
        }
    });
</script>
<script>
    function increaseCartQty(slno) {
        var qty = $('#cartQtytextBox'+slno).val();
        var price = $('#priceSec'+slno).html();
        var totaPrice = $('#totalPrice').html();
        var totaQty = $('#totalQty').html();
        var incQty =parseInt(qty) + 1;
        var incPrice = parseFloat(price) + parseFloat(price)/qty;
        var inctotaPrice = parseFloat(totaPrice) + parseFloat(incPrice - price);
        var inctotaQty = parseInt(totaQty) + 1;
        $('#cartQtytextBox'+slno).val(incQty);
        $('#priceSec'+slno).html(incPrice);
        $('#totalPrice').html(inctotaPrice);
        $('#subtotalPrice').html(inctotaPrice);
        $('#totalQty').html(inctotaQty);
    }
    function decreaseCartQty(slno) {
        var qty = $('#cartQtytextBox'+slno).val();
        if (qty == "1"){
            Swal.fire({
                icon: 'warning',
                title: 'This is the minimum quantity!',
                showConfirmButton: false,
                timer: 3000
            });
            return;
        }
        var price = $('#priceSec'+slno).html();
        var totaPrice = $('#totalPrice').html();
        var totaQty = $('#totalQty').html();
        var incQty =parseInt(qty) - 1;
        var incPrice = parseFloat(price) - parseFloat(price)/qty;
        var inctotaPrice = parseFloat(totaPrice) - parseFloat(price)/qty;
        var inctotaQty = parseInt(totaQty) - 1;
        $('#cartQtytextBox'+slno).val(incQty);
        $('#priceSec'+slno).html(incPrice);
        $('#totalPrice').html(inctotaPrice);
        $('#subtotalPrice').html(inctotaPrice);
        $('#totalQty').html(inctotaQty);
    }
    function removeCart(slno) {
        var uid = localStorage.getItem('INC');
        var prodId = slno;
        $.ajax({
            method: "POST",
            dataType: 'json',
            url: "functions.php",
            data:{fid:7, prodId:prodId, uid:uid}
        })
            .done(function(msg){
                // console.log(msg);
                location.reload();
            });
    }
    function proceeOrder() {
        var uid = localStorage.getItem('INC');
        $.ajax({
            method: "POST",
            dataType: 'json',
            url: "functions.php",
            data:{fid:8, uid:uid}
        })
            .done(function(msg){
                console.log(msg);
                var cart = msg.cartQty;
                var cartItem = [];
               $.each(cart, function (index, item) {
                   var qty = $('#cartQtytextBox'+item).val();
                   // console.log(item);
                   cartItem.push(qty);
               });
                //console.log(cartItem);
                // return;
                $.ajax({
                    method: "POST",
                    dataType: 'json',
                    url: "functions.php",
                    data:{fid:10, cartItem:cartItem, uid:uid,cart:cart}
                })
                    .done(function(msg){
                        console.log(msg);
                        if (msg.res == 1){
                            window.location = msg.url;
                        }
                        else if (msg.res == 2){
                            Swal.fire({
                                icon: 'success',
                                title: 'Order has been placed!',
                                showConfirmButton: true
                            }).then((result) => {
                                window.location = msg.url;
                            });
                        }
                    });
            });
    }
</script>

