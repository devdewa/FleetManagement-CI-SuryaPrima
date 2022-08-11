<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"><?php echo (isset($supplierdetails))?'Edit Supplier':'Tambah Supplier' ?>
            </h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= base_url(); ?>/dashboard">Supplier</a></li>
              <li class="breadcrumb-item active"><?php echo (isset($supplierdetails))?'Edit Supplier':'Tambah Supplier' ?></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
       	      <form method="post" id="supplier_add" class="card" action="<?php echo base_url();?>supplier/<?php echo (isset($supplierdetails))?'updatesupplier':'insertsupplier'; ?>">  
          <div class="card-body"> 

                  <div class="row">
                   <input type="hidden" name="s_id" id="s_id" value="<?php echo (isset($supplierdetails)) ? $supplierdetails[0]['s_id']:'' ?>" >

                    <div class="col-sm-6 col-md-3">
                      <div class="form-group">
                          <label class="form-label">Nama<span class="form-required">*</span></label>
                          <input type="text" required="true" class="form-control" value="<?php echo (isset($supplierdetails)) ? $supplierdetails[0]['s_name']:'' ?>" id="s_name" name="s_name" placeholder="Nama Supplier">
                      </div>
                    </div>
                    <div class="col-sm-6 col-md-3">
                      <div class="form-group">
                         <label class="form-label">No Telepon<span class="form-required">*</span></label>
                          <input type="text" required="true" class="form-control" value="<?php echo (isset($supplierdetails)) ? $supplierdetails[0]['s_mobile']:'' ?>" id="s_mobile" name="s_mobile" placeholder="No Telepon Supplier">
                      </div>
                    </div>
                    <div class="col-sm-6 col-md-4">
                      <div class="form-group">
                         <label class="form-label">Email</label>
                          <input type="text" required="true" class="form-control" value="<?php echo (isset($supplierdetails)) ? $supplierdetails[0]['s_email']:'' ?>" id="s_email" name="s_email" placeholder="Email Supplier">

                      </div>
                    </div>
                     <?php if(isset($supplierdetails[0]['s_isactive'])) { ?>
                    <div class="col-sm-6 col-md-2">
                      <div class="form-group">
                          <label for="s_isactive" class="form-label">supplier Status</label>
                        <select id="s_isactive" name="s_isactive" class="form-control " required="">
                          <option value="">Select Driver Status</option> 
                          <option <?php echo (isset($supplierdetails) && $supplierdetails[0]['s_isactive']==1) ? 'selected':'' ?> value="1">Active</option> 
                          <option <?php echo (isset($supplierdetails) && $supplierdetails[0]['s_isactive']==0) ? 'selected':'' ?> value="0">Inactive</option> 
                        </select>
                      </div>
                    <?php } ?>
                    </div>

                    <div class="col-sm-6 col-md-6">
                      <div class="form-group">
                       <label class="form-label">Alamat<span class="form-required">*</span></label>
                        <textarea class="form-control" required="true" id="s_address" autocomplete="off" placeholder="Alamat"  name="s_address"><?php echo (isset($supplierdetails)) ? $supplierdetails[0]['s_address']:'' ?></textarea>
                      </div>
                    </div>
                   
                    
                   
      
                </div>
                 <input type="hidden" id="s_created_date" name="s_created_date" value="<?php echo date('Y-m-d h:i:s'); ?>">
  
      <div class="modal-footer">

                  <button type="submit" class="btn btn-primary"> <?php echo (isset($supplierdetails))?'Update supplier':'Add supplier' ?></button>
      </div>
    </div>
    </form>
             </div>
    </section>
    <!-- /.content -->



