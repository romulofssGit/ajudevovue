<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ControleSolicitante extends CI_Controller {

	private $id_contratante;

	public function __construct(){
		parent::__construct();
		
		$this->load->helper('url');		
		$this->load->model('ControleSolicitanteDB');	
	}

	public function index() {
      /*Verifica sessão do usuário*/
      if (!$this->controleacesso->isUsuarioLogado()) {
         redirect('/Home/');
      }

      $arrTitulo = array(
      	'titulo_tela' => 'Serviços&nbsp;solicitados'
      );

		$this->load->view('ControleSolicitante', $arrTitulo);
	}

	public function buscaServico(){
		$listaDetalheServico = $this->ControleSolicitanteDB->
			getDadosServico($this->session->userdata('id_contratante'))->result_array();

		echo json_encode($listaDetalheServico);
	}
}