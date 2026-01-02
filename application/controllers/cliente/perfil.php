<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class perfil extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->autori->cliente();
    }
    public function index()
    {
        $nome = $this->session->userdata('nome');
        $perfil['usuario'] = $this->cliente_model->buscar_nome_cliente($nome);
        $this->load->view('cliente/pages/perfil', $perfil);
    }
    public function editar_perfil()
    {
        $perfil['usuario'] = $this->cliente_model->buscar_nome_cliente($this->session->userdata('nome'));
        $this->load->view('cliente/pages/editar_perfil', $perfil);

    }
    public function salvar()
    {
        $dados = $this->input->post();

        if (!empty($_FILES['foto']['name'])) {
            $config['upload_path'] = './uploads/usuarios/';
            $config['allowed_types'] = 'jpg|jpeg|png';
            $config['max_size'] = 2048; // 2MB
            $config['encrypt_name'] = true; // gera nome aleatório

            $this->load->library('upload', $config);

            $foto = null;

            if (!empty($_FILES['foto']['name'])) {

                if ($this->upload->do_upload('foto')) {
                    $fileData = $this->upload->data();
                    $foto = $fileData['file_name']; // aqui você salva no banco
                    $dados['foto'] = $foto;
                } else {
                    // retorna JSON correto SEM ECHO!
                    $output = $this->crud->response(false, strip_tags($this->upload->display_errors()), null);
                ob_clean();
                    return $this->output->set_content_type('application/json')
                        ->set_output(json_encode($output));
                }
            }
        }
        if (empty($dados['senha'])) {
            // $dados['senha'] = password_hash($dados['senha'], PASSWORD_DEFAULT);
            unset($dados['senha']);
        }
        $id = $this->session->userdata('id');
        $this->db->where('id', $id);
        $this->db->update('usuarios', $dados);
        $afetadas = $this->db->affected_rows();

        if ($afetadas) {
            $mensa = "Perfil atualizado com sucesso 😊";
            $retun = Result::susses('', $mensa);
            
            $usuario = $this->cliente_model->buscar_nome_cliente($dados['nome']);
            $this->session->set_userdata([
                'id' => $usuario->data->id,
                'tipo' => $usuario->data->tipo,
                'nome' => $usuario->data->nome,
                'foto' => $usuario->data->foto,
                'telefone' => $usuario->data->telefone,
            ]);
        } else {
            $mensa = "Erro ao salvar os dados";
            $retun = Result::error($mensa);
        }

        $output = $this->crud->response($retun->susses, $retun->message);
                ob_clean();
        return $this->output->set_content_type('application/json')->set_output(json_encode($output));

    }

}