<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once APPPATH . 'entity/servico.php';
require_once APPPATH . 'entity/Result.php';
class Servicos_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function todos_servicos()
    {
        $sql = "SELECT * FROM servicos ORDER BY valor ASC";
        $query = $this->db->query($sql);
        $servicos = $query->result();

        if (!$servicos) {
            $mensag = " Erro nos Serviços ";
            Result::error($mensag);
        }
        if ($servicos) {
            return Result::susses($servicos);

        }

    }
    public function cadastrar_servico($tabela, $dados)
    {
        if (!$dados) {
            $mensag = "Não foi possivel cadastrar o serviço tem algo de errado";
            Result::error($mensag);
        } else {
            $mensag = "Serviço cadastrado com sucesso!";
            $this->db->insert($tabela, $dados);
            return result::susses('', $mensag);
        }

    }
    public function salvar_servico($tabela, $coluna, $id, $dados)
    {
        $this->db->where($coluna, $id);
        $this->db->update($tabela, $dados);
        $verificar = $this->db->affected_rows();

        if ($verificar == 0) {
            $mensag = "nenhum serviço foi modificado";
            return Result::error($mensag);
        } else {
            $mensag = "Serviço Editado com sucesso";
            return Result::susses('', $mensag);
        }

    }
    public function listar_paginado()
    {
        $servico = $this->db->order_by('id', 'DESC')->get('servicos')->result();

        if (!$servico) {
            $mensag = "Nenhuma Agenda Cadastrada!";
            return Result::error($mensag);
        } else {
            return Result::susses($servico, '');
        }
    }



    public function excluir_servico($tabela, $coluna, $id)
    {
        $this->db->where($coluna, $id);
        $this->db->delete($tabela);
        $verificar = $this->db->affected_rows();

        if ($verificar == 0) {
            $mensag = "Nenhum serviço foi excluido";
            return Result::error($mensag);
        } else {
            $mensag = "Serviço excluido com sucesso!";
            return Result::susses('', $mensag);
        }
    }
    public function servico($id)
    {
        $sql = "SELECT * FROM servicos WHERE id = $id";
        $query = $this->db->query($sql);
        $servicos = $query->row();  // <-- PEGA SOMENTE 1 REGISTRO

        if (!$servicos) {
            $mensag = "Nenhum serviço encontrado";
            return Result::error($mensag);
        } else {
            return Result::susses(new servico(
                $servicos->id,
                $servicos->nome,
                $servicos->valor,
                $servicos->foto,
                $servicos->duracao,
                $servicos->promocao,
                $servicos->tempo_promocao,
                $servicos->e_promocao,
                $servicos->preco_antigo,
                $servicos->descricao,
                $servicos->tipo_servico,
            ));
        }
    }
    public function servicos_vs_cliente()
    {
        $sql = "SELECT * FROM servicos WHERE promocao = 'inativo' AND e_promocao = 'nao'";
        $query = $this->db->query($sql);
        $servicos = $query->result();
        if (!$servicos) {
            return Result::error('', null);
        }
        $mensag = "sucesso";
        return Result::susses($servicos, $mensag);
    }
    public function servico_promocao()
    {
        $sql = "SELECT * FROM servicos WHERE promocao = 'ativo' AND e_promocao = 'sim'";
        $query = $this->db->query($sql);
        $servicos = $query->row();
        if (!$servicos) {
            return Result::error('', null);
        }
        $mensag = "sucesso";
        return Result::susses($servicos, $mensag);
    }

}