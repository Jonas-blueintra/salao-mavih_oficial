<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Agendas
{
    public $id;
    public $nome;
    public $servico;
    public $telefone;
    public $whatssap;
    public $status;
    public $data;
    public $dia;
    public $hora;

    public function __construct($id,$nome,$servico,$telefone,$whatssap,$status,$hora,$dia,$data)
    {
        $this->id = $id;
        $this->nome = $nome;
        $this->servico = $servico;
        $this->telefona = $servico;
        $this->whatssap = $whatssap;
        $this->status = $status;
        $this->dia = $dia;
        $this->hora = $hora;
        $this->data = $data;
    }

}