<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Progresso_model extends CI_Model {
    public function __construct(){ parent::__construct(); }

    public function obter($usuario_id){
        return $this->db->get_where('progresso_usuario', ['usuario_id' => $usuario_id])->row();
    }

    public function adicionar_xp($usuario_id, $xp){
        $existe = $this->obter($usuario_id);
        if ($existe) {
            $this->db->set('xp_total', 'xp_total + '.$xp, false);
            $this->db->where('usuario_id', $usuario_id);
            $this->db->update('progresso_usuario');
        } else {
            $this->db->insert('progresso_usuario', [
                'usuario_id' => $usuario_id,
                'xp_total' => $xp,
                'funcionalidades_json' => '{}'
            ]);
        }
    }

    public function obter_progresso($usuario_id) {

        $this->db->where('usuario_id', $usuario_id);
        return $this->db->get('tentativas')->num_rows();
    }
}
