<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class surgery_list extends MX_Controller {

	function __construct() 
		{
			Parent::__construct();
		}

	public function index()
	{	

		$this->load->model('doctors_list_model');
		$user_id = $this->session->userdata['sessiondata']['user_id'];
		
		$doctors_data = $this->doctors_list_model->get_doctors_data();

		$data = array(
			'doctors_data'		=>		$doctors_data
		);
		$this->load->view('doc-list-view', $data);
			
	}//end of index

		public function delete()
		{
			 $this->load->model('doctors_list_model');
			  $id=$this->uri->segment(3);
		     $rec=$this->doctors_list_model->delete_data('allergy_id',$id,'allergies');
			
			 redirect(base_url().'template/allergy_list/');
			
			}//end of function find_user


}//end of class