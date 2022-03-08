<?php

defined('BASEPATH') OR exit('No direct script access allowed');
class Auth_model extends CI_model
{
	function __construct() {
    	parent::__construct();
    	
  }




  function checkdocuser($user_id){
      $this->db->select('*');
      $this->db->where('doctor_id', $user_id);
      $q = $this->db->get('doctor_info');
      if ($q->num_rows()>0) {
        return true;
      }else{
        return false;
      }
  }//end of function checkdocuser

  function update_doctor_location($user_id, $update_data){
      $this->db->set('latitude', $update_data['latitude']);
      $this->db->set('longitude', $update_data['longitude']);
      $this->db->where('doctor_id', $user_id);
      $q = $this->db->update('doctor_info');
      return $q;
  }//end of function update_doctor_location


  function check_doctor_availibity($doctor_id, $day){
      $this->db->select('*');
      $this->db->where('doctor_id', $doctor_id);
      $this->db->where('day', $day);
      $q = $this->db->get('doctor_aviability');
      if ($q->num_rows()>0) {
          return $q->row_array();
      }else{
          return false;
      }
  }//end of function check_doctor_availibity

  function set_doctor_availibity($doctor_id, $day, $indata, $updata, $type){
        //var_dump($type);exit;
        if ($type=='1') {
          $this->db->where('doctor_id', $doctor_id);
          $this->db->where('day', $day);
          $q = $this->db->update('doctor_aviability', $updata);
          if ($q) {
            return true;
          }else{
            return false;
          }
        }else{
          $q = $this->db->insert('doctor_aviability', $indata);
          if ($q) {
            return true;
          }else{
            return false;
          }
        }//end of if else
  }//end of function set_doctor_availibity
	
  /*
   function getdoctorprofile($id){
        $q = $this->db->query("select doctors.*,doctors_category.category_name,doctor_info.*,doctor_profession.*,states.name,cities.name from doctors,doctors_category,doctor_info,doctor_profession,states,cities WHERE doctors.doctor_id='$id' AND doctors.doctor_id=doctor_info.doctor_id AND doctors.doctor_id=doctor_profession.doctor_id AND doctor_info.state=states.id AND doctor_info.city=cities.id");
        if($q->num_rows()){
            return $q->result();
         }
         else{
             return false;
         }
     }
    */

    function get_doctor_complete_info($temp_doc_id){
        $this->db->select('d.doctor_id, d.doctor_type, d.first_name, d.last_name, d.email, d.phone, d.last_login, dc.category_name, dp.registration_no, dp.medical_council, dp.certification_year, dp.medical_degree, dp.passout_year, dp.college_name, dp.experience, di.father_name, di.gender, di.dob, di.address, di.latitude, di.longitude, di.state as state_id, di.city as city_id, s.name as state_name, ci.name as city_name, ds.speciality_name');
        $this->db->from('doctors d');
        $this->db->join('doctors_category dc', 'dc.doctor_category_id=d.category_id');
        $this->db->join('doctor_profession dp', 'dp.doctor_id=d.doctor_id');
        $this->db->join('doctor_info di', 'di.doctor_id=d.doctor_id');
        $this->db->join('states s', 's.id=di.state');
        $this->db->join('cities ci', 'ci.id=di.city');
        $this->db->join('doctors_speciality ds', 'ds.speciality_id=d.speciality_id', 'left');
        $this->db->where('d.doctor_id', $temp_doc_id);
        $q = $this->db->get();

        return $q->row_array();
    }//end of function 

    function get_doctor_profile_image($temp_doc_id){
        $this->db->select('image_id, path, file_name');
        $this->db->from('images');
        $this->db->where('ref_id', $temp_doc_id);
        $q = $this->db->get();
        if ($q->num_rows()>0) {
          return $q->row_array();
        }else{
          return false;
        }
        
    }//end of function get_doctor_profile_image

    function update_image_details($Idata, $doc_details){
        $this->db->where('image_id', $doc_details['image_id']);
        $query = $this->db->update('images', $Idata);
        if ($query) {
          return true;
        }else{
          return false;
        }
    }//end of function update_doc_details

    function add_image_data($idata){
        $query = $this->db->insert('images', $idata);
        if ($query) {
          return true;
        }else{
          return false;
        }
    }//end of function add_image_data\

    function get_available_doctors_list($day, $latitude, $longitude, $offset, $limit){
        $this->db->select('d.doctor_id, d.first_name, d.last_name, dc.category_name, dp.medical_degree, dp.experience, s.name as state_name, ci.name as city_name, ds.speciality_name');
        $this->db->from('doctor_aviability da');
        $this->db->join('doctors d', 'da.doctor_id=d.doctor_id');
        $this->db->join('doctors_category dc', 'dc.doctor_category_id=d.category_id');
        $this->db->join('doctor_profession dp', 'dp.doctor_id=d.doctor_id');
        $this->db->join('doctor_info di', 'di.doctor_id=d.doctor_id');
        $this->db->join('states s', 's.id=di.state');
        $this->db->join('cities ci', 'ci.id=di.city');
        $this->db->join('doctors_speciality ds', 'ds.speciality_id=d.speciality_id', 'left');
        $this->db->where('da.day', $day);
        $this->db->where('da.status', 1);
        $this->db->where('d.is_active', 1);
        $this->db->limit($limit, $offset);
        $q = $this->db->get();

        if ($q->num_rows()>0) {
          return $q->result_array();
        }else{
          return false;
        }
    }//end of function get_available_doctors_list


    function check_patient_by_mobile($phone){
        $this->db->select('*');
        $this->db->where('phone_number', $phone);
        $query = $this->db->get('patients');
        if ($query->num_rows()>0) {
          return $query->row_array();
        }else{
          return false;
        }
    }//end of function check_patient_by_mobile

    function update_patient_data($patient_data, $patient_address, $patient_id){
        $this->db->trans_begin();
        $this->db->where('patient_id', $patient_id);
        $query1 = $this->db->update('patients', $patient_data);

        $this->db->where('patient_id', $patient_id);
        $query2 = $this->db->update('patient_address', $patient_address);

        if ($this->db->trans_status() === FALSE)
        {
                $this->db->trans_rollback();
                return false;
        }else{
                $this->db->trans_commit();
                return true;
        }
    }//end of function update_patient_data


    function get_patient_profile($patient_id){
        $this->db->select('p.*, pa.*');
        $this->db->from('patients p');
        $this->db->join('patient_address pa', 'p.patient_id=pa.patient_id', 'left');
        $this->db->where('p.patient_id', $patient_id);
        $query = $this->db->get();
        if ($query->num_rows()>0) {
          return $query->row_array();
        }else{
          return false;
        }
    }//end of function get_patient_profile


    function insert_patient_data($patient_data, $patient_address){
        $this->db->trans_begin();
        $query1 = $this->db->insert('patients', $patient_data);

        
        $query2 = $this->db->insert('patient_address',  $patient_address);

        if ($this->db->trans_status() === FALSE)
        {
                $this->db->trans_rollback();
                return false;
        }
        else
        {
                $this->db->trans_commit();
                return true;
        }
    }//end of function insert_patient_data

    function insert_consultation_record($record){
        $query2 = $this->db->insert('patient_medical_history',  $record);

        if ($this->db->trans_status() === FALSE)
        {
                $this->db->trans_rollback();
                return false;
        }
        else
        {
                $this->db->trans_commit();
                return true;
        }
    }//end of function insert_consultation_record


    function add_consultation_image_data($Idata){
        $query = $this->db->insert('medical_record_images', $Idata);
        if ($query) {
          return true;
        }else{
          return false;
        }
    }//end of function update_doc_details

    function get_consultation_record_by_id($insert_id){
        $this->db->select('d.doctor_id, CONCAT(d.first_name, d.last_name) as doctor_name, p.*, pr.*');
        $this->db->from('patient_medical_history pr');
        $this->db->join('doctors d', 'pr.added_by=d.doctor_id');
        $this->db->join('patients p', 'pr.patient_id=p.patient_id');
        $this->db->where('pr.history_id', $insert_id);
        $q = $this->db->get();

        return $q->row_array();
    }//end of function get_consultation_record_by_id



		function get_pat_data($temp_doc_id){
	    $q = $this->db->query("SELECT * from patients,patient_address where patients.patient_id=patient_address.patient_id and patients.patient_id");
		 if($q->num_rows()){
           return $q->row();
        }
        else{
            return false;
        }
	}


	function getaffdata($temp_doc_id){
	    $q = $this->db->query("SELECT * from patients where created_by='$temp_doc_id' order by patient_id desc limit 0,10");
		 if($q->num_rows()){
           return $q->row();
        }
        else{
            return false;
        }
	}

	function verify_user($email, $password )
    {
      //$pswd = sha1($password);
  
       
      
      $this->db->where('email',$email);
      //$this->db->or_where('email', $email);
      
      $this->db->where('pwd', $password);

      $q = $this->db->get('users');
    


      if ($q->num_rows() > 0)
      {
          return $q->row();
      } 
      return false;
    }// varify user function

  function update_login_count($user_id)
  {
    $date = date("Y-m-d H:i:s");
    $data = array(
               'last_login' => $date
              
                           );
    $this->db->where('user_id',$user_id);
    //$this->db->set('last_login', $date, FALSE);
    $this->db->set('login_count','`login_count`+1', FALSE);
    $this->db->update('users', $data);
  }
  function get_cat($id)
	{
		$query=$this->db->query("select * from category,subcategory where category.id=subcategory.parent_category");
	    return $query->result();
	}
 function count_patient($email,$phone)
  {
    $query=$this->db->query("select * from patients where phone_number='$phone' or email='$email'");
    
        return $query->num_rows();
  }



	function get_top_product()
	{
		$query=$this->db->query("select * from product order by id desc limit 0,4");
	    return $query->result();
	}
     function insert_data($db_name,$data){
          $q=$this->db->insert($db_name,$data);
		return $insert_id = $this->db->insert_id();
    }
   public function get_specific_data($db_id,$id,$db_name){
		$q=$this->db->select('*')->where($db_id,$id)->get($db_name);
        return $q->result();
	}
	public function get_all_data($db_name){
		$q=$this->db->select('*')->get($db_name);
        return $q->result();
	}
     public function login($email,$password)
    {
       $q=$this->db->where('email',$email)
                    ->where("password",$password)
                     ->get('admin_login');
      if($q->num_rows()==1){
           return 1;
	    }
        else{
            return 0;
        }     

    }
   
function get_doctor_data($temp_doc_id){
		$this->db->select('d.doctor_id, d.first_name, d.last_name, d.email, d.phone, d.category_id, d.is_active, d.speciality_id, dr.category_name, CONCAT(uu.first_name, " ", uu.last_name) as added_by, di.*, st.name as state_name, ct.name as city_name, dp.registration_no as regi,dp.medical_council as council ,dp.certification_year as certificate ,dp.medical_degree as degree, dp.passout_year as passout , dp.college_name as collage, dp.experience as exp');
		$this->db->from('doctors d');
		$this->db->join('doctors_category dr', 'dr.doctor_category_id=d.category_id');
		$this->db->join('doctor_info di', 'di.doctor_id=d.doctor_id');
		$this->db->join('states st', 'st.id=di.state');
		$this->db->join('cities ct', 'ct.id=di.city');
		$this->db->join('doctor_profession dp', 'dp.doctor_id=di.doctor_id');
		$this->db->join('users uu', 'uu.user_id=di.added_by');
		$this->db->where('d.doctor_id', $temp_doc_id);
		$q = $this->db->get();
		if ($q->num_rows()>0) {
			return $q->row_array();
		}else{
			return false;
		}
	}
	
	function get_affilate_profile($temp_doc_id){
		$this->db->select('*');
		$this->db->from('doctors d');
		$this->db->join('doctor_info dr', 'dr.doctor_id=d.doctor_id');
		$this->db->where('d.doctor_id', $temp_doc_id);
		$q = $this->db->get();
		if ($q->num_rows()>0) {
			return $q->row_array();
		}else{
			return false;
		}
	}
   
    
    public function get_row_data($db_id,$id,$db_name){
        $q=$this->db->select('*')->where($db_id,$id)->get($db_name);
        return $q->row();
    }
    
    function edit_data($db_id,$id,$data,$db_name){
        return $q=$this->db->where($db_id,$id)->update($db_name,$data);
    }
    
    function edit_data_mul($db_id,$id,$db_id1,$id1,$db_id2,$id2,$data,$db_name){
        return $q=$this->db->where($db_id,$id)->where($db_id1,$id1)->where($db_id2,$id2)->update($db_name,$data);
    }
    
    function delete_data($db_id,$id,$db_name){
        $this -> db -> where($db_id, $id);
        $this -> db -> delete($db_name);
    }
    
    function delete_data_mul($db_id1,$id1,$db_id2,$id2,$db_name){
        $this -> db -> where($db_id1, $id1);
        $this -> db -> where($db_id2, $id2);
        $this -> db -> delete($db_name);
    }

    function count_row($db_id,$id,$db_name){
        $this->db->from($db_name)->where($db_id,$id);
        $query = $this->db->get();
        return $query->num_rows();
    }
	public function get_current_page_records($limit, $start,$dbname) 
    {
        $this->db->limit($limit, $start);
        $query = $this->db->get($dbname);
 
        if ($query->num_rows() > 0) 
        {
            foreach ($query->result() as $row) 
            {
                $data[] = $row;
            }
             
            return $data;
        }
 
        return false;
    }

    function count_row_multiple($db_id1,$id1,$db_id2,$id2,$db_name, $typeval, $type)
	 {
        $this->db->from($db_name)->where($db_id1,$id1)->where($db_id2,$id2)->where($type,$typeval);
        $query = $this->db->get();
        return $query->num_rows();
    }
	function count_role($query)
	{
        $q = $this->db->query($query);
        return $q->num_rows();
    }
    function count_row1($db_name)
	{
        $this->db->from($db_name);
        $query = $this->db->get();
        return $query->num_rows();
    }
    function count_row_multiple_getUnique($db_id1,$id1,$db_id2,$id2,$db_name,$select){
        $this->db->from($db_name)->where($db_id1,$id1)->where($db_id2,$id2);
            
        $query = $this->db->distinct()->select($select)->get();
        return $query->num_rows();
    }
    
    function count_row_multiple_fourx($db_id1,$id1,$db_id2,$id2,$db_id3,$id3,$db_id4,$id4,$db_name){
        $this->db->from($db_name)->where($db_id1,$id1)->where($db_id2,$id2)->where($db_id3,$id3);
        $query = $this->db->get();
        return $query->num_rows();
    }

    function get_x($get_id,$db_id,$id,$db_name){
        $q=$this->db->select('*')->where($db_id,$id)->get($db_name);
        
            return $q->row()->$get_id;
        
    }
	
	
    function get_xx($get_id,$db_id,$id,$db_id1,$id1,$db_name){
        $q=$this->db->select('*')->where($db_id,$id)->where($db_id1,$id1)->get($db_name);
        
            return $q->row()->$get_id;
        
    }
    
    function get_unique($db_id,$id,$db_name){
        $this->db->from($db_name)->where($db_id,$id);
        $query = $this->db->get();
        return $query->num_rows();
    }
    
    function getLatest($fieldneeded,$db,$orderbyid,$wherefield){
       $q = $this->db->query("SELECT ".$fieldneeded." FROM ".$db." WHERE ".$wherefield." ORDER BY ".$orderbyid." DESC LIMIT 1");
       if($q->num_rows()){
           return $q->row();
        }
        else{
            return false;
        }
    }

    function getRawRow($query){
        $q = $this->db->query($query);
        if($q->num_rows()){
            return $q->row();
         }
         else{
             return false;
         }
     }

     function getRawResult($query){
        $q = $this->db->query($query);
        if($q->num_rows()){
            return $q->result();
         }
         else{
             return false;
         }
     }
	 
	 
     public function insert_product_image($data = array()){
        $insert = $this->db->insert_batch('bv_product_image',$data);
        return $insert?true:false;
    }
    public function insert_batch($table,$data = array()){
        $insert = $this->db->insert_batch($table,$data);
        return $insert?true:false;
    }
    	function edit_user1($u_data, $ui_data, $uf_data, $id){
		$this->db->trans_begin();

		
		    $r1=$this->db->where('doctor_id',$id)->update('doctors',$u_data);
			
		
		
			$r2=$this->db->where('doctor_id',$id)->update('doctor_info',$ui_data);

		
			$r3=$this->db->where('doctor_id',$id)->update('doctor_profession',$uf_data);

		if (($r1==true)&&($r2==true)&&($r3==true)) {
			$this->db->trans_commit();
			return true;

		}else{
			 $this->db->trans_rollback();
			 return false;
		}
	}
  

}// end of class