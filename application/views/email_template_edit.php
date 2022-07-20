  <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Email Template
            </h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= base_url(); ?>/dashboard">Home</a></li>
              <li class="breadcrumb-item active">Email Template</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- Main content -->
<section class="content">
  <div class="container-fluid">
<div class="card">
    <div class="row">
      <div class="col-sm-3"></div> 
        <div class="col-sm-6 col-md-offset-2 ">
      <form id="addnewcategory" class="basicvalidation" role="form" action="<?php echo base_url(); ?>settings/update_template" method="post"  enctype='multipart/form-data'>
        <div class="card-body">
          <div class="form-group">
            <label>Name</label>
            <input type="text" class="form-control" readonly required="true" value="<?php echo output(isset($emailtemplate[0]['et_name'])?$emailtemplate[0]['et_name']:''); ?>" id="et_name" name="et_name" placeholder="Enter Name">
          </div>
          <div class="form-group">
            <label>Content</label>
            <textarea class="form-control" rows="10" id="et_body" name="et_body" placeholder="Email content"><?php echo output(isset($emailtemplate[0]['et_body'])?$emailtemplate[0]['et_body']:''); ?></textarea>
          </div>
          <input type="hidden" required="true" class="form-control" value="<?php echo output(isset($emailtemplate[0]['et_id'])?$emailtemplate[0]['et_id']:''); ?>" id="et_id" name="et_id" >
            <small>Note : Please user "p" tag for each new line..</small>
            <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Update</button>
          </div>
        </div>
      </form>
    </div>
    </div>
</section>   


