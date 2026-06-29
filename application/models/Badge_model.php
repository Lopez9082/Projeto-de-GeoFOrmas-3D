<?php
class Badge_model extends CI_Model {

    public function get_badges_usuario($usuario_id) {
        return $this->db->get_where('badges_usuario', ['usuario_id' => $usuario_id])->result();
    }

    public function desbloquear($usuario_id, $badge_slug) {
        $query = $this->db->get_where('badges_usuario', [
            'usuario_id' => $usuario_id,
            'slug' => $badge_slug
        ]);

        if ($query->num_rows() == 0) {
            $this->db->insert('badges_usuario', [
                'usuario_id' => $usuario_id,
                'slug' => $badge_slug,
                'data' => date('Y-m-d H:i:s')
            ]);
        }
    }
}
?>