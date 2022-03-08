<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class patient_profile extends MX_Controller {

	function __construct() 
		{
			Parent::__construct();
		}

	public function index()
	{	
		if ($this->session->tempdata('temp_doc_id')!=null) {
			$this->load->model('doctor_profile_model');
			
			
			$temp_doc_id = $this->session->tempdata('temp_doc_id');
            
			$doc_data = $this->doctor_profile_model->get_doctor_data($temp_doc_id);
			$doc_img = $this->doctor_profile_model->get_doctor_img($temp_doc_id);
			//print_r($doc_data);
			$allergy = $this->doctor_profile_model->get_allergy($temp_doc_id);
			$cronic = $this->doctor_profile_model->get_cronic($temp_doc_id);
			$surgery = $this->doctor_profile_model->get_surgery($temp_doc_id);
			$symptom = $this->doctor_profile_model->get_symptom($temp_doc_id);
			$p_record = $this->doctor_profile_model->get_record($temp_doc_id);
			$consult = $this->doctor_profile_model->get_consult($temp_doc_id);
			$style = $this->doctor_profile_model->get_style($temp_doc_id);
			
         
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
			$this->load->view('doc-info-view', $data);
		}else{
			 redirect(base_url().'template/patients');
		}
		
			
	}//end of index
	
	public function save()
	{
		 echo "rohit";
	}



	

}//end of class