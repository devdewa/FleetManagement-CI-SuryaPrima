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
   <div class="dropdown">
      <button type="button" class="btn btn-warning mb-3" data-toggle="dropdown">
         <i class="fas fa-bell"></i> <span class="badge badge-light" id="notif"></span>
      </button>
      <div id="pesan" class="dropdown-menu" aria-labelledby="dropdownMenuButton">
         <?php if (
            !empty($vehiclelist)) { 
               $count = 1 ;
               $future_timestamp = strtotime("+1 month");
               foreach (
                  $vehiclelist as $vehiclelists
               )
            {  
         ?>

         <!-- Tampil -->
         <p>TAX | <?php echo output($vehiclelists['v_tax_reminder']); ?></p>
         <p>KIR | <?php echo output($vehiclelists['v_kir_reminder']); ?></p>
         <p>PLATE | <?php echo output($vehiclelists['v_plate_reminder']); ?></p>

         <?php } } ?>
      </div>
   </div>
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
                        <th>Police Plate</th>
                        <th>Tax Date</th>
                        <th>KIR</th>
                        <th>Status</th>
                        <?php if (userpermission('lr_vech_list_view') || userpermission('lr_vech_list_edit')) { ?>
                        <th>Action</th>
                        <?php } ?>
                     </tr>
                  </thead>
                  <tbody>
                     <?php if (
                        !empty($vehiclelist)) { 
                           $count = 1 ;
                           foreach (
                              $vehiclelist as $vehiclelists
                           )
                        {  
                     ?>
                     <tr>
                        <td><?php echo output($count); $count++; ?></td>
                        <td><?php echo output($vehiclelists['v_name']); ?></td>
                        <td><?php echo output($vehiclelists['v_registration_no']); ?></td>
                        <td><?php echo output($vehiclelists['v_model']); ?></td>
                        <td><?php echo output($vehiclelists['v_assembly']); ?></td>
                        <td><?php echo output($vehiclelists['gr_name']); ?></td>
                        <td><?php echo output($vehiclelists['v_plate']); ?></td>
                        <td><?php echo output($vehiclelists['v_tax']); ?></td>
                        <td><?php echo output($vehiclelists['v_kir']); ?></td>
                        <td><?php echo output($vehiclelists['v_is_active']); ?></td>
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
