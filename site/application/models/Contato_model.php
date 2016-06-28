<?php
	
	/**
	 * Model para manipular as informações
	 * do usuário.
	 *
	 * @author Marcelo Geremias
	 */
	class Contato_model extends CI_Model{
		public function __construct(){
			$this->load->database();
        	$this->load->model('dao/ContatoDAO');
		}

    	public function inserir(){
    		$this->load->helper('array');
	        $nome = $this->input->post('nome');
	        $email = $this->input->post('email');
	        $assunto = $this->input->post('assunto');
	        $mensagem = $this->input->post('mensagem');
			$this->ContatoDAO->inserir($nome, $email, $assunto, $mensagem);
		}

		public function buscaContatos(){
			$formacao = $this->ContatoDAO->buscaContatos();
			return $formacao;
		}

		public function detalheContato($contato){
			$contato = $this->ContatoDAO->detalheContato($contato);
			return $contato;
		}
	}
?>