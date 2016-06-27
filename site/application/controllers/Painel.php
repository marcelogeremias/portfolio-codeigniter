<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once 'MY_Controller.php';

class Painel extends MY_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('url_helper');
        $this->load->library('session');
        $this->load->model('usuario_model');
        $this->load->model('dao/UsuarioDAO');
    }

	public function index(){
        $header['title'] = 'Painel - Marcelo Geremias';
        $this->load->view('painel/header', $header);
        $this->load->view('painel/index');
        $this->load->view('painel/footer');
	}

    public function login(){
        $this->load->helper('security');
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->helper('array');
        
        $this->form_validation->set_message('required', 'O campo %s deve ser preenchido corretamente.');
        $this->form_validation->set_message('valid_email', 'O campo %s deve possuir um email valido.');

        $this->form_validation->set_rules('email', 'e-mail', 'trim|required|valid_email|xss_clean');
        $this->form_validation->set_rules('senha', 'senha', 'trim|required|xss_clean');
        
        if($this->form_validation->run() === FALSE){
            $header['title'] = "Login - Marcelo Geremias";
            $this->load->view('painel/header', $header);
            $this->load->view('painel/login');
            $this->load->view('painel/footer');
        }
        else{
            $email = $this->input->post('email');
            $senha = $this->input->post('senha');
            $login = $this->usuario_model->login($email, $senha);

            if( !empty($login) ) {
                $sessao = array('u_id' => $login['usua_id'], 'u_nome' => $login['usua_nm'], 'u_email' => $login['email']);
                $this->session->set_userdata($sessao);
                redirect(base_url('painel'));
            } else {
                $header['title'] = "Login - Marcelo Geremias";
                $data['erro'] = "Não foi possível acessar o painel.";
                $this->load->view('painel/header', $header);
                $this->load->view('painel/login', $data);
                $this->load->view('painel/footer');
            }
        }
    }   

    public function logout() {
        $this->session->sess_destroy();
        redirect(base_url('acessar'));
    }
}