<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Doctor_edit extends MX_Controller {

	function __construct() 
		{
			Parent::__construct();
		}

	
	
	public function edit(){
		$this->load->model('doctor_profile_model');
		$session_user_id = $this->session->userdata['sessiondata']['user_id'];
		$this->load->library('create_id');
       
	   
	    $doctor_id			=		$this->input->post('doctorid');
	
		$fname 			=		$this->input->post('fname');
		$lname 			=		$this->input->post('lname');
		$fathername		=		$this->input->post('fathername');
		$gender 		=		$this->input->post('gender');
		$email 			=		$this->input->post('email');
		$mobile			=		$this->input->post('mobile');
		$dob 			=		$this->input->post('dob');
		$category 		=		$this->input->post('category');
		$address		=		$this->input->post('address');
		$state			=		$this->input->post('state');
		$city			=		$this->input->post('city');
		$pincode		=		$this->input->post('pincode');
		$lat 			=		$this->input->post('lat');
		$long 			=		$this->input->post('long');


		$registration_no		=		$this->input->post('registration_no');
		$mc						=		$this->input->post('mc');
		$mc_year				=		$this->input->post('mc_year');
		$md						=		$this->input->post('md');
		$md_year 				=		$this->input->post('md_year');
		$md_college 			=		$this->input->post('md_college');
		$experience 			=		$this->input->post('experience');

		$specility 				=		$this->input->post('specility');

		if ($specility=='na') {
			$specility_val = null;
		}else{
			$specility_val = $specility;
		}

		


		

			$u_data = array(

				'category_id'			=>		$category,
				'speciality_id'			=>		$specility_val,
				'first_name'			=>		$fname,
				'last_name'				=>		$lname,
				'email'					=>		$email,
				'phone'					=>		$mobile,				
				'pwd'					=>		$mobile,
				
			);
			


			$ui_data = array(
				'father_name'			=>		$fathername,
				'gender'				=>		$gender,
				'dob'					=>		$dob,
				'address'				=>		$address,
				'state'					=>		$state,
				'city'					=>		$city,
				'pincode'				=>		$pincode,
				'latitude'				=>		$lat,
				'longitude'				=>		$long,
				'added_on'				=>		date('Y-m-d'),
				'added_by' 				=>		$session_user_id
			);

			$uf_data = array(
				'registration_no'		=>		$registration_no,		
				'medical_council'		=>		$mc,
				'certification_year'	=>		$mc_year,
				'medical_degree'		=>		$md,
				'passout_year'			=>		$md_year,
				'college_name'			=>		$md_college,
				'experience' 			=>		$experience,
				'added_on'				=>		date('Y-m-d'),
				'added_by' 				=>		$session_user_id
			);	


			$result = $this->doctor_profile_model->edit_user($u_data, $ui_data, $uf_data,$doctor_id);
            echo $result;
			if ($result) {
			$this->session->set_flashdata('msg', 'Doctor successfully Updated');
			  redirect(base_url().'template/doctor_profile');
			}else{
				$this->session->set_flashdata('msg', 'Failed!');
				  redirect(base_url().'template/doctor_profile');
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