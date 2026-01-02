<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
        $this->autori->admin();

  }
  public function cadastrar_usuario()
  {
    $config['upload_path']   = './uploads/usuarios/';
    $config['allowed_types'] = 'jpg|jpeg|png';
    $config['max_size']      = 2048; // 2MB
    $config['encrypt_name']  = true; // gera nome aleatório

    $this->load->library('upload', $config);

    $foto = null;

    if (!empty($_FILES['foto']['name'])) {

        if ($this->upload->do_upload('foto')) {
            $fileData = $this->upload->data();
            $foto = $fileData['file_name']; // aqui você salva no banco
        } else {
            // retorna JSON correto SEM ECHO!
            $output = $this->response(false, strip_tags($this->upload->display_errors()), null);
            return $this->output->set_content_type('application/json')
                                ->set_output(json_encode($output));
        }
    } 
    
  }
}