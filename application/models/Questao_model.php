<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Questao_model extends CI_Model {

        protected $table = "questoes";

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

    public function ocultar($id, $motivo)
{
    return $this->db->where('id', $id)->update('questoes', [
        'excluida' => 1,
        'motivo_exclusao' => $motivo
    ]);
}

     public function listar_por_tema($tema_id){
        return $this->db
            ->where('tema_id', $tema_id)
            ->order_by('criado_em','ASC')
            ->get($this->table)
            ->result();
    }

    

    public function buscarQuestoes($tema, $nivel) {
        return $this->db
            ->where("tema_id", $tema)
            ->where("nivel", $nivel)
            ->order_by("RAND()")
            ->limit(5)
            ->get("questoes")
            ->result();
    }

    // Retorna todos os temas cadastrados
    public function listarTemas() {
        $this->db->select('*');
        $this->db->from('temas'); // ou o nome da tabela de temas
        $query = $this->db->get();
        return $query->result();
    }

    public function getTema($tema_id) {
        return $this->db->get_where('temas', ['id' => $tema_id])->row();
    }
   
}
