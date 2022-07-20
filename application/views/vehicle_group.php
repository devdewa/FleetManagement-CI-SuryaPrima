<div class="content-header">
   <div class="container-fluid">
      <div class="row mb-2">
         <div class="col-sm-6">
            <h1 class="m-0 text-dark">Vehicle Group
            </h1>
         </div>
         <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
               <li class="breadcrumb-item"><a href="<?= base_url(); ?>/dashboard">Dashboard</a></li>
               <li class="breadcrumb-item active">Vehicle Group</li>
            </ol>
         </div>
      </div>
      <?php if(userpermission('lr_vech_group_action')) { ?>
      <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-add">
      Add New Group
      </button>
      <?php } ?>
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
                        <th>Name</th>
                        <th>Description</th>
                        <th>Created Date</th>
                        <?php if(userpermission('lr_vech_group_action')) { ?>
                        <th>Action</th>
                        <?php } ?>
                     </tr>
                  </thead>
                  <tbody>
                     <?php if(!empty($vehiclegroup)){  $count=1;
                        foreach($vehiclegroup as $vehiclegroupdata){
                        ?>
                     <tr>
                        <td> <?php echo output($count); $count++; ?></td>
                        <td> <?php echo output($vehiclegroupdata['gr_name']); ?></td>
                        <td> <?php echo output($vehiclegroupdata['gr_desc']); ?></td>
                        <td> <?php echo output($vehiclegroupdata['gr_created_date']); ?></td>
                        <?php if(userpermission('lr_vech_group_action')) { ?>
                        <td>
                           <a class="icon" href="<?php echo base_url(); ?>tracking/livestatus/<?php echo output($vehiclegroupdata['gr_id']); ?>">
                           <i class="fa fa-map"></i> |  
                           <a class="icon" href="<?php echo base_url(); ?>vehicle/vehiclegroup_delete/<?php echo output($vehiclegroupdata['gr_id']); ?>">
                           <i class="fa fa-trash text-danger"></i>
                           </a> 
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
<div class="modal fade show" id="modal-add" aria-modal="true">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <h4 class="modal-title">Add New Group</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
            </button>
         </div>
         <div class="modal-body">
            <form id="geofencesave" method="post" action="<?php echo base_url(); ?>vehicle/addgroup">
               <div class="card-body">
                  <div class="form-group row">
                     <label for="geo_name" class="col-sm-4 col-form-label">Name</label>
                     <div class="form-group col-sm-8">
                        <input type="text" class="form-control" name="gr_name" id="gr_name" required="true" placeholder="Enter Group Name">
                     </div>
                  </div>
                  <div class="form-group row">
                     <label for="Cateogry" class="col-sm-4 col-form-label">Description</label>
                     <div class="form-group col-sm-8">
                        <input type="text" class="form-control" name="gr_desc" id="gr_desc" required="true" placeholder="Enter Description">
                     </div>
                  </div>
               </div>
         </div>
         <div class="modal-footer justify-content-between">
         <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
         <button type="submit" id="geofenvaluesave" class="btn btn-primary">Save</button>
         </div>
         </form>
      </div>
   </div>
</div>