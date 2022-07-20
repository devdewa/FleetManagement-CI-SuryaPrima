<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	 function __construct()
     {
          parent::__construct();
          $this->load->database();
          $this->load->helper('url');
          $this->load->library('session');
          $this->load->model('dashboard_model');
          $this->load->model('geofence_model');
     }

	public function index()
	{
          $data['iechart']= $this->dashboard_model->get_iechartdata();
          $data['todayreminder']= $this->dashboard_model->get_todayreminder();
          $data['dashboard'] = $this->dashboard_model->getdashboard_info();
          $data['vechicle_currentlocation'] = $this->dashboard_model->get_vechicle_currentlocation();
          $data['vechicle_status'] = $this->dashboard_model->getvechicle_status();
          $returndata = array();
          $geofenceevents = $this->geofence_model->get_geofenceevents(20);
          if(!empty($geofenceevents)) {
              foreach($geofenceevents as $key=> $geeodata)
              {
                  $geo_name = $this->db->select('geo_name')->from('geofences')->where('geo_id',$geeodata['ge_geo_id'])->get()->result_array();
                  if(isset($geo_name[0]['geo_name'])) {
                      $returndata[] = $geeodata;
                    $returndata[$key]['geo_name'] = $geo_name[0]['geo_name'];
               }
              }
          }
          $data['geofenceevents']=$returndata;
 
		$this->template->template_render('dashboard',$data);
	}
  public function iechart()
  {
      $data= $this->dashboard_model->get_iechartdata();
      $res = "['" . implode ( "', '", array_keys($data)) . "']";
      $income = "['" . implode ( "', '", array_column($data, 'income')) . "']";
      $expense = "['" . implode ( "', '", array_column($data, 'expense')) . "']";
      echo json_encode(array('res'=>$res,'income'=>$income,'expense'=>$expense));
  }
  public function remindermark()
  {
      $data = array('r_isread' => 1);
      $this->db->where('r_id',$this->input->post('r_id'));
      echo $this->db->update('reminder',$data);
  }
     
}
