<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Doctor_profile extends MX_Controller {

	function __construct() 
		{
			Parent::__construct();
		}

	public function index()
	{	
		if ($this->session->tempdata('temp_doc_id')!=null) {
			$this->load->model('doctor_profile_model');
			$user_id = $this->session->userdata['sessiondata']['user_id'];
			
			$temp_doc_id = $this->session->tempdata('temp_doc_id');

			$doc_data = $this->doctor_profile_model->get_doctor_data($temp_doc_id);
			//print_r($doc_data);

			$doc_img = $this->doctor_profile_model->get_doctor_img($temp_doc_id);
			
			$category = $this->doctor_profile_model->get_category();
			$specility = $this->doctor_profile_model->get_specility();
			$states = $this->doctor_profile_model->get_indian_states();

			$mc = $this->doctor_profile_model->get_medical_council();
			$md = $this->doctor_profile_model->get_medical_degrees();
		    // print_r($doc_data);

			$data = array(
			'doc_data'		=>		$doc_data,
			'doc_img'		=>		$doc_img,
			'category'		=>		$category,
			'specility'		=>		$specility,
			'states'		=>		$states,
			'mc'			=>		$mc,
			'md'			=>		$md
			  
			);
			$this->load->view('doc-info2-view', $data);
		}else{
			 redirect(base_url().'template/doctors_list');
		}
		
			
	}//end of index
	
	public function profile_image()
	{
		$this->load->model('doctor_profile_model');
		$session_user_id = $this->session->userdata['sessiondata']['user_id'];
		$this->load->library('create_id');
		$doctor_id			=		$this->input->post('doctor_id');

		$user_image_data = $this->doctor_profile_model->get_doctor_img($doctor_id);

		$path = '/var/www/html/dpapp/uploads/profile_images/'.$doctor_id;
        
	    $doc_path='uploads/profile_images/'.$doctor_id;
	  
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
       
        }else{
	                                         
	            $updoc_details = $this->upload->data();

	            $idata = array(
	            	'ref_id'			=>	$doctor_id,
					'path'				=>	$doc_path,
					'file_name'			=>	$updoc_details['file_name'],
					'upload_on'			=>	date('Y-m-d h:m:s'),
					'upload_by'			=>	$session_user_id
	            );

	            if ($user_image_data) {	
	                	$path = $user_image_data['path'];
						$file_name = $user_image_data['file_name'];

						$file_status = $path.'/'.$file_name; 
				        if (file_exists($file_status)){
				            $del_status = unlink($file_status);
				            //var_dump($del_status);exit;
				           	if ($del_status) {
				           		
				           		$result = $this->doctor_profile_model->update_image_details($idata, $user_image_data);
				           		var_dump($result);exit; 
				           	}else{
				           		$this->session->set_flashdata('msg', 'failed to remove existing document!');
				           		redirect(base_url().'template/doctor_profile');
				           	}			            
				        }//end of if
	                	
                }else{
                	 $result = $this->doctor_profile_model->add_image_data($idata);
    
                }//end of if else check 

				if ($result) {
				$this->session->set_flashdata('msg', 'Image successfully added!');
			        redirect(base_url().'template/doctor_profile');
				}else{
					$this->session->set_flashdata('msg', 'Failed!');
			        redirect(base_url().'template/doctor_profile');
				}//end of if else result
	               
	           // redirect('template/transport_info');
		}
	}//end of function profile_image


	public function edit(){
		$this->load->model('doctor_profile_model');
		$session_user_id = $this->session->userdata['sessiondata']['user_id'];
		$this->load->library('create_id');
       
	   
	    $doctor_id			=		$this->input->post('doctorid');
	
		$fname 			=		$this->input->post('fname');
		$lname 			=		$this->input->post('lname');
		$cfee			=		$this->input->post('cfee');
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
				'consultation_fee'		=>		$cfee,
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

			//var_dump($doctor_id);exit;
			$result = $this->doctor_profile_model->edit_user($u_data, $ui_data, $uf_data,$doctor_id);
            //echo $result;
			if ($result) {
			$this->session->set_flashdata('msg', 'Doctor successfully Updated');
			  redirect(base_url().'template/doctor_profile');
			}else{
				$this->session->set_flashdata('msg', 'Failed!');
				  redirect(base_url().'template/doctor_profile');
			}

		}

	

}//end of class