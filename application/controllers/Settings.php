<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Settings extends CI_Controller {
   
   function __construct( )
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->load->library('session');
		$this->load->database();
	}


	public function websitesetting()   
	{
		$data['website_setting'] = $this->db->select('*')->from('settings')->get()->result_array();
		$this->template->template_render('websitesetting',$data);
	}
	public function websitesetting_save()   
	{

		$insertarray = $this->input->post();
		$testxss = xssclean($this->input->post());
		if($testxss){
			 $success=true;
			if(!empty($_FILES['file']['name'])) { 
			    $data = array(); 
				    $image = time().'-'.$_FILES['file']['name']; 
					$config = array(
							'upload_path' => 'assets/uploads', 
							'allowed_types' =>'jpg|jpeg|png',
							'overwrite' => TRUE,
							'max_size' => "1024",   
							'max_height' => "250",
							'max_width' => "50",
							'file_name' => $image
						);
				    	$this->load->library('upload',$config); 
				   		if($this->upload->do_upload('file')){ 
						     $uploadData = $this->upload->data(); 
						     $insertarray['s_logo'] = $uploadData['file_name'];
					    } else { 
					    	 $success=false;
					    	 $msg = $this->upload->display_errors();
					    } 
			}

			if($success) {
			     $ws = $this->db->select('*')->from('settings')->get()->num_rows();
			     if($ws=='' || $ws==0) {
			     	$this->db->insert('settings',$insertarray); 
			     } else {
			     	$this->db->update('settings',$insertarray);
			     }
			     $success=true;
			     $msg = 'successfully uploaded '; 
				$this->session->set_flashdata('successmessage', 'Setting saved successfully!.');
				redirect('settings/websitesetting');
			} else {
				$this->session->set_flashdata('warningmessage', $msg);
				redirect('settings/websitesetting');
			}
			
		} else {
			$this->session->set_flashdata('warningmessage', 'Error! Your input are not allowed.Please try again');
			redirect('settings/websitesetting');
		}
	}
	public function logodelete()   
	{
		$updatearray = array('s_logo'=>'');
		$this->db->update('settings', $updatearray);
		echo true;
	}
	public function smtpconfig()   
	{
		$data['smtpconfig'] = $this->db->select('*')->from('settings_smtp')->get()->result_array();
		$this->template->template_render('smtpconfig',$data);
	}
	public function smtpconfigsave()   
	{
		$settings_smtp = $this->db->select('*')->from('settings_smtp')->get()->num_rows();
        if($settings_smtp =='' || $settings_smtp ==0) {
     		$response = $this->db->insert('settings_smtp',$this->input->post()); 
        } else {
     	  	$response = $this->db->update('settings_smtp',$this->input->post());
        }
        if($response) {
				$this->session->set_flashdata('successmessage', 'SMTP config saved successfully..');
		} else {
			$this->session->set_flashdata('warningmessage', 'Something went wrong..Try again');
		}
		redirect('settings/smtpconfig');
	}
	public function smtpconfigtestemail()   
	{
		$this->load->model('email_model');
		$email = $this->input->post('testemailto');
		$response = $this->email_model->sendemail($email,'SMTP Config Test','Test Email');
		if($response=='true') {
			$this->session->set_flashdata('successmessage', 'Email sent successfully..');
		} else {
			$this->session->set_flashdata('warningmessage', $response);
		}
		redirect('settings/smtpconfig');
	}
	public function email_template()   
	{
		$data['emailtemplate'] = $this->db->select('*')->from('email_template')->get()->result_array();
		$this->template->template_render('email_template',$data);
	}
	public function edit_email_template()   
	{
		$et_id = $this->uri->segment(3);
		$data['emailtemplate'] = $this->db->select('*')->from('email_template')->where('et_id',$et_id)->get()->result_array();
		$this->template->template_render('email_template_edit',$data);
	}
	public function update_template() { 
		$this->db->where('et_id',$this->input->post('et_id'));
		$response = $this->db->update('email_template',$this->input->post());
		if($response) {
			$this->session->set_flashdata('successmessage', 'Template updated successfully..');
		} else {
			$this->session->set_flashdata('warningmessage', 'Something went wrong..Try again');
		}
		redirect('settings/email_template');
	}
}
 