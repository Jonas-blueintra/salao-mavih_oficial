<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Equipe extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
		 $this->autori->cliente();

    }
    public function index()
    {
		$data['equipe'] = $this->global_model->buscar_tabela_interia('equipe');

        $this->load->view('cliente/pages/equipe' ,$data);
        

    }
}