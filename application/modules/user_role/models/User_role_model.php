<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_role_model extends CI_model {



	function check_role($role_name){
		$this->db->select('*');
		$this->db->where('role_name', $role_name);
		$q = $this->db->get('user_role');
		if ($q->num_rows()>0) {
			return true;
		}else{
			return false;
		}
	}//end of function check_role

	function register($cdata){
		$this->db->trans_begin();

		$r1 = $this->db->insert('user_role', $cdata);

		if ($r1==true) {
			$this->db->trans_commit();
			return true;

		}else{
			 $this->db->trans_rollback();
			 return false;
		}
	}//end of function 


	function get_user_roles(){
		$this->db->select('ur.*, CONCAT(u.first_name, " ", u.last_name) as added_by');
		$this->db->from('user_role ur');
		$this->db->join('users u', 'u.user_id=ur.created_by');
		$this->db->order_by('ur.role_name', 'asc');
		$q = $this->db->get();
		if ($q->num_rows()>0) {
			return $q->result_array();
		}else{
			return false;
		}
	}//end of function check_mobile


}//end of class