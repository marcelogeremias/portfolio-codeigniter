<?php

    /**
     * DAO criada para buscar as informações
     * do contato.
     *
     * @author Marcelo Geremias
     */

class ContatoDAO extends CI_Model {
    function ContatoDAO() {
        parent::__construct();
        $this->load->database();
    }

    function inserir($nome, $email, $assunto, $mensagem){
        $this->load->helper('array');
        $contato = array(
            'cont_nm' => $nome,
            'cont_em' => $email,
            'cont_as' => $assunto,
            'cont_ms' => $mensagem
            );
        $this->db->insert('lp_contatos', $contato);
    }

    function buscaContatos(){
        $this->db->select('cont_id, cont_nm, cont_em, cont_as, cont_ms, cont_inse_dt');
        $this->db->from('lp_contatos');
        $query = $this->db->get()->result_array();
        return $query;
    }

    function detalheContato($contato){
        $this->db->select('cont_id, cont_nm, cont_em, cont_as, cont_ms, cont_inse_dt');
        $this->db->from('lp_contatos');
        $this->db->where('cont_id', $contato);
        $query = $this->db->get()->row_array();
        return $query;
    }

}
