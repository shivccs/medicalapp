<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_dashboard_model extends CI_model {
	



	public function get_active_users(){
		$this->db->select('user_id');
		$this->db->where('is_active', 1);
		$this->db->where('user_type', 2);
		$r = $this->db->get('users');

		return $r->num_rows();
	}//end of function get_active_users


	public function get_active_companies(){
		$this->db->select('company_id');
		$this->db->where('status', 1);
		$r = $this->db->get('companies');

		return $r->num_rows();
	}//end of function get_active_companies

	public function get_active_fuelstations(){
		$this->db->select('fsid');
		$this->db->where('status', 1);
		$r = $this->db->get('fuelstations');

		return $r->num_rows();
	}//end of function get_active_fuelstations

	public function get_active_vehicles(){
		$this->db->select('vehicle_id');
		$this->db->where('status', 1);
		$r = $this->db->get('vehicle_registration');

		return $r->num_rows();
	}//end of function get_active_vehicles

	public function get_booked_vehicles(){
		$this->db->select('booking_id');
		$this->db->where('booked_on', date('Y-m-d'));
		$r = $this->db->get('bookings');

		return $r->num_rows();
	}//end of function get_active_vehicles

	public function get_expiring_puc(){
		$today = date('Y-m-d');
		$next_date = date('Y-m-d', strtotime($today. ' + 15 days'));
		$this->db->select('vehicle_id');
		$this->db->where('status', 1);
		$this->db->where('puc_renew_date >=' , $today);
		$this->db->where('puc_renew_date <=' , $next_date);
		$r = $this->db->get('vehicle_registration');

		return $r->num_rows();
	}//end of function get_expiring_puc()

	public function get_expiring_insurance(){
		$today = date('Y-m-d');
		$next_date = date('Y-m-d', strtotime($today. ' + 15 days'));
		$this->db->select('vehicle_id');
		$this->db->where('status', 1);
		$this->db->where('insurance_renew_date >=' , $today);
		$this->db->where('insurance_renew_date <=' , $next_date);
		$r = $this->db->get('vehicle_registration');

		return $r->num_rows();
	}//end of function get_expiring_insurance

	public function get_national_permit(){
		$today = date('Y-m-d');
		$next_date = date('Y-m-d', strtotime($today. ' + 15 days'));
		$this->db->select('vehicle_id');
		$this->db->where('status', 1);
		$this->db->where('np_renew_date >=' , $today);
		$this->db->where('np_renew_date <=' , $next_date);
		$r = $this->db->get('vehicle_registration');

		return $r->num_rows();
	}//end of function get_national_permit()



}//end of class