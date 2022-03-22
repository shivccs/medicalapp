<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Registration extends MX_Controller {

	

	public function index()
	{	

		//$this->load->model('pharmacy_category_model');
		
		$this->load->view('registration-view');
			
	}//end of index

}