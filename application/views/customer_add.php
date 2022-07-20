    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"><?php echo (isset($customerdetails))?'Edit Customer':'Add Customer' ?>
            </h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= base_url(); ?>/dashboard">Customer</a></li>
              <li class="breadcrumb-item active"><?php echo (isset($customerdetails))?'Edit Customer':'Add Customer' ?></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
       	      <form method="post" id="customer_add" class="card" action="<?php echo base_url();?>customer/<?php echo (isset($customerdetails))?'updatecustomer':'insertcustomer'; ?>">  
          <div class="card-body"> 

                  <div class="row">
                   <input type="hidden" name="c_id" id="c_id" value="<?php echo (isset($customerdetails)) ? $customerdetails[0]['c_id']:'' ?>" >

                    <div class="col-sm-6 col-md-3">
                      <div class="form-group">
                          <label class="form-label">Name<span class="form-required">*</span></label>
                          <input type="text" required="true" class="form-control" value="<?php echo (isset($customerdetails)) ? $customerdetails[0]['c_name']:'' ?>" id="c_name" name="c_name" placeholder="Customer Name">
                      </div>
                    </div>
                    <div class="col-sm-6 col-md-3">
                      <div class="form-group">
                         <label class="form-label">Mobile<span class="form-required">*</span></label>
                          <input type="text" required="true" class="form-control" value="<?php echo (isset($customerdetails)) ? $customerdetails[0]['c_mobile']:'' ?>" id="c_mobile" name="c_mobile" placeholder="Customer Mobile">
                      </div>
                    </div>
                    <div class="col-sm-6 col-md-4">
                      <div class="form-group">
                         <label class="form-label">Email</label>
                          <input type="text" required="true" class="form-control" value="<?php echo (isset($customerdetails)) ? $customerdetails[0]['c_email']:'' ?>" id="c_email" name="c_email" placeholder="Customer Email">

                      </div>
                    </div>
                     <?php if(isset($customerdetails[0]['c_isactive'])) { ?>
                    <div class="col-sm-6 col-md-2">
                      <div class="form-group">
                          <label for="c_isactive" class="form-label">Customer Status</label>
                        <select id="c_isactive" name="c_isactive" class="form-control " required="">
                          <option value="">Select Driver Status</option> 
                          <option <?php echo (isset($customerdetails) && $customerdetails[0]['c_isactive']==1) ? 'selected':'' ?> value="1">Active</option> 
                          <option <?php echo (isset($customerdetails) && $customerdetails[0]['c_isactive']==0) ? 'selected':'' ?> value="0">Inactive</option> 
                        </select>
                      </div>
                    <?php } ?>
                    </div>

                    <div class="col-sm-6 col-md-6">
                      <div class="form-group">
                       <label class="form-label">Address<span class="form-required">*</span></label>
                        <textarea class="form-control" required="true" id="c_address" autocomplete="off" placeholder="Address"  name="c_address"><?php echo (isset($customerdetails)) ? $customerdetails[0]['c_address']:'' ?></textarea>
                      </div>
                    </div>
                   
                    
                   
      
                </div>
                 <input type="hidden" id="c_created_date" name="c_created_date" value="<?php echo date('Y-m-d h:i:s'); ?>">
  
      <div class="modal-footer">

                  <button type="submit" class="btn btn-primary"> <?php echo (isset($customerdetails))?'Update Customer':'Add Customer' ?></button>
      </div>
    </div>
    </form>
             </div>
    </section>
    <!-- /.content -->



