<?php
	
	/**
	 * Model para manipular as informações
	 * do usuário.
	 *
	 * @author Marcelo Geremias
	 */
	class Trabalho_model extends CI_Model{
		public function __construct(){
			$this->load->database();
        	$this->load->model('dao/TrabalhoDAO');
		}

    	public function buscaTrabalhos(){
			$trabalho = $this->TrabalhoDAO->buscaTrabalhos();
			return $trabalho;
		}

		public function detalheTrabalho($trabalho){
			$trabalho = $this->TrabalhoDAO->detalheTrabalho($trabalho);
			return $trabalho;
		}

		public function inserir($nome, $descricao){
			$trabalho = $this->TrabalhoDAO->inserir($nome, $descricao);
			return $trabalho;
		}

		public function atualizar($id, $nome, $descricao){
			$trabalho = $this->TrabalhoDAO->atualizar($id, $nome, $descricao);
			return $trabalho;
		}

		public function remover($id){
			$trabalho = $this->TrabalhoDAO->remover($id);
			return $trabalho;
		}
	}
?>