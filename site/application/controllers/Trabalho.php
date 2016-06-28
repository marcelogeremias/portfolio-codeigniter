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

    public function listaTrabalhos(){
        $header['title'] = 'Trabalhos - Painel - Marcelo Geremias';
        $this->load->view('painel/header', $header);
        $data['trabalhos'] = $this->trabalho_model->buscaTrabalhos();
        $this->load->view('painel/trabalhos', $data);
        $this->load->view('painel/footer');
    }

    public function detalheTrabalho($trabalho){
        $header['title'] = 'Trabalho - Formulário - Marcelo Geremias';
        $this->load->view('painel/header', $header);
        $data['trabalho'] = $this->trabalho_model->detalheTrabalho($trabalho);
        $this->load->view('painel/formTrabalho', $data);
        $this->load->view('painel/footer');
    }

    public function atualizaTrabalho($trabalho){
        $this->load->helper('security');
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->helper('array');
        
        $this->form_validation->set_message('required', 'O campo %s deve ser preenchido corretamente.');
        $this->form_validation->set_message('valid_email', 'O campo %s deve possuir um email valido.');

        $this->form_validation->set_rules('id', 'id', 'trim|xss_clean');
        $this->form_validation->set_rules('nome', 'nome', 'trim|required|xss_clean');
        $this->form_validation->set_rules('descricao', 'descricao', 'trim|required|xss_clean');
        
        if($this->form_validation->run() === FALSE){
            $header['title'] = "Trabalho - Formulário - Marcelo Geremias";
            $this->load->view('painel/header', $header);
            $data['trabalho'] = $this->trabalho_model->detalheTrabalho($trabalho);
            $this->load->view('painel/formTrabalho', $data);
            $this->load->view('painel/footer');
        }
        else{
            $id = $this->input->post('id');
            $nome = $this->input->post('nome');
            $descricao = $this->input->post('descricao');

            if( empty( $id ) || $id == 0 ) {
                $query = $this->trabalho_model->inserir($nome, $descricao);
                if( $query ) redirect(base_url('painel/trabalhos/cadastrar'));
            } else {
                $query = $this->trabalho_model->atualizar($id, $nome, $descricao);
                if( $query ) redirect(base_url('painel/trabalhos/atualizar'));
            }

            $header['title'] = "Trabalho - Formulário - Marcelo Geremias";
            $this->load->view('painel/header', $header);
            $data['erro'] = "Não foi possível realizar a operação.";
            $data['trabalho'] = $this->trabalho_model->detalheTrabalho($trabalho);
            $this->load->view('painel/formTrabalho', $data);
            $this->load->view('painel/footer');
        }
    }

    public function confirmarCadastroTrabalho() {
        $header['title'] = 'Trabalho - Confirmação de cadastro - Marcelo Geremias';
        $this->load->view('painel/header', $header);
        $data['mensagem'] = 'O trabalho foi cadastrado com sucesso!';
        $this->load->view('painel/confirmacao', $data);
        $this->load->view('painel/footer');
    }

    public function confirmarAtualizacaoTrabalho() {
        $header['title'] = 'Trabalho - Confirmação de atualização - Marcelo Geremias';
        $this->load->view('painel/header', $header);
        $data['mensagem'] = 'O trabalho foi atualizado com sucesso!';
        $this->load->view('painel/confirmacao', $data);
        $this->load->view('painel/footer');
    }

    public function removeTrabalho($id) {
        $query = $this->trabalho_model->remover($id);
        if( $query ) {
            $header['title'] = 'Trabalho - Confirmação de remoção - Marcelo Geremias';
            $this->load->view('painel/header', $header);
            $data['mensagem'] = 'O trabalho foi removido com sucesso!';
            $this->load->view('painel/confirmacao', $data);
            $this->load->view('painel/footer');
        } else {
            $header['title'] = 'Trabalho - Erro - Marcelo Geremias';
            $this->load->view('painel/header', $header);
            $data['mensagem'] = 'Não foi possível remover o trabalho';
            $this->load->view('painel/erro', $data);
            $this->load->view('painel/footer');
        }
    }
}