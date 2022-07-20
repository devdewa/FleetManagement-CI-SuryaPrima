<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_model extends CI_Model{
	
	public function add_user($data) { 
		$userins = $data['basic'];
		$userins['u_password'] = md5($data['basic']['u_password']);
		$this->db->insert('login',$userins);
		$uid = $this->db->insert_id(); 
		$role = $data['permissions'];
		$role['lr_u_id'] = $uid;
		return  $this->db->insert('login_roles',$role);
	} 
    public function getall_user() { 
		return $this->db->select('*')->from('login')->order_by('u_id','desc')->get()->result_array();
	} 
	public function get_userdetails($u_id) { 
	   $this->db->select("*");
	   $this->db->from('login');
	   $this->db->join('login_roles', 'login.u_id=login_roles.lr_u_id');
	   $this->db->where('login.u_id',$u_id);
	   $query = $this->db->get();
	   return $query->result_array();
	} 
	public function update_user($data) { 
		$userup = $data['basic'];
		if(isset($data['basic']['u_password'])) {
			$userup['u_password'] = md5($data['basic']['u_password']);
		} 
		$this->db->where('u_id',$data['basic']['u_id']);
		$this->db->update('login',$userup);
		$role = $data['permissions'];

		$this->db->where('lr_u_id',$data['basic']['u_id']);
		return $this->db->update('login_roles',$role);
	}
} 