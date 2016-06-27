<?php

    /**
     * DAO criada para buscar as informações
     * do usuário.
     *
     * @author Marcelo Geremias
     */

    class UsuarioDAO extends CI_Model {
        function UsuarioDAO() {
            parent::__construct();
            $this->load->database();
        }

        function buscaUsuario(){
            $this->db->select('usua_id, usua_nm, usua_ds, usua_em');
            $this->db->from('lp_usuario');
            $query = $this->db->get();
            return $query->row_array();
        }

        function login($email, $senha){
            $this->db->select('usua_id, usua_nm, usua_ds, usua_em');
            $this->db->from('lp_usuario');
            $this->db->where('usua_em', $email);
            $this->db->where('usua_sn', 'MD5("' . $senha . '")', FALSE);
            $query = $this->db->get()->row_array();
            return $query;
        }

        function alterar($nome, $descricao, $email){
            $this->load->helper('array');
            $sobre = array(
                'usua_nm' => $nome,
                'usua_ds' => $descricao,
                'usua_em' => $email
            );
            $this->db->update('lp_usuario', $sobre);
        }

    }
