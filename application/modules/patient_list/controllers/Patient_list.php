<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Patient_list extends MX_Controller {

	function __construct() 
		{
			Parent::__construct();
		}

	public function index()
	{	

		$this->load->model('patient_list_model');
		$user_id = $this->session->userdata['sessiondata']['user_id'];
		
		$patient_data = $this->patient_list_model->get_patients_data();

		$data = array(
			'patient_data'		=>		$patient_data
		);
		$this->load->view('partient-list-view', $data);
			
	}//end of index

	function find_user(){
		echo "hello";
		$session_user_id = $this->session->userdata['sessiondata']['patient_id'];
		$this->load->library('create_id');
		$this->load->model('patient_list_model');
		$user_id 			=		$this->input->post('user_id');
		
		$check_user = $this->patient_list_model->get_check_patient($user_id);
		
		if ($check_user) {
			$this->session->set_tempdata('temp_doc_id', $user_id, 1000);
	        redirect(base_url().'template/patient_profile');
		}else{
			//$this->session->set_flashdata('msg', 'Failed! Mobile is already registered');
	        redirect(base_url().'template/patient_list');
		}

	}//end of function find_user


}//end of class