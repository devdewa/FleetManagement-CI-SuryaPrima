<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Triptracking extends CI_Controller {

	 function __construct()
     {
          parent::__construct();
          $this->load->database();
          $this->load->helper(array('form', 'url','string'));
          $this->load->library('form_validation');
          $this->load->library('session');
     }

	public function index()
	{
		$trackcode = $this->uri->segment(2);
		$this->load->model('trips_model');
		$tripdetails = $this->trips_model->getall_trips($trackcode);
		$data['tripdetails'] = (isset($tripdetails[0])?$tripdetails[0]:array());
		$this->load->view('triptracking',$data);
	}
	 
}
