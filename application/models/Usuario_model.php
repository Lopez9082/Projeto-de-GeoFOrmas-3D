<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario_model extends CI_Model {

    public function __construct(){
        parent::__construct();
    }

    public function criar($dados){
        $this->db->insert('usuarios', $dados);
        return $this->db->insert_id();
    }

    public function buscar_por_email($email){
        return $this->db->get_where('usuarios', ['email' => $email])->row();
    }
}
