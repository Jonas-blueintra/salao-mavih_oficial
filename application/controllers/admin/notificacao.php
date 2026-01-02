<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Notificacao extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->autori->admin();

    }
    public function exluir_notificacao($tipo)
    {$sql = "SELECT * FROM notificacoes WHERE tipo = '$tipo' AND visto = 0";
        $query = $this->db->query($sql);
        $notificacao_nao_vista = $query->result(); // retorna todas
        

        foreach ($notificacao_nao_vista as $noti) {
            $sql = "UPDATE notificacoes SET visto = 1 WHERE id = ?";
            $query = $this->db->query($sql,$noti->id);
        }
    }
}