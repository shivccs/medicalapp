<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends MX_Controller {

	function __construct() 
		{
			Parent::__construct();
			$this->load->model('auth_model');
			$this->load->module('template');
			$this->load->library('session');
		}
	public function index()
	{	
		

			$msg = $this->session->flashdata('msg');

				if($msg)
				{
					$data = $msg;

					$this->load->view('auth-view',$data);
				}
				else{

					if(isset($this->session->userdata['sessiondata']['user_id'])  && $this->session->userdata['sessiondata']['is_active']==1 )
					{
						
							$mydata = $this->session->userdata['sessiondata'];
							
							$this->template->index($mydata);					

					}// end of ifloggedin check
					else
					{

						$this->session->sess_destroy();
						$data = array('msg' => '');
						$this->load->view('auth-view',$data);
						
					}


				}// end of msg null check if-else block
			
	}


	function login(){
		$this->load->model('auth_model');
		$email = $this->input->post('email');
		$password = $this->input->post('password');

		

		$user = $this->auth_model->verify_user($email, $password);


		if ($user)
				 {
				 			//var_dump('yes');exit;
				 			$this->auth_model->update_login_count($user->user_id);
				 			//var_dump($user->first_name);exit;
							$data = array(
    										'user_id'		=>	$user->user_id,
    										'name'			=>	$user->first_name.' '.$user->last_name,
    										'is_active'		=>	$user->is_active,
    										'email'			=>	$user->email,
    										'user_type'		=>	$user->user_type,
    										'login_count'	=>	$user->login_count

    									);

							$sessiondata = $data;
							//var_dump($data);exit;
    						$this->session->set_userdata('sessiondata',$sessiondata);
    						redirect(base_url().'template');
				}else
					{
			    			$msg = array('msg' => 'Username or Password is wrong!');
							//$this->load->view('auth-view',$msg);

							$this->session->set_flashdata('msg', $msg);
			                redirect(base_url().'auth');
				

    				}// enf of else block for user exists 
			
	}//end of function login



	public function logout()
		{
			$this->session->sess_destroy();
			redirect('auth');

		}


}//end of class