<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_dashboard extends MX_Controller {

	function __construct() 
		{
			Parent::__construct();
		}

	public function index()
	{	

		$this->load->model('admin_dashboard_model');
		$user_id = $this->session->userdata['sessiondata']['user_id'];
		$ausers = $this->admin_dashboard_model->get_active_users();
		

		//var_dump($ausers);
		$data = array(
			'ausers'		=>		$ausers
		);

		$this->load->view('admin-dashboard-view', $data);
			
	}

}//end of class