<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laboratorio_model extends CI_Model {
    public function __construct(){ parent::__construct(); }

    // mapa xp => nome da funcionalidade
    private function funcoes() {
        return [
            500  => "Simulador de Redes",
            1000 => "Editor Avançado de Código",
            1500 => "Monitor de Pacotes Virtual",
            2000 => "Ambiente Linux Virtual"
        ];
    }

    public function verificar_desbloqueios($usuario_id){
        $prog = $this->db->get_where('progresso_usuario', ['usuario_id' => $usuario_id])->row();
        if (!$prog) return;

        $lista = json_decode($prog->funcionalidades_json, true) ?: [];
        $alterou = false;

        foreach ($this->funcoes() as $xp => $nome) {
            if ($prog->xp_total >= $xp && !in_array($nome, $lista)) {
                $lista[] = $nome;
                $alterou = true;
                // opcional: aqui você poderia registrar um log de desbloqueio
            }
        }

        if ($alterou) {
            $this->db->where('usuario_id', $usuario_id);
            $this->db->update('progresso_usuario', ['funcionalidades_json' => json_encode($lista)]);
            // retornar lista atualizada
        }
    }

    public function listar($usuario_id){
        $prog = $this->db->get_where('progresso_usuario', ['usuario_id' => $usuario_id])->row();
        if (!$prog) return [];
        return json_decode($prog->funcionalidades_json, true) ?: [];
    }
}
