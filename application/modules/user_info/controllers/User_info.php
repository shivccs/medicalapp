<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_info extends MX_Controller {

	function __construct() 
		{
			Parent::__construct();
		}

	public function index()
	{	
		if ($this->session->tempdata('temp_user_id')!=null) {
			$this->load->model('user_info_model');
			$user_id = $this->session->userdata['sessiondata']['user_id'];
			
			$temp_user_id = $this->session->tempdata('temp_user_id');

			$user_data = $this->user_info_model->get_user_data($temp_user_id);
			$states = $this->user_info_model->get_indian_states();
			$state_cities = $this->user_info_model->get_user_state_cities($user_data['state']);
			//var_dump($user_data);exit; 
			$roles = $this->user_info_model->get_roles();

			$data = array(
				'roles'			=>		$roles,
				'user_data'		=>		$user_data,
				'states'		=>		$states,
				'state_cities'	=>		$state_cities
			);
			$this->load->view('user-info-view', $data);
		}else{
			 redirect(base_url().'template/users_list');
		}
		
			
	}//end of index



	public function update(){
		$this->load->model('user_info_model');
		$session_user_id = $this->session->userdata['sessiondata']['user_id'];
		$this->load->library('create_id');

		$update_user_id	=		$this->input->post('update_user_id');


		$fname 			=		$this->input->post('fname');
		$lname 			=		$this->input->post('lname');
		$fathername		=		$this->input->post('fathername');
		$gender 		=		$this->input->post('gender');
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

		$check_email = $this->user_info_model->check_email($email, $update_user_id);

		$check_mobile = $this->user_info_model->check_mobile($mobile, $update_user_id);


		if ($check_email) {
			$this->session->set_flashdata('msg', 'Failed! Email is already registered');
	        redirect(base_url().'template/user_info');
		}else if ($check_mobile) {
			$this->session->set_flashdata('msg', 'Failed! Mobile is already registered');
	        redirect(base_url().'template/user_info');
		}else{

			$u_data = array(

				'user_role'				=>		$role,
				'first_name'			=>		$fname,
				'last_name'				=>		$lname,
				'email'					=>		$email,
				'phone'					=>		$mobile
			);


			$ui_data = array(
				'father_name'			=>		$fathername,
				'gender'				=>		$gender,
				'dob'					=>		$dob,
				'address'				=>		$address,
				'state'					=>		$state,
				'city'					=>		$city,
				'pincode'				=>		$pincode,
				'latitude'				=>		$lat,
				'longitude'				=>		$long,
			);	


			$result = $this->user_info_model->update_user($u_data, $ui_data, $update_user_id);

			if ($result) {
			$this->session->set_flashdata('msg', 'Data successfully updated');
		        redirect(base_url().'template/user_info');
			}else{
				$this->session->set_flashdata('msg', 'Failed!');
		        redirect(base_url().'template/user_info');
			}

		}//end of if else 	

	}//end of function register

}//end of class