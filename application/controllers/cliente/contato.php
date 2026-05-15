<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class contato extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }
    public function index()
    {
       $data['tela_cliente'] = $this->global_model->get('tela_cliente', 1, true);
        $this->load->view("cliente\pages\contato", $data);
       
    }
}