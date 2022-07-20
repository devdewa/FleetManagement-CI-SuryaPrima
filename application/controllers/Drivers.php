<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Drivers extends CI_Controller {

	 function __construct()
     {
          parent::__construct();
          $this->load->database();
          $this->load->model('drivers_model');
          $this->load->helper(array('form', 'url','string'));
          $this->load->library('form_validation');
          $this->load->library('session');

     }

	public function index()
	{
		$data['driverslist'] = $this->drivers_model->getall_drivers();
		$this->template->template_render('drivers_management',$data);
	}
	public function adddrivers()
	{
		$this->template->template_render('drivers_add');
	}
	public function insertdriver()
	{
		$this->form_validation->set_rules('d_licenseno','License Number','required|trim|is_unique[vehicles.v_registration_no]');
		$this->form_validation->set_message('is_unique', '%s is already exist');
		$this->form_validation->set_rules('d_name','Name','required|trim');
		$this->form_validation->set_rules('d_mobile','Mobile','required|trim');
        $this->form_validation->set_rules('d_address', 'Address', 'required|trim');
		$this->form_validation->set_rules('d_age','Age','required|trim');
		$this->form_validation->set_rules('d_licenseno','License Number','required|trim');
		$this->form_validation->set_rules('d_license_expdate','License Exp Date','required|trim');
		$this->form_validation->set_rules('d_total_exp','Total Experiance','required|trim');
		$this->form_validation->set_rules('d_doj','Date of Joining','required|trim');
		$testxss = xssclean($_POST);
		if($this->form_validation->run()==TRUE && $testxss){
			$response = $this->drivers_model->add_drivers($this->input->post());
			if($response) {
				$this->session->set_flashdata('successmessage', 'New driver added successfully..');
			    redirect('drivers');
			}

		} else
		{
			$errormsg = validation_errors();
			if(!$testxs) {
				$errormsg = 'Error! Your input are not allowed.Please try again';
			}
			$this->session->set_flashdata('warningmessage',$errormsg);
			redirect('drivers/adddrivers');
		}
	}
	public function editdriver()
	{
		$d_id = $this->uri->segment(3);
		$data['driverdetails'] = $this->drivers_model->get_driverdetails($d_id);
		$this->template->template_render('drivers_add',$data);
	}

	public function updatedriver()
	{
		$testxss = xssclean($_POST);
		if($testxss){
			$response = $this->drivers_model->edit_driver($this->input->post());
				if($response) {
					$this->session->set_flashdata('successmessage', 'Driver updated successfully..');
				    redirect('drivers');
				} else
				{
					$this->session->set_flashdata('warningmessage', 'Something went wrong..Try again');
				    redirect('drivers');
				}
		} else {
			$this->session->set_flashdata('warningmessage', 'Error! Your input are not allowed.Please try again');
			redirect('drivers');
		}
	}
}
