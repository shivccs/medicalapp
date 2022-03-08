<?php

defined('BASEPATH') OR exit('No direct script access allowed');
class Auth_model extends CI_model
{
	function __construct() {
	parent::__construct();
	
	}


	function verify_user($email, $password )
    {
      //$pswd = sha1($password);
  
       
      
      $this->db->where('email',$email);
      //$this->db->or_where('email', $email);
      
      $this->db->where('pwd', $password);

      $q = $this->db->get('users');
    


      if ($q->num_rows() > 0)
      {
          return $q->row();
      } 
      return false;
    }// varify user function

  function update_login_count($user_id)
  {
    $date = date("Y-m-d H:i:s");
    $data = array(
               'last_login' => $date
              
                           );
    $this->db->where('user_id',$user_id);
    //$this->db->set('last_login', $date, FALSE);
    $this->db->set('login_count','`login_count`+1', FALSE);
    $this->db->update('users', $data);
  }
    
  

}// end of class