    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Income Expense Info
            </h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= base_url(); ?>/dashboard">Dashboard</a></li>
              <li class="breadcrumb-item active">Income Expense Info</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
    <div class="card">

        <div class="card-body p-0">
          

         <div class="table-responsive">
          <?php if(!empty($incomexpense)){ ?>
                    <table id="incomexpensetbl" class="table card-table">
                      <thead>
                        <tr>
                          <th class="w-1">S.No</th>
                          <th>Vechicle</th>
                          <th>Date</th>
                          <th>Description</th>
                          <th>Amount</th>
                          <th>Type</th>
                          <?php if(userpermission('lr_ie_edit')) { ?>
                          <th>Action</th>
                          <?php } ?>
                        </tr>
                      </thead>
                      <tbody>

                      <?php $count=1;
                           foreach($incomexpense as $incomexpenses){
                           ?>
                        <tr>
                           <td> <?php echo output($count); $count++; ?></td>
                           <td> <?php echo output($incomexpenses['vech_name']->v_name).'_'.output($incomexpenses['vech_name']->v_registration_no); ?></td>
                           <td> <?php echo output($incomexpenses['ie_date']); ?></td>

                           <td><?php echo output($incomexpenses['ie_description']); ?></td>
                         <td><?php echo output($incomexpenses['ie_amount']); ?></td>
                          <td>  <span class="badge <?php echo ($incomexpenses['ie_type']=='income') ? 'badge-success' : 'badge-danger'; ?> "><?php echo ($incomexpenses['ie_type']=='income') ? 'Income' : 'Expense'; ?></span>  </td>
                          <?php if(userpermission('lr_ie_edit')) { ?>
                              <td>
                            <a class="icon" href="<?php echo base_url(); ?>incomexpense/editincomexpense/<?php echo output($incomexpenses['ie_id']); ?>">
                              <i class="fa fa-edit"></i>
                            </a>
                          </td>
                        <?php } ?>
                        </tr>
                        <?php } ?>
                      </tbody>
                    </table>
                    <?php 
                     }  
                     else
                     {
                     echo '<div class="alert alert-warning">No income or expense found !.</div><div style="padding-bottom:240px"></div>';
                     }
                     ?>
        </div>         
        </div>
        <!-- /.card-body -->
      </div>
      
             </div>
    </section>
    <!-- /.content -->



