<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class minha_agenda extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
		 $this->autori->cliente();

  }
  public function index()
  {
        $data['minha_agenda'] = $this->agenda_model->buscar_agenda($this->session->userdata('id'));
        $this->load->view('cliente/pages/minha_agenda',$data);

  }
  public function historico_agenda()
  {
        $data['historico_agenda'] = $this->agenda_model->buscar_agenda($this->session->userdata('id'));

        $this->load->view('cliente/pages/historico_agenda' , $data);

  }
}