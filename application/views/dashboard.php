<div class="content-header">
   <div class="container-fluid">
      <div class="row mb-2">
         <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dashboard
            </h1>
         </div>
         <!-- /.col -->
         <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
               <li class="breadcrumb-item"><a href="<?= base_url(); ?>/dashboard">Home</a></li>
               <li class="breadcrumb-item active">Dashboard</li>
            </ol>
         </div>
         <!-- /.col -->
      </div>
      <!-- /.row -->
   </div>
   <!-- /.container-fluid -->
</div>
<!-- Main content -->
<section class="content">
   <div class="container-fluid">
      <!-- Info boxes -->
      <div class="row">
         <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
               <span class="info-box-icon theme-bg-default elevation-1"><i class="fas fa-truck text-white"></i></span>
               <div class="info-box-content">
                  <span class="info-box-text">Total Vehicle's</span>
                  <span class="info-box-number"><?= ($dashboard['tot_vehicles']!='') ? $dashboard['tot_vehicles']:'0' ?>  </span>
               </div>
               <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
         </div>
         <!-- /.col -->
         <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
               <span class="info-box-icon bg-success elevation-1"><i class="fa fa-user-secret"></i></span>
               <div class="info-box-content">
                  <span class="info-box-text">Total Drivers</span>
                  <span class="info-box-number"><?= ($dashboard['tot_drivers']!='') ? $dashboard['tot_drivers']:'0' ?> </span>
               </div>
               <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
         </div>
         <!-- /.col -->
         <!-- fix for small devices only -->
         <div class="clearfix hidden-md-up"></div>
         <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
               <span class="info-box-icon bg-warning elevation-1"><i class="fa fa-user text-white"></i></span>
               <div class="info-box-content">
                  <span class="info-box-text">Total Customer</span>
                  <span class="info-box-number"><?= ($dashboard['tot_customers']!='') ? $dashboard['tot_customers']:'0' ?> </span>
               </div>
               <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
         </div>
         <!-- /.col -->
         <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
               <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-id-card"></i></span>
               <div class="info-box-content">
                  <span class="info-box-text">Today Trips</span>
                  <span class="info-box-number"><?= ($dashboard['tot_today_trips']!='') ? $dashboard['tot_today_trips']:'0' ?></span>
               </div>
               <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
         </div>
         <!-- /.col -->
      </div>
      <!-- /.row -->
      <!-- /.row -->
      <div class="row">
         <!-- Left col -->
         <div class="row col-md-12">
            <?php if(userpermission('lr_ie_list')) { ?>
            <div class="col-md-6">
               <!-- TABLE: LATEST ORDERS -->
               <div class="card">
                  <div class="card-header">
                     <h2 class="card-title">Income and Expenses</h2>
                  </div>
                  <div class="card-header border-transparent">
                     <div class="card-body">
                        <div class="d-flex">
                           <p class="d-flex flex-column">
                           </p>
                           <p class="ml-auto d-flex flex-column text-right">
                              <span class="text-success">
                              </span>
                           </p>
                        </div>
                        <!-- /.d-flex -->
                        <div class="position-relative mb-4">
                           <div class="chartjs-size-monitor">
                              <div class="chartjs-size-monitor-expand">
                                 <div class=""></div>
                              </div>
                              <div class="chartjs-size-monitor-shrink">
                                 <div class=""></div>
                              </div>
                           </div>
                           <canvas id="ie-chart" height="200" width="487" class="chartjs-render-monitor" style="display: block; width: 487px; height: 200px;"></canvas>
                        </div>
                        <div class="d-flex flex-row justify-content-end">
                           <span class="mr-2">
                           <i class="fas fa-square text-success"></i> Income
                           </span>
                           <span>
                           <i class="fas fa-square text-danger"></i> Expenses
                           </span>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <?php } if(userpermission('lr_reminder_list')) { ?>
            <div class="col-md-6">
               <div class="card">
                  <div class="card-header ui-sortable-handle" style="cursor: move;">
                     <h3 class="card-title">
                        <i class="ion ion-clipboard mr-1"></i>
                        Reminder
                     </h3>
                     <div class="card-tools">
                     </div>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body">
                     <ul class="todo-list ui-sortable" data-widget="todo-list">
                        <?php if(!empty($todayreminder)) { foreach($todayreminder as $reminder) { ?>
                        <li id="<?= $reminder['r_id'] ?>">
                           <span class="text">
                              <?= $reminder['r_message']. ' ';  ?>    
                              <div class="tools"> 
                                 <button type="button" data-id="<?= $reminder['r_id'] ?>" class="todayreminderread btn btn-block btn-outline-primary btn-xs">Mark as Read</button>                 
                              </div>
                           </span>
                        </li>
                        <?php }  } else { echo 'No reminders'; } ?>  
                     </ul>
                  </div>
                  <!-- /.card-body -->
                  <div class="card-footer clearfix">
                     <a href="<?= base_url() ?>reminder/addreminder"><button type="button" class="btn btn-info float-right"><i class="fas fa-plus"></i> Add Reminder</button></a>
                  </div>
               </div>
            </div>
         </div>
         <?php } if(userpermission('lr_liveloc')) { ?>
         <div class="col-sm-6 col-lg-6 ">
            <div class="card ">
               <div class="card-header">
                  <h2 class="card-title">Vechicle Current Location</h2>
               </div>
               <table  class="datatable table card-table table-vcenter">
                  <thead>
                     <tr>
                        <th>Name</th>
                        <th>Current Location</th>
                     </tr>
                  </thead>
                  <tbody>
                     <?php if(!empty($vechicle_currentlocation)){  
                        foreach($vechicle_currentlocation as $vech_details){
                        ?>
                     <tr>
                        <td> <?php echo output($vech_details['v_name']); ?></td>
                        <td>  <span class="badge badge-<?php echo ($vech_details['current_location']!='') ? 'success':'warning' ?>"><?php echo ($vech_details['current_location']!='') ?wordwrap($vech_details['current_location'], 60, "<br />\n") :'Location Not Updated' ?></span></td>
                     </tr>
                     <?php } } ?>
                  </tbody>
               </table>
            </div>
         </div>
         <?php } if(userpermission('lr_vech_list')) { ?>
         <div class="col-sm-6 col-lg-6 ">
            <div class="card">
               <div class="card-header">
                  <h2 class="card-title">Vechicle Running Status</h2>
               </div>
               <table class="datatable table card-table">
                  <thead>
                     <tr>
                        <th>Name</th>
                        <th>Status</th>
                     </tr>
                  </thead>
                  <tbody>
                     <?php if(!empty($vechicle_status)){ foreach ($vechicle_status as $key => $vechicle_status_arr) {
                        ?>
                     <tr>
                        <td><?php echo output($vechicle_status_arr['v_name']); ?></td>
                        <td>
                           <span class="badge badge-<?php echo ($vechicle_status_arr['t_trip_status']=='Completed') ? 'success':'danger' ?>"><?php echo ($vechicle_status_arr['t_trip_status']=='Completed') ? 'Idle':'In Trip' ?></span>
                        </td>
                     </tr>
                     <?php  }   }  ?>
               </table>
            </div>
         </div>
         <?php } if(userpermission('lr_geofence_list')) { ?>
         <div class="col-md-6">
            <div class="col-sm-12 col-lg-12 ">
               <div class="card">
                  <div class="card-header">
                     <h2 class="card-title">Vehicle Geofence Status</h2>
                  </div>
                  <table class="datatable table card-table table-vcenter">
                     <thead>
                        <tr>
                           <th>Vehicle</th>
                           <th>Event</th>
                           <th>Time</th>
                        </tr>
                     </thead>
                     <tbody>
                        <?php if(!empty($geofenceevents)){  
                           foreach($geofenceevents as $geofence){
                           ?>
                        <tr>
                           <td> <?php echo output($geofence['v_name']); ?></td>
                           <td>  <?php if($geofence['ge_event']=='inside') { echo 'Moving '.output($geofence['ge_event']).' '.$geofence['geo_name']; } else {  echo 'Exiting '.output($geofence['ge_event']) .' ' .$geofence['geo_name']; } ?></td>
                            <td> <?php echo output($geofence['ge_timestamp']); ?></td>
                        </tr>
                        <?php } } ?>
                     </tbody>
                  </table>
               </div>
            </div>
         </div>
         <?php } ?>
      </div>
      <!-- /.card -->
      <!-- /.col -->
      <!-- /.col -->
   </div>
   <!-- /.row -->
   </div><!--/. container-fluid -->
</section>
<!-- /.content -->
</div>
<script src="<?php echo base_url(); ?>assets/plugins/chart.js/Chart.min.js"></script>

<!-- /.content-wrapper -->
<?php if(userpermission('lr_ie_list')) { ?>
  <script>
  var ticksStyle = {
    fontColor: '#495057',
    fontStyle: 'bold'
  }
  var mode      = 'index';
    var intersect = true;
  var $visitorsChart = $('#ie-chart')
  var visitorsChart  = new Chart($visitorsChart, {
    data   : {
      labels  : <?= "['" . implode ( "', '", array_keys($iechart)) . "']" ?>,
      datasets: [{
        type                : 'line',
        data                : <?= "['" . implode ( "', '", array_column($iechart, 'income')). "']" ?>,
        backgroundColor     : 'transparent',
        borderColor         : '#28a745',
        pointBorderColor    : '#28a745',
        pointBackgroundColor: '#28a745',
        fill                : false
        // pointHoverBackgroundColor: '#007bff',
        // pointHoverBorderColor    : '#007bff'
      },
        {
          type                : 'line',
          data                : <?= "['" . implode ( "', '", array_column($iechart, 'expense')) . "']" ?>,
          backgroundColor     : 'tansparent',
          borderColor         : '#dc3545',
          pointBorderColor    : '#dc3545',
          pointBackgroundColor: '#dc3545',
          fill                : false
          // pointHoverBackgroundColor: '#ced4da',
          // pointHoverBorderColor    : '#ced4da'
        }]
    },
    options: {
      maintainAspectRatio: false,
      tooltips           : {
        mode     : mode,
        intersect: intersect
      },
      hover              : {
        mode     : mode,
        intersect: intersect
      },
      legend             : {
        display: false
      },
      scales             : {
        yAxes: [{
          // display: false,
          gridLines: {
            display      : true,
            lineWidth    : '4px',
            color        : 'rgba(0, 0, 0, .2)',
            zeroLineColor: 'transparent'
          },
          ticks    : $.extend({
            beginAtZero : true,
            suggestedMax: 200
          }, ticksStyle)
        }],
        xAxes: [{
          display  : true,
          gridLines: {
            display: false
          },
          ticks    : ticksStyle
        }]
      }
    }
  })

</script> <?php } ?>