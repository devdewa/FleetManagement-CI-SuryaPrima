<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
class Dashboard_model extends CI_Model
{
    public function getdashboard_info()
    {
        $data['tot_vehicles']      = $this->db->select('v_id')->from('vehicles')->get()->num_rows();
        $data['tot_drivers']       = $this->db->select('d_id')->from('drivers')->get()->num_rows();
        $data['tot_customers']     = $this->db->select('c_id')->from('customers')->get()->num_rows();
        $data['tot_today_trips']   = $this->db->select('t_id')->from('trips')->where('t_start_date', date('Y-m-d'))->get()->num_rows();
        $data['tot_today_income']  = $this->db->select_sum('ie_amount')->from('incomeexpense')->where('ie_date', date('Y-m-d'))->where('ie_type', 'income')->get()->row()->ie_amount;
        $data['tot_today_expense'] = $this->db->select_sum('ie_amount')->from('incomeexpense')->where('ie_date', date('Y-m-d'))->where('ie_type', 'expense')->get()->row()->ie_amount;
        return $data;
    }
    public function get_driverdetails($d_id)
    {
        return $this->db->select('*')->from('drivers')->where('d_id', $d_id)->get()->result_array();
    }
     public function get_todayreminder()
    {
        return $this->db->select('*')->from('reminder')->where(array('r_date'=>date('Y-m-d'),'r_isread'=>0))->get()->result_array();
    }
    public function get_iechartdata()
    {
        $date = $this->createDateRangeArray(date('Y-m-d', strtotime('-5 day')), date('Y-m-d'));
        $arr  = array();
        foreach ($date as $key => $dates) {
            $income = $this->db->select_sum('ie_amount')->from('incomeexpense')->where('ie_date', $dates)->where('ie_type', 'income')->get()->row()->ie_amount;
            $arr[$dates]['income']  = ($income) ? $income : 0;
            $expense = $this->db->select_sum('ie_amount')->from('incomeexpense')->where('ie_date', $dates)->where('ie_type', 'expense')->get()->row()->ie_amount;
            $arr[$dates]['expense'] = ($expense) ? $expense : 0;
        }
        return $arr;
    }
    public function get_vechicle_currentlocation()
    {
        $vehicles = $this->db->select('v_id,v_registration_no,v_name')->from('vehicles')->get()->result_array();
        if (!empty($vehicles)) {
            foreach ($vehicles as $key => $vehicle) {
                $lastlocation[$key] = $vehicle;
                $getlocation        = $this->db->select('latitude,longitude')->from('positions')->where('v_id', $vehicle['v_id'])->order_by('id', 'desc')->get()->row();
                if (!empty($getlocation)) {
                    $lastlocation[$key]['current_location'] = $this->getaddress($getlocation->latitude, $getlocation->longitude);
                } else {
                    $lastlocation[$key]['current_location'] = '';
                }
            }
            return $lastlocation;
        }
    }
    public function getvechicle_status()
    {
        $SQLquery = 'SELECT `t_vechicle`,`t_trip_status`,b.v_name,b.v_registration_no FROM  trips a INNER join vehicles b on a.`t_vechicle`=b.v_id WHERE `t_id` IN (SELECT MAX(`t_id`) AS `t_id` FROM trips GROUP BY `t_vechicle`) ORDER BY t_trip_status';
        $query    = $this->db->query($SQLquery);
        $vechdata = $query->result_array();
        if (!empty($vechdata)) {
            return $vechdata;
        } else {
            return '';
        }
    }
    function createDateRangeArray($strDateFrom, $strDateTo)
    {
        $aryRange  = array();
        $iDateFrom = mktime(1, 0, 0, substr($strDateFrom, 5, 2), substr($strDateFrom, 8, 2), substr($strDateFrom, 0, 4));
        $iDateTo   = mktime(1, 0, 0, substr($strDateTo, 5, 2), substr($strDateTo, 8, 2), substr($strDateTo, 0, 4));
        if ($iDateTo >= $iDateFrom) {
            array_push($aryRange, date('Y-m-d', $iDateFrom)); // first entry
            while ($iDateFrom < $iDateTo) {
                $iDateFrom += 86400; // add 24 hours
                array_push($aryRange, date('Y-m-d', $iDateFrom));
            }
        }
        return $aryRange;
    }
    public function getaddress($lat, $lng)
    {
        $google_api_key = $this->config->item('google_api_key');
        $url = 'https://maps.googleapis.com/maps/api/geocode/json?key=' . $google_api_key . '&latlng=' . trim($lat) . ',' . trim($lng) . '&sensor=false';
        $handle         = curl_init();
        curl_setopt($handle, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($handle, CURLOPT_VERBOSE, 0);
        curl_setopt($handle, CURLOPT_URL, $url);
        $datas = curl_exec($handle);
        curl_close($handle);
        $data = json_decode($datas);
        if (!empty($data)) {
            $status = $data->status;
            if ($status == "OK") {
                return $data->results[1]->formatted_address;
            } else {
                return false;
            }
        } else {
            return '';
        }
    }
}