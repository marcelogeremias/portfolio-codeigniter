<?php

    /**
     * DAO criada para buscar as informações
     * do trabalho.
     *
     * @author Marcelo Geremias
     */

    class TrabalhoDAO extends CI_Model {
        function TrabalhoDAO() {
            parent::__construct();
            $this->load->database();
        }

        function buscaTrabalhos(){
            $this->db->select('trab_id, trab_nm, trab_ds');
            $this->db->from('lp_trabalhos');
            $query = $this->db->get()->result_array();
            return $query;
        }

        function alterar($nome, $descricao){
            $this->load->helper('array');
            $sobre = array(
                'trab_nm' => $nome,
                'trab_ds' => $descricao,
            );
            $this->db->update('lp_trabalhos', $sobre);
        }

    }
