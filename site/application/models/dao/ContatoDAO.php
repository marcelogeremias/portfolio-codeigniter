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

}
