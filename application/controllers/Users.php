<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

	 function __construct()
     {
          parent::__construct();
          $this->load->database();
          $this->load->model('user_model');
          $this->load->helper(array('form', 'url','string'));
          $this->load->library('form_validation');
          $this->load->library('session');
     }

	public function index()
	{
		$data['userlist'] = $this->user_model->getall_user();
		$this->template->template_render('user_management',$data);
	}
	public function adduser()
	{
		$this->template->template_render('user_add');
	}
	public function insertuser() 
	{
		if(isset($_POST)){
			$response = $this->user_model->add_user($this->input->post());
			if($response) {
				$this->session->set_flashdata('successmessage', 'New user added successfully..');
			} else {
				$this->session->set_flashdata('warningmessage', 'Error in creating new user..');
			}
			redirect('users');
		} else {
			$this->session->set_flashdata('warningmessage', 'Error! Your input are not allowed.Please try again');
			redirect('users');
		}
	}
	public function edituser()
	{
		$u_id = $this->uri->segment(3);
		$data['userdetails'] = $this->user_model->get_userdetails($u_id);
		$this->template->template_render('user_add',$data);
	}

	public function updateuser()
	{
		if(isset($_POST)){
			$response = $this->user_model->update_user($this->input->post());
				if($response) {
					$this->session->set_flashdata('successmessage', 'user updated successfully..');
				    redirect('users');
				} else
				{
					$this->session->set_flashdata('warningmessage', 'Something went wrong..Try again');
				    redirect('users');
				}
		} else {
			$this->session->set_flashdata('warningmessage', 'Error! Your input are not allowed.Please try again');
			redirect('users');
		}
	}
}
