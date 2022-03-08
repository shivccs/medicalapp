<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Doctors_availbility extends MX_Controller {

	function __construct() 
		{
			Parent::__construct();
		}

	public function index()
	{	

		$this->load->model('doctors_availbility_model');
		$user_id = $this->session->userdata['sessiondata']['user_id'];
		$doctors = $this->doctors_availbility_model->get_doctors_list();
		$date = date('Y-m-d');
		$dayofweek = date('l', strtotime($date));

		$doctor_avail_data = $this->doctors_availbility_model->get_doctors__avail_list($dayofweek);


		$data = array(
			'doctors'			=>	$doctors, 
			'doctor_avail_data'	=>	$doctor_avail_data
		);
		
		$this->load->view('doc-avail-view', $data);
			
	}//end of index



	public function register(){
		$this->load->model('doctors_availbility_model');
			$session_user_id = $this->session->userdata['sessiondata']['user_id'];
		
			$doctor_id		=		$this->input->post('doctor_id');
			$status			=		$this->input->post('status');
			$date 			= 		date('Y-m-d');
			$dayofweek 		= 		date('l', strtotime($date));

		   	$indata=array(
				'doctor_id' 		=> 		$doctor_id,
	        	'day'				=>		$dayofweek,
	       		'start'				=>		'09:00',
	       		'end'				=>		'05:00',
	       		'latitude'			=>		12345,
	       		'longitude'			=>		12345,
	       		'status'			=>		$status     
		    );

		    $updata=array(
	       		'start'				=>		'09:00',
	       		'end'				=>		'05:00',
	       		'latitude'			=>		12345,
	       		'longitude'			=>		12345,
	       		'status'			=>		$status       
		    );

		    $check_availibility = $this->doctors_availbility_model->check_doctor_availibity($doctor_id, $dayofweek);
		    //var_dump($check_availibility);exit;
		    if ($check_availibility) {
		    	$result = $this->doctors_availbility_model->set_doctor_availibity($doctor_id, $dayofweek, $indata, $updata, '1');
		    }else{
		    	$result = $this->doctors_availbility_model->set_doctor_availibity($doctor_id, $dayofweek, $indata, $updata, '2');
		    }//end of if else check availibity

			if ($result) {
				$this->session->set_flashdata('msg', 'Successfully setup');
		        redirect(base_url().'template/doctors_availbility');
			}else{
				$this->session->set_flashdata('msg', 'Failed!');
		        redirect(base_url().'template/doctors_availbility');
			}//end of if else result

	}//end of function register


	
}//end of class