<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Fuel extends CI_Controller {

	 function __construct()
     {
          parent::__construct();
          $this->load->database();
          $this->load->model('fuel_model');
          $this->load->helper(array('form', 'url','string'));
          $this->load->library('form_validation');
          $this->load->library('session');

     }

	public function index()
	{
		$data['fuel'] = $this->fuel_model->getall_fuel();
		$this->template->template_render('fuel',$data);
	}
	public function addfuel()
	{
		$this->load->model('trips_model');
		$data['driverlist'] = $this->trips_model->getall_driverlist();
		$data['vechiclelist'] = $this->trips_model->getall_vechicle();
		$this->template->template_render('fuel_add',$data);
	}
	public function insertfuel()
	{
		$testxss = xssclean($_POST);
		if($testxss){
			$response = $this->fuel_model->add_fuel($this->input->post());
			if($response) {
				$is_include = $this->input->post('exp');
				if(isset($is_include)) {
					$addincome = array('ie_v_id'=>$this->input->post('v_id'),'ie_date'=>date('Y-m-d'),'ie_type'=>'expense','ie_description'=>'Added fuel - '.$this->input->post('v_fuelcomments'),'ie_amount'=>$this->input->post('v_fuelprice'),'ie_created_date'=>date('Y-m-d'));
					$this->db->insert('incomeexpense',$addincome);
				}
				$this->session->set_flashdata('successmessage', 'Fuel details added successfully..');
			} else {
				$this->session->set_flashdata('warningmessage', 'Something went wrong..Try again');
			}
			redirect('fuel');
		} else {
			$this->session->set_flashdata('warningmessage', 'Error! Your input are not allowed.Please try again');
			redirect('fuel');
		}
	}
	public function editfuel()
	{
		$f_id = $this->uri->segment(3);
		$this->load->model('trips_model');
		$data['vechiclelist'] = $this->trips_model->getall_vechicle();
		$data['driverlist'] = $this->trips_model->getall_driverlist();
		$data['fueldetails'] = $this->fuel_model->editfuel($f_id);
		$this->template->template_render('fuel_add',$data);
	}

	public function updatefuel()
	{
		$testxss = xssclean($_POST);
		if($testxss){
			$response = $this->fuel_model->updatefuel($this->input->post());
			if($response) {
				$this->session->set_flashdata('successmessage', 'Fuel details updated successfully..');
			    redirect('fuel');
			} else
			{
				$this->session->set_flashdata('warningmessage', 'Something went wrong..Try again');
			    redirect('fuel');
			}
		} else {
			$this->session->set_flashdata('warningmessage', 'Error! Your input are not allowed.Please try again');
			redirect('fuel');
		}
	}
}
