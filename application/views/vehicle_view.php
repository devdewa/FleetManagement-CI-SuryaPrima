 
      
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Vehicle Details
            </h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= base_url(); ?>/dashboard">Home</a></li>
              <li class="breadcrumb-item active">Vehicle Details</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
      
    <!-- Main content -->
  <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                 
                </div>

                <h3 class="profile-username text-center"><?= ucwords($vehicledetails['v_name']); ?></h3>

                <p class="text-muted text-center"><?= ucwords($vehicledetails['v_type']); ?></p>
                <p class="text-muted text-center"><?= ucwords($vehicledetails['v_is_active']); ?></p>

                <!-- <p class="text-muted text-center"><?= ($vehicledetails['v_is_active']==1)?'<span class="right badge badge-success">Active</span>':'<span class="right badge badge-danger">Inactive</span>' ?></p> -->

                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>Bookings</b> <a class="float-right"><?= count($bookings); ?></a>
                  </li>
                  <li class="list-group-item">
                    <b>Geofence</b> <a class="float-right"><?= count($vechicle_geofence); ?></a>
                  </li>
                  <li class="list-group-item">
                    <b>Notifications</b> <a class="float-right"><?= count($geofence_events); ?></a>
                  </li>
                </ul>

              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

           
          </div>
          <!-- /.col -->
          <div class="col-md-9">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                   <li class="nav-item"><a class="nav-link active" href="#basicinfo" data-toggle="tab">Basic Info</a></li>
                  <li class="nav-item"><a class="nav-link " href="#bookings" data-toggle="tab">Bookings</a></li>
                  <li class="nav-item"><a class="nav-link" href="#vechicle_geofence" data-toggle="tab">Geofence</a></li>
                <li class="nav-item"><a class="nav-link" href="#vechicle_incomexpense" data-toggle="tab">Income & Expense</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="tab-pane " id="bookings">
                     <table id="bookingstbl" class="table table-striped projects">
                          <thead>
                              <tr>
                                  <th class="percent1">
                                    #
                                  </th>
                                  <th class="percent25">
                                    Driver
                                  </th>
                                  <th class="percent25">
                                    Customer
                                  </th>
                                  <th class="percent25">
                                    From & To
                                  </th>
                                  <th class="percent25">
                                    Booking Value
                                  </th>
                                  <th class="percent25">
                                    Trip Status
                                  </th>
                                  <th class="percent25">
                                    Action
                                  </th>
                              </tr>
                          </thead>
                          <tbody>
                            <?php if(!empty($bookings)) {
                            $count=1;
                            foreach($bookings as $bookingsdata){
                            ?>
                              <tr>
                                  <td>
                                     <?php echo output($count); $count++; ?>
                                  </td>
                                   <td><?= (isset($bookingsdata['t_driver_details']->d_name))?$bookingsdata['t_driver_details']->d_name:'<span class="badge badge-danger">Yet to Assign</span>'; ?></td>
                                  <td>
                                     <?php echo output($bookingsdata['t_customer_details']->c_name);?>
                                  </td>
                                  <td>
                                     <?php echo '<small>'.output($bookingsdata['t_trip_fromlocation']).'</small>'; echo '<br><span class="badge badge-success">to</span><br>';?>
                                     <?php echo '<small>'.output($bookingsdata['t_trip_tolocation']).'</small>';?>
                                  </td>
                                  <td>
                                     <?php echo output($bookingsdata['t_trip_amount']);?>
                                  </td>
                                  
                                   <td>
                                   <?php 
                                     switch($bookingsdata['t_trip_status']){
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
                                     <?=  $status ?>  
                                  </td>
                                  <td> <a class="icon" target="_blank" href="<?php echo base_url(); ?>trips/details/<?php echo output($bookingsdata['t_id']); ?>">
                                     <i class="fa fa-eye"></i>
                                    </a> 
                                  </td>
                              </tr>
                              <?php } } ?>
                          </tbody>
                      </table>

                  </div>
                  <!-- /.tab-pane -->
                  <div class="tab-pane" id="vechicle_geofence">
                    <!-- The timeline -->
                    <table id="vgeofencetbl" class="table table-striped projects">
                          <thead>
                              <tr>
                                  <th class="percent1">
                                    #
                                  </th>
                                  <th class="percent25">
                                    Name
                                  </th>
                                  <th class="percent25">
                                    Description
                                  </th>
                                  <th class="percent25">
                                    Action
                                  </th>
                              </tr>
                          </thead>
                          <tbody>
                            <?php if(!empty($vechicle_geofence)){ 
                            $count=1;
                            foreach($vechicle_geofence as $vechicle_geofence){
                            ?>
                              <tr>
                                  <td>
                                     <?php echo output($count); $count++; ?>
                                  </td>
                                  <td>
                                      <?php echo output($vechicle_geofence['geo_name']);?>
                                  </td>
                                  <td>
                                     <?php echo output($vechicle_geofence['geo_description']);?>
                                  </td>
                                  <td> <a class="icon" href="<?php echo base_url(); ?>geofence">
                                     <i class="fa fa-eye"></i>
                                    </a> 
                                  </td>
                              </tr>
                          <?php } } ?>
                          </tbody>
                      </table>
                  </div>

                  <div class="tab-pane" id="vechicle_incomexpense">
                     <table id="incomexpenstbl" class="table table-striped projects">
                          <thead>
                              <tr>
                                  <th class="percent1">
                                    #
                                  </th>
                                  <th class="percent25">
                                    Date
                                  </th>
                                  <th class="percent25">
                                    Description
                                  </th>
                                  <th class="percent25">
                                    Amount
                                  </th>
                                  <th class="percent25">
                                    Store
                                  </th>
                                  <th class="percent25">
                                    Type
                                  </th>
                                  <th class="percent25">
                                    Action
                                  </th>
                              </tr>
                          </thead>
                          <tbody>
                            <?php if(!empty($vechicle_incomexpense)){ 
                            $count=1;
                            foreach($vechicle_incomexpense as $incomexpensdata){
                            ?>
                              <tr>
                                  <td>
                                     <?php echo output($count); $count++; ?>
                                  </td>
                                  <td>
                                      <?php echo output($incomexpensdata['ie_date']);?>
                                  </td>
                                  <td>
                                     <?php echo output($incomexpensdata['ie_description']);?>
                                  </td>
                                  <td>
                                     <?php echo output($incomexpensdata['ie_amount']);?>
                                  </td>
                                  <td>
                                     <?php echo output($incomexpensdata['ie_store']);?>
                                  </td>
                                  <td>
                                     <?php echo output($incomexpensdata['ie_type']);?>
                                  </td>
                                  <!-- <td>
                                     <?php echo ($incomexpensdata['ie_type']=='income')?'<span class="right badge badge-success">Income</span>':'<span class="right badge badge-danger">Expense</span>'; ?>
                                  </td> -->
                                 <td> <a class="icon" href="<?php echo base_url(); ?>incomexpense">
                                     <i class="fa fa-eye"></i>
                                    </a> 
                                  </td>                                 
                              </tr>
                          <?php } } ?>
                          </tbody>
                      </table>
                  </div>
                  <!-- /.tab-pane -->

                  <div class="tab-pane active" id="basicinfo">
                    <table class="table table-sm table-bordered">
                  <tbody>
                    <tr>
                      <td>Registration No</td>
                      <td><?= output($vehicledetails['v_registration_no']) ?></td>
                    </tr>
                    <tr>
                      <td>Name</td>
                      <td><?= output($vehicledetails['v_name']) ?></td>
                    </tr>
                    <tr>
                      <td>Model</td>
                      <td><?= output($vehicledetails['v_model']) ?></td>
                    </tr>
                    <tr>
                      <td>Assembly Year</td>
                      <td><?= output($vehicledetails['v_assembly']) ?></td>
                    </tr>
                    <tr>
                      <td>Police Plate</td>
                      <td><?= output($vehicledetails['v_plate']) ?> | <span class="text-danger"><?= output($vehicledetails['v_plate_reminder']) ?></span></td>
                    </tr>
                    <tr>
                      <td>Tax Date</td>
                      <td><?= output($vehicledetails['v_tax']) ?> | <span class="text-danger"><?= output($vehicledetails['v_tax_reminder']) ?></span></td>
                    </tr>
                    <tr>
                      <td>KIR</td>
                      <td><?= output($vehicledetails['v_kir']) ?> | <span class="text-danger"><?= output($vehicledetails['v_kir_reminder']) ?></span></td>
                    </tr>
                    <tr>
                      <td>Engine No.</td>
                      <td><?= output($vehicledetails['v_engine_no']) ?></td>
                    </tr>
                    <tr>
                      <td>Manufactured By</td>
                      <td><?= output($vehicledetails['v_manufactured_by']) ?></td>
                    </tr>
                     <tr>
                      <td>Type</td>
                      <td><?= output($vehicledetails['v_type']) ?></td>
                    </tr>
                     <tr>
                      <td>Mileage/Litre</td>
                      <td><?= output($vehicledetails['v_mileageperlitre']) ?></td>
                    </tr>
                     <tr>
                      <td>API URL</td>
                      <td><?= output($vehicledetails['v_api_url']) ?></td>
                    </tr>
                     <tr>
                      <td>GPS API Username</td>
                      <td><?= output($vehicledetails['v_api_username']) ?></td>
                    </tr>
                     <tr>
                      <td>GPS API Password</td>
                      <td><?= output($vehicledetails['v_api_password']) ?></td>
                    </tr>
                     <tr>
                      <td>Created Date</td>
                      <td><?= output($vehicledetails['v_created_date']) ?></td>
                    </tr>
                     <tr>
                      <td>Modified Date</td>
                      <td><?= output($vehicledetails['v_modified_date']) ?></td>
                    </tr>
                  </tbody>
                </table>
                <div class="col-sm-3">
                  <a href="<?= base_url(); ?>vehicle/editvehicle/<?= $vehicledetails['v_id']; ?>">
                   <button type="button" class="btn btn-block btn-success btn-sm">Edit Info</button>
                 </a>
                </div>
                  </div>
                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.nav-tabs-custom -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
