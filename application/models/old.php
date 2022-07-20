<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_model extends CI_Model{
	
	public function users_getall() { 
		return	$this->db->select('*')->from('tc_users')->order_by('id','desc')->get()->result_array();
	} 
    public function users_details($uid) { 
        $details =  $this->db->select('*')->from('tc_users')->where('id',$uid)->get()->result_array();
        return $details[0]; 
	} 
	public function users_drivers($uid) { 
        $this->db->select('tc_user_driver.*,tc_drivers.*');
	    $this->db->from('tc_user_driver');
	    $this->db->join('tc_drivers', 'tc_user_driver.driverid = tc_drivers.id'); 
	    $this->db->where('tc_user_driver.userid',$uid);
	    $query = $this->db->get();
	    return $query->result();
	} 
	public function users_device($uid) { 
        $this->db->select('tc_user_device.*,tc_devices.*');
	    $this->db->from('tc_user_device');
	    $this->db->join('tc_devices', 'tc_user_device.deviceid = tc_devices.id'); 
	    $this->db->where('tc_user_device.userid',$uid);
	    $query = $this->db->get();
	    return $query->result();
	} 
	public function users_notification($uid) { 
        $this->db->select('tc_user_notification.*,tc_notifications.*');
	    $this->db->from('tc_user_notification');
	    $this->db->join('tc_notifications', 'tc_notifications.id = tc_user_notification.notificationid'); 
	    $this->db->where('tc_user_notification.userid',$uid);
	    $query = $this->db->get();
	    return $query->result();
	} 
	public function inactive_count() { 
		$this->db->where('disabled', 1);
        return $this->db->count_all_results('tc_users');
	}
	public function statistics() { 
		$this->db->select('*');
	    $this->db->from('tc_statistics');
	    $this->db->order_by('id','DESC'); 
	    $this->db->limit(1); 
	    $query = $this->db->get();
	    $statistics = $query->result();
	    return $statistics[0];
	}



} 