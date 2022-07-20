<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Frontendbooking extends CI_Controller {

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
		$this->load->model('trips_model');
		$data['vechiclelist'] = $this->trips_model->getall_vechicle();
		$this->load->view('frontend_booking',$data);
	}
	public function mybookings()
	{
		$this->load->model('trips_model');
		$data['mybookings'] = $this->trips_model->getall_mybookings($this->session->userdata['session_data_fr']['c_id']);
		$this->load->view('frontend_booking_history',$data);
	}
	public function signup()
	{
		$this->form_validation->set_rules('c_name', 'Name', 'required');
		$this->form_validation->set_rules('c_mobile', 'Mobile', 'required|min_length[9]|max_length[12]');
		$this->form_validation->set_rules('c_email', 'Email', 'required|valid_email');
		$this->form_validation->set_rules('c_pwd', 'Password', 'required');
		$this->form_validation->set_rules('c_address', 'Address', 'required');
		if($this->form_validation->run() == FALSE) 
		{
		  $this->session->set_flashdata('warningmessage', validation_errors());
		  redirect('/');
		}
		else 
		{ 
			$testxss = xssclean($_POST);
			if($testxss){
				$exist = $this->db->select('*')->from('customers')->where('c_email',$this->input->post('c_email'))->get()->result_array();
				if(count($exist)==0) {
					$response = $this->customer_model->add_customer($this->input->post());
					if($response) {
						$this->session->set_flashdata('successmessage', 'Account created successfully..');
					} else {
						$this->session->set_flashdata('warningmessage', 'Something went wrong.Please try again..');
					}
				} else {
					$this->session->set_flashdata('warningmessage', 'Account already exist with same email. Please login..');
				}
				redirect('/');
			} else {
				$this->session->set_flashdata('warningmessage', 'Error! Your input are not allowed.Please try again');
				redirect('/');
			}
		}
	}
	public function login() 
	{
		$this->db->where('c_email', $this->input->post('username'));
        $this->db->where('c_pwd', md5($this->input->post('password')));
        $query = $this->db->get("customers");
		if ($query->num_rows() >= 1) {
		 	$result = $query->row_array();
			$session_data = array('c_id' => $result['c_id'],
								  'c_name' => $result['c_name'],
								  'c_email' => $result['c_email']); 
			if($result['c_isactive']==0) {
				$this->session->set_flashdata('warningmessage', 'User not active.Please contact admin');
				redirect('/');
			} else {
				$this->session->set_flashdata('successmessage', 'You got logged in successfully..');
				$this->session->set_userdata('session_data_fr', $session_data);
				redirect('/');
			}
		} else {
			$this->session->set_flashdata('warningmessage', 'Invalid email or Password !');
			redirect('/');
		}
	}
	public function logout() {
		$sess_array = array('c_id' => '');
		$this->session->unset_userdata('session_data_fr', $sess_array);
		$this->session->set_flashdata('successmessage', 'Successfully Logged out !');
		redirect('/');
	}
	public function book() {
		$this->load->model('trips_model');
		if($this->input->post('t_created_by')!='') {
			$this->form_validation->set_rules('t_trip_fromlocation', 'From Location', 'required');
			$this->form_validation->set_rules('t_trip_tolocation', 'To Location', 'required');
			$this->form_validation->set_rules('t_start_date', 'Date', 'required');
			if($this->form_validation->run() == FALSE) {
			  $this->session->set_flashdata('warningmessage', validation_errors());
			  redirect('/');
			} else {
				$response = $this->trips_model->add_trips($this->input->post());
				$bookingemail = $this->input->post('bookingemail');
				if(isset($bookingemail)) {
					$this->sendtripemail($this->input->post());
				}
				if($response) {
					$this->session->set_flashdata('successmessage', 'Booking completed successfully.We will contact you shortly..');
				} else {
					$this->session->set_flashdata('warningmessage', 'Unexpected error..Try again');
				}
				redirect('/');
			}
		} else {
			$this->session->set_flashdata('warningmessage', 'Please login before trying to book..');
			redirect('/');
		}
	}
	public function sendtripemail($data) {
		$this->load->model('email_model');	
		$gettemplate = $this->db->select('*')->from('email_template')->where('et_name','booking')->get()->result_array();
		if(!empty($gettemplate)) {
		    $emailcontent = $gettemplate[0]['et_body'];
			$value = '<b>Trip Details :</b><br><br> '.$data['t_trip_fromlocation']. ' <br><b>to</b><br> ' . $data['t_trip_tolocation']. ' <br>on<br> ' .$data['t_start_date'];
			$body = str_replace('{{bookingdetails}}', $value, $emailcontent);
			$email = $this->email_model->sendemail($data['bookingemail'],$gettemplate[0]['et_subject'],$body);
		}
	}
	
}
