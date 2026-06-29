<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Responder extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->library('session');
        $this->load->helper('url');
        if (!$this->session->userdata('logado')) redirect('login');

        $this->load->model('Questao_model');
        $this->load->model('Progresso_model');
        $this->load->model('Laboratorio_model');
    }

    public function tentar($id){
        $questao = $this->Questao_model->buscar($id);
        if (!$questao) show_404();

        $resp = $this->input->post('resp', true);
        if ($resp === null) {
            $this->session->set_flashdata('erro', 'Escolha uma alternativa.');
            redirect($_SERVER['HTTP_REFERER']);
        }

        $usuario_id = $this->session->userdata('usuario_id');
        $acertou = (strtoupper(trim($resp)) === strtoupper(trim($questao->correta))) ? 1 : 0;
        $pontos = $acertou ? 50 : 0;

        // registra tentativa
        $this->db->insert('tentativas', [
            'usuario_id' => $usuario_id,
            'questao_id' => $id,
            'escolhida'  => strtoupper(trim($resp)),
            'correta'    => $acertou,
            'pontos'     => $pontos,
            'criado_em'  => date('Y-m-d H:i:s')
        ]);

        // se acertou, adiciona XP e checa desbloqueios
        if ($acertou) {
            $this->Progresso_model->adicionar_xp($usuario_id, $pontos);
            $this->Laboratorio_model->verificar_desbloqueios($usuario_id);
            $this->session->set_flashdata('sucesso', 'Correto! +50 XP');
        } else {
            $this->session->set_flashdata('erro', 'Resposta incorreta.');
        }

        redirect($_SERVER['HTTP_REFERER']);
    }
}
