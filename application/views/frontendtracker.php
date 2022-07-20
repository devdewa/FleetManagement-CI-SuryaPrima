
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
  <link rel="stylesheet" href="<?= base_url(); ?>assets/frontend/ionicons.min.css">
  <!-- icheck bootstrap -->
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url(); ?>assets/dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition login-page">
<div class="login-box" style='margin-top: 150px;'> 

  <!-- /.login-logo -->
  <div class="card ">
    <div class="card-body login-card-body">
      <form  method="post">
             <div class="input-group input-group-sm">
                  <input type="text" id="trackingcode" name="trackingcode" class="form-control" placeholder="Tracking code">
                  <span class="input-group-append">
                    <button type="button" id="trackfrt" class="btn btn-info btn-flat">Track!</button>
                  </span>
                </div>
      </form>

      
    </div>
    <!-- /.login-card-body -->
  </div>


</div>
  <div class="col-lg-12 col-md-12" id="map_canvas" style="width: 100%; height: 230px"></div>

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
<script id="group"  src="<?php echo base_url(); ?>assets/fronendtracking.js"></script>
  <script src="<?php echo base_url(); ?>assets/fontawesome-markers.min.js"></script>

<!-- jQuery -->
<!-- Bootstrap 4 -->
<!-- AdminLTE App -->

</body>
</html>
