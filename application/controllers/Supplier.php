<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Supplier extends CI_Controller {

	 function __construct()
     {
          parent::__construct();
          $this->load->database();
          $this->load->model('supplier_model');
		  $this->load->model('incomexpense_model');
          $this->load->helper(array('form', 'url','string'));
          $this->load->library('form_validation');
          $this->load->library('session');
     }

	public function index()
	{
		$data['supplierlist'] = $this->supplier_model->getall_supplier();
		$this->template->template_render('supplier_management',$data);
	}
	public function addsupplier()
	{
		$this->template->template_render('supplier_add');
	}
	public function insertsupplier()
	{
		$testxss = xssclean($_POST);
		if($testxss){
			$exist = $this->db->select('*')->from('suppliers')->where('s_email',$this->input->post('s_email'))->get()->result_array();
			if(count($exist)==0) {
				$response = $this->supplier_model->add_supplier($this->input->post());
				if($response) {
					$this->session->set_flashdata('successmessage', 'New supplier added successfully..');
				} else {
					$this->session->set_flashdata('warningmessage', 'Something went wrong.');
				}
			} else {
				$this->session->set_flashdata('warningmessage', 'Account already exist with same email.');
			}
			redirect('supplier');
		} else {
			$this->session->set_flashdata('warningmessage', 'Error! Your input are not allowed.Please try again');
			redirect('supplier');
		}
	}
	public function editsupplier()
	{
		$s_id = $this->uri->segment(3);
		$data['supplierdetails'] = $this->supplier_model->get_supplierdetails($s_id);
		$this->template->template_render('supplier_add',$data);
	}

	public function updatesupplier()
	{
		$testxss = xssclean($_POST);
		if($testxss){
			$response = $this->supplier_model->update_supplier($this->input->post());
				if($response) {
					$this->session->set_flashdata('successmessage', 'supplier updated successfully..');
				    redirect('supplier');
				} else
				{
					$this->session->set_flashdata('warningmessage', 'Something went wrong..Try again');
				    redirect('supplier');
				}
		} else {
			$this->session->set_flashdata('warningmessage', 'Error! Your input are not allowed.Please try again');
			redirect('supplier');
		}
	}
}
