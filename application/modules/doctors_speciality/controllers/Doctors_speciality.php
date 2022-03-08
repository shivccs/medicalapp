<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Doctors_speciality extends MX_Controller {

	function __construct() 
		{
			Parent::__construct();
		}

	public function index()
	{	

		$this->load->model('doctors_speciality_model');
		$user_id = $this->session->userdata['sessiondata']['user_id'];
		$units = $this->doctors_speciality_model->get_doctors_speciality();
		//var_dump($doctors_specialitys);exit;
		$data = array(
			'units'		=>	$units
		);
		$this->load->view('doc-spe-view', $data);
			
	}//end of index



	public function new(){
		$this->load->model('doctors_speciality_model');
		$session_user_id = $this->session->userdata['sessiondata']['user_id'];
			$this->load->library('create_id');
		$spe		=		$this->input->post('spe');

		$check = $this->doctors_speciality_model->check_specility(strtoupper($spe));
		if ($check) {
			$this->session->set_flashdata('msg', 'This specialty is already available!');
		    redirect(base_url().'template/doctors_speciality');
		}else{
			$data = array(
				'speciality_name'				=>		strtoupper($spe),
				'status'						=>		1,
				'created_by'					=>		$session_user_id,
				'created_on'					=>		date('Y-m-d')
			);	

			$result = $this->doctors_speciality_model->register($data);

			if ($result) {
			$this->session->set_flashdata('msg', 'Speciality successfully added!');
		        redirect(base_url().'template/doctors_speciality');
			}else{
				$this->session->set_flashdata('msg', 'Failed!');
		        redirect(base_url().'template/doctors_speciality');
			}//end of if else result
		}//end of if else check role

	}//end of function register


	
}//end of class