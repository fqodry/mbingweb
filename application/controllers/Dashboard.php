<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MY_Controller {

	public function __construct() {
		parent::__construct();
	}

	public function index()
	{
		$this->qoddDashboard();
	}

	function qoddDashboard() {
		if(isset($this->session->userdata['loggedIn'])){
			$this->loadView('main');
		}else{
			redirect(base_url().'login');
		}
	}
}
