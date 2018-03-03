<?php
class Ajax_controller extends CI_Controller {
	
	public function __construct(){
	
	parent::__construct();
		$this->load->model('contact_model');
		$this->load->helper('url_helper');
	}

	public function index($str = FALSE){
		$a['x']= $this->contact_model->ajack($str);
		echo  $a['x'];
	}
}
