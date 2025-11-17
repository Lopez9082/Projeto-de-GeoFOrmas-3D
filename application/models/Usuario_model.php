<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario_model extends CI_Model {
    public function __construct(){ parent::__construct(); }

    public function criar($dados){
        // $dados['senha_hash'] já esperado hash via password_hash
        $this->db->insert('usuarios',$dados);
        return $this->db->insert_id();
    }

    public function buscar_por_email($email){
        return $this->db->get_where('usuarios',['email'=>$email])->row();
    }

    public function validar_login($email, $senha){
        $usuario = $this->buscar_por_email($email);
        if(!$usuario) return false;
        if(password_verify($senha, $usuario->senha_hash)){
            return $usuario;
        }
        return false;
    }
}
