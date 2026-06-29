<?php
class Missao_model extends CI_Model {

    // Busca missão ativa do usuário
    public function get_missoes_ativas($usuario_id)
    {
        // Busca a missão ativa
        $this->db->select('missoes_usuario.*, missoes.titulo, missoes.descricao, missoes.meta, missoes.xp_recompensa');
        $this->db->from('missoes_usuario');
        $this->db->join('missoes', 'missoes.id = missoes_usuario.missao_id');
        $this->db->where('usuario_id', $usuario_id);
        $this->db->where('concluida', 0);
        
        $query = $this->db->get();

        // Se não tem missão → gera uma
        if ($query->num_rows() == 0) {
            return $this->gerar_missao_para_usuario($usuario_id);
        }

        return $query->row();
    }

    
    // Atualiza progresso
    public function atualizar_progresso($usuario_id, $quantidade)
    {
        $this->db->set('progresso_atual', "progresso_atual + $quantidade", false);
        $this->db->where('usuario_id', $usuario_id);
        $this->db->where('concluida', 0);
        $this->db->update('missoes_usuario');
    }

    public function gerar_missao_para_usuario($usuario_id)
{
    // Seleciona missão aleatória
    $query = $this->db->order_by('RAND()')->get('missoes', 1);

    if ($query->num_rows() == 0) {
        // Evita erro se a tabela estiver vazia
        return (object)[
            'titulo' => 'Nenhuma missão disponível',
            'descricao' => 'O administrador ainda não cadastrou missões.',
            'meta' => 1,
            'xp_recompensa' => 0,
            'progresso_atual' => 0,
            'progresso_total' => 1
        ];
    }

    $missao = $query->row();

    $data = [
        'usuario_id'      => $usuario_id,
        'missao_id'       => $missao->id,
        'progresso_atual' => 0,
        'progresso_total' => $missao->meta,
        'concluida'       => 0,
        'data_inicio'     => date('Y-m-d H:i:s')
    ];

    $this->db->insert('missoes_usuario', $data);

    return (object) array_merge((array)$missao, $data);
}

}
