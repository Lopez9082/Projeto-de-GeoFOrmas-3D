<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Certificado_model extends CI_Model {

    public function certificados_ativos(){
        return $this->db
            ->where('ativo', 1)
            ->order_by('xp_minimo', 'ASC')
            ->get('certificados')
            ->result();
    }

    public function usuario_possui($usuario_id, $certificado_id){
        return $this->db
            ->where('usuario_id', $usuario_id)
            ->where('certificado_id', $certificado_id)
            ->get('certificados_usuario')
            ->row();
    }

    public function salvar($usuario_id, $certificado_id, $arquivo){
        return $this->db->insert('certificados_usuario', [
            'usuario_id'     => $usuario_id,
            'certificado_id' => $certificado_id,
            'arquivo_pdf'    => $arquivo,
            'emitido_em'     => date('Y-m-d H:i:s')
        ]);
    }

    public function listar_usuario($usuario_id){
        return $this->db
            ->select('cu.id, cu.arquivo_pdf, cu.emitido_em, c.titulo, c.xp_minimo')
            ->from('certificados_usuario cu')
            ->join('certificados c', 'c.id = cu.certificado_id')
            ->where('cu.usuario_id', $usuario_id)
            ->order_by('c.xp_minimo', 'ASC')
            ->get()
            ->result();
    }
}