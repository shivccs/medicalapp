<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class surgery_edit extends MX_Controller {

	function __construct() 
		{
			Parent::__construct();
		}

	public function index()
	{	

		
		$this->load->model('doctor_profile_model');
		  $session_user_id = $this->session->userdata['sessiondata']['user_id'];
		  
			$this->load->library('create_id');
	
		
         $id=$this->uri->segment(3);
		 $rec=$this->doctor_profile_model->get_specific_data('surgery_id',$id,'surgeries');
		 
		 

		$data = array(
			'rec'   =>   $rec,
   			
		);
		 	
		
		 $this->load->view('doc-info-view',$data);
			
	}//
	
	public function edit(){
		$this->load->model('doctor_profile_model');
		$session_user_id = $this->session->userdata['sessiondata']['user_id'];
		$this->load->library('create_id');
       
	   
	    $aid			=		$this->input->post('aid');
	
		$allergy 			=		$this->input->post('allergy');
	

		if (isset($_POST['flag'])) {
			$flag = 1;
		}else{
			$flag = 0;
		}

		


		

			$u_data = array(

				'allergy_name'			=>		$allergy,
				'status'			=>		$flag,
				
				
			);
			



			$result = $this->doctor_profile_model->edit_data('allergy_id',$aid,$u_data,'allergies');
            echo $result;
			if ($result) {
			$this->session->set_flashdata('msg', 'Allergy successfully Updated');
			  redirect(base_url().'template/allergy_edit/'.$aid);
			}else{
				$this->session->set_flashdata('msg', 'Failed!');
				  redirect(base_url().'template/allergy_edit/'.$aid);
			}

		}
public function image(){
		$this->load->model('doctor_profile_model');
		$session_user_id = $this->session->userdata['sessiondata']['user_id'];
		$this->load->library('create_id');
			$doctor			=		$this->input->post('doctor');
		   $path = '/var/www/html/dpapp/uploads/category/'.$doctor;
        
	        $doc_path='uploads/doctor/'.$doctor;
	  
	        $new_name = date('ymd') . time();
	         
	        if (!file_exists($doc_path)) {
		        mkdir($doc_path, 0755, true);
		    }

	        $config['upload_path']          = $doc_path;
	        $config['allowed_types']        = 'jpg|jpeg|png|JPG|JPEG|PNG';
	        
	        $config['file_name']            = $new_name;	            

	        $this->load->library('upload', $config);

	        if(!$this->upload->do_upload('file'))
	        {
	        
	        $this->session->set_flashdata('msg', $this->upload->display_errors());
			$eror = $this->upload->display_errors;
			//print_r($eror);
	       redirect('template/doctor_profile');
	       
	        }
			else{
	                                             
	            $updoc_details = $this->upload->data();

	            $idata = array(
	            	'ref_id'			=>	$doctor,
					'path'				=>	$doc_path,
					'file_name'			=>	$updoc_details['file_name'],
					'upload_on'			=>	date('Y-m-d h:m:s'),
					'upload_by'			=>	$session_user_id
	            );

	                
	            $result = $this->doctor_profile_model->register($idata);

				if ($result) {
				$this->session->set_flashdata('msg', 'Image successfully added!');
				//echo "no eror";
			        redirect(base_url().'template/doctor_profile');
				}else{
					$this->session->set_flashdata('msg', 'Failed!');
					echo "eror";
			        redirect(base_url().'template/doctor_profile');
				}//end of if else result
	               
	           // redirect('template/transport_info');
			}
		
}
	



	

}//end of class