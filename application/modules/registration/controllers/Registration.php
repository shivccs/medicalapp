<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Registration extends MX_Controller {

	

	public function index()
	{	

		$this->load->model('registration_model');
		$states = $this->registration_model->get_indian_states();
		$data = array(
			'states'		=>		$states			  
			);

		$this->load->view('registration-view', $data);
			
	}//end of index



	public function signup(){
		$this->load->model('registration_model');
		$this->load->library('create_id');
	
		$patient_name 	=		$this->input->post('patient_name');
		$gender 		=		$this->input->post('gender');
		$mstatus		=		$this->input->post('mstatus');
		$dob 			=		$this->input->post('dob');
		$mobile 		=		$this->input->post('mobile');
		$add			=		$this->input->post('add');
		$state			=		$this->input->post('state');
		$city			=		$this->input->post('city');
		$pincode		=		$this->input->post('pincode');

		$patient_id = $this->create_id->construct_id('PT');
		$u_data = array(
			'patient_id'			=>		$patient_id,
			'patient_name'			=>		$patient_name,
			'phone_number'			=>		$mobile,
			'pwd'					=>		$mobile,
			'dob'					=>		$dob,
			'gender'				=>		$gender,
			'maritial_status'		=>		$mstatus,				
			'status'				=>		1,
			
		);


			$result = $this->registration_model->signup($u_data, $add, $state, $city, $pincode);
			if ($result) {
			$this->session->set_flashdata('msg', 'Successfully Signup');
			  redirect(base_url().'registration');
			}else{
				$this->session->set_flashdata('msg', 'Failed!');
				  redirect(base_url().'registration');
			}

		}

}//end of class