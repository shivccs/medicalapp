<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Patient_list_model extends CI_model {
	

	function get_patients_data(){
		$this->db->select('*');
		$this->db->from('users u');
		$this->db->join('user_info ui', 'ui.user_id=u.user_id');
		$this->db->where('u.user_type', 6);
		$this->db->order_by('u.first_name');
		$q = $this->db->get();
		if ($q->num_rows()>0) {
			return $q->result_array();
		}else{
			return false;
		}
	}//end of function get_doctors_data


	function get_check_patient($user_id){
		$this->db->select('user_id');
		$this->db->where('user_id', $user_id);
		
		$q = $this->db->get('users');
		if ($q->num_rows()>0) {
			return true;
		}else{
			return false;
		}
	}//end of function get_check_user($doctor_id)

}//end of class