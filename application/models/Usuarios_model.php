<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios_model extends CI_Model
{
public function __construct()
{
    parent::__construct();
}
public function obter_login_usuario($post)
{
    //verificar se existe usuario
    $this->db->where('email',$post['email']);
    $this->db->or_where('login',$post['email']);
    $query = $this->db->get('usuarios',1);
    if($query->num_rows() == 1):
        return $query->row();
    else:
        //verificar se e um admin
        $this->db->where('email',$post['email']);
        $this->db->or_where('login',$post['email']);
        $query = $this->db->get('usuario_admin',1);
        if($query->num_rows() == 1):
            return $query->row();
        endif;
    endif;
}


}