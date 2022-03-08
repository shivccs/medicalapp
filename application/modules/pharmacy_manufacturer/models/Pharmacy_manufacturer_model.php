<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pharmacy_manufacturer_model extends CI_model {



	function check_manufacturer($manufacturer){
		$this->db->select('*');
		$this->db->where('manufacturer_name', $manufacturer);
		$q = $this->db->get('pharmacy_manufacturer');
		if ($q->num_rows()>0) {
			return true;
		}else{
			return false;
		}
	}//end of function check_role

	function register($cdata){
		$this->db->trans_begin();

		$r1 = $this->db->insert('pharmacy_manufacturer', $cdata);

		if ($r1==true) {
			$this->db->trans_commit();
			return true;

		}else{
			 $this->db->trans_rollback();
			 return false;
		}
	}//end of function 


	function get_pharmacy_manufacturers(){
		$this->db->select('mf.*, CONCAT(u.first_name, " ", u.last_name) as added_by');
		$this->db->from('pharmacy_manufacturer mf');
		$this->db->join('users u', 'u.user_id=mf.created_by');
		$this->db->order_by('mf.manufacturer_name', 'asc');
		$q = $this->db->get();
		if ($q->num_rows()>0) {
			return $q->result_array();
		}else{
			return false;
		}
	}//end of function check_mobile


}//end of class