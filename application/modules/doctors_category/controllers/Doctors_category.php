<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Doctors_category extends MX_Controller {

	function __construct() 
		{
			Parent::__construct();
		}

	public function index()
	{	

		$this->load->model('doctors_category_model');
		$user_id = $this->session->userdata['sessiondata']['user_id'];
		$units = $this->doctors_category_model->get_category();
		//var_dump($doctors_categorys);exit;
		$data = array(
			'units'		=>	$units
		);
		$this->load->view('doc-cat-view', $data);
			
	}//end of index



	public function new(){
		$this->load->model('doctors_category_model');
		$session_user_id = $this->session->userdata['sessiondata']['user_id'];
		$this->load->library('create_id');
		$category		=		$this->input->post('category');
		$info			=		$this->input->post('info');

		$check_category = $this->doctors_category_model->check_category(strtoupper($category));



		if ($check_category) {
			$this->session->set_flashdata('msg', 'This category is already available!');
		    redirect(base_url().'template/doctors_category');
		}else{
			$cat_id = $this->create_id->construct_id('DCI');
			$cdata = array(
				'doctor_category_id'			=>		$cat_id,
				'category_name'					=>		strtoupper($category),
				'info'							=>		$info,
				'status'						=>		1,
				'created_by'					=>		$session_user_id,
				'created_on'					=>		date('Y-m-d')
			);	



			$path = '/var/www/html/dpapp/uploads/category/'.$cat_id;
        
	        $doc_path='uploads/category/'.$cat_id;
	  
	        $new_name = date('ymd') . time();
	         
	        if (!file_exists($path)) {
		        mkdir($path, 0755, true);
		    }

	        $config['upload_path']          = $path;
	        $config['allowed_types']        = 'jpg|jpeg|png';
	        $config['max_size']             = 2048;
	        $config['max_width']            = 1800;
	        $config['max_height']           = 1800;
	        $config['file_name']            = $new_name;	            

	        $this->load->library('upload', $config);

	        if(!$this->upload->do_upload('category_img'))
	        {
	        
	        $this->session->set_flashdata('msg', $this->upload->display_errors());
	        redirect('template/doctors_category');
	       
	        }else{
	                                             
	            $updoc_details = $this->upload->data();

	            $idata = array(
	            	'ref_id'			=>	$cat_id,
					'path'				=>	$doc_path,
					'file_name'			=>	$updoc_details['file_name'],
					'upload_on'			=>	date('Y-m-d h:m:s'),
					'upload_by'			=>	$session_user_id
	            );

	                
	            $result = $this->doctors_category_model->register($idata, $cdata);

				if ($result) {
				$this->session->set_flashdata('msg', 'Category successfully added!');
			        redirect(base_url().'template/doctors_category');
				}else{
					$this->session->set_flashdata('msg', 'Failed!');
			        redirect(base_url().'template/doctors_category');
				}//end of if else result
	               
	            redirect('template/transport_info');
			}//end of if else inner			
		}//end of if else check role

	}//end of function register


	
}//end of class