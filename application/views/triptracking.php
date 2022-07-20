
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Live Tracking</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url(); ?>assets/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url(); ?>assets/dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition ">
    <div class="col-12 col-md-12">
    <nav class="navbar navbar-expand navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
             <span class="nav-link"><b>From :</b> <?= $tripdetails['t_trip_fromlocation'] ?></span>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <span class="nav-link"><b>To : </b><?= $tripdetails['t_trip_tolocation'] ?></span>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <span class="nav-link"><b>Vechicle No : </b><?= $tripdetails['t_vechicle_details']->v_registration_no ?></span>
        </li>
         <li class="nav-item d-none d-sm-inline-block">
          <span class="nav-link"><b>Driver : </b><?= (isset($tripdetails['t_driver_details']->d_name))?$tripdetails['t_driver_details']->d_name:'<span class="badge badge-danger">Yet to Assign</span>'; ?></span>
        </li>
      </ul>

    </nav>
    </div>
    <input type="hidden" value="<?= $tripdetails['t_vechicle_details']->v_id ?>" id="v_id" name="v_id">
    <input type="hidden" value="<?= $tripdetails['t_trip_status'] ?>" id="t_trip_status" name="t_trip_status">
    <div class="col-lg-12 col-md-12" id="map_canvas" style="width: 100%; height: 530px"></div>

<!-- /.login-box -->
<?php  $data = sitedata();  ?>
  <input type="hidden" id="base" value="<?php echo base_url(); ?>">
<script src="<?= base_url(); ?>assets/plugins/jquery/jquery.min.js"></script>
<script src="<?= base_url(); ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/plugins/toast/toast.min.css" />
 <script src="<?= base_url(); ?>assets/plugins/toast/toast.min.js"></script>
 <script type="text/javascript"
            src="https://maps.google.com/maps/api/js?key=<?php echo $data['s_googel_api_key']; ?>&sensor=false&v=3.21.5a&libraries=drawing&signed_in=true&libraries=places,drawing"></script>
<script type="text/javascript" src="http://www.google.com/jsapi"></script>
<script id="group"  src="<?php echo base_url(); ?>assets/triptracking.js"></script>
  <script src="<?php echo base_url(); ?>assets/fontawesome-markers.min.js"></script>


<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
      <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Information</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <div class="modal-body">
              <p id="msg"></p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-primary"data-dismiss="modal">Close</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
</div>

</body>
</html>
