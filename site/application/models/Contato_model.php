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

    	public function inserir($nome, $email, $assunto, $mensagem){
			$contato = $this->ContatoDAO->inserir($nome, $email, $assunto, $mensagem);
			return $contato;
		}

		public function buscaContatos(){
			$contato = $this->ContatoDAO->buscaContatos();
			return $contato;
		}

		public function detalheContato($contato){
			$contato = $this->ContatoDAO->detalheContato($contato);
			return $contato;
		}
	}
?>