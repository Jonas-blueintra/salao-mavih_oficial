<?php

use PharIo\Manifest\Email;
defined('BASEPATH') OR exit('No direct script access allowed');
require_once APPPATH . 'entity/servico.php';
require_once APPPATH . 'entity/Result.php';
class Cliente_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }
    public function listar_clientes($tabela)
    {
        $clientes = $this->db->order_by('id', 'DESC')->get($tabela)->result();

        $total = [];

        foreach ($clientes as $array) {
            if($tabela == 'usuarios'){
            $verificar = $this->cliente_tem_agenda($array->id);
            }
            else{
            break;
            }
            if ($verificar) {
                $sql = "SELECT * FROM agenda WHERE id_cliente = ? 
                        ORDER BY id DESC LIMIT 1";
                $query = $this->db->query($sql, [$array->id]);
                $agenda_cliente = $query->row();

                if ($agenda_cliente->status == 'pendente') {
                    $array->ultimo_dia_servico = null;
                    $array->ultimo_servico = null;
                    $total[] = $array;
                    continue;
                }
                if ($agenda_cliente->status == 'confirmado') {
                    $array->ultimo_dia_servico = null;
                    $array->ultimo_servico = null;
                    $total[] = $array;
                    continue;
                }
                if ($agenda_cliente->status == 'concluido') {
                    $array->ultimo_dia_servico = $agenda_cliente->data;
                    $array->ultimo_servico = $agenda_cliente->servico;
                }

                $total[] = $array;

                if (!$total) {
                    $mensag = "Nenhum trabalho encontrado!";
                    return Result::error($mensag);
                }
            } else {
                $array->ultimo_dia_servico = null;
                $array->ultimo_servico = null;
                $total[] = $array;
            }
        }
        return $clientes;



    }
    public function cadastrar($dados, $session)
    {
        $verificar = $this->db->order_by('id')->get('usuarios')->result();
        $verificar_admin = $this->db->order_by('id')->get('usuario_admin')->result();

        $session = $this->session->userdata('tipo');

        if ($dados['tipo'] == 'cliente') {
            if (!$dados) {
                $mensag = "error Usuário não Cadastrado";
                return Result::error($mensag);
            }

            foreach ($verificar as $v) {
                if ($v->login == $dados['login']) {
                    $mensag = "Login ou senha ínvalida";
                    return Result::error($mensag, 'login');
                }
                if ($v->senha == $dados['senha']) {
                    $mensag = "Login ou senha ínvalida";
                    return Result::error($mensag, 'login');
                }
            }
                if ($session ==  null) {
                    $tabela = 'usuarios';
                    $redirect = 'login';
                } else {
                    $tabela = 'usuarios';
                    $redirect = 'dashboard';
                }
            
        }else{
            if (!$dados) {
                $mensag = "error Usuário não Cadastrado";
                return Result::error($mensag);
            }

            foreach ($verificar_admin as $r) {
                if ($r->login == $dados['login']) {
                    $mensag = "Login ou senha ínvalida";
                    return Result::error($mensag, 'login');
                }
                if ($r->senha == $dados['senha']) {
                    $mensag = "Login ou senha ínvalida";
                    return Result::error($mensag, 'login');
                }
            }
                if ($session ==  'admin') {
                    $tabela = 'usuario_admin';
                    $redirect = 'dashboard';
                }

        }

       
        $mensag = "Usuario cadastrado Com Sucesso";
        $this->db->insert($tabela, $dados);
         $sql = "SELECT * FROM  $tabela WHERE nome = ?";
         $query = $this->db->query($sql, $dados['nome']);
         $usuario = $query->row();
         
         $this->notificacao_model->novo_usuario_notf($usuario->id ,$tabela);

 


        return Result::susses($redirect, $mensag);

    }
    public function cliente_tem_agenda($id_cliente)
    {
        $this->db->where('id_cliente', $id_cliente);
        $query = $this->db->get('agenda');

        return $query->num_rows() > 0;
    }
 public function buscar_nome_cliente($nome){
        $sql = "SELECT * FROM usuarios WHERE nome = '$nome'";
        $query = $this->db->query($sql);
        $usuario = $query->row();  // <-- PEGA SOMENTE 1 REGISTRO
    
        if(!$usuario)
        {
            $mensag = "Nenhum usuário encontrado entre em contato com o suporte!";
            return Result::error($mensag);
        }
        else
        {
            return Result::susses(new User_entity(
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
            ));
        }
    }
}
