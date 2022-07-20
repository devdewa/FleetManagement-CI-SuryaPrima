    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Geofence Info
            </h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= base_url(); ?>/dashboard">Dashboard</a></li>
              <li class="breadcrumb-item active">Geofence Info</li>
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
                    <table id="triptbl" class="table card-table table-vcenter text-nowrap">
                      <thead>
                        <tr>
                          <th class="w-1">S.No</th>
                          <th>Name</th>
                          <th>Description</th>
                         <th>Vehicle</th>
                          <th>View</th>
                          <?php if(userpermission('lr_geofence_delete')) { ?>
                        <th>Delete</th>
                        <?php } ?>
                        </tr>
                      </thead>
                      <tbody>
                         <?php if(!empty($geofencelist)){
                          $count=1;
                         foreach($geofencelist as $geofence){
                         ?>
                        <tr>
                           <td> <?php echo output($count); $count++; ?></td>
                           <td> <?php echo ucfirst($geofence['geo_name']); ?></td>
                           <td><?php echo output($geofence['geo_description']); ?></td>
                           <td><?php echo output($geofence['geo_vehiclename']); ?></td>
                           <td>
                            
                            <a class="icon geofenceviewpopup" data-id='<?= $geofence['geo_id'] ?>' href="javascript:void(0);">
                              <i class="fa fa-eye"></i>
                            </a> </td>
                             <?php if(userpermission('lr_geofence_delete')) { ?>
                            <td>
                            <a class="icon" href="<?php echo base_url(); ?>geofence/geofencedelete/<?php echo output($geofence['geo_id']); ?>">
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
        <!-- /.card-body -->
      </div>
      
             </div>
    </section>
    <!-- /.content -->



<div id="geofencepopupmodel" class="modal fade">
   <div class="modal-dialog" role="document">
      <div class="modal-content">
         <div class="modal-body">

      
   </head>
   
   <body >
      <div id = "googleMap" style = "width:100%; height:400px;"></div>
   </body>
   
         </div>
         <div class="modal-footer">
            <button type="button" data-dismiss="modal" class="btn btn-danger">Close</button>
         </div>
      </div>
   </div>
</div>