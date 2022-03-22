<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Registration_model extends CI_model {
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

		$r1 = $this->db->insert('patients', $u_data);

		$r2 = $this->db->insert('patient_address', $ui_data);

		if (($r1==true)&&($r2==true)) {
			$this->db->trans_commit();
			return true;

		}else{
			 $this->db->trans_rollback();
			 return false;
		}
	}//end of function register_new_user

}