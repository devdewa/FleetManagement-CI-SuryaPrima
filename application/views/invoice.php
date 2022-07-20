
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php
                if(!isset($this->session->userdata['session_data'])) {
                $url=base_url();
                header("location: $url");
              }  
                $data = sitedata();
                $total_segments = $this->uri->total_segments(); 
                echo ucwords(str_replace('_', ' ', $this->uri->segment(1))).' | '.output($data['s_companyname'])  ?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Bootstrap 4 -->

  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url(); ?>assets/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url(); ?>assets/dist/css/adminlte.css">

  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body>
<div class="wrapper">
  <!-- Main content -->
  <section class="col-12" class="invoice">
    <!-- title row -->
    <div class="row">
      <div class="col-12">
        <h2 class="page-header">
          <img src="<?= base_url().'assets/uploads/'.$data['s_logo'] ?>">
          <small class="float-right">Date: <?= date('Y-m-d') ?></small>
        </h2>
      </div><br>
      <!-- /.col -->
    </div><br><br>
    <!-- info row -->
    <div class="row invoice-info">
      <div class="col-sm-4 invoice-col">
        From
        <address>
          <strong><?= $data['s_companyname'] ?></strong><br>
         <?=  str_replace(",", '<br>', $data['s_address']); ?>
        </address>
      </div>
      <!-- /.col -->
      <div class="col-sm-4 invoice-col">
        To
        <address>
          <strong><?= $customerdetails['c_name']; ?></strong><br>
          <?= $customerdetails['c_address']; ?><br>
          Phone: <?= $customerdetails['c_mobile']; ?><br>
          Email: <?= $customerdetails['c_email']; ?>
        </address>
      </div>
      <!-- /.col -->
      <div class="col-sm-4 invoice-col">
        <b>Invoice #<?= output($data['s_inovice_prefix']).date('Ym').$tripdetails['t_id']; ?></b><br>
        <br>
        <b>Order ID:</b> <?= output($tripdetails['t_id']) ?><br>
        <b>Payment Due:</b> <?= date('Y-m-d') ?><br>
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
      <?php
      $totalpaidamt = 0;
      if(count($paymentdetails)>=1) {
      foreach ($paymentdetails as $payment) {
          $totalpaidamt += $payment['tp_amount'];
      } }
      ?>
    <!-- Table row -->
    <div class="row">
      <div class="col-12 table-responsive">
        <table class="table table-striped">
          <thead>
          <tr>
            <th>Qty</th>
            <th>Service</th>
            <th>Description</th>
            <th>Subtotal</th>
          </tr>
          </thead>
          <tbody>
          <tr>
            <td>1</td>
            <td><?= output($data['s_inovice_servicename']) ?> </td>
            <td>From  <br> <?= $tripdetails['t_trip_fromlocation']; ?> <br> to <br><?= $tripdetails['t_trip_tolocation']; ?> </td>
            <td><?= output($data['s_price_prefix']).$tripdetails['t_trip_amount'] ?></td>
          </tr>
          </tbody>
        </table>
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->

    <div class="row">
      <!-- accepted payments column -->
      <div class="col-6">

        <p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">
         <?= output($data['s_inovice_termsandcondition']) ?>
        </p> 
      </div>
      <div class="col-2"></div>
      <!-- /.col -->
      <div class="col-4">

        <div class="table-responsive">
          <table class="table">
            <tr>
              <th style="width:50%">Subtotal:</th>
              <td><?= output($data['s_price_prefix']).$tripdetails['t_trip_amount'] ?></td>
            </tr>
            <tr>
              <th>Paid:</th>
              <td><?= output($data['s_price_prefix']).$totalpaidamt ?></td>
            </tr>
            <?php if($tripdetails['t_trip_amount'] - $totalpaidamt !=0) { ?>
            <tr>
              <th><?= ($tripdetails['t_trip_amount'] > $totalpaidamt)?'Pending':'Excess' ?>:</th>
              <td><?= output($data['s_price_prefix']) .preg_replace('/[^\d\.]+/','',$tripdetails['t_trip_amount'] - $totalpaidamt)  ?></td>
            </tr>
          <?php } ?>
          </table>
        </div>
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </section>
  <!-- /.content -->
</div>
<!-- ./wrapper -->

<script type="text/javascript"> 
  window.addEventListener("load", window.print());
</script>
</body>
</html>
