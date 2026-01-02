<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Servico
{
    public $id;
    public $nome;
    public $duracao;
    public $promocao;
    public $tempo_promocao;
    public $preco_antigo;
    public $valor;
    public $foto;
    public $descricao;
    public $tipo_servico;
    public $e_promocao;

    public function __construct($id,$nome,$valor,$foto,$duracao,$promocao,$tempo_promocao,$e_promocao,$preco_antigo,$descricao,$tipo_servico)
    {
        $this->id = $id;
        $this->nome = $nome;
        $this->valor = $valor;
        $this->foto = $foto;
        $this->duracao = $duracao;
        $this->promocao = $promocao;
        $this->preco_antigo = $preco_antigo;
        $this->tempo_promocao = $tempo_promocao;
        $this->descricao = $descricao;
        $this->tipo_servico = $tipo_servico;
        $this->e_promocao = $e_promocao;

    }
}