<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once 'MY_Controller.php';

class Welcome extends MY_Controller {

	public function index(){
		$this->load->view('common/header');
        $this->load->view('common/footer');
	}
}
