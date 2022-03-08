<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Doctors_list_model extends CI_model {
	

	function get_doctors_data(){
		$this->db->select('*');
		$this->db->from('symptoms');
		 $q = $this->db->get();
		if ($q->num_rows()>0) {
			return $q->result_array();
		}else{
			return false;
		}
	}//end of function get_doctors_data
function delete_data($db_id,$id,$db_name){
		$this -> db -> where($db_id, $id);
		$this -> db -> delete($db_name);
	}

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