<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_entity
{
    public $id;
    public $nome;
    public $email;
    public $login;
    public $senha;
    public $foto;
    public $sexo;
    public $telefone;
    public $endereco;
    public $tipo;
    public $status;
    public $data_cadastro;

    public function __construct($id,$nome,$email,$login, $senha,$foto,$sexo,$telefone,$endereco,$tipo,$status,$data_cadastro)
    {
        $this->id = $id;
        $this->nome = $nome;
        $this->email = $email;
        $this->login = $login;
        $this->foto = $foto;
        $this->sexo = $sexo;
        $this->telefone = $telefone;
        $this->endereco = $endereco;
        $this->tipo = $tipo;
        $this->status = $status;
        $this->senha = $senha;
        $this->data_cadastro = $data_cadastro;
    }
}
