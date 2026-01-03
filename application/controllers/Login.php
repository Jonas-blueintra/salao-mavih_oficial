<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');

    }
    public function index()
    {
        $this->load->view('login');
    }

    public function primeiro_acesso()
    {
        $load['inc_css'] = ['form-advanced'];
        $load['inc_js'] = ['form-advanced'];
        $this->load->view('novo_usuario', $load);

    }

    public function recuperar_senha()
    {
        $load['inc_css'] = ['form-advanced'];
        $load['inc_js'] = ['form-advanced'];
        $this->load->view('recuperar_senha', $load);

    }
    public function validar_login()
    {
        ob_clean();

        $this->form_validation->set_error_delimiters('', '');
        $this->form_validation->set_rules('email', 'E-mail ou Login', 'trim|required');
        $this->form_validation->set_rules('senha', 'Senha', 'trim|required|min_length[6]');

        if ($this->form_validation->run() == FALSE) {
            $output = $this->response(false, validation_errors());
            return $this->output
                ->set_content_type('application/json', 'utf-8')
                ->set_output(json_encode($output));
        }

        $email = $this->input->post('email');
        $senha = $this->input->post('senha');

        $result = $this->crud->Login($email, $senha);

        if ($result->susses == false) {
            $output = $this->response(false, $result->message);
            return $this->output
                ->set_content_type('application/json', 'utf-8')
                ->set_output(json_encode($output));
        }

        switch ($result->data->tipo) {
            case 'cliente':
                $redirect = base_url('cliente/home');
                break;
            case 'admin':
                $redirect = base_url('admin/home');
                break;
        }

        $this->session->set_userdata([
            'logado' => true,
            'id' => $result->data->id,
            'tipo' => $result->data->tipo,
            'nome' => $result->data->nome,
            'foto' => $result->data->foto,
            'telefone' => $result->data->telefone,
        ]);

        session_write_close();

        $output = $this->response(true, $result->message, $result->data, $redirect);
        return $this->output
            ->set_content_type('application/json', 'utf-8')
            ->set_output(json_encode($output));
    }


    private function response($succes, $mensag = "", $data = null, $redirect = null)
    {
        $erro = $succes ? '0' : '1';

        $output = [
            "error" => $erro,
            "msg" => $mensag,
            "data" => $data,
            "redirencionar_pagina" => $redirect
            ,
        ];
        return $output;
    }
    public function logout()
    {
        $this->session->sess_destroy();
        $this->output->set_header('Cache-Control: no-cache, must-revalidate');
        $this->output->set_header('Pragma: no-cache');
        redirect('login');
    }

    public function cadastrar_usuario()
    {
        $tipo = $this->input->post('tipo');
        if ($tipo == 'cliente') {
            $config['upload_path'] = './uploads/usuarios/';
            $config['allowed_types'] = 'jpg|jpeg|png';
            $config['max_size'] = 2048; // 2MB
            $config['encrypt_name'] = true; // gera nome aleatório

            $this->load->library('upload', $config);
        } else {
            $config['upload_path'] = './uploads/admin/';
            $config['allowed_types'] = 'jpg|jpeg|png';
            $config['max_size'] = 2048; // 2MB
            $config['encrypt_name'] = true; // gera nome aleatório

            $this->load->library('upload', $config);
        }
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
        $usuario = [];
        if ($this->input->post('tipo') == null) {
            $tipo = 'cliente';
            $status = 'ativo';
        }

        if ($this->input->post('tipo') == 'cliente') {
            $tipo = 'cliente';
            $status = $this->input->post('status');
        }
        if ($this->input->post('tipo') == 'admin') {
            $tipo = 'admin';
            $status = $this->input->post('status');

        }


        $usuario = [
            'nome' => $this->input->post('nome'),
            'email' => $this->input->post('email'),
            'login' => $this->input->post('login'),
            'senha' => $this->input->post('senha'),
            'foto' => $foto,
            'sexo' => $this->input->post('sexo'),
            'telefone' => $this->input->post('telefone'),
            'endereco' => $this->input->post('endereco'),
            'tipo' => $tipo,
            'status' => $status,
            'data_cadastro' => date("Y-m-d H:i:s"),
        ];

        $sessin = $this->session->userdata('tipo');
        $result = $this->cliente_model->cadastrar($usuario, $sessin);
        $output = $this->response($result->susses, $result->message, '', $result->data);
        ob_clean();
        return $this->output->set_content_type('application/json')->set_output(json_encode($output));
    }
}