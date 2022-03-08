<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Doctors_availbility_model extends CI_model {




	function get_doctors_list(){
		$this->db->select('d.doctor_id, d.first_name, d.last_name, d.phone, d.email');
		$this->db->from('doctors d');
		$this->db->where('d.doctor_type', 2);
		$this->db->where('d.is_active', 1);
		//$this->db
		$q = $this->db->get();
		if ($q->num_rows()>0) {
			return $q->result_array();
		}else{
			return false;
		}
	}//end of function 


	function get_doctors__avail_list($dayofweek){
		$this->db->select('da.start, da.end, da.status, d.doctor_id, d.first_name, d.last_name, d.phone, d.email');
		$this->db->from('doctor_aviability da');
		$this->db->join('doctors d', 'da.doctor_id=d.doctor_id');
		$this->db->where('da.day', $dayofweek);
		//$this->db
		$q = $this->db->get();
		if ($q->num_rows()>0) {
			return $q->result_array();
		}else{
			return false;
		}
	}//end of function check_role

	function check_doctor_availibity($doctor_id, $day){
      $this->db->select('*');
      $this->db->where('doctor_id', $doctor_id);
      $this->db->where('day', $day);
      $q = $this->db->get('doctor_aviability');
      if ($q->num_rows()>0) {
          return $q->row_array();
      }else{
          return false;
      }
  	}//end of function check_doctor_availibity

  	function set_doctor_availibity($doctor_id, $day, $indata, $updata, $type){
        //var_dump($type);exit;
        if ($type=='1') {
          $this->db->where('doctor_id', $doctor_id);
          $this->db->where('day', $day);
          $q = $this->db->update('doctor_aviability', $updata);
          if ($q) {
            return true;
          }else{
            return false;
          }
        }else{
          $q = $this->db->insert('doctor_aviability', $indata);
          if ($q) {
            return true;
          }else{
            return false;
          }
        }//end of if else
  }//end of function set_doctor_availibity

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