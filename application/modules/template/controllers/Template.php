<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Template extends MX_Controller {

	function __construct()
    {
        parent::__construct();
    }

	public function index()
	{	

		if(isset($this->session->userdata['sessiondata']['user_id'])  && ($this->session->userdata['sessiondata']['is_active']==1) && ($this->session->userdata['sessiondata']['user_type']==1)){
					
					$data = array('module' => 'admin_dashboard');	
					$this->load->view('template-view', $data);
		}else{
					$this->load->module('auth');
					$this->auth->logout();
			}//end of else to check login session detail
			
	}//end of index funtion 


	function change_password(){
		$user_id = $this->session->userdata['sessiondata']['user_id'];

		$this->load->model('template_model');

		$input = urldecode(file_get_contents('php://input'));

		$received = json_decode($input, true);
		
		$data = array();

	
		foreach($received as $value)
		{
			$data[$value['name']] = $value['value'];
		}

		if ($data['new_pass']==$data['new_pass_two']) {
			$up_data = array(
				'pwd'	=>	$data['new_pass']
			);

			$result = $this->template_model->update_password($up_data, $user_id);

			$resp = $result;
		}else{
			$resp = false;
		}

			$this->output
	                ->set_status_header(200)
	                ->set_content_type('application/json', 'utf-8')
	                ->set_output(json_encode($resp, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES))
	                ->_display();
	                exit;
	}//end of function 

	/* ------------------------------------Admin modules ------------------------------------- */

	public function user_role()
	{	

		if(isset($this->session->userdata['sessiondata']['user_id'])  && ($this->session->userdata['sessiondata']['is_active']==1) && ($this->session->userdata['sessiondata']['user_type']==1)){
					
					$data = array('module' => 'user_role');	
					$this->load->view('template-view', $data);
		}else{
					$this->load->module('auth');
					$this->auth->logout();
			}//end of else to check login session detail
			
	}//end of user_role funtion

	public function user_registration()
	{	

		if(isset($this->session->userdata['sessiondata']['user_id'])  && ($this->session->userdata['sessiondata']['is_active']==1) && ($this->session->userdata['sessiondata']['user_type']==1)){
					
					$data = array('module' => 'user_registration');	
					$this->load->view('template-view', $data);
		}else{
					$this->load->module('auth');
					$this->auth->logout();
			}//end of else to check login session detail
			
	}//end of user_registration funtion

	public function users_list()
	{	

		if(isset($this->session->userdata['sessiondata']['user_id'])  && ($this->session->userdata['sessiondata']['is_active']==1) && ($this->session->userdata['sessiondata']['user_type']==1)){
					
					$data = array('module' => 'users_list');	
					$this->load->view('template-view', $data);
		}else{
					$this->load->module('auth');
					$this->auth->logout();
			}//end of else to check login session detail
			
	}//end of users_list funtion 


	public function user_info()
	{	

		if(isset($this->session->userdata['sessiondata']['user_id'])  && ($this->session->userdata['sessiondata']['is_active']==1) && ($this->session->userdata['sessiondata']['user_type']==1)){
					
					$data = array('module' => 'user_info');	
					$this->load->view('template-view', $data);
		}else{
					$this->load->module('auth');
					$this->auth->logout();
			}//end of else to check login session detail
			
	}//end of user_info funtion


	//-----------------------------------------------Pharmacy Panels ----------------------
	public function pharmacy_manufacturer()
	{	

		if(isset($this->session->userdata['sessiondata']['user_id'])  && ($this->session->userdata['sessiondata']['is_active']==1) && ($this->session->userdata['sessiondata']['user_type']==1)){
					
					$data = array('module' => 'pharmacy_manufacturer');	
					$this->load->view('template-view', $data);
		}else{
					$this->load->module('auth');
					$this->auth->logout();
			}//end of else to check login session detail
			
	}//end of pharmacy_manufacturer funtion

	public function pharmacy_units()
	{	

		if(isset($this->session->userdata['sessiondata']['user_id'])  && ($this->session->userdata['sessiondata']['is_active']==1) && ($this->session->userdata['sessiondata']['user_type']==1)){
					
					$data = array('module' => 'pharmacy_units');	
					$this->load->view('template-view', $data);
		}else{
					$this->load->module('auth');
					$this->auth->logout();
			}//end of else to check login session detail
			
	}//end of pharmacy_units funtion

	public function pharmacy_category()
	{	

		if(isset($this->session->userdata['sessiondata']['user_id'])  && ($this->session->userdata['sessiondata']['is_active']==1) && ($this->session->userdata['sessiondata']['user_type']==1)){
					
					$data = array('module' => 'pharmacy_category');	
					$this->load->view('template-view', $data);
		}else{
					$this->load->module('auth');
					$this->auth->logout();
			}//end of else to check login session detail
			
	}//end of pharmacy_category funtion


	public function pharmacy_leaf()
	{	

		if(isset($this->session->userdata['sessiondata']['user_id'])  && ($this->session->userdata['sessiondata']['is_active']==1) && ($this->session->userdata['sessiondata']['user_type']==1)){
					
					$data = array('module' => 'pharmacy_leaf');	
					$this->load->view('template-view', $data);
		}else{
					$this->load->module('auth');
					$this->auth->logout();
			}//end of else to check login session detail
			
	}//end of pharmacy_leaf funtion


	public function medical_entry()
	{	

		if(isset($this->session->userdata['sessiondata']['user_id'])  && ($this->session->userdata['sessiondata']['is_active']==1) && ($this->session->userdata['sessiondata']['user_type']==1)){
					
					$data = array('module' => 'medical_entry');	
					$this->load->view('template-view', $data);
		}else{
					$this->load->module('auth');
					$this->auth->logout();
			}//end of else to check login session detail
			
	}//end of medical_entry funtion
	
	public function items()
	{	

		if(isset($this->session->userdata['sessiondata']['user_id'])  && ($this->session->userdata['sessiondata']['is_active']==1) && ($this->session->userdata['sessiondata']['user_type']==1)){
					
					$data = array('module' => 'items');	
					$this->load->view('template-view', $data);
		}else{
					$this->load->module('auth');
					$this->auth->logout();
			}//end of else to check login session detail
			
	}


	public function inward_supply()
	{	

		if(isset($this->session->userdata['sessiondata']['user_id'])  && ($this->session->userdata['sessiondata']['is_active']==1) && ($this->session->userdata['sessiondata']['user_type']==1)){
					
					$data = array('module' => 'inward_supply');	
					$this->load->view('template-view', $data);
		}else{
					$this->load->module('auth');
					$this->auth->logout();
			}//end of else to check login session detail
			
	}//end of inward_supply funtion

	//-----------------------------------------------Doctors Panels ----------------------

	public function doctors_category()
	{	

		if(isset($this->session->userdata['sessiondata']['user_id'])  && ($this->session->userdata['sessiondata']['is_active']==1) && ($this->session->userdata['sessiondata']['user_type']==1)){
					
					$data = array('module' => 'doctors_category');	
					$this->load->view('template-view', $data);
		}else{
					$this->load->module('auth');
					$this->auth->logout();
			}//end of else to check login session detail
			
	}//end of doctors_category funtion

	public function doctors_speciality()
	{	

		if(isset($this->session->userdata['sessiondata']['user_id'])  && ($this->session->userdata['sessiondata']['is_active']==1) && ($this->session->userdata['sessiondata']['user_type']==1)){
					
					$data = array('module' => 'doctors_speciality');	
					$this->load->view('template-view', $data);
		}else{
					$this->load->module('auth');
					$this->auth->logout();
			}//end of else to check login session detail
			
	}//end of doctors_speciality funtion

	public function doctor_registration()
	{	

		if(isset($this->session->userdata['sessiondata']['user_id'])  && ($this->session->userdata['sessiondata']['is_active']==1) && ($this->session->userdata['sessiondata']['user_type']==1)){
					
					$data = array('module' => 'doctor_registration');	
					$this->load->view('template-view', $data);
		}else{
					$this->load->module('auth');
					$this->auth->logout();
			}//end of else to check login session detail
			
	}//end of doctor_registration funtion

	public function doctors_list()
	{	

		if(isset($this->session->userdata['sessiondata']['user_id'])  && ($this->session->userdata['sessiondata']['is_active']==1) && ($this->session->userdata['sessiondata']['user_type']==1)){
					
					$data = array('module' => 'doctors_list');	
					$this->load->view('template-view', $data);
		}else{
					$this->load->module('auth');
					$this->auth->logout();
			}//end of else to check login session detail
			
	}//end of doctors_list funtion

	public function doctor_profile()
	{	

		if(isset($this->session->userdata['sessiondata']['user_id'])  && ($this->session->userdata['sessiondata']['is_active']==1) && ($this->session->userdata['sessiondata']['user_type']==1)){
					
					$data = array('module' => 'doctor_profile');	
					$this->load->view('template-view', $data);
		}else{
					$this->load->module('auth');
					$this->auth->logout();
			}//end of else to check login session detail
			
	}//end of doctor_profile funtion
	public function item_edit()
	{	

		if(isset($this->session->userdata['sessiondata']['user_id'])  && ($this->session->userdata['sessiondata']['is_active']==1) && ($this->session->userdata['sessiondata']['user_type']==1)){
					
					$data = array('module' => 'item_edit');	
					$this->load->view('template-view', $data);
		}else{
					$this->load->module('auth');
					$this->auth->logout();
			}//end of else to check login session detail
			
	}
	public function item_delete()
	{	

		if(isset($this->session->userdata['sessiondata']['user_id'])  && ($this->session->userdata['sessiondata']['is_active']==1) && ($this->session->userdata['sessiondata']['user_type']==1)){
					
					$data = array('module' => 'item_delete');	
					$this->load->view('template-view', $data);
		}else{
					$this->load->module('auth');
					$this->auth->logout();
			}//end of else to check login session detail
			
	}

public function patients()
	{	

		if(isset($this->session->userdata['sessiondata']['user_id'])  && ($this->session->userdata['sessiondata']['is_active']==1) && ($this->session->userdata['sessiondata']['user_type']==1)){
					
					$data = array('module' => 'patients');	
					$this->load->view('template-view', $data);
		}else{
					$this->load->module('auth');
					$this->auth->logout();
			}//end of else to check login session detail
			
	}
	public function patient_profile()
	{	

		if(isset($this->session->userdata['sessiondata']['user_id'])  && ($this->session->userdata['sessiondata']['is_active']==1) && ($this->session->userdata['sessiondata']['user_type']==1)){
					
					$data = array('module' => 'patient_profile');	
					$this->load->view('template-view', $data);
		}else{
					$this->load->module('auth');
					$this->auth->logout();
			}//end of else to check login session detail
			
	}
	public function allergy_list()
	{	

		if(isset($this->session->userdata['sessiondata']['user_id'])  && ($this->session->userdata['sessiondata']['is_active']==1) && ($this->session->userdata['sessiondata']['user_type']==1)){
					
					$data = array('module' => 'allergy_list');	
					$this->load->view('template-view', $data);
		}else{
					$this->load->module('auth');
					$this->auth->logout();
			}//end of else to check login session detail
			
	}
	
		public function add_allergy()
	{	

		if(isset($this->session->userdata['sessiondata']['user_id'])  && ($this->session->userdata['sessiondata']['is_active']==1) && ($this->session->userdata['sessiondata']['user_type']==1)){
					
					$data = array('module' => 'add_allergy');	
					$this->load->view('template-view', $data);
		}else{
					$this->load->module('auth');
					$this->auth->logout();
			}//end of else to check login session detail
			
	}
	
		public function allergy_edit()
	{	

		if(isset($this->session->userdata['sessiondata']['user_id'])  && ($this->session->userdata['sessiondata']['is_active']==1) && ($this->session->userdata['sessiondata']['user_type']==1)){
					
					$data = array('module' => 'allergy_edit');	
					$this->load->view('template-view', $data);
		}else{
					$this->load->module('auth');
					$this->auth->logout();
			}//end of else to check login session detail
			
	}
	public function allergy_delete()
	{	

		if(isset($this->session->userdata['sessiondata']['user_id'])  && ($this->session->userdata['sessiondata']['is_active']==1) && ($this->session->userdata['sessiondata']['user_type']==1)){
					
					$data = array('module' => 'allergy_delete');	
					$this->load->view('template-view', $data);
		}else{
					$this->load->module('auth');
					$this->auth->logout();
			}//end of else to check login session detail
			
	}
	
	
	public function disease_list()
	{	

		if(isset($this->session->userdata['sessiondata']['user_id'])  && ($this->session->userdata['sessiondata']['is_active']==1) && ($this->session->userdata['sessiondata']['user_type']==1)){
					
					$data = array('module' => 'disease_list');	
					$this->load->view('template-view', $data);
		}else{
					$this->load->module('auth');
					$this->auth->logout();
			}//end of else to check login session detail
			
	}
	
		public function add_disease()
	{	

		if(isset($this->session->userdata['sessiondata']['user_id'])  && ($this->session->userdata['sessiondata']['is_active']==1) && ($this->session->userdata['sessiondata']['user_type']==1)){
					
					$data = array('module' => 'add_disease');	
					$this->load->view('template-view', $data);
		}else{
					$this->load->module('auth');
					$this->auth->logout();
			}//end of else to check login session detail
			
	}
	
		public function disease_edit()
	{	

		if(isset($this->session->userdata['sessiondata']['user_id'])  && ($this->session->userdata['sessiondata']['is_active']==1) && ($this->session->userdata['sessiondata']['user_type']==1)){
					
					$data = array('module' => 'disease_edit');	
					$this->load->view('template-view', $data);
		}else{
					$this->load->module('auth');
					$this->auth->logout();
			}//end of else to check login session detail
			
	}
	public function disease_delete()
	{	

		if(isset($this->session->userdata['sessiondata']['user_id'])  && ($this->session->userdata['sessiondata']['is_active']==1) && ($this->session->userdata['sessiondata']['user_type']==1)){
					
					$data = array('module' => 'disease_delete');	
					$this->load->view('template-view', $data);
		}else{
					$this->load->module('auth');
					$this->auth->logout();
			}//end of else to check login session detail
			
	}
	
	public function symptoms_list()
	{	

		if(isset($this->session->userdata['sessiondata']['user_id'])  && ($this->session->userdata['sessiondata']['is_active']==1) && ($this->session->userdata['sessiondata']['user_type']==1)){
					
					$data = array('module' => 'symptoms_list');	
					$this->load->view('template-view', $data);
		}else{
					$this->load->module('auth');
					$this->auth->logout();
			}//end of else to check login session detail
			
	}
	
		public function add_symptoms()
	{	

		if(isset($this->session->userdata['sessiondata']['user_id'])  && ($this->session->userdata['sessiondata']['is_active']==1) && ($this->session->userdata['sessiondata']['user_type']==1)){
					
					$data = array('module' => 'add_symptoms');	
					$this->load->view('template-view', $data);
		}else{
					$this->load->module('auth');
					$this->auth->logout();
			}//end of else to check login session detail
			
	}
	
		public function symptoms_edit()
	{	

		if(isset($this->session->userdata['sessiondata']['user_id'])  && ($this->session->userdata['sessiondata']['is_active']==1) && ($this->session->userdata['sessiondata']['user_type']==1)){
					
					$data = array('module' => 'symptoms_edit');	
					$this->load->view('template-view', $data);
		}else{
					$this->load->module('auth');
					$this->auth->logout();
			}//end of else to check login session detail
			
	}
	public function symptoms_delete()
	{	

		if(isset($this->session->userdata['sessiondata']['user_id'])  && ($this->session->userdata['sessiondata']['is_active']==1) && ($this->session->userdata['sessiondata']['user_type']==1)){
					
					$data = array('module' => 'symptoms_delete');	
					$this->load->view('template-view', $data);
		}else{
					$this->load->module('auth');
					$this->auth->logout();
			}//end of else to check login session detail
			
	}
	public function surgery_list()
	{	

		if(isset($this->session->userdata['sessiondata']['user_id'])  && ($this->session->userdata['sessiondata']['is_active']==1) && ($this->session->userdata['sessiondata']['user_type']==1)){
					
					$data = array('module' => 'surgery_list');	
					$this->load->view('template-view', $data);
		}else{
					$this->load->module('auth');
					$this->auth->logout();
			}//end of else to check login session detail
			
	}
	
		public function add_surgery()
	{	

		if(isset($this->session->userdata['sessiondata']['user_id'])  && ($this->session->userdata['sessiondata']['is_active']==1) && ($this->session->userdata['sessiondata']['user_type']==1)){
					
					$data = array('module' => 'add_surgery');	
					$this->load->view('template-view', $data);
		}else{
					$this->load->module('auth');
					$this->auth->logout();
			}//end of else to check login session detail
			
	}
	
		public function surgery_edit()
	{	

		if(isset($this->session->userdata['sessiondata']['user_id'])  && ($this->session->userdata['sessiondata']['is_active']==1) && ($this->session->userdata['sessiondata']['user_type']==1)){
					
					$data = array('module' => 'surgery_edit');	
					$this->load->view('template-view', $data);
		}else{
					$this->load->module('auth');
					$this->auth->logout();
			}//end of else to check login session detail
			
	}
	public function surgery_delete()
	{	

		if(isset($this->session->userdata['sessiondata']['user_id'])  && ($this->session->userdata['sessiondata']['is_active']==1) && ($this->session->userdata['sessiondata']['user_type']==1)){
					
					$data = array('module' => 'surgery_delete');	
					$this->load->view('template-view', $data);
		}else{
					$this->load->module('auth');
					$this->auth->logout();
			}//end of else to check login session detail
			
	}
	public function category_edit()
	{	

		if(isset($this->session->userdata['sessiondata']['user_id'])  && ($this->session->userdata['sessiondata']['is_active']==1) && ($this->session->userdata['sessiondata']['user_type']==1)){
					
					$data = array('module' => 'category_edit');	
					$this->load->view('template-view', $data);
		}else{
					$this->load->module('auth');
					$this->auth->logout();
			}//end of else to check login session detail
			
	}


	public function doctors_availbility()
	{	

		if(isset($this->session->userdata['sessiondata']['user_id'])  && ($this->session->userdata['sessiondata']['is_active']==1) && ($this->session->userdata['sessiondata']['user_type']==1)){
					
					$data = array('module' => 'doctors_availbility');	
					$this->load->view('template-view', $data);
		}else{
					$this->load->module('auth');
					$this->auth->logout();
			}//end of else doctors_availbility
			
	}

}//end of function fuelstation 