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
        $this->load->model('trabalho_model');
        $this->load->model('dao/TrabalhoDAO');
        $this->load->model('formacao_model');
        $this->load->model('dao/FormacaoDAO');
    }

	public function index(){
        $header['title'] = 'Marcelo Geremias';
        $this->load->view('common/header', $header);
        $data['usuario'] = $this->usuario_model->buscaUsuario();
        $this->load->view('front/home', $data);
        $this->load->view('common/footer');
	}

    public function atualizar(){
        $this->load->helper('security');
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->helper('array');
        
        $this->form_validation->set_message('required', 'O campo %s deve ser preenchido corretamente.');
        $this->form_validation->set_message('valid_email', 'O campo %s deve possuir um email valido.');

        $this->form_validation->set_rules('id', 'id', 'trim|xss_clean');
        $this->form_validation->set_rules('nome', 'nome', 'trim|required|xss_clean');
        $this->form_validation->set_rules('email', 'e-mail', 'trim|required|valid_email|xss_clean');
        $this->form_validation->set_rules('descricao', 'descrição', 'trim|required|xss_clean');
        
        if($this->form_validation->run() === FALSE){
            $header['title'] = "Sobre - Formulário - Marcelo Geremias";
            $this->load->view('painel/header', $header);
            $data['usuario'] = $this->usuario_model->buscaUsuario();
            $this->load->view('painel/formSobre', $data);
            $this->load->view('painel/footer');
        }
        else{
            $id = $this->input->post('id');
            $nome = $this->input->post('nome');
            $email = $this->input->post('email');
            $descricao = $this->input->post('descricao');

            
            $query = $this->usuario_model->atualizar($id, $nome, $email, $descricao);
            if( $query ) redirect(base_url('painel/sobre/atualizar'));
            

            $header['title'] = "Sobre - Formulário - Marcelo Geremias";
            $this->load->view('painel/header', $header);
            $data['erro'] = "Não foi possível realizar a operação.";
            $data['usuario'] = $this->usuario_model->buscaUsuario();
            $this->load->view('painel/formUsuario', $data);
            $this->load->view('painel/footer');
        }
    }

    public function recuperarSenha(){
        $this->load->helper('security');
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->helper('array');
        
        $this->form_validation->set_message('required', 'O campo %s deve ser preenchido corretamente.');
        $this->form_validation->set_message('valid_email', 'O campo %s deve possuir um email valido.');

        $this->form_validation->set_rules('email', 'e-mail', 'trim|required|valid_email|xss_clean');
        
        if($this->form_validation->run() === FALSE){
            $header['title'] = "Usuário - Formulário - Marcelo Geremias";
            $this->load->view('painel/header', $header);
            $data['usuario'] = $this->usuario_model->buscaUsuario();
            $this->load->view('painel/formRecuperarSenha', $data);
            $this->load->view('painel/footer');
        }
        else{
            $this->load->helper('array');
            $this->load->library('email');
            $email = $this->input->post('email');
            $usuario = $this->usuario_model->buscaUsuarioEmail($email);
            if( $usuario ) {
                $novaSenha = mt_rand ( 100000 , 999999 );
                $query = $this->usuario_model->atualizarSenha($usuario['usua_id'], $novaSenha);

                $this->email->from("contato@marcelogeremias.com.br", "Contato do site");
                $this->email->subject("Recuperação de senha do e-mail " . $email);
                $this->email->to($email);
                $this->email->cc('rprado@ifsp.edu.br');
                $this->email->message("Nova senha: " . $novaSenha);
                $resp = $this->email->send();

                $header['title'] = 'Usuário - Confirmação de recuperação de senha - Marcelo Geremias';
                $this->load->view('painel/header', $header);
                $data['mensagem'] = 'Foi enviado um e-mail com instruções para recuperar senha!';
                $this->load->view('painel/confirmacao', $data);
                $this->load->view('painel/footer');
            } else {
                $header['title'] = 'Usuário - Erro de recuperação de senha - Marcelo Geremias';
                $this->load->view('painel/header', $header);
                $data['mensagem'] = 'O e-mail informado não existe em nosso sistema!';
                $this->load->view('painel/erro', $data);
                $this->load->view('painel/footer');
            }
        }
    }

    public function atualizarSenha(){
        $this->load->helper('security');
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->helper('array');
        
        $this->form_validation->set_message('required', 'O campo %s deve ser preenchido corretamente.');

        $this->form_validation->set_rules('senhaAntiga', 'senha antiga', 'trim|required|xss_clean');
        $this->form_validation->set_rules('novaSenha', 'nova senha', 'trim|required|xss_clean');
        
        if($this->form_validation->run() === FALSE){
            $header['title'] = "Usuário - Formulário - Marcelo Geremias";
            $this->load->view('painel/header', $header);
            $data['usuario'] = $this->usuario_model->buscaUsuario();
            $this->load->view('painel/formAtualizarSenha', $data);
            $this->load->view('painel/footer');
        }
        else{
            $this->load->helper('array');
            $this->load->library('email');
            $senhaAntiga = $this->input->post('senhaAntiga');
            $novaSenha = $this->input->post('novaSenha');

            $login = $this->usuario_model->login($this->session->userdata('u_email'), $senhaAntiga);

            if( $login ) {
                $email = $this->session->userdata('u_email');
                $query = $this->usuario_model->atualizarSenha($this->session->userdata('u_id'), $novaSenha);

                $header['title'] = 'Usuário - Confirmação de recuperação de senha - Marcelo Geremias';
                $this->load->view('painel/header', $header);
                $data['mensagem'] = 'Senha atualizada com sucesso!';
                $this->load->view('painel/confirmacao', $data);
                $this->load->view('painel/footer');
            } else {
                $header['title'] = 'Usuário - Erro de recuperação de senha - Marcelo Geremias';
                $this->load->view('painel/header', $header);
                $data['mensagem'] = 'Não foi possível atualizar o sistema.';
                $this->load->view('painel/erro', $data);
                $this->load->view('painel/footer');
            }
        }
    }

    public function confirmarAtualizacaoUsuario() {
        $header['title'] = 'Usuário - Confirmação de atualização - Marcelo Geremias';
        $this->load->view('painel/header', $header);
        $data['mensagem'] = 'O usuário foi atualizado com sucesso!';
        $this->load->view('painel/confirmacao', $data);
        $this->load->view('painel/footer');
    }

    public function gerarPDF() {
        //this data will be passed on to the view
        $data['usuario'] = $this->usuario_model->buscaUsuario();
        $data['trabalhos'] = $this->trabalho_model->buscaTrabalhos();
        $data['formacoes'] = $this->formacao_model->buscaFormacoes();
         
        //load the view, pass the variable and do not show it but "save" the output into $html variable
        $html=$this->load->view('pdf_output', $data, true); 
         
        //this the the PDF filename that user will get to download
        $pdfFilePath = "marcelogeremias.pdf";
         
        //load mPDF library
        $this->load->library('m_pdf');
        //actually, you can pass mPDF parameter on this load() function
        $pdf = $this->m_pdf->load();
        //generate the PDF!
        $pdf->WriteHTML($html);
        //offer it to user via browser download! (The PDF won't be saved on your server HDD)
        $pdf->Output($pdfFilePath, "D");
    }
}