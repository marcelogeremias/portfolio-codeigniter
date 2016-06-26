<?php

    /**
     * DAO criada para buscar as informações
     * do formacao.
     *
     * @author Marcelo Geremias
     */

    class FormacaoDAO extends CI_Model {
        function FormacaoDAO() {
            parent::__construct();
            $this->load->database();
        }

        function buscaFormacoes(){
            $this->db->select('form_id, form_nm, form_in, form_tp, form_ini_dt, form_ter_dt');
            $this->db->from('lp_formacoes');
            $query = $this->db->get()->result_array();
            return $query;
        }

        function alterar($nome, $instituicao, $tipo, $email, $dt_ini, $dt_ter){
            $this->load->helper('array');
            $sobre = array(
                'form_nm' => $nome,
                'form_in' => $instituicao,
                'form_tp' => $tipo, 
                'form_ini_dt' => $dt_ini, 
                'form_ter_dt' => $dt_ter
            );
            $this->db->update('lp_formacoes', $sobre);
        }

    }
