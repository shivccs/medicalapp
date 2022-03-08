<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Medical_entry extends MX_Controller {

	function __construct() 
		{
			Parent::__construct();
		}

	public function index()
	{	

		$this->load->model('doctor_registration_model');
		$user_id = $this->session->userdata['sessiondata']['user_id'];
		
		$category = $this->doctor_registration_model->get_category();
		$manufacture = $this->doctor_registration_model->get_manufacture();
		$unit = $this->doctor_registration_model->get_unit();

		$leaf = $this->doctor_registration_model->get_leaf();
		

		$data = array(
			'category'		=>		$category,
			'manufacture'		=>		$manufacture,
			'unit'		=>		$unit,
			'leaf'			=>		$leaf
			
		);
		$this->load->view('medical-entry', $data);
			
	}//end of index



	public function register(){
		$this->load->model('doctor_registration_model');
		$session_user_id = $this->session->userdata['sessiondata']['user_id'];
		$this->load->library('create_id');
		

		$name 			=		$this->input->post('name');
		$category 		=		$this->input->post('category');
		$manufacture 	=		$this->input->post('manufacture');
		$unit 			=		$this->input->post('unit');
		$leaf			=		$this->input->post('leaf');
		$expiry 		=		$this->input->post('expiry');
		$detail 		=		$this->input->post('detail');
		$quantity 		=		$this->input->post('quantity');
		$price 		=		$this->input->post('price');
		if(empty($_POST['flag']))
              {
                $flag = 0;
               }
                   else 
                   {
                      $flag = 1;
                       }
					   
						$count = $this->doctor_registration_model->count_row('medical_item_name',$name,'medical_item');
						if($count>=1)
						{
							$this->session->set_flashdata('msg', 'Item Already Exsist');
		                      redirect(base_url().'template/medical_entry');
						}
						else
						{

			$u_data = array(

				'med_cat_id'				=>		$category,
				'medical_leaf_id'           =>      $leaf,
				'manufacturer_id'			=>		$manufacture,
				'medical_item_name'			=>		$name,
				'unit'				        =>		$unit,
				'aviable_qty'		        =>		$quantity,
				'description'				=>		$detail,				
				'price'				    	=>		$price,
				'expiry_date'		    	=>		$expiry,
				'created_by'		    	=>		$session_user_id,
				'created_on'				=>		NULL,
				'updated_on' 		    	=>		NULL,
				'status'                    =>      $flag
			);



			$result = $this->doctor_registration_model->register_new_user($u_data);

			if ($result) {
				
				  $id = $this->doctor_registration_model->get_x('medical_item_id','medical_item_name',$name,'medical_item');
				  $target = './uploads/item/' . $id;

                 if(!is_dir($target)) //create the folder if it's not already exists
                 {
                mkdir($target,0755,TRUE);
                  } 
             // $path = '/var/www/html/dpapp/uploads/item/'.$id;
              $filename=strtolower($_FILES['file']['name']);
              $filename=str_replace(" ","-",$filename);
	         
	           $config['upload_path']          = $target;
                $config['allowed_types']        = 'gif|jpg|png|JPG|PNG';
               
       
        $this->load->library('upload', $config);

        if ( !$this->upload->do_upload('file'))
        {
            $this->session->set_flashdata('msg', $this->upload->display_errors());
	        redirect('template/medical_entry');
        }
        else
        {
            $data1=array(
		    'path'=>base_url()."uploads/item/".$id,
			 'file_name'=>$filename);
		    
	   
	      $user=$this->doctor_registration_model->edit_data('medical_item_id',$id,$data1,'medical_item');
			
			$this->session->set_flashdata('msg', 'Item successfully Added');
		        redirect(base_url().'template/medical_entry');
		
        }
				
				
				
				
			
			}else{
				$this->session->set_flashdata('msg', 'Failed!');
		        redirect(base_url().'template/medical_entry');
			}
						}

		}//end of if else 	

	//end of function register


//end of functrion get_cities

}//end of class