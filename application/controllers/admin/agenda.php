<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class agenda extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->autori->admin();

    }



    public function confirmar_agenda($id)
    {
        $result = $this->agenda_model->confirmar_status_agenda($id);
        $output = $this->crud->response($result->susses, $result->message);
        ob_clean();
        return $this->output->set_content_type('application/json')->set_output(json_encode($output));

    }
    public function concluir_agenda($id)
    {
        $result = $this->agenda_model->concluir_status_agenda($id);
        $output = $this->crud->response($result->susses, $result->message);
        ob_clean();
        return $this->output->set_content_type('application/json')->set_output(json_encode($output));
    }
    public function cancelar_agenda($id)
    {
        $motivo = $this->input->get('motivo');
        $quem_cancelou = $this->input->get('quem_cancelou');

        $result = $this->agenda_model->cancelar_status_agenda($id, $motivo,$quem_cancelou);
        $output = $this->crud->response($result->susses, $result->message);
        ob_clean();
        return $this->output->set_content_type('application/json')->set_output(json_encode($output));
    }
    public function salvar_como_admin()
    {
        $id_servico = $this->input->post('id_servico');
        $servico = $this->Servicos_model->servico($id_servico);
        $nomeCliente = $this->input->post('nome');
        $telefoneCliente = $this->input->post('telefone');
        $horario = $this->input->post('horario');

        $id_cliente = $this->cliente_model->buscar_nome_cliente($nomeCliente);
        // Extrai 2 horários no formato HH:MM
        preg_match_all('/(\d{2}:\d{2})/', $horario, $matches);

        $hora_inicio = $matches[1][0] ?? null;
        $hora_fim = $matches[1][1] ?? null;

        $data = $this->input->post('data');


        $dt = new DateTime($data);
        $diaNumero = $dt->format("w"); // 0=domingo, 1=segunda, ...

        $dias = [
            'domingo',
            'segunda',
            'terça',
            'quarta',
            'quinta',
            'sexta',
            'sábado'
        ];

        $diaSemana = $dias[$diaNumero];



        $dados = [
            'id_cliente' => $id_cliente->data->id,
            'id_servico' => $servico->data->id,
            'nome' => $nomeCliente,
            'servico' => $servico->data->nome,
            'foto' => $id_cliente->data->foto,
            'telefone' => $telefoneCliente,
            'status' => 'pendente',
            'valor' => $servico->data->valor,
            'hora' => $hora_inicio . " as " . $hora_fim,
            'dia' => $diaSemana,
            'data' => $this->input->post('data'),
            'hora_inicio' => $hora_inicio,
            'hora_fim' => $hora_fim,
        ];

        $insert = $this->global_model->insert('agenda', $dados);
        $this->notificacao_model->novo_agendamento( $id_cliente->data->id);
        if ($insert) {


            

            $output = $this->crud->response(true, "Horarios agendado com sucesso!");
ob_clean();
            return $this->output->set_content_type('application/json')->set_output(json_encode($output));
        } else {
            $output = $this->crud->response(false, "Algo Deu Errado Entre em Contato com a Responsavel!");
ob_clean();
            return $this->output->set_content_type('application/json')->set_output(json_encode($output));

        }
    }

}