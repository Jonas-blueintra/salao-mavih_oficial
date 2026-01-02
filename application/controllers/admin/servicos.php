<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once APPPATH . 'entity/servico.php';

class Servicos extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Servicos_model');
        $this->autori->admin();


    }
    public function index()
    {
        $this->load->view('admin/pages/novo_servico');
    }

    public function cadastrar()
    {

        $config['upload_path'] = './uploads/servicos/';
        $config['allowed_types'] = 'jpg|jpeg|png';
        $config['max_size'] = 2048; // 2MB
        $config['encrypt_name'] = true; // gera nome aleatório

        $this->load->library('upload', $config);

        $foto = null;

        if (!empty($_FILES['foto']['name'])) {

            if ($this->upload->do_upload('foto')) {
                $fileData = $this->upload->data();
                $foto = $fileData['file_name']; // aqui você salva no banco
            } else {
                // retorna JSON correto SEM ECHO!
                $output = $this->response(false, strip_tags($this->upload->display_errors()), null);
ob_clean();
                return $this->output->set_content_type('application/json')
                    ->set_output(json_encode($output));
            }
        }


        $servico = [];


        $servico = [
            'nome' => $this->input->post('nome'),
            'duracao' => $this->input->post('duracao'),
            'valor' => $this->input->post('valor'),
            'promocao' => 'inativo',
            'foto' => $foto,
            'tipo_servico' => $this->input->post('tipo_servico'),
            'descricao' => $this->input->post('descricao')
        ];


        $result = $this->Servicos_model->cadastrar_servico('servicos', $servico);
ob_clean();
        $output = $this->response($result->susses, $result->message);
        return $this->output->set_content_type('application/json')->set_output(json_encode($output));

    }


    public function cadastrar_promocao()
    {

        $config['upload_path'] = './uploads/servicos/';
        $config['allowed_types'] = 'jpg|jpeg|png';
        $config['max_size'] = 2048; // 2MB
        $config['encrypt_name'] = true; // gera nome aleatório

        $this->load->library('upload', $config);

        $foto = null;

        if (!empty($_FILES['foto']['name'])) {

            if ($this->upload->do_upload('foto')) {
                $fileData = $this->upload->data();
                $foto = $fileData['file_name']; // aqui você salva no banco
            } else {
                // retorna JSON correto SEM ECHO!
                $output = $this->response(false, strip_tags($this->upload->display_errors()), null);
               ob_clean();
                return $this->output->set_content_type('application/json')
                    ->set_output(json_encode($output));
            }
        }


        $servico = [];


        $servico = [
            'nome' => $this->input->post('nome'),
            'descricao' => $this->input->post('descricao'),
            'valor' => $this->input->post('valor'),
            'preco_antigo' => $this->input->post('valor_antigo'),
            'duracao' => $this->input->post('duracao'),
            'tempo_promocao' =>  date('d/m/Y', strtotime($this->input->post('data_final'))),
            'promocao' => 'ativo',
            'foto' => $foto,
            'tipo_servico' => $this->input->post('tipo_servico'),
        ];


        $result = $this->Servicos_model->cadastrar_servico('servicos', $servico);
        $output = $this->response($result->susses, $result->message);
        ob_clean();
        return $this->output->set_content_type('application/json')->set_output(json_encode($output));

    }

    public function response($succes, $mensag = "", $data = null)
    {
        $erro = $succes ? '0' : '1';

        $output = [
            "error" => $erro,
            "msg" => $mensag,
            "data" => $data

        ];
        return $output;
    }
    // public function servicos($pagina = 1)
    // {
    //     $limit = 20; // quantidade por página
    //     $offset = ($pagina - 1) * $limit;

    //     $this->load->model('Servicos_model');

    //     $data['servicos'] = $this->Servicos_model->listar_paginado($limit, $offset);

    //     $total = $this->Servicos_model->total_servicos();
    //     $data['total_paginas'] = ceil($total / $limit);
    //     $data['pagina_atual'] = $pagina;

    //     $this->load->view('admin/servicos/index', $data);
    // }

    public function salvar($id)
    {
        $config['upload_path'] = './uploads/servicos/';
        $config['allowed_types'] = 'jpg|jpeg|png';
        $config['max_size'] = 2048; // 2MB
        $config['encrypt_name'] = true; // gera nome aleatório

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
        } else {
            $servico = $this->Servicos_model->servico($id);
            $foto = $servico->data->foto;
        }

        // $foto = $this->input->post('foto');
        //  if(!$foto)
        //  {
        //     $servico = $this->Servicos_model->servico($id);
        //     $foto = $servico->data->foto;
        //  }
        //  else{
        //     $foto = $this->input->post('foto');
        //  }
        $Servico = [];
        $Servico = [
            'nome' => $this->input->post('nome'),
            'duracao' => $this->input->post('duracao'),
            'valor' => $this->input->post('valor'),
            'promocao' => 'inativo',
            'foto' => $foto,
        ];
        $result = $this->Servicos_model->salvar_servico('servicos', 'id', $id, $Servico);

        $output = $this->response($result->susses, $result->message);
         return $this->output->set_content_type('application/json', 'utf-8')
        ->set_output(json_encode($output));
    }
     public function salvar_promocao($id)
    {
        $config['upload_path'] = './uploads/servicos/';
        $config['allowed_types'] = 'jpg|jpeg|png';
        $config['max_size'] = 2048; // 2MB
        $config['encrypt_name'] = true; // gera nome aleatório

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
        } else {
            $servico = $this->Servicos_model->servico($id);
            $foto = $servico->data->foto;
        }
        $Servico = [];
        $Servico = [
            'nome' => $this->input->post('nome'),
            'descricao' => $this->input->post('descricao'),
            'valor' => $this->input->post('valor'),
            'preco_antigo' => $this->input->post('valor_antigo'),
            'duracao' => $this->input->post('duracao'),
            'tempo_promocao' =>  date('d/m/Y', strtotime($this->input->post('data_final'))),
            'promocao' => 'ativo',
            'foto' => $foto,
            'tipo_servico' => $this->input->post('tipo_servico'),
        ];
        $result = $this->Servicos_model->salvar_servico('servicos', 'id', $id, $Servico);
ob_clean();
        $output = $this->response($result->susses, $result->message);
        return $this->output->set_content_type('application/json')->set_output(json_encode($output));

    }

    public function excluir($id)
    {
        $Servico = $this->Servicos_model->servico($id);

        $result = $this->Servicos_model->excluir_servico('servicos', 'id', $id);
        $output = $this->response($result->susses, $result->message, $Servico);
      ob_clean();
        return $this->output->set_content_type('application/json')->set_output(json_encode($output));
    }
}