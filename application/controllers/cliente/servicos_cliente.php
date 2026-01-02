<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Servicos_cliente extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Servicos_model');
		 $this->autori->cliente();

    }
    public function index()
    {
        $data['mostrar_serviços'] = $this->mostrar_servicos();
        $this->load->view('cliente/pages/servicos_cliente',$data);
    }
    public function mostrar_servicos()  
    {
        $servicos = $this->Servicos_model->servicos_vs_cliente();
        return $servicos->data;
    }
    
}