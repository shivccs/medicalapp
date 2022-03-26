<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Patient_profile_model extends CI_model {
	

	function get_patient_data($temp_patient_id){
		$this->db->select('*');
		$this->db->from('patients d');
		$this->db->join('patient_address dp', 'dp.patient_id=d.patient_id');
		$this->db->where('d.patient_id', $temp_patient_id);
		$q = $this->db->get();
		if ($q->num_rows()>0) {
			return $q->row_array();
		}else{
			return false;
		}
	}//end of function get_patienttor_data

	function get_patient_img($temp_patient_id){
		$this->db->select('*');
		$this->db->where('ref_id', $temp_patient_id);
		$q = $this->db->get('images');
		if ($q->num_rows()>0) {
			return $q->row_array();
		}else{
			return false;
		}
	}//end of function get_patienttor_img
	function get_category(){
		$this->db->select('*');
		$this->db->where('status', 1);
		$q = $this->db->get('patienttors_category');

		return $q->result_array();
	}
	function get_allergy($pid){
		$this->db->select('*');
		$this->db->where('patient_id', $pid);
		$q = $this->db->get('patient_allergy');

		return $q->result_array();
	}
	function get_cronic($pid){
		$this->db->select('*');
		$this->db->where('patient_id', $pid);
		$q = $this->db->get('patient_cronic_disease');

		return $q->result_array();
	}
	function get_surgery($pid){
		$this->db->select('*');
		$this->db->where('patient_id', $pid);
		$q = $this->db->get('patient_surgery');

		return $q->result_array();
	}
	function get_symptom($pid){
		$this->db->select('*');
		$this->db->where('patient_id', $pid);
		$q = $this->db->get('patient_symptom');

		return $q->result_array();
	}
		function get_style($pid){
		$this->db->select('*');
		$this->db->where('patient_id', $pid);
		$q = $this->db->get('patient_lifestyle');

		return $q->result_array();
	}
	function get_record($pid){
		$this->db->select('*');
		$this->db->from('patients');
		$this->db->join('patient_record', 'patients.patient_id=patient_record.patient_id');
		$this->db->where('patients.patient_id', $pid);
	   $q = $this->db->get();

		return $q->result_array();
	}
	function get_consult($pid){
		$this->db->select('*');
		$this->db->from('consultation');
		$this->db->join('patients', 'patients.patient_id=consultation.patient_id');
		$this->db->where('patients.patient_id', $pid);
	   $q = $this->db->get();

		return $q->result_array();
	}
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
	}

}//end of class