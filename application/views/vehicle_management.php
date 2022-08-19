<div class="content-header">
   <div class="container-fluid">
      <div class="row mb-2">
         <div class="col-sm-6">
            <h1 class="m-0 text-dark">Manajemen Kendaraan
            </h1>
         </div>
         <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
               <li class="breadcrumb-item"><a href="<?= base_url(); ?>/dashboard">Dashboard</a></li>
               <li class="breadcrumb-item active">Manajemen Kendaraan</li>
            </ol>
         </div>
      </div>
   </div>
</div>
<section class="content">
   <div class="container-fluid">
   <!-- <div class="dropdown">
      <button type="button" class="btn btn-warning mb-3" data-toggle="dropdown">
         <i class="fas fa-bell"></i> <span class="badge badge-light" id="notif"></span>
      </button>
      <div id="pesan" class="dropdown-menu" aria-labelledby="dropdownMenuButton">
         <?php if (
            !empty($vehiclelistt)) { 
               $count = 1 ;
               $future_timestamp = strtotime("+1 month");
               foreach (
                  $vehiclelistt as $vehiclelists
               )
            {
         ?>

         <p><?php echo output($count); $count++; ?>. STNK | <?php echo output($vehiclelists['v_tax_reminder']); ?></p>
         <p><?php echo output($count); $count++; ?>. KIR | <?php echo output($vehiclelists['v_kir_reminder']); ?></p>
         <p><?php echo output($count); $count++; ?>. PLAT | <?php echo output($vehiclelists['v_plate_reminder']); ?></p>

         <?php } } ?>
      </div>
   </div> -->
      <div class="card">
         <div class="card-body p-0">
            <div class="table-responsive">
               <table id="vehiclelisttbl" class="table card-table table-vcenter text-nowrap">
                  <thead>
                     <tr>
                        <th class="w-1">No</th>
                        <th>Action</th>
                        <th>Merek Kendaraan</th>
                        <th>No. PLAT Kendaraan</th>
                        <th>Model & Tipe</th>
                        <th>Tahun Pembuatan</th>
                        <th>Gudang / Tempat</th>
                        <th>Masa berlaku PLAT</th>
                        <th>Masa berlaku STNK</th>
                        <th>Masa berlaku KIR</th>
                        <th>Keterangan Tambahan</th>
                        <?php if (userpermission('lr_vech_list_view') || userpermission('lr_vech_list_edit')) { ?>
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
