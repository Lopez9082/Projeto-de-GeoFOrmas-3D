<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Progresso_model extends CI_Model {
    public function __construct(){ parent::__construct(); }

    public function adicionar_pontos($usuario_id, $pontos){
        $existe = $this->db->get_where('progresso_usuario',['usuario_id'=>$usuario_id])->row();
        if($existe){
            $this->db->set('pontuacao','pontuacao + '.$pontos,false);
            $this->db->where('usuario_id',$usuario_id);
            $this->db->update('progresso_usuario');
        } else {
            $this->db->insert('progresso_usuario',['usuario_id'=>$usuario_id,'pontuacao'=>$pontos,'recursos_json'=>'{}']);
        }
    }

    public function obter_progresso($usuario_id){
        return $this->db->get_where('progresso_usuario',['usuario_id'=>$usuario_id])->row();
    }
}
