<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Quiz extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->model('Questao_model');
        $this->load->model('Progresso_model');
        $this->load->library('session');
        if(!$this->session->userdata('logado')) redirect('login');
    }

    public function iniciar($slug_tema, $nivel){
        $offset = intval($this->input->get('offset'));
        $questoes = $this->Questao_model->buscar_por_tema_nivel($slug_tema,$nivel,1,$offset);
        if(empty($questoes)){
            $this->session->set_flashdata('erro','Sem questões para este tema/nível');
            redirect('painel');
        }
        $data['questao'] = $questoes[0];
        $data['tema'] = $slug_tema;
        $data['nivel'] = $nivel;
        $data['offset'] = $offset;
        $this->load->view('painel/header',$data);
        $this->load->view('quiz/questao',$data);
        $this->load->view('painel/footer');
    }

    public function enviar_resposta(){
        $usuario_id = $this->session->userdata('usuario_id');
        $questao_id = $this->input->post('questao_id', true);
        $escolhida = strtoupper($this->input->post('escolhida', true));
        $questao = $this->Questao_model->buscar($questao_id);
        if(!$questao) { echo json_encode(['erro'=>'Questão não encontrada']); return; }
        $correta = ($escolhida === strtoupper($questao->correta)) ? 1 : 0;
        $pontos = $correta ? $this->calcular_pontos($questao->nivel) : 0;
        $this->db->insert('tentativas',[
            'usuario_id'=>$usuario_id,
            'questao_id'=>$questao_id,
            'escolhida'=>$escolhida,
            'correta'=>$correta,
            'pontos'=>$pontos
        ]);
        if($correta){
            $this->Progresso_model->adicionar_pontos($usuario_id,$pontos);
        }
        // sincronizar com supabase (helper) - opcional
        // $this->load->helper('sincronizacao');
        // supabase_inserir_tentativa([...]);

        echo json_encode([
            'correta'=>$correta,
            'feedback'=>$questao->feedback_pedagogico,
            'pontos'=>$pontos
        ]);
    }

    private function calcular_pontos($nivel){
        if($nivel==='facil') return 10;
        if($nivel==='medio') return 20;
        if($nivel==='dificil') return 40;
        return 5;
    }
}
