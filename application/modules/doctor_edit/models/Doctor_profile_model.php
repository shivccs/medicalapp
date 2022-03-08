<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Doctor_profile_model extends CI_model {
	

	function get_doctor_data($temp_doc_id){
		$this->db->select('d.doctor_id, d.first_name, d.last_name, d.email, d.phone, d.is_active, dr.category_name, CONCAT(uu.first_name, " ", uu.last_name) as added_by, di.*, st.name as state_name, ct.name as city_name, dp.registration_no as regi,dp.medical_council as council ,dp.certification_year as certificate ,dp.medical_degree as degree, dp.passout_year as passout , dp.college_name as collage, dp.experience as exp');
		$this->db->from('doctors d');
		$this->db->join('doctors_category dr', 'dr.doctor_category_id=d.category_id');
		$this->db->join('doctor_info di', 'di.doctor_id=d.doctor_id');
		$this->db->join('states st', 'st.id=di.state');
		$this->db->join('cities ct', 'ct.id=di.city');
		$this->db->join('doctor_profession dp', 'dp.doctor_id=d.doctor_id');
		$this->db->join('users uu', 'uu.user_id=di.added_by');
		$this->db->where('d.doctor_id', $temp_doc_id);
		$q = $this->db->get();
		if ($q->num_rows()>0) {
			return $q->row_array();
		}else{
			return false;
		}
	}//end of function get_doctor_data

	function get_doctor_img($temp_doc_id){
		$this->db->select('*');
		$this->db->where('ref_id', $temp_doc_id);
		$q = $this->db->get('images');
		if ($q->num_rows()>0) {
			return $q->row_array();
		}else{
			return false;
		}
	}//end of function get_doctor_img
	function get_category(){
		$this->db->select('*');
		$this->db->where('status', 1);
		$q = $this->db->get('doctors_category');

		return $q->result_array();
	}
	
	function edit_user($u_data, $ui_data, $uf_data, $id){
		$this->db->trans_begin();

		
		    $r1=$this->db->where('doctor_id',$id)->update('doctors',$u_data);
			
		
		
			$r2=$this->db->where('doctor_id',$id)->update('doctor_info',$ui_data);

		
			$r3=$this->db->where('doctor_id',$id)->update('doctor_profession',$uf_data);

		if (($r1==true)&&($r2==true)&&($r3==true)) {
			$this->db->trans_commit();
			return true;

		}else{
			 $this->db->trans_rollback();
			 return false;
		}
	}
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
	}
	function register($idata){
		$this->db->trans_begin();

		$r1 = $this->db->insert('images', $idata);

		

		if ($r1==true) {
			$this->db->trans_commit();
			return true;

		}else{
			 $this->db->trans_rollback();
			 return false;
		}
	}

}//end of class