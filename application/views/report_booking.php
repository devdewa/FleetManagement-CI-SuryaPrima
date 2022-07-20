<div class="content-header">
   <div class="container-fluid">
      <div class="row mb-2">
         <div class="col-sm-6">
            <h1 class="m-0 text-dark">Booking Report
            </h1>
         </div>
         <!-- /.col -->
         <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
               <li class="breadcrumb-item"><a href="<?= base_url(); ?>reports">Report</a></li>
               <li class="breadcrumb-item active">Booking Report</li>
            </ol>
         </div>
         <!-- /.col -->
      </div>
      <!-- /.row -->
   </div>
   <!-- /.container-fluid -->
</div>
<!-- Main content -->
<section class="content">
   <div class="container-fluid">
      <form method="post" id="booking_report" class="card basicvalidation" action="<?php echo base_url();?>reports/booking">
         <div class="card-body">
            <div class="row">
               <div class="col-md-3">
                  <div class="form-group row">
                     <label for="booking_from" class="col-sm-5 col-form-label">Report From</label>
                     <div class="col-sm-6 form-group">
                        <input type="text" required="true" class="form-control form-control-sm datepicker" value="<?php echo isset($_POST['booking_from']) ? $_POST['booking_from'] : ''; ?>" id="booking_from" name="booking_from" placeholder="Date From">
                     </div>
                  </div>
               </div>
               <div class="col-md-3">
                  <div class="form-group row">
                     <label for="booking_to" class="col-sm-5 col-form-label">Report To</label>
                     <div class="col-sm-6 form-group">
                        <input type="text" required="true" class="form-control form-control-sm datepicker" value="<?php echo isset($_POST['booking_to']) ? $_POST['booking_to'] : ''; ?>" id="booking_to" name="booking_to" placeholder="Date To">
                     </div>
                  </div>
               </div>
               <div class="col-md-4">
                  <div class="form-group row">
                     <label for="booking_to" class="col-sm-3 col-form-label">Vehicle</label>
                     <div class="col-sm-8 form-group">
                        <select required="true" id="booking_vechicle"  class="form-control selectized"  name="booking_vechicle">
                           <option value="all">All Vechicle</option>
                           <?php foreach ($vehiclelist as $key => $vechiclelists) { ?>
                           <option <?php echo (isset($_POST['booking_vechicle']) && ($_POST['booking_vechicle'] == $vechiclelists['v_id'])) ? 'selected':'' ?> value="<?php echo output($vechiclelists['v_id']) ?>"><?php echo output($vechiclelists['v_name']).' - '. output($vechiclelists['v_registration_no']); ?></option>
                           <?php  } ?>
                        </select>
                     </div>
                  </div>
               </div>
               <input type="hidden" id="bookingreport" name="bookingreport" value="1">
               <div class="col-md-2">
                  <button type="submit" class="btn btn-block btn-outline-info btn-sm"> Generate Report</button>
               </div>
            </div>
         </div>
   </div>
   </form>
    <div class="card">

        <div class="card-body p-0">
           <?php if(!empty($triplist)){ ?>
         <div class="table-responsive">
                    <table  class="datatableexport table card-table table-vcenter">
                      <thead>
                        <tr>
                          <th class="w-1">S.No</th>
                          <th>Customer</th>
                          <th>Vechicle</th>
                          <th>Type</th>
                          <th>Driver</th>
                           <th>From To</th>
                            <th>Distance</th>
                             <th>Amount</th>
                          <th>Trip Status</th>
                        </tr>
                      </thead>
                      <tbody>

                     <?php
                           $count=1;
                           foreach($triplist as $triplists){
                           ?>
                        <tr>
                           <td> <?php echo output($count); $count++; ?></td>
                           <td> <?php echo ucfirst($triplists['t_customer_details']->c_name); ?></td>
                           <td> <?php echo output($triplists['t_vechicle_details']->v_name); ?></td>
                           <td><?php echo ucfirst($triplists['t_type']); ?></td>
                           <td><?php echo output($triplists['t_driver_details']->d_name); ?></td>
                            <td><?php echo ucfirst($triplists['t_trip_fromlocation'] . '<br> to <br>' . $triplists['t_trip_tolocation']); ?></td>
                             <td><?php echo ucfirst($triplists['t_totaldistance']); ?></td>
                              <td><?php echo ucfirst($triplists['t_trip_amount']); ?></td>
                           <td> <?php 
                              switch($triplists['t_trip_status']){
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
                                }

                              ?>
                             <?=  $status ?>  
                            </td>
                    
                        </tr>
                        <?php } ?>
                      </tbody>
                    </table>
                   <?php } ?>
        </div>         
        </div>
        <!-- /.card-body -->
      </div>


   </div>
</section>
<!-- /.content -->