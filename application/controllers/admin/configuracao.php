<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Configuracao extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->autori->admin();

    }
    public function salvar_dias()
    {
        $dias = json_decode($this->input->post('dias'), true);


        foreach ($dias as $item) {
            $verificar = $this->global_model->get('horarios_funcionamento', ['data'=> $item['data']], );
            if ($verificar) {
                $mensag = "O dia"." ".date('d/m', strtotime($item['data']))." "."Já existe";
                $output = $this->crud->response(false, $mensag);
                ob_clean();
                return $this->output->set_content_type('application/json')->set_output(json_encode($output));
            }
            // item['data']  → 2025-03-10
            // item['abre']  → 08:00
            // item['fecha'] → 18:00

            $dados = [
                "data" => $item['data'],
                "abre" => $item['abre'],
                "fecha" => $item['fecha'],
                "mes_atual" => date("m/Y", strtotime($item['data'])),
            ];
            $result = $this->crud->inserte_horaios_funcionamento('horarios_funcionamento', $dados);

            if ($result == 0) {
                $dataFormatada = date("d/m/Y", strtotime($dados['data']));
                $mensag = 'O Dia' . ' ' . $dataFormatada . ' ' . 'Ja Tem Horário Cadastrado';
                $output = $this->crud->response(false, $mensag);
                ob_clean();
                return $this->output->set_content_type('application/json')->set_output(json_encode($output));
            }
        }
        $mensag = "Horários Cadastrados com Sucesso";
        $output = $this->crud->response(true, $mensag);
        ob_clean();
        return $this->output->set_content_type('application/json')->set_output(json_encode($output));
    }
    public function salvar_horario_especial()
    {
        $dados = json_decode(file_get_contents("php://input"), true);

        $data = $dados['data'];
        $status = $dados['status'];
        // $horario = $dados['horario'];

        if ($status == 'fechado') {
            $abre = 'fechado';
            $fecha = 'fechado';
        }
        if ($status == 'feriado') {
            $abre = 'fechado';
            $fecha = 'fechado';
        }

        $dados_dia = [
            "data" => $data,
            "abre" => $abre,
            "fecha" => $fecha,
            "mes_atual" => date('m/Y', strtotime($data)),

        ];
        $result = $this->crud->inserte_horaios_funcionamento("horarios_funcionamento", $dados_dia);

        //echo json_encode(["sucesso" => true]);
        $output = $this->crud->response($result->susses, $result->message);
        ob_clean();
        return $this->output->set_content_type('application/json')->set_output(json_encode($output));
    }




    public function remover_horario_especial()
    {
        $input = json_decode(file_get_contents('php://input'), true);

        // Pega o id
        $id = $input['id'] ?? null;

        if (!$id) {
            $mensag = "horario não existe";
            $result = Result::error($mensag);
            $output = $this->crud->response($result->susses, $result->message);
            ob_clean();
            return $this->output->set_content_type('application/json')->set_output(json_encode($output));
        }

        $result = $this->crud->remover_horario($id);

        //echo json_encode(["sucesso" => true]);
        $output = $this->crud->response($result->susses, $result->message);
        ob_clean();
        return $this->output->set_content_type('application/json')->set_output(json_encode($output));
    }

    public function salvar_salao()
    {
        $registroAtual = $this->db->get('tela_cliente')->row();

        $dados = [
            'nome_salao' => $this->input->post('nome_salao'),
            'whatssap' => $this->input->post('whats'),
            'endereco' => $this->input->post('endereco')
        ];


        if (!empty($_FILES['foto']['name'])) {
            $config['upload_path'] = './uploads/logo/';
            $config['allowed_types'] = 'jpg|jpeg|png';
            $config['max_size'] = 2048; // 2MB
            $config['encrypt_name'] = true; // gera nome aleatório

            $this->load->library('upload', $config);

            $foto = null;

            if (!empty($_FILES['foto']['name'])) {

                if ($this->upload->do_upload('foto')) {
                    $fileData = $this->upload->data();
                    $foto = $fileData['file_name']; // aqui você salva no banco
                    $dados['logo'] = $foto;
                } else {
                    // retorna JSON correto SEM ECHO!
                    $output = $this->crud->response(false, strip_tags($this->upload->display_errors()), null);
                    return $this->output->set_content_type('application/json')
                        ->set_output(json_encode($output));
                }
            }
        } else {

        }
        $insert = $this->global_model->update('tela_cliente', $dados, $registroAtual->id);
        if ($insert) {
            $mensag = 'Informações cadastradas com sucesso. Acesse a tela de Clientes e confirme se está tudo certo.';
            $result = Result::susses('', $mensag);
        } else {
            $mensag = 'Nenhuma alteração foi detectada. Modifique algum campo para salvar.';
            $result = Result::error($mensag);
        }

        $output = $this->crud->response($result->susses, $result->message);
        return $this->output->set_content_type('application/json')->set_output(json_encode($output));
    }



}