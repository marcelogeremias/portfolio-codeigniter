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

        function detalheTrabalho($trabalho){
            $this->db->select('trab_id, trab_nm, trab_ds, trab_inse_dt');
            $this->db->from('lp_trabalhos');
            $this->db->where('trab_id', $trabalho);
            $query = $this->db->get()->row_array();
            return $query;
        }

        function inserir($nome, $descricao){
            $this->load->helper('array');
            $args = array(
                'trab_usua_id' => $this->session->userdata('u_id'),
                'trab_nm' => $nome,
                'trab_ds' => $descricao,
            );
            $query = $this->db->insert('lp_trabalhos', $args);
            return $query;
        }

        function atualizar($id, $nome, $descricao){
            $this->load->helper('array');
            $args = array(
                'trab_nm' => $nome,
                'trab_ds' => $descricao,
            );
            $this->db->where('trab_id', $id);
            $query = $this->db->update('lp_trabalhos', $args);
            return $query;
        }

        function remover($id){
            $this->db->where('trab_id', $id);
            $query = $this->db->delete('lp_trabalhos');
            return $query;
        }

    }
