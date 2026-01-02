<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class equipe extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->autori->admin();

    }
    public function salvar()
    {
        $dados = [
            'nome' => $this->input->post('nome'),
            'especialidade' => $this->input->post('especialidade'),
            'descricao' => $this->input->post('descricao'),
            'status' => $this->input->post('status'),
            'data_cadastro' => date('d-m-Y'),

        ];
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
                    return $this->output->set_content_type('application/json')
                        ->set_output(json_encode($output));
                }
            }
        }

        $insert = $this->global_model->insert('equipe', $dados);

        if ($insert > 0) {
            $mens = "Nova Integrante cadastrada com sucesso!";
            $result = Result::susses('', $mens);
        } else {
            $mens = "erro ao cadastrar";
            $result = Result::error('', $mens);
        }
ob_clean();
        $output = $this->crud->response($result->susses, $result->message);
        return $this->output->set_content_type('application/json')->set_output(json_encode($output));
    }
    public function buscar($id)
    {
        $dados = $this->db->where('id', $id)->get('equipe')->row();
        echo json_encode([
            'error' => 0,
            'data' => $dados
        ]);
    }
    public function excluir($id)
    {
        $this->db->where('id', $id)->delete('equipe');
ob_clean();
        echo json_encode([
            'error' => 0,
            'msg' => 'Integrante excluído com sucesso'
        ]);
    }
    public function update_integrante()
    {
            $foto = null;

        header('Content-Type: application/json');
        if (!empty($_FILES['foto']['name'])) {


            $config['upload_path'] = './uploads/usuarios/';
            $config['allowed_types'] = 'jpg|jpeg|png';
            $config['max_size'] = 2048; // 2MB
            $config['encrypt_name'] = true; // gera nome aleatório

            $this->load->library('upload', $config);


            if (!empty($_FILES['foto']['name'])) {

                if ($this->upload->do_upload('foto')) {
                    $fileData = $this->upload->data();
                    $foto = $fileData['file_name']; // aqui você salva no banco
                    $dados['foto'] = $foto;
                } else {
                    // retorna JSON correto SEM ECHO!
                    $output = $this->crud->response(false, strip_tags($this->upload->display_errors()), null);
                    return $this->output->set_content_type('application/json')
                        ->set_output(json_encode($output));
                }
            }
        }
if($foto == null)
{
   $foto = $this->input->post('foto_atual');
}
        $id = $this->input->post('id');

        $dados = [
            'nome' => $this->input->post('nome'),
            'especialidade' => $this->input->post('especialidade'),
            'descricao' => $this->input->post('descricao'),
            'status' => $this->input->post('status'),
            'foto' => $foto,
        ];
$insert = $this->global_model->update('equipe',$dados,$id);

       if ($insert > 0) {
            $mens = "Atualizado com sucesso!";
            $result = Result::susses('', $mens);
        } else {
            $mens = "Você precisa mudar pelo menos 1 formulario";
            $result = Result::error( $mens, '');
        }

        $output = $this->crud->response($result->susses, $result->message);
        return $this->output->set_content_type('application/json')->set_output(json_encode($output));
    }

}