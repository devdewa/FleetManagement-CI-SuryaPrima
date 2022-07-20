<footer class="main-footer">
   <strong>Devloped By <a href="http://getsourcecodes.com" target="_blank">Getsourcecodes</a>.</strong>
   <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.0
   </div>
</footer>
</div>
</div>
<script src="<?= base_url(); ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?= base_url(); ?>assets/dist/js/adminlte.js"></script>
<script src="<?= base_url(); ?>assets/plugins/jquery-validation/jquery.validate.min.js"></script>
<?php $CI = get_instance(); $last = $CI->uri->total_segments();  $seg = $CI->uri->segment($last);  if(is_numeric($seg)) { $seg = $CI->uri->segment($last-1); } ?>
<script src="<?= base_url(); ?>assets/plugins/datatables/jquery.dataTables.js"></script>
<script src="<?= base_url(); ?>assets/plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
<link rel="stylesheet" href="<?= base_url(); ?>assets/plugins/datatables-bs4/css/dataTables.bootstrap4.css">
<script src="<?= base_url(); ?>assets/plugins/moment/moment.min.js"></script>
<script src="<?= base_url(); ?>assets/plugins/daterangepicker/daterangepicker.js"></script>
<script src="<?php echo base_url(); ?>assets/jscolor.js"></script>
<script src="<?= base_url(); ?>assets/plugins/selectize.min.js"></script>
<script src="<?= base_url(); ?>assets/plugins/datepicker/bootstrap-datepicker.min.js"></script>
<script type="text/javascript">
   <?php if ($this->session->flashdata('successmessage')) { ?>
      const Toast = Swal.mixin({toast: true,position: 'top',showConfirmButton: false,timer: 5000});
      Toast.fire({
       type: 'success',
       title: '<?= $this->session->flashdata('successmessage'); ?>'
       });
   <?php } else if ($this->session->flashdata('warningmessage')) { ?>
       const Toast = Swal.mixin({toast: true,position: 'top',showConfirmButton: false,timer: 5000});
       Toast.fire({
       type: 'error',
       title: '<?= $this->session->flashdata('warningmessage'); ?>'
       });
   <?php } ?>
</script>
<?php 
   if($seg=='booking' || $seg=='incomeexpense' || $seg=='fuels') {
   ?>
<script src="<?= base_url(); ?>assets/plugins/datatables/dataTables.buttons.min.js"></script>
<script src="<?= base_url(); ?>assets/plugins/datatables/jszip.min.js"></script>
<script src="<?= base_url(); ?>assets/plugins/datatables/pdfmake.min.js"></script>
<script src="<?= base_url(); ?>assets/plugins/datatables/vfs_fonts.js"></script>
<script src="<?= base_url(); ?>assets/plugins/datatables/buttons.html5.min.js"></script>
<?php } 
   if($seg=='addgeofence' || $seg=='addtrips' || $seg=='geofence' || $seg == 'livestatus' || $seg == 'tracking') {
      $data = sitedata();
    ?>
<script type="text/javascript" src="https://www.google.com/jsapi"></script>
<script type="text/javascript"
   src="https://maps.google.com/maps/api/js?key=<?php echo output($data['s_googel_api_key']); ?>&sensor=false&v=3.21.5a&libraries=drawing&signed_in=true&libraries=places,drawing"></script>
<script src="<?php echo base_url(); ?>assets/distance_calculator.js"></script>
<?php } ?>
<script src="<?= base_url(); ?>assets/custom.js?v=<?= mt_rand(); ?>"></script>
<?php 
   if($seg=='addgeofence') { ?>
<script src="<?php echo base_url(); ?>assets/geofence.js"></script>
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/select2/css/select2.min.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/select2/css/select2-bootstrap4.min.css">
<script src="<?php echo base_url(); ?>assets/plugins/select2/js/select2.full.min.js"></script>
<script>$('.select2').select2()</script>
<?php } ?>
</body>
</html>