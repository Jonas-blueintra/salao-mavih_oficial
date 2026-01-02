<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once APPPATH . 'entity/user_entity.php';
require_once APPPATH . 'entity/Result.php';

class Crud extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function Login($login, $senha)
    {
        $sql = "SELECT * FROM usuario_admin WHERE login = ?";
        $query = $this->db->query($sql, [$login]);
        $usuario = $query->row();


        if (!$usuario) {
            $sql = "SELECT * FROM usuarios WHERE login = ?";
            $query = $this->db->query($sql, [$login]);
            $usuario = $query->row();
        }

        if (!$usuario) {
            $mensag = 'Úsuario não encontrado!';
            return Result::error($mensag); // Usuário não encontrado
        }

        if ($usuario->senha != $senha) {
            $mensag = "Senha inválida";
            return Result::error($mensag); // senha incorreta
        }
        $mensag = 'Login autorizado';
        // Criar entity
        return Result::susses(
            new User_entity(
                $usuario->id,
                $usuario->nome,
                $usuario->email,
                $usuario->login,
                $usuario->senha,
                $usuario->foto,
                $usuario->sexo,
                $usuario->telefone,
                $usuario->endereco,
                $usuario->tipo,
                $usuario->status,
                $usuario->data_cadastro,
            ),
            $mensag,
        );
    }
    public function servico($id)
    {
        $mensag = '';
        $sql = "SELECT * FROM servicos WHERE id = ?";
        $query = $this->db->query($sql, [$id]);
        $servico = $query->row();

        if (!$servico) {
            $mensag = 'Serviço não encontrado';
            return Result::error($mensag);
        } else {
            return Result::susses(new Servico(
                $servico->id,
                $servico->nome,
                $servico->valor,
                $servico->foto,
                $servico->duracao,
                $servico->promocao,
                $servico->tempo_promocao,
                $servico->e_promocao,
                $servico->preco_antigo,
                $servico->descricao,
                $servico->tipo_servico,
            ));
        }
    }
    public function response($succes, $mensag = "", $data = null)
    {
        $erro = $succes ? '0' : '1';

        $output = [
            "error" => $erro,
            "msg" => $mensag,
            "data" => $data

        ];
        return $output;
    }
    public function inserte_horaios_funcionamento($tabela, $dados)
    {

        $sql = "SELECT * FROM  $tabela  WHERE data = ?";
        $query = $this->db->query($sql, $dados['data']);
        $verificar = $query->row();

        if (!$dados) {
            $mensag = "Nenhum dado recebido";
            return Result::error($mensag);
        }
        if ($verificar == null) {
            $mensag = "Data adicionada com sucesso!";
            $this->db->insert($tabela, $dados);
            return Result::susses(' ',$mensag);
        } else {
            $mensag = "Dia ja cadastrado!";
            return Result::error($mensag);
        }
    }
public function remover_horario($id)
{
     $this->db->where('id', $id);
        $this->db->delete('horarios_funcionamento');
        $verificar = $this->db->affected_rows();

        if ($verificar == 0) {
            $mensag = "Nenhum horario foi excluido";
            return Result::error($mensag);
        } else {
            $mensag = "Horario excluido com sucesso!";
            return Result::susses('', $mensag);
        }
return $id;
}
    public function UltimasAvaliacoes()
{
    $this->db->select('*');
    $this->db->from('avaliacoes');
    $this->db->order_by('id', 'DESC');
    $this->db->limit(20); // somente as 20 últimas

    $query = $this->db->get();

    if($query->num_rows() > 0){
        return $query->result();
    }else{
        return false;
    }
}
}
