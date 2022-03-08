<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Doctor_registration extends MX_Controller {

	function __construct() 
		{
			Parent::__construct();
		}

	public function index()
	{	

		$this->load->model('doctor_registration_model');
		$user_id = $this->session->userdata['sessiondata']['user_id'];
		
		$category = $this->doctor_registration_model->get_category();
		$specility = $this->doctor_registration_model->get_specility();
		$states = $this->doctor_registration_model->get_indian_states();

		$mc = $this->doctor_registration_model->get_medical_council();
		$md = $this->doctor_registration_model->get_medical_degrees();


		$data = array(
			'category'		=>		$category,
			'specility'		=>		$specility,
			'states'		=>		$states,
			'mc'			=>		$mc,
			'md'			=>		$md
		);
		$this->load->view('docter-registration-view', $data);
			
	}//end of index



	public function register(){
		$this->load->model('doctor_registration_model');
		$session_user_id = $this->session->userdata['sessiondata']['user_id'];
		$this->load->library('create_id');

		$doctor_type	=		$this->input->post('doctor_type');
		$fname 			=		$this->input->post('fname');
		$lname 			=		$this->input->post('lname');
		$fathername		=		$this->input->post('fathername');
		$gender 		=		$this->input->post('gender');
		$email 			=		$this->input->post('email');
		$mobile			=		$this->input->post('mobile');
		$dob 			=		$this->input->post('dob');
		$category 		=		$this->input->post('category');
		$address		=		$this->input->post('address');
		$state			=		$this->input->post('state');
		$city			=		$this->input->post('city');
		$pincode		=		$this->input->post('pincode');
		$lat 			=		$this->input->post('lat');
		$long 			=		$this->input->post('long');


		$registration_no		=		$this->input->post('registration_no');
		$mc						=		$this->input->post('mc');
		$mc_year				=		$this->input->post('mc_year');
		$md						=		$this->input->post('md');
		$md_year 				=		$this->input->post('md_year');
		$md_college 			=		$this->input->post('md_college');
		$experience 			=		$this->input->post('experience');

		$specility 				=		$this->input->post('specility');

		if ($specility=='na') {
			$specility_val = null;
		}else{
			$specility_val = $specility;
		}

		$check_email = $this->doctor_registration_model->check_email($email);

		$check_mobile = $this->doctor_registration_model->check_mobile($mobile);


		if ($check_email) {
			$this->session->set_flashdata('msg', 'Failed! Email is already registered');
	        redirect(base_url().'template/doctor_registration');
		}else if ($check_mobile) {
			$this->session->set_flashdata('msg', 'Failed! Mobile is already registered');
	        redirect(base_url().'template/doctor_registration');
		}else{
			$doctor_id = $this->create_id->construct_id('DOC');

			$u_data = array(

				'doctor_id'				=>		$doctor_id,
				'doctor_type'			=>		$doctor_type,
				'category_id'			=>		$category,
				'speciality_id'			=>		$specility_val,
				'first_name'			=>		$fname,
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
				'doctor_id'				=>		$doctor_id,
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

			$uf_data = array(
				'doctor_id'				=>		$doctor_id,
				'registration_no'		=>		$registration_no,		
				'medical_council'		=>		$mc,
				'certification_year'	=>		$mc_year,
				'medical_degree'		=>		$md,
				'passout_year'			=>		$md_year,
				'college_name'			=>		$md_college,
				'experience' 			=>		$experience,
				'added_on'				=>		date('Y-m-d'),
				'added_by' 				=>		$session_user_id
			);	


			$result = $this->doctor_registration_model->register_new_user($u_data, $ui_data, $uf_data);

			if ($result) {
			$this->session->set_flashdata('msg', 'Doctor successfully registerd');
		        redirect(base_url().'template/doctor_registration');
			}else{
				$this->session->set_flashdata('msg', 'Failed!');
		        redirect(base_url().'template/doctor_registration');
			}

		}//end of if else 	

	}//end of function register


	function get_cities(){
			$this->load->model('doctor_registration_model');

			$input = urldecode(file_get_contents('php://input'));

	  	 	$state_id = json_decode($input);

			$cities = $this->doctor_registration_model->get_cities_by_state($state_id);
		
	        $resp = array('cities' => $cities);
                $this->output
                ->set_status_header(200)
                ->set_content_type('application/json', 'utf-8')
                ->set_output(json_encode($resp, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES))
                ->_display();
                exit;
	}//end of functrion get_cities

}//end of class