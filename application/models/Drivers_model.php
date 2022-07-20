<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Drivers_model extends CI_Model{
	
	public function add_drivers($data) { 
		return	$this->db->insert('drivers',$data);
	} 
    public function getall_drivers() { 
		return $this->db->select('*')->from('drivers')->order_by('d_id','desc')->get()->result_array();
	} 
	public function get_driverdetails($d_id) { 
		return $this->db->select('*')->from('drivers')->where('d_id',$d_id)->get()->result_array();
	} 
	public function edit_driver() { 
		$this->db->where('d_id',$this->input->post('d_id'));
		return $this->db->update('drivers',$this->input->post());
	}
} 