<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reminder extends CI_Controller {

	 function __construct()
     {
          parent::__construct();
          $this->load->database();
          $this->load->model('reminder_model');
          $this->load->model('trips_model');
          $this->load->helper(array('form', 'url','string'));
          $this->load->library('form_validation');
          $this->load->library('session');
     }

	public function index()
	{
		$data['reminderlist'] = $this->reminder_model->getall_reminder();
		$this->template->template_render('reminder_management',$data);
	}
	public function addreminder()
	{
		$data['vechiclelist'] = $this->trips_model->getall_vechicle();
		$this->template->template_render('reminder_add',$data);
	}
	public function insertreminder()
	{
		$testxss = xssclean($_POST);
		if($testxss){
			$response = $this->reminder_model->add_reminder($this->input->post());
			if($response) {
				$this->session->set_flashdata('successmessage', 'New reminder added successfully..');
			} else {
				$this->session->set_flashdata('warningmessage', validation_errors());
			}
			redirect('reminder');
		} else {
			$this->session->set_flashdata('warningmessage', 'Error! Your input are not allowed.Please try again');
			redirect('reminder');
		}
	}
	public function deletereminder()
	{
		$r_id = $this->uri->segment(3);
		$returndata = $this->reminder_model->deletereminder($r_id);
		if($returndata) {
			$this->session->set_flashdata('successmessage', 'Reminder deleted successfully..');
			redirect('reminder');
		} else {
			$this->session->set_flashdata('warningmessage', 'Error..! Try again..');
		    redirect('reminder');
		}
	}
}
