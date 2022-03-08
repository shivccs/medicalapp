<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users_list_model extends CI_model {
	

	function get_users_data(){
		$this->db->select('u.user_id, u.first_name, u.last_name, u.email, u.phone, u.is_active, ur.role_name, CONCAT(uu.first_name, " ", uu.last_name) as added_by, ui.added_on');
		$this->db->from('users u');
		$this->db->join('user_role ur', 'ur.role_id=u.user_role');
		$this->db->join('user_info ui', 'ui.user_id=u.user_id');
		$this->db->join('users uu', 'uu.user_id=ui.added_by');
		$this->db->where('u.user_type', 3);
		$this->db->order_by('u.first_name');
		$q = $this->db->get();
		if ($q->num_rows()>0) {
			return $q->result_array();
		}else{
			return false;
		}
	}//end of function get_users_data


	function get_check_user($user_id){
		$this->db->select('user_id');
		$this->db->where('user_id', $user_id);
		
		$q = $this->db->get('users');
		if ($q->num_rows()>0) {
			return true;
		}else{
			return false;
		}
	}//end of function get_check_user($user_id)

}//end of class