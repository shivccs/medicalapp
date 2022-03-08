<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class item_edit extends MX_Controller {

	function __construct() 
		{
			Parent::__construct();
		}

	public function index()
	{	

		
		$this->load->model('pharmacy_units_model');
		  $session_user_id = $this->session->userdata['sessiondata']['user_id'];
		  
			$this->load->library('create_id');
	
		
         $id=$this->uri->segment(3);
		 $rec=$this->pharmacy_units_model->get_specific_data('medical_item_id',$id,'medical_item');
		 
		 
		 $category = $this->pharmacy_units_model->get_category();
		 
		$manufacture = $this->pharmacy_units_model->get_manufacture();
		$unit = $this->pharmacy_units_model->get_unit();

		$leaf = $this->pharmacy_units_model->get_leaf();
		

		$data = array(
			'category'		=>		$category,
			'manufacture'		=>		$manufacture,
			'unit'		=>		$unit,
			'leaf'			 =>		$leaf,
			'rec'   =>   $rec,
   			
		);
		 	
		
		 $this->load->view('phar-units-view',$data);
			
	}//end of index
	
	public function register(){
		$this->load->model('pharmacy_units_model');
		$session_user_id = $this->session->userdata['sessiondata']['user_id'];
		$this->load->library('create_id');
		 $id = $this->input->post('id');
		   if(!empty($_FILES['file']['name']))
			{
				
				  
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
	       
        }
        else
        {
            $data1=array(
		    'path'=>base_url()."uploads/item/".$id,
			 'file_name'=>$filename);
		    
	   
	      $user=$this->pharmacy_units_model->edit_data('medical_item_id',$id,$data1,'medical_item');
			
			$this->session->set_flashdata('msg', 'Image  Added');
			
		    
		
        }
				
				
				
				
			
			}
	
			
			
        
		$name 			=		$this->input->post('name');
		$category 		=		$this->input->post('category');
		$manufacture 	=		$this->input->post('manufacture');
		$unit 			=		$this->input->post('unit');
		$leaf			=		$this->input->post('leaf');
		$expiry 		=		$this->input->post('expiry');
		$detail 		=		$this->input->post('detail');
		$quantity 		=		$this->input->post('quantity');
		$price 		=		$this->input->post('price');
		$flag 		=		$this->input->post('flag');
		if(isset($_POST['flag']) && $_POST['flag']!=='')
		{
        $flag=1;
		}
		else{
			$flag=0;
		}
					   
						
						

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
				'updated_on' 		    	=>	    date('Y-m-d h:i:s'),
				'status'                    =>      $flag
			);



			$result = $this->pharmacy_units_model->edit_data('medical_item_id',$id,$u_data,'medical_item');

			if ($result) {
				$this->session->set_flashdata('msg', 'Item Updated');
		                      redirect(base_url().'template/item_edit/'.$id);
				
						}
						else{
							  $this->session->set_flashdata('msg', 'Eror In Updation');
		                      redirect(base_url().'template/item_edit/'.$id);
							
						}
			

		
			
	}


public function delete()
	{	

		$this->load->model('pharmacy_units_model');
		$session_user_id = $this->session->userdata['sessiondata']['user_id'];
		$this->load->library('create_id');
		$id=$this->uri->segment(3);
		echo $id;
		//$result = $this->pharmacy_units_model->delete_data('medical_item_id',$id,'medical_item');
		// $this->session->set_flashdata('msg', 'deleted successfully');
		//  redirect(base_url().'template/items');
		 	
		
		
			
	}


	


	
}//end of class