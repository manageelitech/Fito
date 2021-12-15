<?php
//session_start();
date_default_timezone_set('Asia/Kolkata');
include_once('admin/connection.php');
$connobj = new connClass();
$conn=$connobj->conn;
$schExt=$connobj->schExt;

include_once 'header.php';

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
</style>
<div class="container" style="margin-top: 130px;margin-bottom: 20px;">
<!--    --><?php //print_r($sessionData); ?>
    <div class="row" id="cartArea">
        <div class="col-md-12" style="margin-top: 20px;box-shadow: 2px 2px 2px 2px gray;">
<!--            <h3 style="font-family: 'ZCOOL XiaoWei', serif;color: #a1a5a8;letter-spacing: 1.5px;word-spacing: 1px;">MY CART</h3>-->
            <hr>
          <div class="col-md-3"></div>
          <div class="col-md-6">
              <form>
                  <label class="radio-inline">
                      <input type="radio" name="orderCustType" value="0" checked>I am not a Distributor
                  </label>
                  <label class="radio-inline">
                      <input type="radio" name="orderCustType" value="1">I am a Distributor
                  </label>
                  <hr>
                  <div class="" id="notDistForm">
                      <div class="form-group row">
                          <label for="enq_visited_person" class="col-md-4 col-form-label">Full Name <span style="font-size: 22px;color: red;">*</span></label>
                          <div class="col-md-8">
                              <input type="text" class="form-control" id="proceed_order_name" placeholder="Full Name">
                          </div>
                      </div>
                      <div class="form-group row">
                          <label for="enq_visited_person" class="col-md-4 col-form-label">Phone No <span style="font-size: 22px;color: red;">*</span></label>
                          <div class="col-md-8">
                              <input type="text" class="form-control" id="proceed_order_phone" placeholder="Phone No">
                          </div>
                      </div>
                      <div class="form-group row">
                          <label for="enq_visited_person" class="col-md-4 col-form-label">Email</label>
                          <div class="col-md-8">
                              <input type="email" class="form-control" id="proceed_order_email" placeholder="Email">
                          </div>
                      </div>
                      <div class="form-group row">
                          <label for="enq_visited_person" class="col-md-4 col-form-label">Full Address <span style="font-size: 22px;color: red;">*</span></label>
                          <div class="col-md-8">
                              <textarea class="form-control" id="proceed_order_address"></textarea>
                          </div>
                      </div>
                      <div class="form-group row">
                          <button type="button" class="btn btn-purple" id="order_btn" style="margin-left: 40%;">Place Order</button>
                      </div>
                  </div>
                  <div class="hide" id="DistForm">
                     <p>Please login to Distributor panel <a href="admin/distributor.html">here</a></p>
                  </div>
              </form>
          </div>
        </div>
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

    $('input[type=radio][name=orderCustType]').change(function() {
        if (this.value == '0') {
            $('#notDistForm').removeClass('hide');
            $('#DistForm').addClass('hide');
        }
        else if (this.value == '1') {
            $('#notDistForm').addClass('hide');
            $('#DistForm').removeClass('hide');
        }
    });

    $('#order_btn').on("click", function (e) {
        console.log('proceed for order');
        var name = $('#proceed_order_name').val();
        var phone = $('#proceed_order_phone').val();
        var email = $('#proceed_order_email').val();
        var address = $('#proceed_order_address').val();
        if (name == "" || phone == "" || address == ""){
            Swal.fire({
                icon: 'warning',
                title: 'Please fill required details',
                showConfirmButton: false,
                timer: 3000
            });
            return;
        }
        $.ajax({
            method: "POST",
            dataType: 'json',
            url: "functions.php",
            data:{fid:9, name:name, phone:phone, email:email, address:address}
        })
            .done(function(msg){
                console.log(msg);
                if (msg.res == 1){
                    Swal.fire({
                        icon: 'success',
                        title: 'Order has been placed!',
                        showConfirmButton: true
                    }).then((result) => {
                        $('#proceed_order_name').val('');
                        $('#proceed_order_phone').val('');
                        $('#proceed_order_email').val('');
                        $('#proceed_order_address').val('');
                        window.location = 'index.php';
                    });
                }
            });
    });
</script>



