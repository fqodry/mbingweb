<?php defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller {
	public function __construct(){
		parent::__construct();
	}

	public function loadView($viewFilename,$pagedata=array()){
		try {
			$className = $this->router->fetch_class();
		} catch (Exception $e) {
			echo "Caught Exception: ".$e->getMessage()."\n";
		}
		$this->load->view('template/header', $pagedata);
		$this->load->view($className.'/'.$viewFilename, $pagedata);
		$this->load->view('template/footer',$pagedata);
	}
}