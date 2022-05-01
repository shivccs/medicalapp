<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Patient_profile_model extends CI_model {
	

	function get_patient_data($tempid){
		$this->db->select('u.*');
		$this->db->from('users u');
		
		$this->db->where('u.user_id', $tempid);
		$q = $this->db->get();
		if ($q->num_rows()>0) {
			return $q->row_array();
		}else{
			return false;
		}
	}//end of function 

	function get_patient_img($tempid){
		$this->db->select('*');
		$this->db->where('ref_id', $tempid);
		$q = $this->db->get('images');
		if ($q->num_rows()>0) {
			return $q->row_array();
		}else{
			return false;
		}
	}//end of function get_patient_img

	function update_image_details($Idata, $doc_details){
			$this->db->where('image_id', $doc_details['image_id']);
			$query = $this->db->update('images', $Idata);
			if ($query) {
				return true;
			}else{
				return false;
			}
	}//end of function update_doc_details

	function add_image_data($idata){
			$query = $this->db->insert('images', $idata);
			if ($query) {
				return true;
			}else{
				return false;
			}
	}//end of function add_image_data






}//end of class