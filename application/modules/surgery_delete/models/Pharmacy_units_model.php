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

 public function get_specific_data($db_id,$id,$db_name){
		$q=$this->db->select('*')->where($db_id,$id)->get($db_name);
        return $q->result();
	}
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
	
	function get_manufacture(){
		$this->db->select('*');
		$this->db->where('status', 1);
		$q = $this->db->get('pharmacy_manufacturer');

		return $q->result_array();
	}
	
	function get_unit(){
		$this->db->select('*');
		$this->db->where('status', 1);
		$q = $this->db->get('pharmacy_units');

		return $q->result_array();
	}
	function count_row($db_id,$id,$db_name){
		$this->db->from($db_name)->where($db_id,$id);
		$query = $this->db->get();
		return $query->num_rows();
	}
	function edit_data($db_id,$id,$data,$db_name){
		return $q=$this->db->where($db_id,$id)->update($db_name,$data);
	}
	
	function delete_data($db_id,$id,$db_name){
		$this -> db -> where($db_id, $id);
		$this -> db -> delete($db_name);
	}

	function get_leaf(){
		$this->db->select('*');
		$this->db->where('status', 1);
		$q = $this->db->get('pharmacy_leaf');

		return $q->result_array();
	}
		function get_category(){
		$this->db->select('*');
		$this->db->where('status', 1);
		$q = $this->db->get('doctors_category');

		return $q->result_array();
	}


}//end of class