<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pharmacy_leaf_model extends CI_model {



	function register($cdata){
		$this->db->trans_begin();

		$r1 = $this->db->insert('pharmacy_leaf', $cdata);

		if ($r1==true) {
			$this->db->trans_commit();
			return true;

		}else{
			 $this->db->trans_rollback();
			 return false;
		}
	}//end of function 


	function get_pharmacy_leaf(){
		$this->db->select('pl.*, CONCAT(u.first_name, " ", u.last_name) as added_by');
		$this->db->from('pharmacy_leaf pl');
		$this->db->join('users u', 'u.user_id=pl.created_by');
		$this->db->order_by('pl.leaf_name', 'asc');
		$q = $this->db->get();
		if ($q->num_rows()>0) {
			return $q->result_array();
		}else{
			return false;
		}
	}//end of function check_mobile


}//end of class