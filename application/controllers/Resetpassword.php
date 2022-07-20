<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Resetpassword extends CI_Controller {
    function __construct()
 	{
	    parent::__construct();
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('session');
		$this->load->database();
		$this->load->library(array('form_validation','template'));
	}
	public function index()   
	{
		$this->template->template_render('resetpassword'); 
	}
	public function resetpasswordsave()   
	{
		$data = [
            'u_password' => md5($this->input->post('password')),
        ];
        $this->db->where('u_id', $this->session->userdata['session_data']['u_id']);
        $resp = $this->db->update('login', $data);
        if($resp) {
        	$this->session->set_flashdata('successmessage', 'Password updated successfully!.');
        	redirect('dashboard');
        } else {
        	$this->session->set_flashdata('warningmessage', 'Error in resetting password.');
			redirect('resetpassword');
        }
	
	}
}
