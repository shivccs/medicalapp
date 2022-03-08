<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_info_model extends CI_model {
	

	function get_user_data($temp_user_id){
		$this->db->select('u.*, ui.*');
		$this->db->from('users u');
		$this->db->join('user_info ui', 'ui.user_id=u.user_id');
		$this->db->where('u.user_id', $temp_user_id);
		$q = $this->db->get();
		if ($q->num_rows()>0) {
			return $q->row_array();
		}else{
			return false;
		}
	}//end of function get_user_data


	function get_roles(){
		$this->db->select('*');
		$q = $this->db->get('user_role');

		return $q->result_array();
	}//end of function get_roles()

	function get_indian_states(){
		$this->db->cache_on();
		
		$this->db->select('id, name');
		$this->db->where_in('country_id', '101');
		$this->db->order_by('name');
		$q = $this->db->get('states');
		if ($q->num_rows()>0) {
			return $q->result_array();
		}else{
			return false;
		}
	}//end of ffunction get_indian_states

	function get_user_state_cities($state_id){
		$this->db->select('name,id');
	    $this->db->where('state_id',$state_id);
	    $result = $this->db->get('cities');
	     
		if ($result->num_rows()>0) {
	         return $result->result_array();
	      } else {
	        return false;
	      } 
	}//end of function get_user_state_cities

	function check_email($email, $update_user_id){
		$this->db->select('*');
		$this->db->where('email', $email);
		$this->db->where_not_in('user_id', $update_user_id);
		$q = $this->db->get('users');
		if ($q->num_rows()>0) {
			return true;
		}else{
			return false;
		}
	}//end of function check_email


	function check_mobile($mobile, $update_user_id){
		$this->db->select('*');
		$this->db->where('phone', $mobile);
		$this->db->where_not_in('user_id', $update_user_id);
		$q = $this->db->get('users');
		if ($q->num_rows()>0) {
			return true;
		}else{
			return false;
		}
	}//end of function check_mobile


	function update_user($u_data, $ui_data, $update_user_id){
		$this->db->trans_begin();
			  $this->db->where('user_id', $update_user_id);
		$r1 = $this->db->update('users', $u_data);

			  $this->db->where('user_id', $update_user_id);
		$r2 = $this->db->update('user_info', $ui_data);

		if (($r1==true)&&($r2==true)) {
			$this->db->trans_commit();
			return true;

		}else{
			 $this->db->trans_rollback();
			 return false;
		}
	}//end of function register_new_user

}//end of class