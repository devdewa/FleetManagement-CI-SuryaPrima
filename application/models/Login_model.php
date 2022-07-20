<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Login_model extends CI_Model{
	public function check_login($data) { 
		$this->db->where('u_username', $this->input->post('username'));
        $this->db->where('u_password', md5($this->input->post('password')));
        $query = $this->db->get("login");
		if ($query->num_rows() >= 1) {
			return $query->row_array();
			} else {
			return false;
			}
	} 
    public function userroles($u_id) { 
     $userroles = $this->db->select('*')->from('login_roles')->where('lr_u_id',$u_id)->get()->result_array();
       if(!empty($userroles)) {
       		return $userroles[0];
       } else{
       		return array();
       }
    }
} 