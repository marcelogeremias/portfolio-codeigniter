<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once 'My_Controller.php';

class Welcome extends MY_Controller {

	public function index(){
		echo "Ol&aacute; Pessoal.<br> Sejam benvidos &agrave; discplina LPII";
	}
}
