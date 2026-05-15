<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Agendar extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        if (!$this->session->userdata('id')) {

            if ($this->input->is_ajax_request()) {
                $this->output
                    ->set_status_header(401)
                    ->set_content_type('application/json')
                    ->set_output(json_encode([
                        "erro" => "Sessão expirada"
                    ]));
                exit;
            }

            redirect('login');
        }
    }

    public function index($id)
    {
        $data["horarios_salvos"] = $this->agenda_model->buscar_horarios_salvos();
        $data["servico"] = $this->Servicos_model->servico($id);
        $this->load->view("cliente\pages\agendar_horarios", $data);
    }
    public function cancelar_agenda($id)
    {
        $motivo = $this->input->get('motivo');
        $quem_cancelou = $this->input->get('quem_cancelou');
        
        $result = $this->agenda_model->cancelar_status_agenda($id, $motivo, $quem_cancelou);
        if($result)
        {
            $this->notificacao_model->cancelamento_agendamento($result->data);
        }
        $output = $this->crud->response($result->susses, $result->message);
        ob_clean();
        return $this->output->set_content_type('application/json')->set_output(json_encode($output));
    }
    public function horarios_por_dia()
    {
        header('Content-Type: application/json');

        $id_dia = $this->input->get("id_dia");
        $duracaoStr = $this->input->get("duracao");

        if (!$id_dia || !$duracaoStr) {

            return Result::error("Parâmetros inválidos");
        }
        if (strpos($duracaoStr, ":") !== false) {
            list($h, $m) = explode(":", $duracaoStr);
            $duracao = ($h * 60) + $m; // total em minutos
        } else {
            $duracao = intval($duracaoStr); // caso venha só número
        }

        // Buscar o dia selecionado
        $dia = $this->db->get_where("horarios_funcionamento", ["id" => $id_dia])->row();

        if (!$dia || $dia->abre == "fechado" || $dia->fecha == "fechado") {

            echo json_encode(["horarios" => []]);
            return;
        }

      

        // Buscar horários ocupados daquele dia COM duração do serviço


        $horariosLivres = [];
if ($dia->data == date("Y-m-d")) {
      $data = $dia->data;
        $abre = strtotime($data . " " . date("H:i"));
        $fecha = strtotime($data . " " . $dia->fecha);

        $intervalo = 40 * 60; // 40 minutos
  for ($h = $abre; $h + ($duracao * 60) <= $fecha; ) {

            $inicio_novo = $h;
            $fim_novo = $h + ($duracao * 60);

            // Verificar conflitos corretamente
            $this->db->where("data", $data);

            // só horários que NÃO estão cancelados
            $this->db->where("status !=", "cancelado");

            $this->db->where("
         (
           STR_TO_DATE(hora_inicio, '%H:%i') < STR_TO_DATE('" . date("H:i", $fim_novo) . "', '%H:%i')
           AND
           STR_TO_DATE(hora_fim, '%H:%i') > STR_TO_DATE('" . date("H:i", $inicio_novo) . "', '%H:%i')
         )
         ", null, false);


            $ocupado = $this->db->get("agenda")->row();

            if ($ocupado) {

                // pula para o final do horário ocupado
                $novo_horario = strtotime($data . " " . $ocupado->hora_fim);
                $h = $novo_horario;
                continue;
            }

            // Se não tiver conflito, adiciona horário
            $horariosLivres[] =
                date("H:i", $inicio_novo)
                . " às "
                . date("H:i", $fim_novo);

            $h = $fim_novo;
        }  
}else{
      $data = $dia->data;
        $abre = strtotime($data . " " . $dia->abre);
        $fecha = strtotime($data . " " . $dia->fecha);

        $intervalo = 40 * 60; // 40 minutos
        for ($h = $abre; $h + ($duracao * 60) <= $fecha; ) {

            $inicio_novo = $h;
            $fim_novo = $h + ($duracao * 60);

            // Verificar conflitos corretamente
            $this->db->where("data", $data);

            // só horários que NÃO estão cancelados
            $this->db->where("status !=", "cancelado");

            $this->db->where("
         (
           STR_TO_DATE(hora_inicio, '%H:%i') < STR_TO_DATE('" . date("H:i", $fim_novo) . "', '%H:%i')
           AND
           STR_TO_DATE(hora_fim, '%H:%i') > STR_TO_DATE('" . date("H:i", $inicio_novo) . "', '%H:%i')
         )
         ", null, false);


            $ocupado = $this->db->get("agenda")->row();

            if ($ocupado) {

                // pula para o final do horário ocupado
                $novo_horario = strtotime($data . " " . $ocupado->hora_fim);
                $h = $novo_horario;
                continue;
            }

            // Se não tiver conflito, adiciona horário
            $horariosLivres[] =
                date("H:i", $inicio_novo)
                . " às "
                . date("H:i", $fim_novo);

            $h = $fim_novo;
        }
}
        ob_clean();
        echo json_encode([
            "data" => $data,
            "horarios" => $horariosLivres
        ]);
    }
    public function salvar()
    {
        $id_servico = $this->input->post('id_servico');
        $servico = $this->Servicos_model->servico($id_servico);

        $horario = $this->input->post('horario');

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
        $DataHora_cadastro = new DateTime('now', new DateTimeZone('America/Sao_Paulo'));


        $dados = [
            'id_cliente' => $this->session->userdata('id'),
            'id_servico' => $servico->data->id,
            'nome' => $this->session->userdata('nome'),
            'servico' => $servico->data->nome,
            'foto' => $this->session->userdata('foto'),
            'telefone' => $this->session->userdata('telefone'),
            'status' => 'pendente',
            'valor' => $servico->data->valor,
            'hora' => $hora_inicio . " as " . $hora_fim, // se quiser manter o texto original
            'dia' => $diaSemana,
            'data' => $this->input->post('data'),
            'hora_inicio' => $hora_inicio,
            'hora_fim' => $hora_fim,
            'data_cadastro_agenda' => $DataHora_cadastro->format('d-m-Y H:i:s'),
        ];
        $id = $this->session->userdata('id');
        $insert = $this->global_model->insert('agenda', $dados);
        $this->notificacao_model->novo_agendamento($this->session->userdata('id'));
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