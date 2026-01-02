<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class home extends CI_Controller {

	 
	 public function __construct()
	 {
		 parent::__construct();
		 $this->autori->cliente();
	 }
 	 public function index()
	 {$data['comentario'] = $this->crud->UltimasAvaliacoes();
        $data['mostrar_serviços'] =  $this->Servicos_model->servicos_vs_cliente();
		$data['equipe'] = $this->global_model->buscar_tabela_interia('equipe');

		 $this->load->view('cliente/pages/cliente' , $data);
	 }
	 
public function salvar()
{
    $estrelas = $this->input->post('rating');
    $comentario = $this->input->post('comentario');

   
 $dados = [
		"id_cliente" => $this->session->userdata('id'),
		"nome" => $this->session->userdata('nome'),
        "estrelas" => $estrelas,
        "comentario" => $comentario,
		"foto" => $this->session->userdata('foto'),
        "data_comentario" => date('Y-m-d H:i:s'),
 ];

  $insert = $this->global_model->insert('avaliacoes',$dados);

   if($insert > 0)
   {
	$mens ="Avaliação enviada com sucesso 💖";
	$result = Result::susses('', $mens);
   }else
   {
	$mens = "erro";
	$result = Result::error('', $mens);
   }

	 $output = $this->crud->response($result->susses, $result->message);
         ob_clean();
    return $this->output->set_content_type('application/json')->set_output(json_encode($output));
    
}

}
