<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once 'MY_Controller.php';

class Usuario extends MY_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('url_helper');
        $this->load->library('session');
        $this->load->model('usuario_model');
        $this->load->model('dao/UsuarioDAO');
    }

	public function index(){
        $header['title'] = 'Marcelo Geremias';
        $this->load->view('common/header', $header);
        $data['usuario'] = $this->usuario_model->buscaUsuario();
        $this->load->view('front/home', $data);
        $this->load->view('common/footer');
	}   
}