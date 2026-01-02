<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once APPPATH . 'entity/Agendas.php';
require_once APPPATH . 'entity/Result.php';
class agenda_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }
    public function listar_agenda()
    {
        $agenda = $this->db->order_by('id')->get('agenda')->result();

        if (!$agenda) {
            $mensag = "Nenhuma agenda disponivel!";
            return Result::error($mensag);
        } else {
            return Result::susses($agenda);
        }
    }
    public function confirmar_status_agenda($id)
    {
        $sql = "SELECT * FROM agenda WHERE id = ?";
        $query = $this->db->query($sql, $id);
        $agenda = $query->row();

        if (!$agenda) {
            $mensag = "Erro ao Buscar a Agenda";
            return Result::error($mensag);
        }

        if ($agenda->status == 'confirmado') {
            $mensag = "Agenda ja Estar Confirmada";
            return Result::error($mensag);
        }


        $r = 'confirmado';
        $sql = "UPDATE agenda SET status = ? WHERE id = $agenda->id";
        $query = $this->db->query($sql, $r);
        $confirmado = $this->db->affected_rows();

        $sql = "SELECT * FROM notificacoes WHERE usuario_id = '$agenda->id_cliente' AND visto = 0";
        $query = $this->db->query($sql);
        $notificacao_nao_vista = $query->row(); // retorna todas

        if ($notificacao_nao_vista) 
        {
            $sql = "UPDATE notificacoes SET visto = 1 WHERE usuario_id = ?";
            $query = $this->db->query($sql, $agenda->id_cliente);
        }







        if ($confirmado != 0) {
            $mensag = "Agenda Confirmada Com Sucesso";
            return Result::susses($agenda->id);
        }
        return;
    }

    public function concluir_status_agenda($id)
    {
        $sql = "SELECT * FROM agenda WHERE id = ?";
        $query = $this->db->query($sql, $id);
        $agenda = $query->row();

        if (!$agenda) {
            $mensag = "Erro ao Buscar a Agenda";
            return Result::error($mensag);
        }

        if ($agenda->status == 'concluido') {
            $mensag = "Agenda ja Estar Concluida";
            return Result::error($mensag);
        }
        $r = 'concluido';
        $sql = "UPDATE agenda SET status = ? WHERE id = $agenda->id";
        $query = $this->db->query($sql, $r);
        $confirmado = $this->db->affected_rows();
        if ($confirmado != 0) {
            $mensag = "Agenda Concluida Com Sucesso";
            return Result::susses($agenda->id);
        }
        return;
    }
    public function cancelar_status_agenda($id, $motivo = null,$quem_cancelou)
    {
        $sql = "SELECT * FROM agenda WHERE id = ?";
        $query = $this->db->query($sql, $id);
        $agenda = $query->row();
        if (!$agenda) {
            $mensag = "Erro ao Buscar a Agenda!";
            return Result::error($mensag);
        }

        if ($agenda->status == 'cancelado') {
            $mensag = "Agenda ja Estar Cancelado!";
            return Result::error($mensag);
        }
        $hora_cancelamento = new DateTime('now', new DateTimeZone('America/Sao_Paulo'));
        $r = 'cancelado';
        $sql = "UPDATE agenda 
            SET status = ?, 
            motivo_cancelamento = ?,
            quem_cancelou = ?,
            data_hora_cancelamento = ?
            WHERE id = ?";

        $query = $this->db->query($sql, [$r, $motivo,$quem_cancelou,$hora_cancelamento->format('d-m-Y H:i:s') ,$agenda->id]);

        $cancelado = $this->db->affected_rows();

        if ($cancelado != 0) {
            return Result::susses($agenda->id);
        }else{
            return Result::error();
        }
    }

    public function agenda_hoje()
    {
        $sql = "
        SELECT * FROM agenda WHERE data = CURDATE() ORDER BY hora_inicio ASC";
        $query = $this->db->query($sql);
        $agenda_hoje = $query->num_rows() > 0 ? $query->result() : [];




        if (!$agenda_hoje) {
            $mensag = "Nenhuma Agenda Para Hoje";
            return Result::error($mensag, null);
        }


        return Result::susses($agenda_hoje);
    }
    public function buscar_horarios_salvos()
    {
        $sql = "SELECT *
        FROM horarios_funcionamento
        WHERE data >= CURDATE()
        ORDER BY STR_TO_DATE(data, '%Y-%m-%d') ASC;
        ;
        
        ";

        $query = $this->db->query($sql);
        $horarios = $query->result(); // pega todos os registros


        if (!$horarios) {
            $mensag = "Nenhum Horário Cadastrado!";
            return Result::error($mensag);
        }
        return Result::susses($horarios, '');

    }
    public function dias_disponiveis()
    {
        $sql = "SELECT DAY(data) AS data
        FROM horarios_funcionamento
        WHERE data >= CURDATE()
        ORDER BY data ASC;";

        $query = $this->db->query($sql);
        $result = $query->result();
        $dias = array_column($result, 'data'); // pega todos os registros
        return $dias;
    }
public function buscar_agenda($id)
{
     $sql = "SELECT * FROM agenda WHERE id_cliente = ?";
        $query = $this->db->query($sql, $id);
        $agenda = $query->result();

      return $agenda;
}


}