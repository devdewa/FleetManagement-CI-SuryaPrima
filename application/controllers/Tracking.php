<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tracking extends CI_Controller {

	 function __construct()
     {
          parent::__construct();
          $this->load->database();
          $this->load->helper('url');
          $this->load->library('session');
     }

	public function index()
	{
		$this->load->model('trips_model');
		$data['vechiclelist'] = $this->trips_model->getall_vechicle();
		$this->template->template_render('tracking',$data);
	}
	public function livestatus()
	{
		$data = $this->db->select('s_googel_api_key')->from('settings')->get()->result_array();
		if(isset($data[0]['s_googel_api_key']) && $data[0]['s_googel_api_key']!='') {
		    $this->template->template_render('livelocation');
		} else {
			$this->session->set_flashdata('warningmessage', 'Please add google map key in settings page');
		    $this->template->template_render('livelocation');
		}
	}

}
