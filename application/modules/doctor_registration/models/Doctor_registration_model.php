<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Doctor_registration_model extends CI_model {
	
	function get_category(){
		$this->db->select('*');
		$this->db->where('status', 1);
		$q = $this->db->get('doctors_category');

		return $q->result_array();
	}//end of function get_category


	function get_specility(){
		$this->db->select('*');
		$this->db->where('status', 1);
		$q = $this->db->get('doctors_speciality');

		return $q->result_array();
	}//end of function get_specility

	function get_medical_council(){
		$this->db->select('*');
		$q = $this->db->get('medical_council');

		return $q->result_array();
	}//end of function get_medical_council

	function get_medical_degrees(){
		$this->db->select('*');
		$q = $this->db->get('medical_degrees');

		return $q->result_array();
	}//end of function get_medical_degrees


	function check_email($email){
		$this->db->select('*');
		$this->db->where('email', $email);
		$q = $this->db->get('doctors');
		if ($q->num_rows()>0) {
			return true;
		}else{
			return false;
		}
	}//end of function check_email


	function check_mobile($mobile){
		$this->db->select('*');
		$this->db->where('phone', $mobile);
		$q = $this->db->get('doctors');
		if ($q->num_rows()>0) {
			return true;
		}else{
			return false;
		}
	}//end of function check_mobile


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

	function get_cities_by_state($state_id){
		$this->db->select('name,id');
	    $this->db->where('state_id',$state_id);
	    $result = $this->db->get('cities');
	     
	      try {
	      if ($result->num_rows()>0) {
	         return $result->result_array();
	      } else {
	        $this->throw_error->throw("There is No City.");
	      } 

	    } catch (Exception $e) {
	      return false;
	      exit;
	    }
	}//end of function get_cities_by_state

	function register_new_user($u_data, $ui_data, $uf_data){
		$this->db->trans_begin();

		$r1 = $this->db->insert('doctors', $u_data);

		$r2 = $this->db->insert('doctor_info', $ui_data);

		$r2 = $this->db->insert('doctor_profession', $uf_data);

		if (($r1==true)&&($r2==true)) {
			$this->db->trans_commit();
			return true;

		}else{
			 $this->db->trans_rollback();
			 return false;
		}
	}//end of function register_new_user


}//end of class