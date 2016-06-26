<?php
	
	/**
	 * Model para manipular as informações
	 * do usuário.
	 *
	 * @author Marcelo Geremias
	 */
	class Usuario_model extends CI_Model{
		public function __construct(){
			$this->load->database();
        	$this->load->model('dao/UsuarioDAO');
		}

    	public function buscaUsuario(){
			$usuario = $this->UsuarioDAO->buscaUsuario();
			return $usuario;
		}
	}
?>