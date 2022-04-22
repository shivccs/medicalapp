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
	
		$fname 			=		$this->input->post('fname');
		$lname 			=		$this->input->post('lname');
		$gender 		=		$this->input->post('gender');
		$mstatus		=		$this->input->post('mstatus');
		$email 			=		$this->input->post('email');
		$mobile			=		$this->input->post('mobile');
		$dob 			=		$this->input->post('dob');
		$role 			=		$this->input->post('role');
		$address		=		$this->input->post('address');
		$state			=		$this->input->post('state');
		$city			=		$this->input->post('city');
		$pincode		=		$this->input->post('pincode');
		$lat 			=		$this->input->post('lat');
		$long 			=		$this->input->post('long');

		$user_id = $this->create_id->construct_id('PT');
		$u_data = array(
			'user_id'				=>		$user_id,
			'first_name'			=>		$fname,
			'last_name'				=>		$lname,
			'phone'					=>		$mobile,
			'email'					=>		$email,
			'pwd'					=>		$mobile,	
			'user_role'				=>		6,		
			'user_type'				=>		6,			
			'is_active'				=>		1,
			'last_login'			=>		null,
			'login_count'			=>		0,
			'created_on' 			=>		date('Y-m-d H:i:s')
			
		);
		$a_data = array(
			'user_id'				=>		$user_id,
			'gender'				=>		$gender,
			'dob'					=>		$dob,
			'maritial_status'		=>		$mstatus,
			'address'				=>		$address,
			'state'					=>		$state,
			'city'					=>		$city,
			'pincode'				=>		$pincode,
			'latitude'				=>		$lat,
			'longitude'				=>		$long,
			'added_on'				=>		date('Y-m-d')
		);	


			$result = $this->registration_model->signup($u_data, $a_data);
			if ($result) {
			$this->session->set_flashdata('msg', 'Successfully Signup');
			  redirect(base_url().'registration');
			}else{
				$this->session->set_flashdata('msg', 'Failed!');
				  redirect(base_url().'registration');
			}

		}

}//end of class
