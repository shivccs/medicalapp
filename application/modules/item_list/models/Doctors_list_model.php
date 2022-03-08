<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Doctors_list_model extends CI_model {
	

	function get_doctors_data(){
		$this->db->select('d.doctor_id, d.first_name, d.last_name, d.email, d.phone, d.is_active, dr.category_name, CONCAT(uu.first_name, " ", uu.last_name) as added_by, di.added_on');
		$this->db->from('doctors d');
		$this->db->join('doctors_category dr', 'dr.doctor_category_id=d.category_id');
		$this->db->join('doctor_info di', 'di.doctor_id=d.doctor_id');
		$this->db->join('users uu', 'uu.user_id=di.added_by');
		$this->db->order_by('d.first_name');
		$q = $this->db->get();
		if ($q->num_rows()>0) {
			return $q->result_array();
		}else{
			return false;
		}
	}//end of function get_doctors_data


	function get_check_doctor($user_id){
		$this->db->select('doctor_id');
		$this->db->where('doctor_id', $user_id);
		
		$q = $this->db->get('doctors');
		if ($q->num_rows()>0) {
			return true;
		}else{
			return false;
		}
	}//end of function get_check_user($doctor_id)

}//end of class