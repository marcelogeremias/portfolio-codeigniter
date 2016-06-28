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

    public function listaFormacoes(){
        $header['title'] = 'Formações - Painel - Marcelo Geremias';
        $this->load->view('painel/header', $header);
        $data['formacoes'] = $this->formacao_model->buscaFormacoes();
        $this->load->view('painel/formacoes', $data);
        $this->load->view('painel/footer');
    }

    public function detalheFormacao($formacao){
        $header['title'] = "Formação - Formulário - Marcelo Geremias";
        $this->load->view('painel/header', $header);
        $data['formacao'] = $this->formacao_model->detalheFormacao($formacao);
        $this->load->view('painel/formFormacao', $data);
        $this->load->view('painel/footer');
    }

    public function atualizaFormacao($formacao){
        $this->load->helper('security');
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->helper('array');
        
        $this->form_validation->set_message('required', 'O campo %s deve ser preenchido corretamente.');
        $this->form_validation->set_message('valid_email', 'O campo %s deve possuir um email valido.');

        $this->form_validation->set_rules('id', 'id', 'trim|xss_clean');
        $this->form_validation->set_rules('nome', 'nome', 'trim|required|xss_clean');
        $this->form_validation->set_rules('instituicao', 'instituição', 'trim|required|xss_clean');
        $this->form_validation->set_rules('tipo', 'tipo de formação', 'trim|required|xss_clean');
        $this->form_validation->set_rules('inicio', 'data de início', 'trim|required|xss_clean');
        $this->form_validation->set_rules('termino', 'data de término', 'trim|required|xss_clean');
        
        if($this->form_validation->run() === FALSE){
            $header['title'] = "Formação - Formulário - Marcelo Geremias";
            $this->load->view('painel/header', $header);
            $data['formacao'] = $this->formacao_model->detalheFormacao($formacao);
            $this->load->view('painel/formFormacao', $data);
            $this->load->view('painel/footer');
        }
        else{
            $id = $this->input->post('id');
            $nome = $this->input->post('nome');
            $instituicao = $this->input->post('instituicao');
            $tipo = $this->input->post('tipo');
            $dt_ini = $this->input->post('inicio');
            $dt_ter = $this->input->post('termino');

            if( empty( $id ) || $id == 0 ) {
                $query = $this->formacao_model->inserir($nome, $instituicao, $tipo, $dt_ini, $dt_ter);
                if( $query ) redirect(base_url('painel/formacoes/cadastrar'));
            } else {
                $query = $this->formacao_model->atualizar($id, $nome, $instituicao, $tipo, $dt_ini, $dt_ter);
                if( $query ) redirect(base_url('painel/formacoes/atualizar'));
            }

            $header['title'] = "Formação - Formulário - Marcelo Geremias";
            $this->load->view('painel/header', $header);
            $data['erro'] = "Não foi possível realizar a operação.";
            $data['formacao'] = $this->formacao_model->detalheFormacao($formacao);
            $this->load->view('painel/formFormacao', $data);
            $this->load->view('painel/footer');
        }
    }

    public function confirmarCadastroFormacao() {
        $header['title'] = 'Formação - Confirmação de cadastro - Marcelo Geremias';
        $this->load->view('painel/header', $header);
        $data['mensagem'] = 'A formação foi cadastrada com sucesso!';
        $this->load->view('painel/confirmacao', $data);
        $this->load->view('painel/footer');
    }

    public function confirmarAtualizacaoFormacao() {
        $header['title'] = 'Formação - Confirmação de atualização - Marcelo Geremias';
        $this->load->view('painel/header', $header);
        $data['mensagem'] = 'A formação foi atualizada com sucesso!';
        $this->load->view('painel/confirmacao', $data);
        $this->load->view('painel/footer');
    }  

    public function removeFormacao($id) {
        $query = $this->formacao_model->remover($id);
        if( $query ) {
            $header['title'] = 'Formação - Confirmação de remoção - Marcelo Geremias';
            $this->load->view('painel/header', $header);
            $data['mensagem'] = 'A formação foi removida com sucesso!';
            $this->load->view('painel/confirmacao', $data);
            $this->load->view('painel/footer');
        } else {
            $header['title'] = 'Formação - Erro - Marcelo Geremias';
            $this->load->view('painel/header', $header);
            $data['mensagem'] = 'Não foi possível remover a formação';
            $this->load->view('painel/erro', $data);
            $this->load->view('painel/footer');
        }
    } 
}