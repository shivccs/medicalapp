<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MX_Controller {

	function __construct() 
		{
			Parent::__construct();
		}

	public function index()
	{	
		
		$this->load->view('home-view');
			
	}

}//end of class