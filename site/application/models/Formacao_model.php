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
	}
?>