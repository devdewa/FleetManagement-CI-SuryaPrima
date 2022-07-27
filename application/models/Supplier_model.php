<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Supplier_model extends CI_Model{
	
	public function add_supplier($data) {
		$supplierins = $data;
		if(isset($data['s_pwd'])) {
			$supplierins['s_pwd'] = md5($data['s_pwd']); 
		}
		return	$this->db->insert('suppliers',$supplierins);
	} 
    public function getall_supplier() { 
		return $this->db->select('*')->from('suppliers')->order_by('s_id','desc')->get()->result_array();
	} 
	public function get_supplierdetails($s_id) { 
		return $this->db->select('*')->from('suppliers')->where('s_id',$s_id)->get()->result_array();
	} 
	public function update_supplier() { 
		$this->db->where('s_id',$this->input->post('s_id'));
		return $this->db->update('suppliers',$this->input->post());
	}
} 