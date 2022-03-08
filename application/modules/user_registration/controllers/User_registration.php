<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_registration extends MX_Controller {

	function __construct() 
		{
			Parent::__construct();
		}

	public function index()
	{	

		$this->load->model('user_registration_model');
		$user_id = $this->session->userdata['sessiondata']['user_id'];
		
		$roles = $this->user_registration_model->get_roles();
		$states = $this->user_registration_model->get_indian_states();


		$data = array(
			'roles'		=>		$roles,
			'states'	=>		$states
		);
		$this->load->view('user-registration-view', $data);
			
	}//end of index



	public function register(){
		$this->load->model('user_registration_model');
		$session_user_id = $this->session->userdata['sessiondata']['user_id'];
		$this->load->library('create_id');

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

		$check_email = $this->user_registration_model->check_email($email);

		$check_mobile = $this->user_registration_model->check_mobile($mobile);


		if ($check_email) {
			$this->session->set_flashdata('msg', 'Failed! Email is already registered');
	        redirect(base_url().'template/user_registration');
		}else if ($check_mobile) {
			$this->session->set_flashdata('msg', 'Failed! Mobile is already registered');
	        redirect(base_url().'template/user_registration');
		}else{
			$user_id = $this->create_id->construct_id('UID');

			$u_data = array(

				'user_id'				=>		$user_id,
				'user_role'				=>		$role,
				'first_name'			=>		$fname,
				'middle_name'			=>		'',
				'last_name'				=>		$lname,
				'email'					=>		$email,
				'phone'					=>		$mobile,				
				'pwd'					=>		$mobile,
				'last_login'			=>		null,
				'login_count'			=>		0,
				'is_active'				=>		1,
				'created_on' 			=>		date('Y-m-d H:i:s')
			);


			$ui_data = array(
				'user_id'				=>		$user_id,
				'father_name'			=>		$fathername,
				'gender'				=>		$gender,
				'dob'					=>		$dob,
				'address'				=>		$address,
				'state'					=>		$state,
				'city'					=>		$city,
				'pincode'				=>		$pincode,
				'latitude'				=>		$lat,
				'longitude'				=>		$long,
				'added_on'				=>		date('Y-m-d'),
				'added_by' 				=>		$session_user_id
			);	


			$result = $this->user_registration_model->register_new_user($u_data, $ui_data);

			if ($result) {
			$this->session->set_flashdata('msg', 'Employee successfully registerd');
		        redirect(base_url().'template/user_registration');
			}else{
				$this->session->set_flashdata('msg', 'Failed!');
		        redirect(base_url().'template/user_registration');
			}

		}//end of if else 	

	}//end of function register


	function get_cities(){
			$this->load->model('user_registration_model');

			$input = urldecode(file_get_contents('php://input'));

	  	 	$state_id = json_decode($input);

			$cities = $this->user_registration_model->get_cities_by_state($state_id);
		
	        $resp = array('cities' => $cities);
                $this->output
                ->set_status_header(200)
                ->set_content_type('application/json', 'utf-8')
                ->set_output(json_encode($resp, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES))
                ->_display();
                exit;
	}//end of functrion get_cities

}//end of class