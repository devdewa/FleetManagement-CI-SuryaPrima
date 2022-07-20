<?php
if(!isset($this->session->userdata['session_data_fr'])) {
  $url=base_url();
  header("location: $url");
}
?>
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
               <div style="margin-top: 20px;"> <a href="<?php echo base_url(); ?>"><img heigth="80" width="50" src="<?= base_url().'assets/uploads/'.$data['s_logo'] ?>"></a> </div>
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

      <!--SEARCH-BAR-->
     <div class="container" ng-controller="search">
       
         <div class="row" style="min-height:400px;margin-top:140px;">
          <div class="col-lg-12">
            <?php if(!empty($mybookings)){  
         foreach($mybookings as $mybooking){
         ?>
            <div class="tb_route_inner_txt" ng-show="tripDetails.length!='0'" ng-repeat="trips in tripDetails">
               <div class="tb_route_inner" data-toggle="collapse" data-target="#demo{{$index}}" style="cursor:pointer;">
                  <div class="tb_route_from">
                     <div class="tb_tour"><?= $mybooking['t_trip_fromlocation']; ?><br>
                     </div>
                  </div>
                  <div class="tb_route_arrow"><img src="http://techlabz.in/truebus-web/assets/images/arrow-right.png"></div>
                  <div class="tb_route_to">
                     <div class="tb_tour"><?= $mybooking['t_trip_tolocation']; ?><br>
                     </div>
                  </div>
                  <div class="tb_route_date">
                     <div class="tb_tour">
                        <?= $mybooking['t_start_date']; ?>
                     </div>
                  </div>
                  <div class="tb_route_name">
                     <div class="tb_tour"><?php 
                              switch($mybooking['t_trip_status']){
                                  case 'ongoing':
                                      $status = '<span class="badge badge-info">Ongoing</span>';
                                      break;
                                  case 'completed':
                                      $status = '<span class="badge badge-success">Completed</span>';
                                       break;
                                  case 'yettostart':
                                      $status = '<span class="badge badge-warning">Yet to start</span>';
                                       break;
                                  case 'cancelled':
                                      $status = '<span class="badge badge-danger">Cancelled</span>'; 
                                       break; 
                                  case 'yettoconfirm':
                                      $status = '<span class="badge badge-danger">Yet to Confirm</span>'; 
                                       break;    
                                }

                              ?>
                             <?=  $status ?>  <br>
                             <?php if($mybooking['t_trip_status']=='ongoing' || $mybooking['t_trip_status']=='yettostart') { ?>
                              <span class="tb_tour_type">Live Tracking : <a target="_new" href="<?= base_url().'triptracking/'.$mybooking['t_trackingcode']; ?>"><?= base_url().'triptracking/'.$mybooking['t_trackingcode']; ?></a> </span>
                              <?php } else { echo '<span class="tb_tour_type">Live Tracking : - </span>';} ?>
                     </div>
                  </div>
               </div>
            </div>
            <?php } } else {
              echo '<div class="alert alert-success alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><span style="margin-left: 40%;">
                         No booking found..
                        </span></div>
                </div>';
            } ?>
          </div>
         </div>
      </div>
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