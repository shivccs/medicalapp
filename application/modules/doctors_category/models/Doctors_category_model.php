<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Doctors_category_model extends CI_model {



	function check_category($cat){
		$this->db->select('*');
		$this->db->where('category_name', $cat);
		$q = $this->db->get('doctors_category');
		if ($q->num_rows()>0) {
			return true;
		}else{
			return false;
		}
	}//end of function check_role

	function register($idata, $cdata, $disease, $session_user_id){
		$this->db->trans_begin();

		if (isset($disease)) {
			$cd = array();

			$disease_count = count($disease);
			//foreach ($variable as $key => $value) {
				// code...
			//}
			for ($i=0; $i < $disease_count; $i++) { 
				$temp_array = array(
					'category_id'					=>		$cdata['doctor_category_id'],
					'disease_name'					=>		$disease[$i],
					'added_by'						=>		$session_user_id,
					'added_on'						=>		date('Y-m-d')
				);

				array_push($cd, $temp_array);
			}//end of for each

			$r3 = $this->db->insert_batch('category_disease', $cd);
		}else{
			$r3 = true;
		}//end of if else
		



		$r1 = $this->db->insert('images', $idata);

		$r2 = $this->db->insert('doctors_category', $cdata);

		if (($r1==true)&&($r2==true)&&($r3==true)) {
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
			$cat_data = array();
			$categories = $q->result_array();
			foreach ($categories as $key => $cvalue) {
				$this->db->select('disease_name');
				$this->db->from('category_disease');
				$this->db->where('category_id', $cvalue['doctor_category_id']);
				$q1 = $this->db->get();
				if ($q1->num_rows()>0) {
					$temp_cd = $q1->result_array();
				}else{
					$temp_cd = false;
				}
				$cvalue['assigned_disease'] = $temp_cd;
				array_push($cat_data, $cvalue);
			}//end of foreach


			return $cat_data;
		}else{
			return false;
		}
	}//end of function check_mobile

	function get_disease(){
		$this->db->select('*');
		$this->db->from('disease d');
		$this->db->order_by('d.disease_name', 'asc');
		$q = $this->db->get();
		if ($q->num_rows()>0) {
			return $q->result_array();
		}else{
			return false;
		}
	}//end of function check_mobile


}//end of class