<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tema_model extends CI_Model {
    public function __construct(){ parent::__construct(); }

    public function listar(){
        return $this->db->order_by('titulo','ASC')->get('temas')->result();
    }

    public function buscar($id){
        return $this->db->get_where('temas', ['id' => $id])->row();
    }
}
