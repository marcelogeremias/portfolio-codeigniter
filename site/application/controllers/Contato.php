<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once 'MY_Controller.php';

class Contato extends MY_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('url_helper');
        $this->load->library('session');
        $this->load->model('contato_model');
        $this->load->model('dao/ContatoDAO');
    }

	public function index(){
        $header['title'] = 'Contato - Marcelo Geremias';
        $this->load->view('common/header', $header);
        $this->load->view('front/contato');
        $this->load->view('common/footer');
	}

    public function enviarContato(){
        $this->load->helper('security');
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->helper('array');
        
        $this->form_validation->set_message('required', 'O campo %s deve ser preenchido corretamente.');
        $this->form_validation->set_message('valid_email', 'O campo %s deve possuir um email valido.');

        $this->form_validation->set_rules('nome', 'nome', 'trim|required');
        $this->form_validation->set_rules('email', 'e-mail', 'trim|required|valid_email');
        $this->form_validation->set_rules('assunto', 'assunto', 'trim|required');
        $this->form_validation->set_rules('mensagem', 'mensagem', 'trim|required');
        
        if($this->form_validation->run() === FALSE){
            $header['title'] = "Contato - Marcelo Geremias";
            $this->load->view('common/header', $header);
            $this->load->view('front/contato');
            $this->load->view('common/footer');
        }
        else{
            $this->contato_model->inserir();
            $header['title'] = "Contato enviado - Marcelo Geremias";
            $data['confirmacao'] = "<strong>Obrigado!</strong> Sua mensagem foi enviada com sucesso.";
            $this->load->view('common/header', $header);
            $this->load->view('front/contato_enviado', $data);
            $this->load->view('common/footer');
        }
    }   
}