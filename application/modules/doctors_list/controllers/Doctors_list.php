<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Doctors_list extends MX_Controller {

	function __construct() 
		{
			Parent::__construct();
		}

	public function index()
	{	

		$this->load->model('doctors_list_model');
		$user_id = $this->session->userdata['sessiondata']['user_id'];
		
		$doctors_data = $this->doctors_list_model->get_doctors_data();

		$data = array(
			'doctors_data'		=>		$doctors_data
		);
		$this->load->view('doc-list-view', $data);
			
	}//end of index
	public function available_doctors_list(){
		$this->load->model('doctors_list_model');
		$user_id = $this->session->userdata['sessiondata']['user_id'];
		
		$doctors_data = $this->doctors_list_model->get_doctors_data();

		$data = array(
			'doctors_data'		=>		$doctors_data
		);
		$this->load->view('avlbl-doc-list-view', $data);
	}

	function find_user(){
		$session_user_id = $this->session->userdata['sessiondata']['user_id'];
		$this->load->library('create_id');
		$this->load->model('doctors_list_model');
		$user_id 			=		$this->input->post('user_id');
		
		$check_user = $this->doctors_list_model->get_check_doctor($user_id);
		
		if ($check_user) {
			$this->session->set_tempdata('temp_doc_id', $user_id, 1000);
	        redirect(base_url().'template/doctor_profile');
		}else{
			//$this->session->set_flashdata('msg', 'Failed! Mobile is already registered');
	        redirect(base_url().'template/doctors_list');
		}

	}//end of function find_user


}//end of class