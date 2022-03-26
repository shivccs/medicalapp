<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Patient_profile extends MX_Controller {

	function __construct() 
		{
			Parent::__construct();
		}

	public function index()
	{	
		if ($this->session->tempdata('temp_patient_id')!=null) {
			$this->load->model('patient_profile_model');
			
			
			$temp_patient_id = $this->session->tempdata('temp_patient_id');
            
			$patient_data = $this->patient_profile_model->get_patient_data($temp_patient_id);
			$patient_img = $this->patient_profile_model->get_patient_img($temp_patient_id);
			//print_r($patient_data);
			$allergy = $this->patient_profile_model->get_allergy($temp_patient_id);
			$cronic = $this->patient_profile_model->get_cronic($temp_patient_id);
			$surgery = $this->patient_profile_model->get_surgery($temp_patient_id);
			$symptom = $this->patient_profile_model->get_symptom($temp_patient_id);
			$p_record = $this->patient_profile_model->get_record($temp_patient_id);
			$consult = $this->patient_profile_model->get_consult($temp_patient_id);
			$style = $this->patient_profile_model->get_style($temp_patient_id);
			
         
			$data = array(
				'patient_data'		=>		$patient_data,
				'patient_img'		=>		$patient_img,
				'allergy'		=>		$allergy,
				'cronic'		=>		$cronic,
				'surgery'		=>		$surgery,
				'symptom'		=>		$symptom,
				'p_data'		=>		$p_record,
				'consult'		=>		$consult,
				'style'		=>		$style,
				
			  
			);
			$this->load->view('patient-info-view', $data);
		}else{
			 redirect(base_url().'template/patient_list');
		}
		
			
	}//end of index
	
	public function save()
	{
		 echo "rohit";
	}



	

}//end of class