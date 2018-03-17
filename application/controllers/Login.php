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
				'rules'	=> 'trim|required|valid_email',
				'errors'	=> array(
					'required' => 'Please input your %s.',
					'valid_email' => 'Please enter a valid email address.'
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

			
		}
	}
}
