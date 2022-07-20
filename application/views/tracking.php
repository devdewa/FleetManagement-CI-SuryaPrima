       <div class="content-header">
      <div class="container-fluid">
      <form id="track" method="post">

        <div class="row col-md-12">
                  <div class="col-md-2">
                     <div class="form-group">
                        <input type="text" required="true" name="fromdate" id="fromdate" class="form-control datepicker" placeholder="From Date" >
                     </div>
                  </div>
                  <div class="col-sm-2">
                     <div class="form-group">
                        <input type="text" required="true" name="todate" id="todate" class="form-control datepicker" placeholder="To Date" >
                     </div>
                  </div>
                  <div class="col-md-5">
                     <div class="form-group">
                        <select id="t_vechicle" required="true" class="form-control selectized"  name="t_vechicle">
                           <option value="">Select Vechicle</option>
                           <?php  foreach ($vechiclelist as $key => $vechiclelists) { ?>
                           <option value="<?php echo output($vechiclelists['v_id']) ?>"><?php echo output($vechiclelists['v_name']).' - '. output($vechiclelists['v_registration_no']); ?></option>
                           <?php  } ?>
                        </select>
                     </div>
                  </div>
                  <div class="col-md-3">
                     <div class="form-group">
                        <button type="submit"  class="btn btn-primary">Load</button>
                     </div>
                  </div>
                 
    </div>
 </form>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row-cards">
		<script type="text/javascript" src="https://www.google.com/jsapi"></script>
		  <script src="<?php echo base_url(); ?>assets/map.js"></script>

			<div class="col-lg-12 col-md-12" id="map_canvas" style="width: 100%; height: 475px"></div>
			</div>
             </div>
    </section>
    <!-- /.content -->



