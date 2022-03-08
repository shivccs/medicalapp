<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pharmacy_category extends MX_Controller {

	function __construct() 
		{
			Parent::__construct();
		}

	public function index()
	{	

		$this->load->model('pharmacy_category_model');
		$user_id = $this->session->userdata['sessiondata']['user_id'];
		$units = $this->pharmacy_category_model->get_category();
		//var_dump($pharmacy_categorys);exit;
		$data = array(
			'units'		=>	$units
		);
		$this->load->view('phar-cat-view', $data);
			
	}//end of index



	public function new(){
		$this->load->model('pharmacy_category_model');
		$session_user_id = $this->session->userdata['sessiondata']['user_id'];
			$this->load->library('create_id');
		$category		=		$this->input->post('category');

		$check_unit = $this->pharmacy_category_model->check_category(strtoupper($category));
		if ($check_unit) {
			$this->session->set_flashdata('msg', 'This category is already available!');
		    redirect(base_url().'template/pharmacy_category');
		}else{
			$data = array(
				'category_name'					=>		strtoupper($category),
				'status'						=>		1,
				'created_by'					=>		$session_user_id,
				'created_on'					=>		date('Y-m-d')
			);	

			$result = $this->pharmacy_category_model->register($data);

			if ($result) {
			$this->session->set_flashdata('msg', 'Category successfully registerd!');
		        redirect(base_url().'template/pharmacy_category');
			}else{
				$this->session->set_flashdata('msg', 'Failed!');
		        redirect(base_url().'template/pharmacy_category');
			}//end of if else result
		}//end of if else check role

	}//end of function register


	
}//end of class