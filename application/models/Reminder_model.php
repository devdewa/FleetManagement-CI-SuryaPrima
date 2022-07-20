<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class reminder_model extends CI_Model{
	
	public function add_reminder($data) { 
		return	$this->db->insert('reminder',$data);
	} 
    public function getall_reminder() { 
      $this->db->select("reminder.*,vehicles.v_name");
	  $this->db->from('reminder');
	  $this->db->join('vehicles', 'reminder.r_v_id=vehicles.v_id','LEFT');
	  $this->db->order_by('r_v_id','desc');
	  $query = $this->db->get();
	  return $query->result_array();
	} 
	public function deletereminder($r_id) { 
		$this->db->where('r_id', $r_id);
    	$this->db->delete('reminder');
    	return true;
    }
	
} 