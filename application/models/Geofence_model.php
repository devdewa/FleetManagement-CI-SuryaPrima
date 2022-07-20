<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Geofence_model extends CI_Model{
	
	public function add_geofence($data) { 
		$insertdata = array('geo_name'=>$data['geo_name'],'geo_description'=>$data['geo_description'],'geo_area'=>$data['geo_area'],'geo_vehicles'=>implode(',', $data['geo_vehicles']));

		return	$this->db->insert('geofences',$insertdata);
	} 
	public function getall_geofence() { 
		return $this->db->select('*')->from('geofences')->order_by('geo_id','DESC')->get()->result_array();
	} 
	public function get_geofence($gid) { 
		return $this->db->select('*')->from('geofences')->where('geo_id',$gid)->get()->result_array();
	} 
	public function oldgetvechicle_geofence($v_id) { 
		  $this->db->select("*");
		  $this->db->from('vehicle_geofence');
		  $this->db->join('geofences', 'geofences.geo_id=vehicle_geofence.vg_geo_id');
		  $this->db->where('vehicle_geofence.vg_v_id',$v_id);
		  $query = $this->db->get();
		  return $query->result_array();
	}
	public function getvechicle_geofence($v_id) { 
		  $this->db->select("*");
		  $this->db->from('geofences');
		  $this->db->where("FIND_IN_SET(".$v_id.",geo_vehicles) <> 0");
		  $query = $this->db->get();
		  return $query->result_array();
	}
	public function get_geofenceevents($limit=NULL)
	{
	      $this->db->select("geofence_events.*,vehicles.v_name");
		  $this->db->from('vehicles');
		  $this->db->join('geofence_events', 'geofence_events.ge_v_id=vehicles.v_id');
		  if($limit) {
		  	$this->db->limit($limit);
		  }
		  $this->db->order_by('ge_id','DESC');
		  $query = $this->db->get();
		  return $query->result_array();
	}	
	public function countvehiclengeofence_events($vid)
	{
		return $this->db->select('ge_v_id')->from('geofence_events')->where('ge_v_id',$vid)->get()->result_array();
	}
} 