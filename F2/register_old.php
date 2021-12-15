<?php include_once 'header.php';?>
<div class="container">
  <div class="breadcrumb">
    <div class="pull-left">
        <ul class="list-inline matter">
                    <li><a href="index.php">Home</a></li>
                    <li><a href="register.php">Register</a></li>
                  </ul>
    </div>
    <div class="pull-right">
				<h2>Register Account</h2>
		</div>
  </div>
    <div class="commontop row">                <div id="content" class="col-sm-12 login">
      <div class="col-md-6 col-sm-6 col-xs-12 bor hidden-xs">
          <div class="donot">If you have an account already? So <a href="index435d.html?route=classified/login">Login Now</a>.          </div>
          <p>And start and posting less than a minute</p>
		  	<div class="or hide">
				<span>or</span>
				<hr>
			</div>
      </div>
      <div class="col-sm-6 col-xs-12 border-left">
        <h1>Sign Up</h1>
      <form action="https://ocsolutions.co.in/classifieddemo-script/index.php?route=classified/register" method="post" enctype="multipart/form-data" class="form-horizontal">
        <fieldset id="account">
          <div class="form-group required">
		  <label class="control-label">First Name</label> <br/>
            <i class="la la-user"></i>
            <input type="text" name="firstname" value="" placeholder="First Name" id="input-firstname" class="form-control" />
                        </div>
          <div class="form-group required">
		   <label class="control-label">Last Name</label> <br/>
              <i class="la la-user"></i>
              <input type="text" name="lastname" value="" placeholder="Last Name" id="input-lastname" class="form-control" />
                        </div>
          <div class="form-group required">
		     <label class="control-label">E-Mail</label> <br/>
              <i class="la la-envelope-o"></i>
              <input type="email" name="email" value="" placeholder="E-Mail" id="input-email" class="form-control" />
                        </div>
        </fieldset>
        <fieldset>
          <div class="form-group required">
		   <label class="control-label">Password</label> <br/>
            <i class="la la-unlock"></i>
              <input type="password" name="password" value="" placeholder="Password" id="input-password" class="form-control" />
                        </div>
          <div class="form-group required">
		    <label class="control-label">Password Confirm</label> <br/>
            <i class="la la-unlock"></i>
              <input type="password" name="confirm" value="" placeholder="Password Confirm" id="input-confirm" class="form-control" />
                        </div>

                            
                <div class="buttons">
          <div class="form-group">
                        <input type="checkbox" name="agree" value="1" />
            			I have read and agree to the <a href="index11ee.html?route=information/information/agree&amp;information_id=3" class="agree"><b>Privacy Policy</b></a>            &nbsp; 
            <input type="submit" value="Continue" class="btn btn-primary" />
          </div>
        </div>
                </form>
		 </div>
			 
			<div  class="clearfix"></div> 
	  
	  </div>
    </div>
</div>
 <!-- model plans start-->
       <!-- Modal -->
        <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog modal-lg">
          <!-- Modal content-->
          <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
          <div class="modal-body">
          <div class="classified_plan">
            <div class="row m-auto text-center">
                            <div class="col-sm-4 princing-item green">
                <div class="pricing-divider">
                  <h3 class="text-light">Diamond</h3>

                  <h4 class="my-0 display-2 text-light font-weight-normal mb-3">£2,500.00</h4>
                </div>
                <div class="card-body bg-white mt-0 shadow">
                  <ul class="list-unstyled mb-5 position-relative">
                   <li>23 <b>Classified</b>  </li>
                   <li>2 year  <b> Validity</b></li>
				 </ul>
                </div>
              </div>
                            <div class="col-sm-4 princing-item green">
                <div class="pricing-divider">
                  <h3 class="text-light">One Day package</h3>

                  <h4 class="my-0 display-2 text-light font-weight-normal mb-3">£85.00</h4>
                </div>
                <div class="card-body bg-white mt-0 shadow">
                  <ul class="list-unstyled mb-5 position-relative">
                   <li>5 <b>Classified</b>  </li>
                   <li>1 day  <b> Validity</b></li>
				 </ul>
                </div>
              </div>
                            <div class="col-sm-4 princing-item green">
                <div class="pricing-divider">
                  <h3 class="text-light">Gold</h3>

                  <h4 class="my-0 display-2 text-light font-weight-normal mb-3">£15.00</h4>
                </div>
                <div class="card-body bg-white mt-0 shadow">
                  <ul class="list-unstyled mb-5 position-relative">
                   <li>18 <b>Classified</b>  </li>
                   <li>5 day  <b> Validity</b></li>
				 </ul>
                </div>
              </div>
                          </div>
          </div>
		  <div class="clearfix"></div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
          </div>
          </div>
    
        </div>
	
        </div>

<?php include_once 'footer.php';?>