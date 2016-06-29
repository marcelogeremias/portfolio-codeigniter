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

		public function login($email, $senha){
			$usuario = $this->UsuarioDAO->login($email, $senha);
			return $usuario;
		}

		public function atualizar($id, $nome, $email, $descricao){
			$usuario = $this->UsuarioDAO->atualizar($id, $nome, $email, $descricao);
			return $usuario;
		}

		public function atualizarSenha($id, $senha){
			$usuario = $this->UsuarioDAO->atualizarSenha($id, $senha);
			return $usuario;
		}
	}
?>