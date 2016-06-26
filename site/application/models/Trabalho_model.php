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
	}
?>