<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once 'MY_Controller.php';

class Trabalho extends MY_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('url_helper');
        $this->load->library('session');
        $this->load->model('trabalho_model');
        $this->load->model('dao/TrabalhoDAO');
    }

	public function index(){
        $header['title'] = 'Trabalhos - Marcelo Geremias';
        $this->load->view('common/header', $header);
        $data['trabalhos'] = $this->trabalho_model->buscaTrabalhos();
        $this->load->view('front/trabalhos', $data);
        $this->load->view('common/footer');
	}   
}