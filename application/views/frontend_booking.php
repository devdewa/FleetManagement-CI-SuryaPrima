<!DOCTYPE html>
<html >
   <head>
      <meta http-equiv="content-type" content="text/html; charset=UTF-8">
     <meta charset = "UTF-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="description" content="">
      <meta name="author" content="">
      <title><?php 
         $data = sitedata();
         $total_segments = $this->uri->total_segments(); 
         echo ucwords(str_replace('_', ' ', 'Booking')).' | '.output($data['s_companyname']) ?></title>
      <link href='https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700' rel='stylesheet' type='text/css'>
      <link rel="stylesheet" href="<?= base_url(); ?>assets/frontend/bootstrap.min.css">
      <link rel="stylesheet" href="<?= base_url(); ?>assets/frontend/font-awesome.min.css">
      <link href="<?= base_url(); ?>assets/frontend/custom.css" rel="stylesheet">
      <script src="<?= base_url(); ?>assets/plugins/jquery/jquery_frnt.js"></script>
      <link rel="stylesheet" href="<?= base_url(); ?>assets/plugins/daterangepicker/daterangepicker.css">
      <link rel="stylesheet" href="<?= base_url(); ?>assets/plugins/datepicker/bootstrap-datepicker.min.css">
   </head>
   <body >
  <input type="hidden" id="base" value="<?php echo base_url(); ?>">
  
      <!--HEADER-BAR-->
      <div class="tb_header">
         <div class="container">
            <div class="col-md-6" style="padding:0;">
               <div style="margin-top: 20px;"> <img heigth="80" width="50" src="<?= base_url().'assets/uploads/'.$data['s_logo'] ?>"> </div>
            </div>
            <div class="col-md-4" style="padding:0;">
            </div>
            <div class="col-md-2" style="padding:0;">
               <?php if(isset($this->session->userdata['session_data_fr']['c_name'])) { ?>
                  <div class="signin_up">
                  <ul>
                     <li>Welcome , <?= ucfirst($this->session->userdata['session_data_fr']['c_name']); ?> </li><br>
                     <li><a href="<?php echo base_url(); ?>frontendbooking/mybookings">My Bookings</a>  <span style="color:#f0a2a3;">/</span></li>
                     <li><a href="<?php echo base_url(); ?>frontendbooking/logout">Logout</a></li>
                  </ul>
               </div>
               <?php  } else { ?>
               <div class="signin_up">
                  <ul>
                     <li><a href="#myModals" data-toggle="modal" data-target="#myModals">Sign In</a>  <span style="color:#f0a2a3;">/</span></li>
                     <li><a href="#myModal" data-toggle="modal" data-target="#myModal">Sign Up</a></li>
                  </ul>
               </div>
            <?php  } ?>
            </div>
         </div>
         <div class="shadow">
            <hr class="border2">
            </hr>
         </div>
      </div>

      <!--HEADER-BAR-END-->
      <!-- Modal -->
      <div class="modal fade" id="myModals" role="dialog" data-backdrop="static" data-keyboard="false">
         <div class="modal-dialog">
            <!-- Modal content-->
            <button type="button" class="close_lft" data-dismiss="modal">&times;</button>
            <form id="login" method="post" class="basicvalidation" action="<?php echo base_url();?>frontendbooking/login">
               <div class="login-block">
                  <h1>Login</h1>
                  <input type="text" required name="username" placeholder="Email" class ="username" id="username" required=""/>
                  <input type="password" required class="password" name="password" placeholder="Password" id="password" required=""/>
                  <button  type="submit" value="Login" style="position: relative;">Login</button>
                  <br>
                  
                  <div class="login_res" style="text-align:center;"></div>
                  <br>
                  <!--<div class="forgot"><a data-dismiss="modal" href="#myModalf"data-toggle="modal" data-target="#myModalf">Forgot Password?</a></div>-->
                  <div class="sign_in"><a  data-dismiss="modal" href="#myModal" data-toggle="modal" data-target="#myModal">Sign Up</a></div>
               </div>
            </form>
         </div>
      </div>
      <div class="modal fade" id="myModal" role="dialog">
         <div class="modal-dialog">
            <!-- Modal content-->
            <button type="button" class="close_lft" data-dismiss="modal">&times;</button>
            <form id="signup" method="post" class="basicvalidation" action="<?php echo base_url();?>frontendbooking/signup">
               <div class="login-block">
                  <h1>Sign Up</h1>
                  <input class="name" required id="c_name" name="c_name"  placeholder="Name" >
                  <input class="name" required id="c_mobile" name="c_mobile"  placeholder="Mobile" >
                  <input class="name" required id="c_email" name="c_email"  placeholder="Email(Username)" >
                  <input type="password" required class="name"  id="c_pwd" name="c_pwd"  placeholder="Password" >
                  <input class="name" required id="c_address" name="c_address"  placeholder="Address" >
                  <br>
                  <span class="terms_tb">By signing up, you agree to our <a class="cond_tb" href="#">Terms and Conditions.</a></span> <br>
                  <br>
                  <button  type="submit" value="Sign up" style="position: relative;">Sign UP</button>
                  <br>
                 
                  <div class="signup_res" style="text-align:center;"></div>
                  <br>
                  <div class="account"><a data-dismiss="modal" href="#myModals"data-toggle="modal" data-target="#myModals">Already have an account?</a></div>
                  <div class="sign_in"><a data-dismiss="modal" href="#myModals"data-toggle="modal" data-target="#myModals">Sign In</a></div>
               </div>
            </form>
         </div>
      </div>
      <div class="modal fade" id="myModalf" role="dialog">
         <div class="modal-dialog">
            <!-- Modal content-->
            <button type="button" class="close_lft" data-dismiss="modal">&times;</button>
            <form id="forgot" data-parsley-validate="">
               <div class="login-block">
                  <h1>Forgot Password</h1>
                  <input type="email" name="email" placeholder="Email" class="username"  data-parsley-required="true"/>
                  <!--    <span class="terms_tb">By signing up, you agree to our <a class="cond_tb" href="#">Terms and Conditions.</a></span> <br>
                     <br> -->
                  <input  type="button" value="RESET" style="position: relative;" onclick="Forgot()">
                  <br>
                  <div class="small_loader" style="text-align:center;display:none"></div>
                  <div class="forgot_res" style="text-align:center;"></div>
                  <br>
                  <div class="account"><a href="#">Already have an account?</a></div>
                  <div class="sign_in"><a data-dismiss="modal" href="#myModals"data-toggle="modal" data-target="#myModals">Sign In</a></div>
               </div>
            </form>
         </div>
      </div>
      <!--SEARCH-BAR-->
      <div class="container">
   
         <div class="row" style="min-height:400px;margin-top:120px;">
      <div class="row">
            <div class="col-md-12">
               <span id="ermsg"></span>
            <?php $successMessage = $this->session->flashdata('successmessage');  
           $warningmessage = $this->session->flashdata('warningmessage');                    
            if (isset($successMessage)) { echo '<div id="alertmessage" class="col-md-12">
                <div class="alert alert-success alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><span style="margin-left: 40%;">
                         '. $successMessage.'
                        </span></div>
                </div>'; } 
            if (isset($warningmessage)) { echo '<div id="alertmessage" class="col-md-12">
                <div class="alert alert-warning alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><span style="margin-left: 40%;">
                         '. $warningmessage.'
                        </span></div>
                </div>'; }    
            ?>
         </div>
         </div>
            


            <div class="col-md-6">
               <form id="booking" method="POST" class="basicvalidation" action="<?php echo base_url();?>frontendbooking/book">
                  <section id="Search" class="LB XXCN  P20">
                     <h1 class="bookTic XCN TextSemiBold" ><?= output($data['s_companyname']); ?></h1>
                     <div class="searchRow clearfix">
                        <div class="LB">
                           <label class="inputLabel">From</label>
                           <input id="t_trip_fromlocation" name="t_trip_fromlocation" class="XXinput searching" placeholder="Enter From" type="text" tabindex="1" required/>
                        </div>
                        <span class="switchButton" id="switchButton"></span>
                        <div class="searchRight NoPaddingRight">
                           <label class="inputLabel">To</label>
                           <input id="t_trip_tolocation" name="t_trip_tolocation" class="XXinput searching" placeholder="Enter To" type="text" tabindex="2" required />
                        </div>
                     </div>
                    <div class="searchRow clearfix">
                        <div class="LB" style="margin-top: 0px;">
                           <label class="inputLabel">Vehicle Type</label>
                             <select style="height: 32px; margin-top: -1px;" required id="t_vechicle"  class="XXinput searching"  name="t_vechicle">
                            <option value="">Select vehicle</option>
                           <?php  foreach ($vechiclelist as $key => $vechiclelists) { ?>
                           <option  value="<?php echo output($vechiclelists['v_id']) ?>"><?php echo output($vechiclelists['v_name']).' - '. output($vechiclelists['v_registration_no']); ?></option>
                           <?php  } ?>
                           </select>
                        </div>
                        <div class="searchRight retJouney">
                           <label class="inputLabel">Date</label>
                          <input id="t_start_date" name="t_start_date" class="datepicker XXinput"  required placeholder="yyyy-mm-dd"  type="text" title="Date in the format yyyy-mm-dd" tabindex="3">
                        </div>
                     </div>
                     <input type="hidden" id="t_trip_fromlat" name="t_trip_fromlat" value="1">
                      <input type="hidden" id="t_totaldistance" name="t_totaldistance" value="">
                     <input type="hidden" id="t_trip_fromlog" name="t_trip_fromlog" value="1">
                     <input type="hidden" id="t_driver" name="t_driver" value="0">
                      <input type="hidden" id="t_type" name="t_type" value="singletrip">
                      <input type="hidden" id="t_trip_status" name="t_trip_status" value="yettoconfirm">
                     <input type="hidden" id="t_customer_id" name="t_customer_id" value="<?= (isset($this->session->userdata['session_data_fr']['c_id'])?$this->session->userdata['session_data_fr']['c_id']:''); ?>">
                     <input type="hidden" id="t_trip_tolat" name="t_trip_tolat" value="1">
                     <input type="hidden" id="t_trip_tolog" name="t_trip_tolog" value="1">
                     <input type="hidden" id="t_created_by" name="t_created_by" value="<?= (isset($this->session->userdata['session_data_fr']['c_id'])?$this->session->userdata['session_data_fr']['c_id']:''); ?>">
                      <input type="hidden" id="bookingemail" name="bookingemail" value="<?= (isset($this->session->userdata['session_data_fr']['c_email'])?$this->session->userdata['session_data_fr']['c_email']:''); ?>">
                                  <input type="hidden" id="t_created_date" name="t_created_date" value="<?php echo date('Y-m-d h:i:s'); ?>">

                     <button type="submit" class="RB Xbutton">Book Now</button>
                  </section>
               </form>
            </div>
            <div class="col-md-6">
               <div class="tb_bus">
                  <img width="500" height="300" src="<?= base_url(); ?>assets/uploads/fronendimg.jpg">
               </div>
            </div>
         </div>
      </div>
      <hr class="border2">
      </hr>
      <div class="container">
         <div class="row">
            <div class="tb_inner">
               <div class="col-md-9">
                  <div class="tb_footer">
                     <ul>
                        <li><a href="#">FAQ   &nbsp;|</a></li>
                        <li><a href="#">Contact Us   &nbsp;|</a></li>
                        <li><a href="#">Terms of Use   &nbsp;|</a></li>
                        <li><a href="#">Privacy Policy   &nbsp;</a></li>
                     </ul>
                  </div>
               </div>
               <div class="col-md-3">
                  <a href="#" id="back-to-top" title="Back to top">&uarr;</a>
               </div>
            </div>
         </div>
      </div>
      <script src="<?= base_url(); ?>assets/frontend/bootstrap.min.js"></script>
      <script src="<?= base_url(); ?>assets/plugins/datepicker/bootstrap-datepicker.min.js"></script>
      <script type="text/javascript" src="https://www.google.com/jsapi"></script>
      <script type="text/javascript"
      src="https://maps.google.com/maps/api/js?key=<?php echo output($data['s_googel_api_key']); ?>&sensor=false&v=3.21.5a&libraries=drawing&signed_in=true&libraries=places,drawing"></script>
       <script src="<?= base_url(); ?>assets/fronendbooking.js"></script>
       <script src="<?= base_url(); ?>assets/distance_calculator.js"></script>
   </body>
</html>