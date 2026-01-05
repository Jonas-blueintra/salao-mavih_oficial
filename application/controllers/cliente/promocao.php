<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 

class promocao extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
		 $this->autori->cliente();

    }
 public function index()
 {
  
 }
 public function promocao()
 {
    $data['servico_promocao'] = $this->Servicos_model->servico_promocao_todos();
        $this->load->view('cliente/pages/promocao',$data);
 }
}