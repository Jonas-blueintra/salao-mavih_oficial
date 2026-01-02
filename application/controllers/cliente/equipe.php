<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Equipe extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
		 $this->autori->cliente();

    }
    public function index()
    {
        $this->load->view('cliente/pages/equipe');
        

    }
}