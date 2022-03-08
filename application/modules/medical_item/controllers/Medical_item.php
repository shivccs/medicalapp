<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Medical_item extends MX_Controller {

	function __construct() 
		{
			Parent::__construct();
		}

	public function index()
	{	

		
		$this->load->view('phar-units-vie=', $data);
			
	}//end of index



	public function new(){
		$this->load->model('pharmacy_units_model');
		$session_user_id = $this->session->userdata['sessiondata']['user_id'];
			$this->load->library('create_id');
		$unit		=		$this->input->post('unit');

		$check_unit = $this->pharmacy_units_model->check_unit(strtoupper($unit));
		if ($check_unit) {
			$this->session->set_flashdata('msg', 'This unit is already available!');
		    redirect(base_url().'template/pharmacy_units');
		}else{
			$data = array(
				'unit_name'				=>		strtoupper($unit),
				'status'						=>		1,
				'created_by'					=>		$session_user_id,
				'created_on'					=>		date('Y-m-d')
			);	

			$result = $this->pharmacy_units_model->register($data);

			if ($result) {
			$this->session->set_flashdata('msg', 'Unit successfully registerd!');
		        redirect(base_url().'template/pharmacy_units');
			}else{
				$this->session->set_flashdata('msg', 'Failed!');
		        redirect(base_url().'template/pharmacy_units');
			}//end of if else result
		}//end of if else check role

	}//end of function register


	
}//end of class