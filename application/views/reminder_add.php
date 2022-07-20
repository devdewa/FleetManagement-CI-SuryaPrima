    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"><?php echo (isset($reminderdetails))?'Edit Reminder':'Add Reminder' ?>
            </h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= base_url(); ?>/dashboard">Reminder</a></li>
              <li class="breadcrumb-item active"><?php echo (isset($reminderdetails))?'Edit Reminder':'Add Reminder' ?></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
       	      <form method="post" id="reminder_add" class="card" action="<?php echo base_url();?>reminder/<?php echo (isset($reminderdetails))?'updatereminder':'insertreminder'; ?>">  
        
     <div class="row">              
 <div class="col-sm-3"></div>
 <div class="col-sm-6 col-md-offset-2 ">



    <div class="card-body">
                         <input type="hidden" name="r_id" id="r_id" value="<?php echo (isset($reminderdetails)) ? $reminderdetails[0]['r_id']:'' ?>" >

                  
                  <div class="form-group">
                     <label class="form-label">Vechicle<span class="form-required">*</span></label>
                     <select id="r_v_id"  class="form-control selectized"  name="r_v_id" >
                        <option value="">Select Vechicle</option>
                        <?php  foreach ($vechiclelist as $key => $vechiclelists) { ?>
                        <option <?php if((isset($reminderdetails)) && $reminderdetails[0]['r_v_id'] == $vechiclelists['v_id']){ echo 'selected';} ?> value="<?php echo output($vechiclelists['v_id']) ?>"><?php echo output($vechiclelists['v_name']).' - '. output($vechiclelists['v_registration_no']); ?></option>
                        <?php  } ?>
                     </select>
                  </div>
                  

                  <div class="form-group">
                    <label>Date</label>
                    <input type="text" class="form-control datepickerpastdisable" required="true" value="" id="r_date" name="r_date" placeholder="Enter Username" autocomplete="off">
                  </div>


                   <div class="form-group">
                    <label>Message</label>
                   <textarea class="form-control" id="r_message" autocomplete="off" placeholder="Message"  name="r_message"><?php echo (isset($reminderdetails)) ? $reminderdetails[0]['r_message']:'' ?></textarea>
                  </div>

               
                   <div class="modal-footer">

                  <button type="submit" class="btn btn-primary"> <?php echo (isset($reminderdetails))?'Update reminder':'Add reminder' ?></button>
                 </div>

                </div>
              </div>
</div>
    </form>
             </div>
    </section>
    <!-- /.content -->



