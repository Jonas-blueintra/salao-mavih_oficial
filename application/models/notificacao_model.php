<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Notificacao_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

   public function novo_usuario_notf($id,$tabela)
    {
        $sql = "SELECT * FROM $tabela WHERE id = ? ";
        $query = $this->db->query($sql, $id);
        $usuario = $query->row();

        $mensag = explode(' ', trim($usuario->nome))[0] . ' ' . 'Cadastrou no Sistema';
        $dados = [];
        $dados = [
            'usuario_id' => $usuario->id,
            'tipo' => 'cadastro',
            'dados' => $mensag,
            'visto' => 0,
            'data_envio' => date('Y-m-d')
        ];
        $tabela = 'notificacoes';
        $this->db->insert($tabela, $dados);
    }
    
    public function novo_agendamento($id)
    {
        $sql = "SELECT * FROM usuarios WHERE id = $id ";
        $query = $this->db->query($sql);
        $usuario = $query->row();

         $mensag = explode(' ', trim($usuario->nome))[0] . ' ' . 'estar aguardando a confirmação do agendamento';
        $dados = [];
        $dados = [
            'usuario_id' => $usuario->id,
            'tipo' => 'agendamento',
            'dados' => $mensag,
            'visto' => 0,
            'data_envio' => date('Y-m-d')
        ];
        $tabela = 'notificacoes';
        $this->db->insert($tabela, $dados);
        
    }
}