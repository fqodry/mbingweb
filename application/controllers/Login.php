<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends MY_Controller {

	public function __construct() {
		parent::__construct();
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

	}
}
