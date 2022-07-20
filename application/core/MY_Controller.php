<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Controller extends CI_Controller {
 //To initialize variables, functions and libraries
 function __construct()
 {
    parent::__construct();
	$this->load->helper('url');
	$this->load->helper('form');
	$this->load->library('session');
	$this->load->database();
	$this->load->library(array('form_validation','template'));
	if (!isset($this->session->userdata['session_data']))
	{
       redirect('admin'); //if session is not there, redirect to login page
	} 
 }
}

?>