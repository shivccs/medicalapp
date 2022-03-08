<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Doctors_category_model extends CI_model {



	function check_category($cat){
		$this->db->select('*');
		$this->db->where('category_name', $cat);
		$q = $this->db->get('doctors_category');
		if ($q->num_rows()>0) {
			return true;
		}else{
			return false;
		}
	}//end of function check_role

	function register($idata, $cdata){
		$this->db->trans_begin();

		$r1 = $this->db->insert('images', $idata);

		$r1 = $this->db->insert('doctors_category', $cdata);

		if ($r1==true) {
			$this->db->trans_commit();
			return true;

		}else{
			 $this->db->trans_rollback();
			 return false;
		}
	}//end of function 


	function get_category(){
		$this->db->select('dc.*, CONCAT(u.first_name, " ", u.last_name) as added_by, i.path, i.file_name');
		$this->db->from('doctors_category dc');
		$this->db->join('users u', 'u.user_id=dc.created_by');
		$this->db->join('images i', 'i.ref_id=dc.doctor_category_id');
		$this->db->order_by('dc.category_name', 'asc');
		$q = $this->db->get();
		if ($q->num_rows()>0) {
			return $q->result_array();
		}else{
			return false;
		}
	}//end of function check_mobile


}//end of class