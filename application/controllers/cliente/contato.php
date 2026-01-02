<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class contato extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }
    public function index()
    {
        $this->load->view("cliente\pages\contato");
       
    }
}