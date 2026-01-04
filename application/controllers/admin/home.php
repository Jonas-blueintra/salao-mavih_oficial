<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class home extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->autori->admin();
    }

    public function index()
    {

        $this->load->view('admin/pages/home');



    }
    public function page($page = null, $dias = null)
    {
        $dias = $dias ?? 7;

        /* =========================================================
           ACESSOS  (TABELA historico)
        ========================================================== */

        $temQuantidade = $this->db->field_exists('quantidade', 'historico');

        if ($temQuantidade) {
            $queryAcessos = $this->db
                ->select_sum('quantidade')
                ->from('historico')
                ->where('insert_data >=', date('Y-m-d H:i:s', strtotime("-$dias days")))
                ->get()
                ->row();

            $total_acessos = $queryAcessos->quantidade ?? 0;
        } else {
            $queryAcessos = $this->db
                ->select('COUNT(*) AS total')
                ->from('historico')
                ->where('insert_data >=', date('Y-m-d H:i:s', strtotime("-$dias days")))
                ->get()
                ->row();

            $total_acessos = (int) ($queryAcessos->total ?? 0);
        }

        // Dados individuais para gráfico de acessos
        $rowsAcessos = $this->db
            ->select('insert_data' . ($temQuantidade ? ', quantidade' : ''))
            ->from('historico')
            ->where('insert_data >=', date('Y-m-d H:i:s', strtotime("-$dias days")))
            ->order_by('insert_data', 'ASC')
            ->get()
            ->result();

        $agrAcessos = [];
        foreach ($rowsAcessos as $r) {
            $dia = date('d/m', strtotime($r->insert_data));
            if (!isset($agrAcessos[$dia]))
                $agrAcessos[$dia] = 0;

            $agrAcessos[$dia] += ($temQuantidade ? (int) $r->quantidade : 1);
        }



        /* =========================================================
           CADASTROS (TABELA usuarios)
        ========================================================== */

        $rowsCad = $this->db
            ->select('data_cadastro')
            ->from('usuarios')
            ->where('data_cadastro >=', date('Y-m-d H:i:s', strtotime("-$dias days")))
            ->order_by('data_cadastro', 'ASC')
            ->get()
            ->result();
        $quantidade_usuarios = 0;
        $agrCad = [];
        foreach ($rowsCad as $r) {
            $dia = date('d/m', strtotime($r->data_cadastro));
            if (!isset($agrCad[$dia]))
                $agrCad[$dia] = 0;

            $agrCad[$dia] += 1;
            $quantidade_usuarios += 1;
        }

        $total_cadastros = array_sum($agrCad);


        $agenda_total = $this->total_agenda_hoje();
        $agenda_pendente = $this->total_agenda_pendente();
        $notificacao_cancelamento = $this->not_de_cancelamento();
        $notificacao_agenda = $this->not_agendamento();
        $notificacao_cadastro = $this->not_de_cadastro();
        $agenda_hoje = $this->agenda_model->agenda_hoje();
        $horarios_salvos = $this->agenda_model->buscar_horarios_salvos();
        $mostrar_serviços = $this->Servicos_model->servicos_vs_cliente();
        $informacoes_tela = $this->informaçoes_tela();
        /* =========================================================
           ENVIAR PARA A VIEW
        ========================================================== */
        $data = [
            // acessos
            'dias' => $dias,
            'labels_acessos' => array_keys($agrAcessos),
            'valores_acessos' => array_values($agrAcessos),
            'total_acessos' => $total_acessos,

            // cadastros
            'labels_cadastros' => array_keys($agrCad),
            'valores_cadastros' => array_values($agrCad),
            'total_cadastros' => $total_cadastros,
            'usuarios' => $quantidade_usuarios,
            'agenda_total' => $agenda_total,
            'agenda_pendente' => $agenda_pendente,
            'notificacao_cancelamento' => $notificacao_cancelamento,
            'notificacao_cadastro' => $notificacao_cadastro,
            'agenda_hoje' => $agenda_hoje,
            'horarios_salvos' => $horarios_salvos,
            'notificacao_agenda' => $notificacao_agenda,
            'mostrar_serviços' => $mostrar_serviços->data,
            'informacao_tela' => $informacoes_tela,
        ];

        echo $this->load->view("admin/pages/" . $page, $data, true);
    }

    public function total_agenda_hoje()
    {
        $sql = "SELECT COUNT(*) AS total FROM agenda WHERE data = CURDATE()";
        $stmt = $this->db->query($sql);
        $result = (int) $stmt->row()->total;
        return $result;

    }
    public function total_agenda_pendente()
    {
        $sql = "SELECT COUNT(*) AS total  FROM agenda WHERE status = 'pendente'";
        $stmt = $this->db->query($sql);
        $result = $stmt->row()->total;
        return $result;

    }
    public function faturamento_total($mes = null)
    {
        if (!$mes) {
            $mes = date('n');
        }

        $sql = "
        SELECT SUM(valor) AS total
        FROM agenda
        WHERE status = 'concluido'
          AND MONTH(data) = ?
        
    ";
  // AND YEAR(data) = YEAR(CURDATE())

        $query = $this->db->query($sql, [$mes]);
        $total = $query->row()->total ?? 0;
ob_clean();
        return $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode([
                'total' => (float) $total
            ]));
    }

public function not_de_cancelamento()
    {
        $sql = "SELECT COUNT(*) AS total FROM notificacoes WHERE tipo = 'cancelamento' AND visto = 0";
        $stmt = $this->db->query($sql);
        $result = $stmt->row()->total;
        return $result;
    }

    public function not_de_cadastro()
    {
        $sql = "SELECT COUNT(*) AS total FROM notificacoes WHERE tipo = 'cadastro' AND visto = 0";
        $stmt = $this->db->query($sql);
        $result = $stmt->row()->total;
        return $result;
    }

    public function not_agendamento()
    {
        $sql = "SELECT COUNT(*) AS total FROM notificacoes WHERE tipo = 'agendamento' AND visto = 0";
        $stmt = $this->db->query($sql);
        $result = $stmt->row()->total;
        return $result;
    }
    public function informaçoes_tela()
    {
        $sql = "SELECT * FROM tela_cliente ORDER BY id DESC LIMIT 1";
        $ultimo_registro = $this->db->query($sql)->row();

        return $ultimo_registro;
    }
}
