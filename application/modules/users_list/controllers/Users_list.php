<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users_list extends MX_Controller {

	function __construct() 
		{
			Parent::__construct();
		}

	public function index()
	{	

		$this->load->model('users_list_model');
		$user_id = $this->session->userdata['sessiondata']['user_id'];
		
		$users_data = $this->users_list_model->get_users_data();

		$data = array(
			'users_data'		=>		$users_data
		);
		$this->load->view('user-list-view', $data);
			
	}//end of index

	function find_user(){
		$session_user_id = $this->session->userdata['sessiondata']['user_id'];
		$this->load->library('create_id');
		$this->load->model('users_list_model');
		$user_id 			=		$this->input->post('user_id');
		
		$check_user = $this->users_list_model->get_check_user($user_id);
		
		if ($check_user) {
			$this->session->set_tempdata('temp_user_id', $user_id, 1000);
	        redirect(base_url().'template/user_info');
		}else{
			//$this->session->set_flashdata('msg', 'Failed! Mobile is already registered');
	        redirect(base_url().'template/users_list');
		}

	}//end of function find_user


}//end of class