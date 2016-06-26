<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once 'MY_Controller.php';

class Formacao extends MY_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('url_helper');
        $this->load->library('session');
        $this->load->model('formacao_model');
        $this->load->model('dao/FormacaoDAO');
    }

	public function index(){
        $header['title'] = 'Formações - Marcelo Geremias';
        $this->load->view('common/header', $header);
        $data['formacoes'] = $this->formacao_model->buscaFormacoes();
        $this->load->view('front/formacoes', $data);
        $this->load->view('common/footer');
	}   
}