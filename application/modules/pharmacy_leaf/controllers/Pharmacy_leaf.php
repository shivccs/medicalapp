<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pharmacy_leaf extends MX_Controller {

	function __construct() 
		{
			Parent::__construct();
		}

	public function index()
	{	

		$this->load->model('pharmacy_leaf_model');
		$user_id = $this->session->userdata['sessiondata']['user_id'];
		$leafs = $this->pharmacy_leaf_model->get_pharmacy_leaf();
		//var_dump($pharmacy_leafs);exit;
		$data = array(
			'leafs'		=>	$leafs
		);
		$this->load->view('phar-leaf-view', $data);
			
	}//end of index



	public function new(){
		$this->load->model('pharmacy_leaf_model');
		$session_user_id = $this->session->userdata['sessiondata']['user_id'];
			$this->load->library('create_id');
		$leaf_name			=		$this->input->post('leaf_name');
		$unit_val			=		$this->input->post('unit_val');

		
			$data = array(
				'leaf_name'						=>		strtoupper($leaf_name),
				'unit'							=>		$unit_val,
				'status'						=>		1,
				'created_by'					=>		$session_user_id,
				'created_on'					=>		date('Y-m-d')
			);	

			$result = $this->pharmacy_leaf_model->register($data);

			if ($result) {
			$this->session->set_flashdata('msg', 'Leaf successfully created!');
		        redirect(base_url().'template/pharmacy_leaf');
			}else{
				$this->session->set_flashdata('msg', 'Failed!');
		        redirect(base_url().'template/pharmacy_leaf');
			}//end of if else result

	}//end of function register


	
}//end of class