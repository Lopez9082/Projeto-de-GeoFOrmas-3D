<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Questao_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    // 🔹 LISTAR TODAS AS QUESTÕES DO PROFESSOR
    public function listar_do_professor($professor_id)
    {
        return $this->db
            ->where('criado_por', $professor_id)
            ->get('questoes')
            ->result();
    }

    // 🔹 INSERIR NOVA QUESTÃO
    public function inserir($dados)
    {
        return $this->db->insert('questoes', $dados);
    }

    // 🔹 BUSCAR UMA ÚNICA QUESTÃO
    public function buscar($id)
    {
        return $this->db->where('id', $id)->get('questoes')->row();
    }

    // 🔹 ATUALIZAR QUESTÃO
    public function atualizar($id, $dados)
    {
        return $this->db->where('id', $id)->update('questoes', $dados);
    }

    // 🔹 EXCLUIR QUESTÃO
    public function excluir($id)
    {
        return $this->db->where('id', $id)->delete('questoes');
    }
}
