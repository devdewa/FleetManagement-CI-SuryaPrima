<div class="content-header">
   <div class="container-fluid">
      <div class="row mb-2">
         <div class="col-sm-6">
            <h1 class="m-0 text-dark">Vehicle's Management
            </h1>
         </div>
         <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
               <li class="breadcrumb-item"><a href="<?= base_url(); ?>/dashboard">Dashboard</a></li>
               <li class="breadcrumb-item active">Vehicle's Management</li>
            </ol>
         </div>
      </div>
   </div>
</div>
<section class="content">
   <div class="container-fluid">
      <div class="card">
         <div class="card-body p-0">
            <div class="table-responsive">
               <table id="vehiclelisttbl" class="table card-table table-vcenter text-nowrap">
                  <thead>
                     <tr>
                        <th class="w-1">S.No</th>
                        <th>Vehicle Name</th>
                        <th>Registration Number</th>
                        <th>Model</th>
                        <th>Assembly Year</th>
                        <th>Group</th>
                        <th>Registration Expiry Date</th>
                        <th>Tax Date</th>
                        <th>Is Active</th>
                        <?php if (userpermission('lr_vech_list_view') || userpermission('lr_vech_list_edit')) { ?>
                        <th>Action</th>
                        <?php } ?>
                     </tr>
                  </thead>
                  <tbody>
                     <?php if(!empty($vehiclelist)){  $count=1; foreach($vehiclelist as $vehiclelists){  ?>
                     <tr>
                        <td><?php echo output($count); $count++; ?></td>
                        <td><?php echo output($vehiclelists['v_name']); ?></td>
                        <td><?php echo output($vehiclelists['v_registration_no']); ?></td>
                        <td><?php echo output($vehiclelists['v_model']); ?></td>
                        <td><?php echo output($vehiclelists['v_assembly']); ?></td>
                        <td><?php echo output($vehiclelists['gr_name']); ?></td>
                        <td><?php echo output($vehiclelists['v_reg_exp_date']); ?></td>
                        <td><?php echo output($vehiclelists['v_tax']); ?></td>
                        <td><span class="badge <?php echo ($vehiclelists['v_is_active']=='1') ? 'badge-success' : 'badge-danger'; ?> "><?php echo ($vehiclelists['v_is_active']=='1') ? 'Active' : 'Inactive'; ?></span>  
                        </td>
                        <?php if(userpermission('lr_vech_list_view') || userpermission('lr_vech_list_edit')) { ?>
                        <td>
                           <?php if(userpermission('lr_vech_list_view')) { ?>
                           <a class="icon" href="<?php echo base_url(); ?>vehicle/viewvehicle/<?php echo output($vehiclelists['v_id']); ?>">
                           <i class="fa fa-eye"></i>
                           </a> | 
                           <?php } if(userpermission('lr_vech_list_edit')) { ?>
                           <a class="icon" href="<?php echo base_url(); ?>vehicle/editvehicle/<?php echo output($vehiclelists['v_id']); ?>">
                           <i class="fa fa-edit"></i>
                           </a> 
                           <?php } ?>
                        </td>
                        <?php } ?>
                     </tr>
                     <?php } } ?>
                  </tbody>
               </table>
            </div>
         </div>
      </div>
   </div>
</section>
