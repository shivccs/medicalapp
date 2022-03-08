<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api extends MX_Controller {

	function __construct() 
		{
			Parent::__construct();
			$this->load->model('auth_model');
			$this->load->module('template');
			$this->load->library('session');
		}
	public function index()
	{	
		
			
	}
	
	
	


	public function affilate_doctorlogin(){
		    $this->load->model('auth_model');
		    $taskdata = json_decode(file_get_contents('php://input'),true);
			
			  
		     $email=$taskdata['email'];
			 $phone=$taskdata['phone'];
			
			
   		//var_dump($email);exit;
        if(empty($taskdata['email'])){
            $response['error_code']="1";
			$response['response_string']="Failed";
			$response['data']="";
        }
        else if(empty($taskdata['phone'])){
            $response['error_code']="1";
			$response['response_string']="Failed";
			$response['data']="";
        }else{
    		$email=$taskdata['email'];
    		$password=$taskdata['phone'];
    
    		$response['error_code']="1";
    		
            //exit;
			$doctor_type_val = 1;
    		$count=$this->auth_model->count_row_multiple('email',$email,'pwd',$password,'doctors', $doctor_type_val, 'doctor_type');
			//var_dump($count);exit;
			if($count>=1)
			{
				$data=$this->auth_model->get_specific_data('email',$email,'doctors');
				$lastcount=$this->auth_model->get_x('login_count','email',$email,'doctors');
				//$data[0]['user_type'] = 2;
				//var_dump($data[0]);exit;
				$user_data = array(
					'user_id'		=>	$data[0]->doctor_id,
					'user_type'		=>	3,
					'user_role'		=>	3,
					'category_id'	=>	$data[0]->category_id,
					'first_name'	=>	$data[0]->first_name,
					'last_name'		=>	$data[0]->last_name,
					'email'			=>	$data[0]->email,
					'password'		=>	$data[0]->pwd,
					'last_login'	=>	$data[0]->last_login,
					'login_count'	=>	$data[0]->login_count,
					'is_email_verify'	=>	$data[0]->is_email_verify,
					'is_mobile_verify'		=>	$data[0]->is_mobile_verify,
					'is_active'		=>		$data[0]->is_active,
					'created_on'	=> 		$data[0]->created_on
				);
				//var_dump($user_data);exit;


				if($lastcount==0){
					date_default_timezone_set("Asia/Kolkata");
					$date=date("d-m-y h:i:s");
					$data1=array(
					'last_login'=>$date,
					'login_count'=>1,
					'is_active'=>1,
					);
					$this->auth_model->edit_data('email',$email,$data1,'doctors');
				}else{
					$l1=$lastcount+1;
					date_default_timezone_set("Asia/Kolkata");
					$date=date("d-m-y h:i:s");
					$data1=array(
					'last_login'=>$date,
					'login_count'=>$l1,
					'is_active'=>1,
					);
					$this->auth_model->edit_data('email',$email,$data1,'doctors');
				}//end of if else last count
				//print_r($data);
				   	$response['error_code']="0";
			        $response['response_string']="User Found";
			        $response['userdata']=$user_data;			
			}else{
				$response['error_code']="1";
			    $response['response_string']="No User Found";
			    $response['id']="";
				
			}//end of if else to check credentialz
    	}//end of if else ladder

		header('Content-Type: application/json');
		echo json_encode($response);

	}//end of affilate_doctorlogin function 
	
	
	function affilate_doctor_profile(){
	    $this->load->model('auth_model');
		$taskdata = json_decode(file_get_contents('php://input'),true);
		$temp_doc_id=$taskdata['doctor_id'];
					   
			    // $data=$this->auth_model->get_specific_data('doctor_id',$doctor_id,'doctors');
		$data = $this->auth_model->get_affilate_profile($temp_doc_id);
		
		if($data){
				
			$response['error_code']="0";
			$response['response_string']="Doctor Found";
			$response['doctorRecord']=$data;
			
		}else{
			$response['error_code']="1";
			$response['response_string']="No Doctor Found";
			$response['doctorRecord']='';				
		}
			   
			   header('Content-Type: application/json');
		       echo json_encode($response);
			   
	}//end of function affilate_doctor_profile



	function update_affilate(){
	    $this->load->model('auth_model');
	    $taskdata = json_decode(file_get_contents('php://input'),true);
		$first 			=	$taskdata['first_name'];
		$middle 		=	$taskdata['middle_name'];
		$last 			=	$taskdata['last_name'];  
        $pwd 			=	$taskdata['pwd'];
		$father 		=	$taskdata['father'];
		$gender 		=	$taskdata['gender'];
		$dob 			=	$taskdata['dob'];
		$address 		=	$taskdata['address'];
		$city 			=	$taskdata['city'];
		$state 			=	$taskdata['state'];
		$latitude		=	$taskdata['latitude']; 
		$long 			=	$taskdata['longitude']; 
		$doctor_id 		=	$taskdata['doctor_id']; 


        $data=array(
			'first_name' 	=>	$first,
            'middle_name'	=>	$middle,
            'last_name'		=>	$last,
            'pwd'			=>	$pwd
        );
		
		$data1=array(
			'father_name'	=>	$father,
			'gender'		=>	$gender,
			'dob'			=>	$dob,
			'address'		=>	$address,
            'city'			=>	$city,
            'latitude'		=>	$latitude,
            'longitude'		=>	$long,
            'state'			=>	$state
        );
		
		$ins=$this->auth_model->edit_data('doctor_id',$doctor_id,$data,'doctors');
		$ins1=$this->auth_model->edit_data('doctor_id',$doctor_id,$data1,'doctor_info');
        if($ins1){
            $response['error_code']="0";
			$response['response_string']="Data Updated Successfully";
		}else{
            $response['error_code']="1";
			$response['response_string']="Eror In Updation Saved";
        }
        header('Content-Type: application/json');
		echo json_encode($response);
	
	}//end of function update_affilate


	function doctorlogin(){
		    $this->load->model('auth_model');
		    $taskdata = json_decode(file_get_contents('php://input'),true);		
			  
		     $email=$taskdata['email'];
			 $phone=$taskdata['phone'];			
   
        if(empty($taskdata['email'])){
            $response['error_code']="1";
			$response['response_string']="Failed";
			$response['data']="";
        }else if(empty($taskdata['phone'])){
            $response['error_code']="1";
			$response['response_string']="Failed";
			$response['data']="";
        }else{
    		$email=$taskdata['email'];
    		$password=$taskdata['phone'];
    
    		$response['error_code']="1";    		
            
			$doctor_type_val = 2;
    		$count=$this->auth_model->count_row_multiple('email',$email,'pwd',$password,'doctors', $doctor_type_val, 'doctor_type');
			
			if($count>=1)
			{
				$data=$this->auth_model->get_specific_data('email',$email,'doctors');
				//var_dump($data[0]->doctor_id);exit;
				$response['error_code']="0";
				$response['response_string']="Found";
				$response['userdata']=$data;
				$response['doctor_id']=$data[0]->doctor_id;			
			}else{
				$response['error_code']="1";
				$response['response_string']="User Email/Password incorrect";
				$response['userdata']=false;
				$response['doctor_id']=false;
			}//end of if else check doctor availibility    			
    		
        }//end of if else ladder

		header('Content-Type: application/json');
		echo json_encode($response);

	}//end of function doctor login


	function doctor_profile(){
        $this->load->model('auth_model');
	    $taskdata = json_decode(file_get_contents('php://input'),true);
		$temp_doc_id=$taskdata['doctor_id'];
	    //$data=$this->auth_model->get_specific_data('doctor_id',$doctor_id,'doctors');
		$data = $this->auth_model->get_doctor_complete_info($temp_doc_id);
		//print_r($data);exit;
		
		if($data){			
			$response['error_code']="0";
			$response['response_string']="Doctor Found";
			$response['doctorRecord']=$data;
		}else{
			$response['error_code']="1";
			$response['response_string']="No Doctor Found";
			$response['doctorRecord']='';		
		}//end of if else get profile data 
			   
		header('Content-Type: application/json');
	    echo json_encode($response);
			    
	}//end of function doctor_profile

	function doctor_profile_image(){
        $this->load->model('auth_model');
	    $taskdata = json_decode(file_get_contents('php://input'),true);
		$temp_doc_id=$taskdata['doctor_id'];
	    //$data=$this->auth_model->get_specific_data('doctor_id',$doctor_id,'doctors');
		$data = $this->auth_model->get_doctor_profile_image($temp_doc_id);
		//print_r($data);exit;
		
		if($data){			
			$response['error_code']="0";
			$response['response_string']="Doctor Found";
			$response['doctorRecord']=$data;
		}else{
			$response['error_code']="1";
			$response['response_string']="No Image Found";
			$response['doctorRecord']=array();		
		}//end of if else get profile data 
			   
		header('Content-Type: application/json');
	    echo json_encode($response);
			    
	}//end of function doctor_profile

	function upload_profile_image(){
        $this->load->model('auth_model');
	    $doctor_id			=		$this->input->post('doctor_id');

	    $this->load->model('auth_model');
		$session_user_id = 'API';
		$this->load->library('create_id');
		$doctor_id			=		$this->input->post('doctor_id');

		$user_image_data = $this->auth_model->get_doctor_profile_image($doctor_id);

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

        if(!$this->upload->do_upload('image_name'))
        {
        
	        
			$result = $this->upload->display_errors;
			
       		$response['error_code']="1";
			$response['response_string']=$result;
					   
				header('Content-Type: application/json');
			    echo json_encode($response);
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
				           		
				           		$result = $this->auth_model->update_image_details($idata, $user_image_data);
				           		 
				           	}else{
				           		$this->session->set_flashdata('msg', 'failed to remove existing document!');
				           		redirect(base_url().'template/doctor_profile');
				           	}			            
				        }//end of if
	                	
                }else{
                	 $result = $this->auth_model->add_image_data($idata);
    
                }//end of if else check 

				if($result){			
					$response['error_code']="0";
					$response['response_string']="Uploaded successfully";
				}else{
					$response['error_code']="1";
					$response['response_string']="Failed to upload";		
				}//end of if else get profile data 
					   
				header('Content-Type: application/json');
			    echo json_encode($response);
		}//end of if else


	}//end of function doctor_profile




	function set_doctor_availibity(){
		$this->load->model('auth_model');
       	$formdata 		= 		json_decode(file_get_contents('php://input'),true);
	   	$doctor_id 		=		$formdata['doctor_id'];
       	$day 			=		$formdata['day'];
	   	$start 			=		$formdata['start'];
	   	$end 			=		$formdata['end'];
	   	$latitude 		= 		$formdata['latitude'];
		$longitude  	= 		$formdata['longitude'];
		$status 		=		$formdata['status'];

	   	$indata=array(
			'doctor_id' 		=> 		$doctor_id,
        	'day'				=>		$day,
       		'start'				=>		$start,
       		'end'				=>		$end,
       		'latitude'			=>		$latitude,
       		'longitude'			=>		$longitude,
       		'status'			=>		$status     
	    );

	    $updata=array(
       		'start'				=>		$start,
       		'end'				=>		$end,
       		'latitude'			=>		$latitude,
       		'longitude'			=>		$longitude,
       		'status'			=>		$status      
	    );

	    $check_availibility = $this->auth_model->check_doctor_availibity($doctor_id, $day);
	    //var_dump($check_availibility);exit;
	    if ($check_availibility) {
	    	$result = $this->auth_model->set_doctor_availibity($doctor_id, $day, $indata, $updata, '1');
	    	if ($result) {
		    	$response['error_code']="0";
	            $response['response_string']="Aviability Updated!";
				$response['aviability_id']=$result;
		    }else{
		    	$response['error_code']="1";
	            $response['response_string']="Failed to update availibity! Contact Your administrator";
				$response['aviability_id']='';
		    }//end of if else
	    }else{
	    	$result = $this->auth_model->set_doctor_availibity($doctor_id, $day, $indata, $updata, '2');

		    if ($result) {
		    	$response['error_code']="0";
	            $response['response_string']="Aviability Inserted!";
				$response['aviability_id']=$result;
		    }else{
		    	$response['error_code']="1";
	            $response['response_string']="Failed to insert availibity! Contact Your administrator";
				$response['aviability_id']='';
		    }//end of if else
	    }//end of if else check availibity
	    


	    header('Content-Type: application/json');
		echo json_encode($response);
	}//end of fucntion set_doctor_availibity

	function check_patient_by_phone(){
	   	$this->load->model('auth_model');
       	$formdata = json_decode(file_get_contents('php://input'),true);
	   	$phone=$formdata['phone'];
		$mobileregex = "/^[6-9][0-9]{9}$/" ;  
		if (preg_match($mobileregex, $phone) === 1) {
			$result = $this->auth_model->check_patient_by_mobile($phone);

			if ($result) {
				$response['error_code']="0";
	            $response['response_string']="Old Patient";
				$response['data']=$result;
			}else{
				$response['error_code']="0";
	            $response['response_string']="New Patient";
				$response['data']=array();
			}//end of if else
		}else{
			$response['error_code']="1";
            $response['response_string']="Please input mobile number.";
			$response['data']=array();
		}//end of if else

		header('Content-Type: application/json');
		echo json_encode($response);
	}//end of function check_patient_by_phone 



	function register_patient(){
       $this->load->model('auth_model');
       $this->load->library('create_id');
       $formdata = json_decode(file_get_contents('php://input'),true);
       //var_dump($taskdata);exit;
       $doctor_id 			=			$formdata['doctor_id'];
       $patient_id 			= 			$this->create_id->construct_id('PID');
	   $name 				=			$formdata['name'];
       $email 				=			$formdata['email'];
	   $phone    			=			$formdata['phone'];
	   $dob 				=			$formdata['age'];
	   $gender 				=			$formdata['gender'];  
	   $maritial_status		=			$formdata['maritial_status'];
	   $height				=			$formdata['height'];
	   $weight				=			$formdata['weight'];
	   $blood_group			=			$formdata['blood_group']; 

	   $address 			= 			$formdata['address'];
	   $city 				= 			$formdata['city'];
	   $state    			= 			$formdata['state'];
	   $pincode    			= 			$formdata['pincode'];
	   $latitude 			= 			$formdata['latitude']; 
	   $longitude			= 			$formdata['longitude']; 
	   
	   	$presult = $this->auth_model->check_patient_by_mobile($phone);

	   	if ($presult) {
	   		$patient_data=array(
				'patient_name' 			=> 			$name,
               	'phone_number' 			=> 			$phone,
               	'email'					=>			$email,
               	'age'					=>			$dob,
               	'gender'				=>			$gender,
               	'maritial_status'		=>			$maritial_status,
               	'height'				=>			$height,
               	'weight'				=>			$weight,
               	'blood_group'			=>			$blood_group
			);

			$patient_address	=	array(
               	'address' 				=> 			$address,
               	'city'					=>			$city,
               	'state'					=>			$state,
               	'pincode'				=>			$pincode,
               	'latitude'				=>			$latitude,
               	'longitude'				=>			$longitude            
			    );

			$result = $this->auth_model->update_patient_data($patient_data, $patient_address, $presult['patient_id']);
			if ($result) {
				$response['error_code']="0";
	            $response['response_string']="Inserted successfully!";
				$response['patient_id']=$presult['patient_id'];
			}else{
				$response['error_code']="1";
	            $response['response_string']="Failed!";
				$response['patient_id']="";
			}//end of if else
	   	}else{
	   		$patient_data=array(
	   			'patient_id'			=>			$patient_id,
				'patient_name' 			=> 			$name,
               	'phone_number' 			=> 			$phone,
               	'email'					=>			$email,
               	'age'					=>			$dob,
               	'gender'				=>			$gender,
               	'maritial_status'		=>			$maritial_status,
               	'height'				=>			$height,
               	'weight'				=>			$weight,
               	'blood_group'			=>			$blood_group,
               	'is_email_verified'		=>			0,
               	'is_mobile_verified'	=>			0,
              	'created_by'			=>			$doctor_id,
               	'created_on'			=>			date('Y-m-d'),
               	'status'				=>			1
			);

			$patient_address	=	array(
				'patient_id' 			=> 			$patient_id,
               	'address' 				=> 			$address,
               	'city'					=>			$city,
               	'state'					=>			$state,
               	'pincode'				=>			$pincode,
               	'latitude'				=>			$latitude,
               	'longitude'				=>			$longitude,
               	'created_by'			=>			$doctor_id,
               	'created_on'			=>			date('Y-m-d'),              
			    );

			$result = $this->auth_model->insert_patient_data($patient_data, $patient_address);
			if ($result) {
				$response['error_code']="0";
	            $response['response_string']="Inserted successfully!";
				$response['patient_id']=$patient_id;
			}else{
				$response['error_code']="1";
	            $response['response_string']="Failed!";
				$response['patient_id']="";
			}//end of if else
	   	}//end of if else check available patient


	   	

		header('Content-Type: application/json');
		echo json_encode($response);
	}//end of register_patient


	function patient_profile(){
	        $this->load->model('auth_model');
		    $formdata = json_decode(file_get_contents('php://input'),true);
			$patient_id=$formdata['patient_id'];
			$pdata=$this->auth_model->get_patient_profile($patient_id);
			
			if($pdata){				
				$response['error_code']="0";
				$response['response_string']="Patient Found";
				$response['patient_data']=$pdata;			
			}else{
				$response['error_code']="1";
				$response['response_string']="No Patient Found";
				$response['patient_data']=array();				
			}//end of else
			   
		header('Content-Type: application/json');
		echo json_encode($response);
			   
	}//end of function patient_profile

	function add_new_consultation(){
	        $this->load->model('auth_model');
	       $this->load->library('create_id');
	       $formdata = json_decode(file_get_contents('php://input'),true);
	       
		   $patient_id 				=			$formdata['patient_id'];
	       $doctor_id 				=			$formdata['doctor_id'];
		   $bp    					=			$formdata['bp'];
		   $fever 					=			$formdata['fever'];
		   $oxygen 					=			$formdata['oxygen'];  
		   $symptoms				=			$formdata['symptoms'];
		   $disease					=			$formdata['disease'];
		   //var_dump($symptoms);exit;

		   if ($symptoms!=null) {
		   		$symptoms_data 			= 			json_encode($symptoms);
		   }else{
		   		$symptoms_data 			= 			null;
		   }

		   if ($disease!=null) {
		   		$disease_data 			= 			json_encode($disease);
		   }else{
		   		$disease_data 			= 			null;
		   }
		   

		   $record	=	array(
				'patient_id' 			=> 			$patient_id,
	           	'bp' 					=> 			$bp,
	           	'fever'					=>			$fever,
	           	'oxygen'				=>			$oxygen,
	           	'symptoms'				=>			$symptoms_data,
	           	'disease'				=>			$disease_data,
	           	'added_by'				=>			$doctor_id,
	           	'added_on'				=>			date('Y-m-d')            
		    );
		  // var_dump($record);exit;
		   $result = $this->auth_model->insert_consultation_record($record);
		   $insert_id = $this->db->insert_id();

			if($result){
				$record_data = $this->auth_model->get_consultation_record_by_id($insert_id);				
				$response['error_code']="0";
				$response['response_string']="Patient Found";
				$response['record_data']=$record_data;			
			}else{
				$response['error_code']="1";
				$response['response_string']="No Patient Found";
				$response['record_data']=$record;		
			}//end of else
			   
		header('Content-Type: application/json');
		echo json_encode($response);
			   
	}//end of function add_new_consultation

	function add_consultation_images(){
	    $this->load->model('auth_model');
	    $patient_id			=		$this->input->post('patient_id');
	    $doctor_id			=		$this->input->post('doctor_id');
	    $consultation_id	=		$this->input->post('consultation_id');
	    $doc_type			=		$this->input->post('doc_type');

		$path = '/var/www/html/dpapp/uploads/consultation/'.$patient_id.'/'.$consultation_id;
        
	    $doc_path='uploads/consultation/'.$patient_id.'/'.$consultation_id;
	  
	    $new_name = date('ymd') . time();
	         
        if (!file_exists($doc_path)) {
	        mkdir($doc_path, 0755, true);
	    }

        $config['upload_path']          = $doc_path;
        $config['allowed_types']        = 'jpg|jpeg|png|JPG|JPEG|PNG';
        
        $config['file_name']            = $new_name;	            

	    $this->load->library('upload', $config);

        if(!$this->upload->do_upload('image_name'))
        {
        
	        
			$result = $this->upload->display_errors;
			
       		$response['error_code']="1";
			$response['response_string']=$result;
					   
				header('Content-Type: application/json');
			    echo json_encode($response);
        }else{
	                                         
	            $updoc_details = $this->upload->data();

	            $idata = array(
	            	'patient_id'		=>	$patient_id,
	            	'consultation_id'	=>	$consultation_id,
	            	'record_type'		=>	$doc_type,
					'path'				=>	$doc_path,
					'file_name'			=>	$updoc_details['file_name'],
					'upload_on'			=>	date('Y-m-d h:m:s'),
					'upload_by'			=>	$doctor_id
	            );
	           	//var_dump($idata);exit;
	            $result = $this->auth_model->add_consultation_image_data($idata);
				
				if($result){			
					$response['error_code']="0";
					$response['response_string']="Uploaded successfully";
				}else{
					$response['error_code']="1";
					$response['response_string']="Failed to upload";		
				}//end of if else get profile data 
					   
				header('Content-Type: application/json');
			    echo json_encode($response);
		}//end of if else			   
	}//end of function add_new_consultation





	public function patient_image(){
		$this->load->model('auth_model');
		
		$this->load->library('upload');
			$doctor			=		$this->input->post('patient');
			$doctor_add			=		$this->input->post('doctor');
		   $path = '/var/www/html/dpapp/uploads/patient/'.$doctor;
        
	        $doc_path='uploads/patient/'.$doctor;
	  
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
	        
	      //  $this->session->set_flashdata('msg', $this->upload->display_errors());
			$eror = $this->upload->display_errors;
			print_r($eror);
	      // redirect('template/doctor_profile');
	       
	        }
			else{
	                                             
	            $updoc_details = $this->upload->data();

	            $idata = array(
	            	'ref_id'			=>	$doctor,
					'path'				=>	$doc_path,
					'file_name'			=>	$updoc_details['file_name'],
					'upload_on'			=>	date('Y-m-d h:m:s'),
					'upload_by'			=>	$doctor_add
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

function update_patient()
{
	            $this->load->model('auth_model');
		       $taskdata = json_decode(file_get_contents('php://input'),true);
			   $name=$taskdata['name'];
		       $dob=$taskdata['dob'];
			   $gender=$taskdata['gender'];  

			   $maritial_status=$taskdata['maritial_status'];
			   $height=$taskdata['height'];
			   $weight=$taskdata['weight'];
			   $blood_group=$taskdata['blood_group']; 

			   $address=$taskdata['address'];
			   $city=$taskdata['city'];
			   $state=$taskdata['state'];
			   $latitude=$taskdata['latitude']; 
			    $long=$taskdata['longitude']; 
			    $patient_id=$taskdata['patient_id']; 

			
			 
                    $data=array(
				'patient_name' => $name,
                'dob'=>$dob,
               'gender'=>$gender,
               'maritial_status'=>$maritial_status,
               'height'=>$height,
               'weight'=>$weight,
               'blood_group'=>$blood_group,
               'address'=>$address,
               'city'=>$city,
               'lat'=>$latitude,
               'longitude'=>$long,
               'state'=>$state,
               
			    );

                    	$ins=$this->auth_model->edit_data('patient_id ',$patient_id,$data,'patients');
                    	if($ins)
                    	{
                            $response['error_code']="0";
			                $response['response_string']="Data Updated Successfully";
			                

                    	}
                    	else
                    	{
                    		 $response['error_code']="1";
			                $response['response_string']="Eror In Updation Saved";
                    	}

             

       header('Content-Type: application/json');
		echo json_encode($response);



}






	 

	


	function get_allergies_list(){
		  $this->load->model('auth_model');
		    $taskdata = json_decode(file_get_contents('php://input'),true);
			$status=1;
			$data = $this->auth_model->get_specific_data('Status', $status,'allergies');
			if(!empty($data))
			{
				$response['error_code']="0";
			    $response['response_string']="Allergy Found";
			     $response['data']=$data;
			}
			else{
				$response['error_code']="1";
			    $response['response_string']="No Allergy Found";
			     $response['data']="";
			}
			 header('Content-Type: application/json');
		     echo json_encode($response);
		
		
	}
	
	function get_disease_list(){
		  $this->load->model('auth_model');
		    $taskdata = json_decode(file_get_contents('php://input'),true);
			$status=1;
			$data = $this->auth_model->get_specific_data('Status', $status,'disease');
			if(!empty($data))
			{
				$response['error_code']="0";
			    $response['response_string']="Disease Found";
			     $response['data']=$data;
			}
			else{
				$response['error_code']="1";
			    $response['response_string']="No Disease Found";
			     $response['data']="";
			}
			 header('Content-Type: application/json');
		     echo json_encode($response);
		
		
	}
	function get_surgery_list(){
		  $this->load->model('auth_model');
		    $taskdata = json_decode(file_get_contents('php://input'),true);
			$status=1;
			$data = $this->auth_model->get_specific_data('Status', $status,'surgeries');
			if(!empty($data))
			{
				$response['error_code']="0";
			    $response['response_string']="Surgery Found";
			     $response['data']=$data;
			}
			else{
				$response['error_code']="1";
			    $response['response_string']="No Surgery Found";
			     $response['data']="";
			}
			 header('Content-Type: application/json');
		     echo json_encode($response);
		
		
	}
	
	function doctor_aviability(){
		  $this->load->model('auth_model');
		    $taskdata = json_decode(file_get_contents('php://input'),true);
			$temp_doc_id=$taskdata['doctor_id'];
			$data = $this->auth_model->get_specific_data('doctor_id', $temp_doc_id,'doctor_aviability');
			if(!empty($data))
			{
				$response['error_code']="0";
			    $response['response_string']="Doctor Found";
			     $response['data']=$data;
			}
			else{
				$response['error_code']="1";
			    $response['response_string']="No Doctor Found";
			     $response['data']="";
			}
			 header('Content-Type: application/json');
		     echo json_encode($response);
		
		
	}
	

	function update_user_location(){
		$this->load->model('auth_model');
	    $formdata = json_decode(file_get_contents('php://input'),true);

		$user_id 		= 	$formdata['user_id'];
		$latitude 		= 	$formdata['latitude'];
		$longitude  	= 	$formdata['longitude'];

		$update_data = array(
			'latitude'		=>	$latitude,
			'longitude'		=>	$longitude
		);

		$user_status	=	$this->auth_model->checkdocuser($user_id);
		if ($user_status) {
			$update_status = $this->auth_model->update_doctor_location($user_id, $update_data);
			if ($update_status) {
				$response['error_code']="0";
		    	$response['response_string']="Location Updated!";
			}else{
				$response['error_code']="1";
		    	$response['response_string']="Failed to update location this time!";
			}//end of if else update status
		}else{
			$response['error_code']="1";
		    $response['response_string']="Missing doctor information data. Please contact administrator!";
		}//end of if else 

		header('Content-Type: application/json');
		echo json_encode($response);
	}//end of function update_doctor_location



	function patient_doctor_aviability(){
		  $this->load->model('auth_model');
		    $taskdata = json_decode(file_get_contents('php://input'),true);
		
			$latitude=$taskdata['latitude'];
			$longitude=$taskdata['longitude'];
			$offset=$taskdata['offset'];
			$limit=$taskdata['limit'];
			//$latitude   =28.5355;
			//$longitude= 77.3910;
			date_default_timezone_set("Asia/Kolkata");
           $created_at =  Date('Y-m-d');
		   $day = date('l', strtotime($created_at));
		   $doctors_list = $this->auth_model->get_available_doctors_list($day, $latitude, $longitude, $offset, $limit);
		   //var_dump($day);exit;
		   /*
			$data = $this->auth_model->getRawResult("SELECT *,doctors.*, (((acos(sin((".$latitude."*pi()/180)) * sin((`latitude`*pi()/180)) + cos((".$latitude."*pi()/180)) * cos((`latitude`*pi()/180)) * cos(((".$longitude."- `longitude`)*pi()/180)))) * 180/pi()) * 60 * 1.1515) as distance FROM `doctor_info`,doctor_aviability,doctors where doctor_aviability.day='$day' and doctor_info.doctor_id=doctor_aviability.doctor_id and doctors.doctor_id=doctor_info.doctor_id and CURTIME() >= doctor_aviability.start AND CURTIME() < doctor_aviability.end order by distance asc");
			*/
			if($doctors_list)
			{
				$response['error_code']="0";
			    $response['response_string']="Doctor Found";
			     $response['data']=$doctors_list;
			}
			else{
				$response['error_code']="1";
			    $response['response_string']="No Doctor Found";
			     $response['data']=array();
			}
		
		header('Content-Type: application/json');
		echo json_encode($response);
		
	}
	function doctor_profile_edit(){
		    $this->load->model('auth_model');
		    $taskdata = json_decode(file_get_contents('php://input'),true);
			$this->load->library('form_validation');
			
		$doctor_id			=		$this->input->post('doctorid');
	    $fname 			=		$this->input->post('fname');
		$lname 			=		$this->input->post('lname');
		$fathername		=		$this->input->post('fathername');
		$gender 		=		$this->input->post('gender');
		
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
			$this->form_validation->set_rules('doctorid', 'Doctorid', 'required'); 
			$this->form_validation->set_rules('fname', 'Fname', 'required'); 
			$this->form_validation->set_rules('lname', 'Lname', 'required'); 
			$this->form_validation->set_rules('fathername', 'Fathername', 'required'); 
			
			$this->form_validation->set_rules('gender', 'Gender', 'required'); 
			$this->form_validation->set_rules('dob', 'Dob', 'required'); 
			$this->form_validation->set_rules('category', 'Category', 'required'); 
			$this->form_validation->set_rules('address', 'Address', 'required');
			
			$this->form_validation->set_rules('state', 'State', 'required'); 
			$this->form_validation->set_rules('city', 'City', 'required'); 
			$this->form_validation->set_rules('pincode', 'Pincode', 'required'); 
			$this->form_validation->set_rules('lat', 'Lat', 'required');
			$this->form_validation->set_rules('long', 'Long', 'required');
			
			$this->form_validation->set_rules('registration_no', 'Registration_no', 'required'); 
			$this->form_validation->set_rules('mc', 'Mc', 'required'); 
			$this->form_validation->set_rules('mc_year', 'Mc_Year', 'required'); 
			$this->form_validation->set_rules('md', 'Md', 'required');
			$this->form_validation->set_rules('md_year', 'Md_year', 'required');
			$this->form_validation->set_rules('md_college', 'Md_college', 'required');
			$this->form_validation->set_rules('experience', 'Experience', 'required');
			
			if ($this->form_validation->run() == FALSE) { 
            // $this->load->view('myform'); 
			//echo "fail";
			 $response['error_code']="1";
			$response['response_string']="All Fields Are Not Filled";
			$response['data']="";
             } 
		  else { 
            
			
			$u_data = array(

				'category_id'			=>		$category,
				'speciality_id'			=>		$specility_val,
				'first_name'			=>		$fname,
				'last_name'				=>		$lname
				
				
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


			$result = $this->auth_model->edit_user1($u_data, $ui_data, $uf_data,$doctor_id);
			if($result)
			{
				$response['error_code']="0";
			    $response['response_string']="Record Updated Successfully";
			    $response['data']="";
			}
			else{
				$response['error_code']="1";
			    $response['response_string']="Eror In Updation";
			    $response['data']="";
			}
         } 
		 
        header('Content-Type: application/json');
		echo json_encode($response);


	}
	
	function doctor_appointment(){
		    $this->load->model('auth_model');
		    $taskdata = json_decode(file_get_contents('php://input'),true);
			$doctor_id=$taskdata['doctor_id'];
			$patient_id=$taskdata['patient_id'];
			$date=$taskdata['date'];
			$time=$taskdata['time'];
			$status=$taskdata['status'];
		  
            
			
			$data = array(

				'doctor_id'			=>		$doctor_id,
				'patient_id'			=>		$patient_id,
				'date'			=>		$date,
				'time'				=>		$time,
				'status'   => $status
				
				
			);
			



			$result = $this->auth_model->insert_data('doctor_appointment', $data);
			if($result)
			{
				$response['error_code']="0";
			    $response['response_string']="Appointmaent Added Successfully";
			    $response['Appointment_Id']=$result;
			}
			else{
				$response['error_code']="1";
			    $response['response_string']="Eror In Adding Appointment";
			    $response['data']="";
			}
         
		 
        header('Content-Type: application/json');
		echo json_encode($response);


	}
	
	function add_patient_symptoms(){
		    $this->load->model('auth_model');
		    $taskdata = json_decode(file_get_contents('php://input'),true);
			
			
		   $symptoms=$taskdata['symptoms'];
		   $patient_id=$taskdata['patient_id'];
		 $sym=(explode(',',$symptoms));
		 $rs = $this->auth_model->delete_data('patient_id', $patient_id,'patient_symptom');
		foreach($sym as $rs)
		{ 
		$data = array(

				'symptom_id'			=>		$rs,
				'patient_id'			=>		$patient_id
				
				
				
			);
			



			$result = $this->auth_model->insert_data('patient_symptom', $data);
		
		
		}
		
				$response['error_code']="0";
			    $response['response_string']="Patient Symptom Added";
			    $response['data']="";
			
         
		 
        header('Content-Type: application/json');
		echo json_encode($response);
	}
	
	function add_patient_disease(){
		    $this->load->model('auth_model');
		    $taskdata = json_decode(file_get_contents('php://input'),true);
			
			
		   $disease=$taskdata['disease'];
		   $patient_id=$taskdata['patient_id'];
		 $sym=(explode(',',$disease));
		 $rs = $this->auth_model->delete_data('patient_id', $patient_id,'patient_cronic_disease');
		foreach($sym as $rs)
		{ 
		$data = array(

				'cronic_disease_name'			=>		$rs,
				'patient_id'			=>		$patient_id
				
				
				
			);
			



			$result = $this->auth_model->insert_data('patient_cronic_disease', $data);
		
		
		}
		
				$response['error_code']="0";
			    $response['response_string']="Patient Disease Added";
			    $response['data']="";
			
         
		 
        header('Content-Type: application/json');
		echo json_encode($response);
	}
	
	function add_patient_allergy(){
		    $this->load->model('auth_model');
		    $taskdata = json_decode(file_get_contents('php://input'),true);
			
			
		   $allergy=$taskdata['allergy'];
		   $patient_id=$taskdata['patient_id'];
		 $sym=(explode(',',$allergy));
		 $rs = $this->auth_model->delete_data('patient_id', $patient_id,'patient_allergy');
		foreach($sym as $rs)
		{ 
		$data = array(

				'allergy_name'			=>		$rs,
				'patient_id'			=>		$patient_id
				
				
				
			);
			



			$result = $this->auth_model->insert_data('patient_allergy', $data);
		
		
		}
		
				$response['error_code']="0";
			    $response['response_string']="Patient Allergy Added";
			    $response['data']="";
			
         
		 
        header('Content-Type: application/json');
		echo json_encode($response);
	}
	function add_patient_medication(){
		    $this->load->model('auth_model');
		    $taskdata = json_decode(file_get_contents('php://input'),true);
			
			
		   $allergy=$taskdata['medication'];
		   $patient_id=$taskdata['patient_id'];
		 $sym=(explode(',',$allergy));
		 $rs = $this->auth_model->delete_data('patient_id', $patient_id,'patient_medication');
		foreach($sym as $rs)
		{ 
		$data = array(

				'medication_name'			=>		$rs,
				'patient_id'			=>		$patient_id
				
				
				
			);
			



			$result = $this->auth_model->insert_data('patient_medication', $data);
		
		
		}
		
				$response['error_code']="0";
			    $response['response_string']="Patient medication Added";
			    $response['data']="";
			
         
		 
        header('Content-Type: application/json');
		echo json_encode($response);
	}
	function add_patient_surgery(){
		    $this->load->model('auth_model');
		    $taskdata = json_decode(file_get_contents('php://input'),true);
			
			
		   $allergy=$taskdata['surgery'];
		   $patient_id=$taskdata['patient_id'];
		 $sym=(explode(',',$allergy));
		 $rs = $this->auth_model->delete_data('patient_id', $patient_id,'patient_surgery');
		foreach($sym as $rs)
		{ 
		$data = array(

				'surgery_name'			=>		$rs,
				'patient_id'			=>		$patient_id
				
				
				
			);
			



			$result = $this->auth_model->insert_data('patient_surgery', $data);
		
		
		}
		
				$response['error_code']="0";
			    $response['response_string']="Patient surgery Added";
			    $response['data']="";
			
         
		 
        header('Content-Type: application/json');
		echo json_encode($response);
	}
	function add_patient_injury(){
		    $this->load->model('auth_model');
		    $taskdata = json_decode(file_get_contents('php://input'),true);
			
			
		   $allergy=$taskdata['injury'];
		   $patient_id=$taskdata['patient_id'];
		 $sym=(explode(',',$allergy));
		 $rs = $this->auth_model->delete_data('patient_id', $patient_id,'patinet_injury');
		foreach($sym as $rs)
		{ 
		$data = array(

				'injury_name'			=>		$rs,
				'patient_id'			=>		$patient_id
				
				
				
			);
			



			$result = $this->auth_model->insert_data('patinet_injury', $data);
		
		
		}
		
				$response['error_code']="0";
			    $response['response_string']="Patient injury Added";
			    $response['data']="";
			
         
		 
        header('Content-Type: application/json');
		echo json_encode($response);
	}
	function get_patient_injury()
	{
		    $this->load->model('auth_model');
		    $taskdata = json_decode(file_get_contents('php://input'),true);
			$patient_id=$taskdata['patient_id'];
			$data = $this->auth_model->get_specific_data('patient_id', $patient_id,'patinet_injury');
			if(!empty($data))
			{
				$response['error_code']="0";
			    $response['response_string']="injury Found";
			     $response['data']=$data;
			}
			else{
				$response['error_code']="1";
			    $response['response_string']="No injury Found";
			     $response['data']="";
			}
			 header('Content-Type: application/json');
		     echo json_encode($response);
		
	}
	
	
	
	
	
	
	function get_patient_surgery()
	{
		    $this->load->model('auth_model');
		    $taskdata = json_decode(file_get_contents('php://input'),true);
			$patient_id=$taskdata['patient_id'];
			$data = $this->auth_model->get_specific_data('patient_id', $patient_id,'patient_surgery');
			if(!empty($data))
			{
				$response['error_code']="0";
			    $response['response_string']="Surgery Found";
			     $response['data']=$data;
			}
			else{
				$response['error_code']="1";
			    $response['response_string']="No Surgery Found";
			     $response['data']="";
			}
			 header('Content-Type: application/json');
		     echo json_encode($response);
		
	}
	function get_patient_medication()
	{
		    $this->load->model('auth_model');
		    $taskdata = json_decode(file_get_contents('php://input'),true);
			$patient_id=$taskdata['patient_id'];
			$data = $this->auth_model->get_specific_data('patient_id', $patient_id,'patient_medication');
			if(!empty($data))
			{
				$response['error_code']="0";
			    $response['response_string']="medication Found";
			     $response['data']=$data;
			}
			else{
				$response['error_code']="1";
			    $response['response_string']="No medication Found";
			     $response['data']="";
			}
			 header('Content-Type: application/json');
		     echo json_encode($response);
		
	}
	function get_patient_allergy()
	{
		    $this->load->model('auth_model');
		    $taskdata = json_decode(file_get_contents('php://input'),true);
			$patient_id=$taskdata['patient_id'];
			$data = $this->auth_model->get_specific_data('patient_id', $patient_id,'patient_allergy');
			if(!empty($data))
			{
				$response['error_code']="0";
			    $response['response_string']="Allergy Found";
			     $response['data']=$data;
			}
			else{
				$response['error_code']="1";
			    $response['response_string']="No Allergy Found";
			     $response['data']="";
			}
			 header('Content-Type: application/json');
		     echo json_encode($response);
		
	}
	function get_patient_disease()
	{
		    $this->load->model('auth_model');
		    $taskdata = json_decode(file_get_contents('php://input'),true);
			$patient_id=$taskdata['patient_id'];
			$data = $this->auth_model->get_specific_data('patient_id', $patient_id,'patient_cronic_disease');
			if(!empty($data))
			{
				$response['error_code']="0";
			    $response['response_string']="Disease Found";
			     $response['data']=$data;
			}
			else{
				$response['error_code']="1";
			    $response['response_string']="No Disease Found";
			     $response['data']="";
			}
			 header('Content-Type: application/json');
		     echo json_encode($response);
		
	}

function search_patient(){
		    $this->load->model('auth_model');
		    $taskdata = json_decode(file_get_contents('php://input'),true);
			
			
		   $phone=$taskdata['phone'];
		   echo $phone;

			$result = $this->auth_model->get_pat_data($phone);
		
		
		if($result)
		{
		
				$response['error_code']="0";
			    $response['response_string']="Patient Found";
			    $response['data']=$result;
				
		}
		else{
			$response['error_code']="1";
			    $response['response_string']="No Patient Found";
			    $response['data']="";
		}
			
         
		 
        header('Content-Type: application/json');
		echo json_encode($response);
	}
	
	function getRecentPatients() 
	{
		   $this->load->model('auth_model');
		    $taskdata = json_decode(file_get_contents('php://input'),true);
			
			
		   $aff=$taskdata['affilate_id'];
		  

			$result = $this->auth_model->getaffdata($aff);
		   
		
		if($result)
		{
		
				$response['error_code']="0";
			    $response['response_string']="Patient Found";
			    $response['data']=$result;
				
		}
		else{
			$response['error_code']="1";
			    $response['response_string']="No Patient Found";
			    $response['data']="";
		}
			
         
		 
        header('Content-Type: application/json');
		echo json_encode($response);
	}


	/*
		
		function add_doctor_aviability()
{
	            $this->load->model('auth_model');
		       $taskdata = json_decode(file_get_contents('php://input'),true);
			   $doctor_id=$taskdata['doctor_id'];
		       $day=$taskdata['day'];
			   $start=$taskdata['start'];  

			   $end=$taskdata['end'];
			  
			    $data=array(
					'doctor_id' 		=> 		$doctor_id,
                	'day'				=>		$day,
               		'start'=>$start,
               		'end'=>$end
               
			    );			
			 
                    $data=array(
				'doctor_id' => $doctor_id,
                'day'=>$day,
               'start'=>$start,
               'end'=>$end
               
			    );

                    	$ins=$this->auth_model->insert_data('doctor_aviability ',$data);
                    	if($ins)
                    	{
                            $response['error_code']="0";
			                $response['response_string']="Doctor Aviability Added";
							 $response['aviability_id']=$ins;
			                

                    	}
                    	else
                    	{
                    		 $response['error_code']="1";
			                $response['response_string']="Eror In Doctor Aviability Saved";
                    	}

             

       header('Content-Type: application/json');
		echo json_encode($response);



}

function update_doctor_aviability()
{
	            $this->load->model('auth_model');
		       $taskdata = json_decode(file_get_contents('php://input'),true);
			   $aviable_id=$taskdata['aviability_id'];
		       $day=$taskdata['day'];
			   $start=$taskdata['start'];  

			   $end=$taskdata['end'];
			  

			
			 
                    $data=array(
				'day'=>$day,
               'start'=>$start,
               'end'=>$end
               
			    );

                    	$ins=$this->auth_model->edit_data('id ',$aviable_id,$data,'doctor_aviability');
                    	if($ins)
                    	{
                            $response['error_code']="0";
			                $response['response_string']="Doctor Updated ";
							
			                

                    	}
                    	else
                    	{
                    		 $response['error_code']="1";
			                $response['response_string']="Eror In Doctor Update";
                    	}

             

       header('Content-Type: application/json');
		echo json_encode($response);



}

	*/
}//end of class