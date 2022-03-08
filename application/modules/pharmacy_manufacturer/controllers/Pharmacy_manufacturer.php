<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pharmacy_manufacturer extends MX_Controller {

	function __construct() 
		{
			Parent::__construct();
		}

	public function index()
	{	

		$this->load->model('pharmacy_manufacturer_model');
		$user_id = $this->session->userdata['sessiondata']['user_id'];
		$manufacturers = $this->pharmacy_manufacturer_model->get_pharmacy_manufacturers();
		//var_dump($pharmacy_manufacturers);exit;
		$data = array(
			'manufacturers'		=>	$manufacturers
		);
		$this->load->view('phar-manu-view', $data);
			
	}//end of index



	public function new(){
		$this->load->model('pharmacy_manufacturer_model');
		$session_user_id = $this->session->userdata['sessiondata']['user_id'];
			$this->load->library('create_id');
		$manufacturer		=		$this->input->post('manufacturer');

		$check_role = $this->pharmacy_manufacturer_model->check_manufacturer(strtoupper($manufacturer));
		if ($check_role) {
			$this->session->set_flashdata('msg', 'This manufacturer is already available!');
		    redirect(base_url().'template/pharmacy_manufacturer');
		}else{
			$data = array(
				'manufacturer_name'				=>		strtoupper($manufacturer),
				'status'						=>		1,
				'created_by'					=>		$session_user_id,
				'created_on'					=>		date('Y-m-d')
			);	

			$result = $this->pharmacy_manufacturer_model->register($data);

			if ($result) {
			$this->session->set_flashdata('msg', 'Manufacturer successfully registerd!');
		        redirect(base_url().'template/pharmacy_manufacturer');
			}else{
				$this->session->set_flashdata('msg', 'Failed!');
		        redirect(base_url().'template/pharmacy_manufacturer');
			}//end of if else result
		}//end of if else check role

	}//end of function register


	
}//end of class