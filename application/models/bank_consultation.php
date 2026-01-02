<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bank_consultation extends CI_Model{
 
 public function __construct()
    {
        parent::__construct();
         $this->load->database();
    }

public function get_single($tabela, $where, $id=NULL,$order=NULL)
    {
        if(is_array($where)){
            $this->db->where($where);
        }else{
            $this->db->where($where, $id);
        } 
        if($order){
            $this->db->order_by($order[0],$order[1]);
        }       
        $query = $this->db->get($tabela, 1);
        if($query->num_rows() == 1):
            return $query->row();
        endif;
    }


public function obter_usuario_s($tabela,$coluna,$id=NULL,$order=NULL)
    {
        if(is_array($coluna))
            {
                $this->where($coluna);
            }else{
                $this->where($coluna,$id);
            }
        if($order)
        {
            $this->order_by($order[0],$order[1]);
        }
        $query = $this->get($tabela, 1);
        if($query->num_rows() == 1):
            return $query->row();
        endif;
    }
}