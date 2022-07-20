<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Customer_model extends CI_Model{
	
	public function add_customer($data) {
		$customerins = $data;
		if(isset($data['c_pwd'])) {
			$customerins['c_pwd'] = md5($data['c_pwd']); 
		}
		return	$this->db->insert('customers',$customerins);
	} 
    public function getall_customer() { 
		return $this->db->select('*')->from('customers')->order_by('c_id','desc')->get()->result_array();
	} 
	public function get_customerdetails($c_id) { 
		return $this->db->select('*')->from('customers')->where('c_id',$c_id)->get()->result_array();
	} 
	public function update_customer() { 
		$this->db->where('c_id',$this->input->post('c_id'));
		return $this->db->update('customers',$this->input->post());
	}
} 