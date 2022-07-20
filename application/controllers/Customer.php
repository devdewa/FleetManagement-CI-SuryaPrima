<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customer extends CI_Controller {

	 function __construct()
     {
          parent::__construct();
          $this->load->database();
          $this->load->model('customer_model');
          $this->load->helper(array('form', 'url','string'));
          $this->load->library('form_validation');
          $this->load->library('session');
     }

	public function index()
	{
		$data['customerlist'] = $this->customer_model->getall_customer();
		$this->template->template_render('customer_management',$data);
	}
	public function addcustomer()
	{
		$this->template->template_render('customer_add');
	}
	public function insertcustomer()
	{
		$testxss = xssclean($_POST);
		if($testxss){
			$exist = $this->db->select('*')->from('customers')->where('c_email',$this->input->post('c_email'))->get()->result_array();
			if(count($exist)==0) {
				$response = $this->customer_model->add_customer($this->input->post());
				if($response) {
					$this->session->set_flashdata('successmessage', 'New customer added successfully..');
				} else {
					$this->session->set_flashdata('warningmessage', 'Something went wrong.');
				}
			} else {
				$this->session->set_flashdata('warningmessage', 'Account already exist with same email.');
			}
			redirect('customer');
		} else {
			$this->session->set_flashdata('warningmessage', 'Error! Your input are not allowed.Please try again');
			redirect('customer');
		}
	}
	public function editcustomer()
	{
		$c_id = $this->uri->segment(3);
		$data['customerdetails'] = $this->customer_model->get_customerdetails($c_id);
		$this->template->template_render('customer_add',$data);
	}

	public function updatecustomer()
	{
		$testxss = xssclean($_POST);
		if($testxss){
			$response = $this->customer_model->update_customer($this->input->post());
				if($response) {
					$this->session->set_flashdata('successmessage', 'Customer updated successfully..');
				    redirect('customer');
				} else
				{
					$this->session->set_flashdata('warningmessage', 'Something went wrong..Try again');
				    redirect('customer');
				}
		} else {
			$this->session->set_flashdata('warningmessage', 'Error! Your input are not allowed.Please try again');
			redirect('customer');
		}
	}
}
