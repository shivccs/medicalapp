<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Patient_profile extends MX_Controller {

	function __construct() 
		{
			Parent::__construct();
		}

	public function index()
	{	
		if ($this->session->tempdata('temp_doc_id')!=null) {
			$this->load->model('patient_profile_model');
			
			
			$temp_doc_id = $this->session->tempdata('temp_doc_id');
            
			$doc_data = $this->patient_profile_model->get_patient_data($temp_doc_id);
			$doc_img = $this->patient_profile_model->get_patient_img($temp_doc_id);
			//print_r($doc_data);
			$allergy = $this->patient_profile_model->get_allergy($temp_doc_id);
			$cronic = $this->patient_profile_model->get_cronic($temp_doc_id);
			$surgery = $this->patient_profile_model->get_surgery($temp_doc_id);
			$symptom = $this->patient_profile_model->get_symptom($temp_doc_id);
			$p_record = $this->patient_profile_model->get_record($temp_doc_id);
			$consult = $this->patient_profile_model->get_consult($temp_doc_id);
			$style = $this->patient_profile_model->get_style($temp_doc_id);
			
         
			$data = array(
				'doc_data'		=>		$doc_data,
				'doc_img'		=>		$doc_img,
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