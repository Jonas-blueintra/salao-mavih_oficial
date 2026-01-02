<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Result 
{
    public  $susses;
    public  $message;
    public  $data ;//pode ser pessoa,array etc.

    public function __construct($susses,$message,$data = null)
    {
        $this->susses = $susses;
        $this->message = $message;
        $this->data = $data;
    }

    public static function susses( $data = null,  $message = "Sucesso"): self
    {
        return new self(true, $message, $data);
    }

    public static function error( $message = null,  $data = null): self
    {
        return new self(false, $message, $data);
    }
}