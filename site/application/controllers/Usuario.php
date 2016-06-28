<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once 'MY_Controller.php';

class Usuario extends MY_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('url_helper');
        $this->load->library('session');
        $this->load->model('usuario_model');
        $this->load->model('dao/UsuarioDAO');
    }

	public function index(){
        $header['title'] = 'Marcelo Geremias';
        $this->load->view('common/header', $header);
        $data['usuario'] = $this->usuario_model->buscaUsuario();
        $this->load->view('front/home', $data);
        $this->load->view('common/footer');
	}

    public function gerarPDF() {
        //this data will be passed on to the view
        $data['the_content']='mPDF and CodeIgniter are cool!';
         
        //load the view, pass the variable and do not show it but "save" the output into $html variable
        $html=$this->load->view('pdf_output', $data, true); 
         
        //this the the PDF filename that user will get to download
        $pdfFilePath = "marcelogeremias.pdf";
         
        //load mPDF library
        $this->load->library('m_pdf');
        //actually, you can pass mPDF parameter on this load() function
        $pdf = $this->m_pdf->load();
        //generate the PDF!
        $pdf->WriteHTML($html);
        //offer it to user via browser download! (The PDF won't be saved on your server HDD)
        $pdf->Output($pdfFilePath, "D");
    }
}