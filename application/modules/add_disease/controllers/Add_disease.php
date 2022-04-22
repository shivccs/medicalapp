<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Add_disease extends MX_Controller {

	function __construct() 
		{
			Parent::__construct();
		}

	public function index()
	{	

		$this->load->model('add_disease_model');
		$user_id = $this->session->userdata['sessiondata']['user_id'];
		$units = $this->add_disease_model->get_disease();
		//var_dump($add_disease);exit;
		$data = array(
			'units'		=>	$units
		);
		$this->load->view('add-disease-view', $data);
			
	}//end of index



	public function add(){
		$this->load->model('add_disease_model');
		$session_user_id = $this->session->userdata['sessiondata']['user_id'];
			$this->load->library('create_id');
		$disease_name		=		$this->input->post('disease_name');

		$check_unit = $this->add_disease_model->check_disease(strtoupper($disease_name));
		if ($check_unit) {
			$this->session->set_flashdata('msg', 'This disease is already available!');
		    redirect(base_url().'template/add_disease');
		}else{
			$data = array(
				'disease_name'					=>		strtoupper($disease_name),
				'status'						=>		1,
				'created_by'					=>		$session_user_id,
				'created_on'					=>		date('Y-m-d')
			);	

			$result = $this->add_disease_model->register($data);

			if ($result) {
			$this->session->set_flashdata('msg', 'Disease successfully registerd!');
		        redirect(base_url().'template/add_disease');
			}else{
				$this->session->set_flashdata('msg', 'Failed!');
		        redirect(base_url().'template/add_disease');
			}//end of if else result
		}//end of if else check role

	}//end of function register

	



	

}//end of class