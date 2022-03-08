<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_role extends MX_Controller {

	function __construct() 
		{
			Parent::__construct();
		}

	public function index()
	{	

		$this->load->model('user_role_model');
		$user_id = $this->session->userdata['sessiondata']['user_id'];
		$user_roles = $this->user_role_model->get_user_roles();
		//var_dump($user_roles);exit;
		$data = array(
			'user_roles'		=>	$user_roles
		);
		$this->load->view('user-role-view', $data);
			
	}//end of index



	public function new(){
		$this->load->model('user_role_model');
		$session_user_id = $this->session->userdata['sessiondata']['user_id'];
			$this->load->library('create_id');
		$role_name		=		$this->input->post('role');

		$check_role = $this->user_role_model->check_role(strtoupper($role_name));
		if ($check_role) {
			$this->session->set_flashdata('msg', 'This role is already available!');
		    redirect(base_url().'template/user_role');
		}else{
			$role_data = array(
				'role_name'				=>		$role_name,
				'created_by'			=>		$session_user_id,
				'created_on'			=>		date('Y-m-d')
			);	

			$result = $this->user_role_model->register($role_data);

			if ($result) {
			$this->session->set_flashdata('msg', 'Role successfully registerd!');
		        redirect(base_url().'template/user_role');
			}else{
				$this->session->set_flashdata('msg', 'Failed!');
		        redirect(base_url().'template/user_role');
			}//end of if else result
		}//end of if else check role

	}//end of function register


	function add_money(){
		$this->load->model('user_role_model');
		$session_user_id = $this->session->userdata['sessiondata']['user_id'];
		

			
		$bank_name				=		$this->input->post('bank');
		$amount 				=		$this->input->post('amount');
		$receiver_id 			=		$this->input->post('receiver_id');


		$receiver_info = $this->user_role_model->get_bank_last_ledger_info($receiver_id);
		if ($receiver_info) {
			$rold_balance = $receiver_info['balance'];
		}else{
			$rold_balance = 0;
		}
		$rnew_balance = $rold_balance+$amount;

		



		if ($bank_name=='self') {
			//var_dump($bank_name);exit;
			$recdata = array(
				'bank_account_id'			=>		$receiver_id,
				'expense_type'				=>		0,
				'debit'						=>		0,
				'credit'					=>		$amount,
				'balance'					=>		$rnew_balance,
				'remarks'					=>		'Self transfer',
				'added_by'					=>		$session_user_id,
				'added_on' 					=>		date('Y-m-d')
			);

			$result = $this->user_role_model->add_self_amount($recdata);

			if ($result) {
			$this->session->set_flashdata('msg', 'Amount successfully added');
		        redirect(base_url().'template/user_role');
			}else{
				$this->session->set_flashdata('msg', 'Failed!');
		        redirect(base_url().'template/user_role');
			}


		}else{
			if ($receiver_id==$bank_name) {
				$this->session->set_flashdata('msg', 'Cannot transfer into same account.');
		        redirect(base_url().'template/user_role');
			}else{
				$donar_info = $this->user_role_model->get_bank_last_ledger_info($bank_name);
				if ($donar_info) {
					$dold_balance = $donar_info['balance'];
				}else{
					$dold_balance = 0;
				}
				$dnew_balance = $dold_balance-$amount;
				if ($dnew_balance<0){
					$this->session->set_flashdata('msg', 'Selected bank isn\'t have enough balance');
			        redirect(base_url().'template/user_role');
				}else{
					$receiver_name = $this->user_role_model->get_bankname($receiver_id);
					$donar_name = $this->user_role_model->get_bankname($bank_name);
					$recdata = array(
					'bank_account_id'			=>		$receiver_id,
					'expense_type'				=>		0,
					'debit'						=>		0,
					'credit'					=>		$amount,
					'balance'					=>		$rnew_balance,
					'remarks'					=>		'Transfer by '.$donar_name['bank_name'],
					'added_by'					=>		$session_user_id,
					'added_on' 					=>		date('Y-m-d')
					);

					$donardata = array(
					'bank_account_id'			=>		$bank_name,
					'expense_type'				=>		0,
					'debit'						=>		$amount,
					'credit'					=>		0,
					'balance'					=>		$dnew_balance,
					'remarks'					=>		'Transfer to '.$receiver_name['bank_name'],
					'added_by'					=>		$session_user_id,
					'added_on' 					=>		date('Y-m-d')
					);

					$result = $this->user_role_model->add_transfer_amount($recdata, $donardata);

					if ($result) {
					$this->session->set_flashdata('msg', 'Amount successfully added');
				        redirect(base_url().'template/user_role');
					}else{
						$this->session->set_flashdata('msg', 'Failed!');
				        redirect(base_url().'template/user_role');
					}
				}//end of if else
			}//end of if else			 
		}//end of function 













			$c_data = array(
				'bank_name'				=>		$bank_name,
				'ifsc'					=>		$ifsc,
				'acno'					=>		$acno,
				'added_on'				=>		date('Y-m-d'),
				'added_by' 				=>		$session_user_id
			);	

			$result = $this->user_role_model->register($c_data);

			if ($result) {
			$this->session->set_flashdata('msg', 'Vendor successfully registerd');
		        redirect(base_url().'template/user_role');
			}else{
				$this->session->set_flashdata('msg', 'Failed!');
		        redirect(base_url().'template/user_role');
			}
	}//end of function add_money
}//end of class