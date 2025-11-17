<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Questao_model extends CI_Model {
    public function __construct(){ parent::__construct(); }

    public function listar_todas(){
        $this->db->select('q.*, t.titulo as tema_titulo, u.nome as autor');
        $this->db->from('questoes q');
        $this->db->join('temas t','t.id=q.tema_id','left');
        $this->db->join('usuarios u','u.id=q.criado_por','left');
        $this->db->order_by('q.criado_em','DESC');
        return $this->db->get()->result();
    }

    public function buscar($id){
        return $this->db->get_where('questoes',['id'=>$id])->row();
    }

    public function inserir($dados){
        $this->db->insert('questoes',$dados);
        return $this->db->insert_id();
    }

    public function atualizar($id,$dados){
        return $this->db->where('id',$id)->update('questoes',$dados);
    }

    public function excluir($id){
        return $this->db->delete('questoes',['id'=>$id]);
    }

    // ... (outros métodos já existentes)
}
