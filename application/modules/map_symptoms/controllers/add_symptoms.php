<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class map_symptoms extends MX_Controller {

	function __construct() 
		{
			Parent::__construct();
		}

	public function index()
	{	

		
		$this->load->view('doc-info-view');
			
	}



	

}//end of class