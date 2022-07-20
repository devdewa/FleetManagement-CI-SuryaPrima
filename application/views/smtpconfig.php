  <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">SMTP Configuration
            </h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= base_url(); ?>/dashboard">Home</a></li>
              <li class="breadcrumb-item active">SMTP Configuration</li>
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
              <form id="addnewcategory" class="basicvalidation" role="form" action="<?php echo base_url(); ?>settings/smtpconfigsave" method="post"  enctype='multipart/form-data'>
                <div class="card-body">
                  <div class="form-group">
                    <label>Host</label>
                    <input type="text" class="form-control" required="true" value="<?php echo output(isset($smtpconfig[0]['smtp_host'])?$smtpconfig[0]['smtp_host']:''); ?>" id="smtp_host" name="smtp_host" placeholder="Enter Host">
                  </div>

                  <div class="form-group">
                     <label>SMTPAuth</label>
                     <select class="form-control" id="smtp_auth" required="true" name="smtp_auth">
                      <option value="">Select SMTPAuth</option>
                      <option <?php echo (isset($smtpconfig[0]['smtp_auth']) && $smtpconfig[0]['smtp_auth']=='true') ? 'selected':'' ?> value="true">True</option>
                      <option <?php echo (isset($smtpconfig[0]['smtp_auth']) && $smtpconfig[0]['smtp_auth']=='false') ? 'selected':'' ?> value="false">False</option>
                    </select>

                  </div>

                  <div class="form-group">
                    <label>Username</label>
                    <input type="text" class="form-control" required="true" value="<?php echo output(isset($smtpconfig[0]['smtp_uname'])?$smtpconfig[0]['smtp_uname']:''); ?>" id="smtp_uname" name="smtp_uname" placeholder="Enter Username">
                  </div>


                   <div class="form-group">
                    <label>Password</label>
                    <input type="password" class="form-control" required="true" value="<?php echo output(isset($smtpconfig[0]['smtp_pwd'])?$smtpconfig[0]['smtp_pwd']:''); ?>" id="s_inovicess_prefix" name="smtp_pwd" placeholder="Enter SMTP Password">
                  </div>

                   <div class="form-group">
                    <label>SMTPSecure</label>
                      <select class="form-control" id="smtp_issecure" required="true" name="smtp_issecure">
                      <option value="">Select SMTP Secure</option>
                      <option <?php echo (isset($smtpconfig[0]['smtp_issecure']) && $smtpconfig[0]['smtp_issecure']=='ssl') ? 'selected':'' ?> value="ssl">SSL</option>
                      <option <?php echo (isset($smtpconfig[0]['smtp_issecure']) && $smtpconfig[0]['smtp_issecure']=='tls') ? 'selected':'' ?> value="tls">TLS</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Port</label>
                    <input type="text" class="form-control" required="true" value="<?php echo output(isset($smtpconfig[0]['smtp_port'])?$smtpconfig[0]['smtp_port']:''); ?>" id="smtp_port" name="smtp_port" placeholder="Enter Port">
                  </div>
                  
                  <div class="form-group">
                    <label>EmailFrom</label>
                    <input type="text" class="form-control" required="true" value="<?php echo output(isset($smtpconfig[0]['smtp_emailfrom'])?$smtpconfig[0]['smtp_emailfrom']:''); ?>" id="smtp_emailfrom" name="smtp_emailfrom" placeholder="Enter Email From Address">
                  </div>
                  <div class="form-group">
                    <label>ReplyTo</label>
                    <input type="text" class="form-control" required="true" value="<?php echo output(isset($smtpconfig[0]['smtp_emailfrom'])?$smtpconfig[0]['smtp_emailfrom']:''); ?>" id="smtp_replyto" name="smtp_replyto" placeholder="Enter ReplyTo">
                  </div> 
               
                    <div class="modal-footer justify-content-between">
                    <button type="button" data-toggle="modal" data-target="#modal-default" class="btn btn-primary">Test Email</button>
                    <button type="submit" class="btn btn-primary">Save Config</button>
                  </div>

                </div>
              </form>
            </div>
            </div>
          </div>
</section>


<div class="modal fade show" id="modal-default" aria-modal="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Test SMTP Configuration</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
       <form   action="<?php echo base_url(); ?>settings/smtpconfigtestemail" method="post" >
      <div class="modal-body">
        <div class="form-group row">
              <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
              <div class="col-sm-10">
              <input type="email" required="true" class="form-control" id="testemailto" name="testemailto" placeholder="Enter email">
              </div>
            </div>            
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Send Email</button>
      </div>
          </form>

    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>