<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Global_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function historico($dados)
    {
        $this->global_model->insert('historico', $dados);
    }
    public function insert($tabela, $dados)
    {
        $this->db->insert($tabela, $dados);
        $insert = $this->db->insert_id();
        if ($insert > 0) {
            return $insert;
        } else {
            $erro = 'erro no insert';
            return $erro;
        }
    }
    public function update($tabela, $dados, $where = null)
    {
        if (is_numeric($where)) {
            $this->db->where('id', $where);
        } else {
            $this->db->where($where);
        }

        $this->db->update($tabela, $dados);
        return $this->db->affected_rows();
    }
    public function get($tabela, $where = null, $single = false)
{
    if (!empty($where)) {

        // Se for número, assume ID
        if (is_numeric($where)) {
            $this->db->where('id', $where);

        // Se for array, aplica todos os filtros
        } elseif (is_array($where)) {
            $this->db->where($where);
        }
    }

    $query = $this->db->get($tabela);

    // Retorna um único registro
    if ($single) {
        return $query->row();
    }

    // Retorna vários registros
    return $query->result();
}

    public function buscar_tabela_interia($tabela)
    {
        $sql = "SELECT *FROM $tabela ORDER BY id DESC";
        $query = $this->db->query($sql);
        $get = $query->result();
        
        if(!$get)
        {
            $result = Result::error();
        }else
        {
            $result = Result::susses($get);
        }
return $result;
    }


  
}