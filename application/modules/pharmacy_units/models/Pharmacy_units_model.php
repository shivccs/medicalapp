<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pharmacy_units_model extends CI_model {



	function check_unit($unit){
		$this->db->select('*');
		$this->db->where('unit_name', $unit);
		$q = $this->db->get('pharmacy_units');
		if ($q->num_rows()>0) {
			return true;
		}else{
			return false;
		}
	}//end of function check_role

	function register($cdata){
		$this->db->trans_begin();

		$r1 = $this->db->insert('pharmacy_units', $cdata);

		if ($r1==true) {
			$this->db->trans_commit();
			return true;

		}else{
			 $this->db->trans_rollback();
			 return false;
		}
	}//end of function 


	function get_pharmacy_units(){
		$this->db->select('pu.*, CONCAT(u.first_name, " ", u.last_name) as added_by');
		$this->db->from('pharmacy_units pu');
		$this->db->join('users u', 'u.user_id=pu.created_by');
		$this->db->order_by('pu.unit_name', 'asc');
		$q = $this->db->get();
		if ($q->num_rows()>0) {
			return $q->result_array();
		}else{
			return false;
		}
	}//end of function check_mobile


}//end of class