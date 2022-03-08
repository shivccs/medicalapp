<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Template_model extends CI_model {


	function update_password($up_data, $user_id){
			
			$this->db->where('user_id', $user_id);
			$q = $this->db->update('users', $up_data);

			if ($q) {
				return true;
			}else{
				return false;
			}

	}//end of function 








}//end of class