<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Autori
{
    protected $CI;

    public function __construct()
    {
        $this->CI =& get_instance();
    }

    public function cliente()
    {
        if(!$this->CI->session->userdata('logado') || $this->CI->session->userdata('tipo') !== 'cliente')
        {
            redirect('login');
            exit;
        }
    }

    public function admin()
    {
        if(!$this->CI->session->userdata('logado') || 
           $this->CI->session->userdata('tipo') !== 'admin')
        {
            redirect('login');
            exit;
        }
    }

    public function permitir_perfil($id)
    {
        // usuário logado?
        if (!$this->CI->session->userdata('logado')) {
            redirect('login');
            exit;
        }

        // se for cliente, só pode entrar no seu próprio perfil
        if ($this->CI->session->userdata('tipo') == 'cliente') {
            if ($id != $this->CI->session->userdata('user_id')) {
                show_error('Acesso negado.', 403);
            }
        }
    }
}
