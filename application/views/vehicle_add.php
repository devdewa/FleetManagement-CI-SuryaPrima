    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"><?php echo (isset($vehicledetails))?'Edit Vehicle':'Add Vehicle' ?>
            </h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= base_url(); ?>/dashboard">Vehicle</a></li>
              <li class="breadcrumb-item active"><?php echo (isset($vehicledetails))?'Edit vehicle':'Add Vehicle' ?></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <form method="post" id="vehicle_add" class="card" action="<?php echo base_url();?>vehicle/<?php echo (isset($vehicledetails))?'updatevehicle':'insertvehicle'; ?>">
                <div class="card-body">


                  <div class="row">
                    <input type="hidden" name="v_id" id="v_id" value="<?php echo (isset($vehicledetails)) ? $vehicledetails[0]['v_id']:'' ?>" >

                    <div class="col-sm-6 col-md-4">
                        <label class="form-label">Registration Number</label>
                      <div class="form-group">
                        <input type="text" name="v_registration_no" id="v_registration_no" class="form-control" placeholder="Registration Number" value="<?php echo (isset($vehicledetails)) ? $vehicledetails[0]['v_registration_no']:'' ?>">
                      </div>
                    </div>
                    <div class="col-sm-6 col-md-4">
                        <label class="form-label">Vehicle Name</label>
                      <div class="form-group">
                        <input type="text" name="v_name" id="v_name" class="form-control" placeholder="Vehicle Name" value="<?php echo (isset($vehicledetails)) ? $vehicledetails[0]['v_name']:'' ?>">
                      </div>
                    </div>
                    <div class="col-sm-6 col-md-4">
                      <div class="form-group">
                        <label class="form-label">Model</label>
                        <input type="text" name="v_model" value="<?php echo (isset($vehicledetails)) ? $vehicledetails[0]['v_model']:'' ?>" class="form-control" placeholder="Model">
                      </div>
                    </div>
                    <div class="col-sm-6 col-md-4">
                      <div class="form-group">
                        <label class="form-label">Assembly Year</label>
                        <input type="text" name="v_assembly" value="<?php echo (isset($vehicledetails)) ? $vehicledetails[0]['v_assembly']:'' ?>" class="form-control datepicker" placeholder="Aseembly Year Date">
                      </div>
                    </div>
                    <div class="col-sm-6 col-md-4">
                      <div class="form-group">
                        <label class="form-label">Engine No</label>
                        <input type="text" name="v_engine_no" value="<?php echo (isset($vehicledetails)) ? $vehicledetails[0]['v_engine_no']:'' ?>" class="form-control" placeholder="Engine No">
                      </div>
                    </div>
                    <div class="col-sm-6 col-md-4">
                      <div class="form-group">
                        <label class="form-label">Manufactured By</label>
                        <input type="text" name="v_manufactured_by" value="<?php echo (isset($vehicledetails)) ? $vehicledetails[0]['v_manufactured_by']:'' ?>" class="form-control" placeholder="Manufactured By">
                      </div>
                    </div>
                  </div>

                  <div class="row">
                     <div class="col-sm-6 col-md-4">
                      <div class="form-group">
                        <label class="form-label">Vehicle Type</label>
                        <select id="v_type" name="v_type" class="form-control " required="">
                         <option value="">Select Vehicle Type</option> 
                          <option <?php echo (isset($vehicledetails) && $vehicledetails[0]['v_type']=='CAR') ? 'selected':'' ?> value="CAR">CAR</option> 
                          <option <?php echo (isset($vehicledetails) && $vehicledetails[0]['v_type']=='MOTORCYCLE') ? 'selected':'' ?> value="MOTORCYCLE">MOTORCYCLE</option> 
                          <option <?php echo (isset($vehicledetails) && $vehicledetails[0]['v_type']=='TRUCK') ? 'selected':'' ?> value="TRUCK">TRUCK</option> 
                          <option <?php echo (isset($vehicledetails) && $vehicledetails[0]['v_type']=='BUS') ? 'selected':'' ?> value="BUS">BUS</option> 
                           <option <?php echo (isset($vehicledetails) && $vehicledetails[0]['v_type']=='TAXI') ? 'selected':'' ?> value="TAXI">TAXI</option> 
                           <option <?php echo (isset($vehicledetails) && $vehicledetails[0]['v_type']=='BICYCLE') ? 'selected':'' ?> value="BICYCLE">BICYCLE</option> 
                        </select>

                      </div>
                    </div>
                    <div class="col-sm-6 col-md-4">
                      <div class="form-group">
                        <label for="v_color" class="form-label">Vehicle Color<small> (To show in Map)</small></label>
                        <input id="add-device-color" name="v_color" class="jscolor {valueElement:'add-device-color', styleElement:'add-device-color', hash:true, mode:'HSV'} form-control"  value="<?php echo (isset($vehicledetails)) ? $vehicledetails[0]['v_color']:'#F399EB' ?>" required>
                      </div>
                    </div>
                    <!-- <?php if(isset($vehicledetails[0]['v_is_active'])) { ?>
                    <div class="col-sm-6 col-md-4">
                      <div class="form-group">
                        <label for="v_is_active" class="form-label">Vehicle Status</label>
                        <select id="v_is_active" name="v_is_active" class="form-control " required="">
                          <option value="">Select Vehicle Status</option> 
                          <option <?php echo (isset($vehicledetails) && $vehicledetails[0]['v_is_active']==1) ? 'selected':'' ?> value="1">Active</option> 
                          <option <?php echo (isset($vehicledetails) && $vehicledetails[0]['v_is_active']==0) ? 'selected':'' ?> value="0">Inactive</option> 
                        </select>
                      </div>
                    </div>
                  <?php } ?> -->
                  <div class="col-sm-6 col-md-4">
                      <div class="form-group">
                        <label class="form-label">Status</label>
                        <input type="text" required="" name="v_is_active" value="<?php echo (isset($vehicledetails)) ? $vehicledetails[0]['v_is_active']:'' ?>" class="form-control" placeholder="Status">
                      </div>
                  </div>
                  <div class="col-sm-6 col-md-4">
                      <div class="form-group">
                        <label class="form-label">Registration Expiry Date</label>
                        <input type="text" required="" name="v_reg_exp_date" value="<?php echo (isset($vehicledetails)) ? $vehicledetails[0]['v_reg_exp_date']:'' ?>" class="form-control datepicker" placeholder="Registration Expiry Date">
                      </div>
                  </div>
                  <div class="col-sm-6 col-md-4">
                      <div class="form-group">
                        <label for="v_group" class="form-label">Vehicle Group</label>
                        <select id="v_group" name="v_group" class="form-control " required="">
                          <option value="">Select Vehicle Group</option> 
                          <?php if(!empty($v_group)) { foreach($v_group as $v_groupdata) { ?>
                          <option <?= (isset($vehicledetails[0]['v_group']) && $vehicledetails[0]['v_group'] == $v_groupdata['gr_id'])?'selected':''?> value="<?= $v_groupdata['gr_id'] ?>"><?= $v_groupdata['gr_name'] ?></option> 
                          <?php } } ?>
                        </select>
                      </div>
                  </div>
                  <div class="col-sm-6 col-md-4">
                    <div class="form-group">
                      <label class="form-label">Tax Date</label>
                      <input type="text" name="v_tax" value="<?php echo (isset($vehicledetails)) ? $vehicledetails[0]['v_tax']:'' ?>" class="form-control datepicker" placeholder="Tax Date">
                    </div>
                  </div>
                  <div class="col-sm-6 col-md-4">
                    <div class="form-group">
                      <label class="form-label">KIR</label>
                      <input type="text" name="v_kir" value="<?php echo (isset($vehicledetails)) ? $vehicledetails[0]['v_kir']:'' ?>" class="form-control datepicker" placeholder="KIR">
                    </div>
                  </div>
                    </div>
                    <hr>
                    <div class="form-label"><b>GPS API Details(Feed GPS Data)</b></div>
                     <div class="row">
                    <div class="col-sm-6 col-md-4">
                      <div class="form-group">
                        <label class="form-label">API URL</label>
                        <input type="text" name="v_api_url" class="form-control" placeholder="API URL" value="<?php echo base_url();?>api" readonly>
                      </div>
                    </div>
                    <div class="col-sm-6 col-md-4">
                      <div class="form-group">
                        <label class="form-label">API Username</label>
                        <input type="text" id="v_api_username" value="<?php echo (isset($vehicledetails)) ? $vehicledetails[0]['v_api_username']:'' ?>" name="v_api_username" class="form-control" placeholder="API Username" readonly>
                      </div>
                    </div>
                  <div class="col-sm-6 col-md-4">
                      <div class="form-group">
                        <label class="form-label">API Password</label>
                        <input type="text" name="v_api_password" class="form-control" placeholder="API Password" value="<?php echo (isset($vehicledetails)) ? $vehicledetails[0]['v_api_password']:random_string('nozero', 6) ?>"  readonly>
                      </div>
                    </div>
                  </div>
                </div>
                  <input type="hidden" id="v_created_by" name="v_created_by" value="<?php echo output($this->session->userdata['session_data']['u_id']); ?>">
                   <input type="hidden" id="v_created_date" name="v_created_date" value="<?php echo date('Y-m-d h:i:s'); ?>">
                <div class="card-footer text-right">
                  <button type="submit" class="btn btn-primary"> <?php echo (isset($vehicledetails))?'Update Vehicle':'Add Vehicle' ?></button>
                </div>
              </form>
             </div>
    </section>
    <!-- /.content -->



