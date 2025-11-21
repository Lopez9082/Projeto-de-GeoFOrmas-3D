<?php
class Missao_model extends CI_Model {

    public function get_missoes_ativas($usuario_id) {
        // verifica se existe registro
        $query = $this->db->get_where('missoes_usuario', ['usuario_id' => $usuario_id]);
        
        if ($query->num_rows() == 0) {
            return $this->gerar_missoes($usuario_id);
        }

        return $query->row();
    }

    public function gerar_missoes($usuario_id) {
        $missoes = [
            ["Resolva 3 quizzes hoje", 3, 50],
            ["Acerte 5 questões seguidas", 5, 80],
            ["Complete 1 quiz de Álgebra", 1, 40],
        ];

        $escolhida = $missoes[array_rand($missoes)];

        $data = [
            'usuario_id' => $usuario_id,
            'descricao' => $escolhida[0],
            'meta' => $escolhida[1],
            'progresso' => 0,
            'recompensa' => $escolhida[2],
            'data_gerada' => date('Y-m-d')
        ];

        $this->db->insert('missoes_usuario', $data);
        return (object)$data;
    }

    public function atualizar_progresso($usuario_id, $quantidade) {
        $this->db->set('progresso', "progresso + $quantidade", false);
        $this->db->where('usuario_id', $usuario_id);
        $this->db->update('missoes_usuario');
    }
}
