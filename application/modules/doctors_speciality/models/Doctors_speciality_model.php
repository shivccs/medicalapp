<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Doctors_speciality_model extends CI_model {



	function check_specility($specility){
		$this->db->select('*');
		$this->db->where('speciality_name', $specility);
		$q = $this->db->get('doctors_speciality');
		if ($q->num_rows()>0) {
			return true;
		}else{
			return false;
		}
	}//end of function check_role

	function register($cdata){
		$this->db->trans_begin();

		$r1 = $this->db->insert('doctors_speciality', $cdata);

		if ($r1==true) {
			$this->db->trans_commit();
			return true;

		}else{
			 $this->db->trans_rollback();
			 return false;
		}
	}//end of function 


	function get_doctors_speciality(){
		$this->db->select('ds.*, CONCAT(u.first_name, " ", u.last_name) as added_by');
		$this->db->from('doctors_speciality ds');
		$this->db->join('users u', 'u.user_id=ds.created_by');
		$this->db->order_by('ds.speciality_name', 'asc');
		$q = $this->db->get();
		if ($q->num_rows()>0) {
			return $q->result_array();
		}else{
			return false;
		}
	}//end of function get_doctors_speciality


}//end of class