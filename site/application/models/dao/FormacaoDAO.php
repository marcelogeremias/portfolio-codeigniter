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

        function detalheFormacao($formacao){
            $this->db->select('form_id, form_nm, form_in, form_tp, form_ini_dt, form_ter_dt, form_inse_dt');
            $this->db->from('lp_formacoes');
            $this->db->where('form_id', $formacao);
            $query = $this->db->get()->row_array();
            return $query;
        }

        function inserir($nome, $instituicao, $tipo, $dt_ini, $dt_ter){
            $this->load->helper('array');
            $sobre = array(
                'form_usua_id' => $this->session->userdata('u_id'),
                'form_nm' => $nome,
                'form_in' => $instituicao,
                'form_tp' => $tipo, 
                'form_ini_dt' => $dt_ini, 
                'form_ter_dt' => $dt_ter
            );
            $query = $this->db->insert('lp_formacoes', $sobre);
            return $query;
        }

        function atualizar($id, $nome, $instituicao, $tipo, $dt_ini, $dt_ter){
            $this->load->helper('array');
            $sobre = array(
                'form_nm' => $nome,
                'form_in' => $instituicao,
                'form_tp' => $tipo, 
                'form_ini_dt' => $dt_ini, 
                'form_ter_dt' => $dt_ter
            );
            $this->db->where('form_id', $id);
            $query = $this->db->update('lp_formacoes', $sobre);
            return $query;
        }

        function remover($id){
            $this->db->where('form_id', $id);
            $query = $this->db->delete('lp_formacoes');
            return $query;
        }

    }
