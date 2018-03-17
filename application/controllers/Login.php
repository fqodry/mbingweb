<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends MY_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model("Base_Model");
	}

	public function index()
	{
		$this->login();
	}

	function login() {
		$data['form_login'] = base_url() . 'qoddportal/auth';
		$this->load->view('login_view',$data);
	}

	function loginCommit() {
		$this->load->library(array('bcrypt','form_validation'));
		$this->load->helper('security');

		$rules = array(
			array(
				'field'	=> 'userLOGINID',
				'label'	=> 'Username/Email',
				'rules'	=> 'trim|required',
				'errors'	=> array(
					'required' => 'Please input your %s.'
				)
			),
			array(
				'field'	=> 'userLOGINPWD',
				'label'	=> 'Password',
				'rules'	=> 'trim|required|min_length[3]|xss_clean',
				'errors'	=> array(
					'required' => 'Please enter your %s.',
					'min_length' => '%s field minimal %d characters long.'
				)
			)
		);
		$this->form_validation->set_rules($rules);

		if($this->form_validation->run() == false){
			if(isset($this->session->userdata['loggedIn'])){
				redirect(base_url().'dashboard');
			}else{
				$data['form_login'] = base_url() . 'qoddportal/auth';
				$this->load->view('login_view',$data);
			}
		}else{
			$userLOGINID = $this->input->post('userLOGINID');
			$userLOGINPWD = $this->input->post('userLOGINPWD');
			$userDATA = $this->Base_Model->getSingle('tb_user',array('username'=>$userLOGINID, 'active_status'=>true));

			if(empty($userDATA)){
				$handler_msg = array(
					'msg'		=> "<i class='fa fa-close'></i>&nbsp;You are not registered at QoddPortal. Please contact our admin at admin@qoddportal.id",
					'type'	=> "danger"
				);
				$this->session->set_flashdata('handler_msg',$handler_msg);
				redirect(base_url().'qoddportal');
			}

			if($this->bcrypt->check_password($userLOGINPWD, $userDATA->password) == TRUE) {
				$userDATADETAIL = $this->Base_Model->getSingle('tb_userdetails',array('userid'=>$userDATA->userid));
				$sessionDATA = array(
					'userid'		=> $userDATA->userid,
					'username'	=> $userDATA->username,
					'email'		=> $userDATADETAIL->email,
					'firstname'	=> $userDATADETAIL->firstname,
					'lastname'	=> $userDATADETAIL->lastname
				);
				$this->session->set_userdata($sessionDATA);
				redirect(base_url().'dashboard');
			} else {
				$handler_msg = array(
					'msg'		=> "<i class='fa fa-close'></i>&nbsp;Invalid Username or Password",
					'type'	=> "danger"
				);
				$this->session->set_flashdata('handler_msg',$handler_msg);
				redirect(base_url().'qoddportal');
			}
		}
	}

	function logoutCommit() {
		// removing session data
		$sessArray = array(
			'username'	=> ''
		);
		$this->session->unset_userdata('loggedIn',$sessArray);

		// clear current session
		// $this->session->sess_destroy();

		// set flashdata
		$handler_msg = array(
			'msg'		=> "<i class='fa fa-check'></i>&nbsp;Logout Success.",
			'type'	=> "success"
		);
		$this->session->set_flashdata('handler_msg',$handler_msg);
		redirect(base_url().'qoddportal');
	}
}
