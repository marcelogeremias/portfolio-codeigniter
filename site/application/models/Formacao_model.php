<?php
	
	/**
	 * Model para manipular as informações
	 * do usuário.
	 *
	 * @author Marcelo Geremias
	 */
	class Formacao_model extends CI_Model{
		public function __construct(){
			$this->load->database();
        	$this->load->model('dao/FormacaoDAO');
		}

    	public function buscaFormacoes(){
			$formacao = $this->FormacaoDAO->buscaFormacoes();
			return $formacao;
		}

		public function detalheFormacao($formacao){
			$formacao = $this->FormacaoDAO->detalheFormacao($formacao);
			return $formacao;
		}

		public function inserir($nome, $instituicao, $tipo, $dt_ini, $dt_ter){
			$trabalho = $this->FormacaoDAO->inserir($nome, $instituicao, $tipo, $dt_ini, $dt_ter);
			return $trabalho;
		}

		public function atualizar($id, $nome, $instituicao, $tipo, $dt_ini, $dt_ter){
			$trabalho = $this->FormacaoDAO->atualizar($id, $nome, $instituicao, $tipo, $dt_ini, $dt_ter);
			return $trabalho;
		}

		public function remover($id){
			$trabalho = $this->FormacaoDAO->remover($id);
			return $trabalho;
		}
	}
?>