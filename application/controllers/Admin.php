<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->model('Questao_model');
        $this->load->model('Usuario_model');
        $this->load->library('session');
        $this->load->helper(['url','form']);
        // Verifica se usuário logado e papel
        if(!$this->session->userdata('logado')) redirect('login');
        $papel = $this->session->userdata('papel');
        if(!in_array($papel, ['professor','licenciado','admin'])){
            show_error('Acesso negado: você não tem permissão para acessar esta área',403);
        }
    }

    public function lista_questoes(){
        $data['questoes'] = $this->Questao_model->listar_todas();
        $this->load->view('admin/header',$data);
        $this->load->view('admin/questoes_lista',$data);
        $this->load->view('admin/footer');
    }

    public function novo(){
        if($this->input->post()){
            $dados = [
                'tema_id' => $this->input->post('tema_id'),
                'nivel' => $this->input->post('nivel'),
                'enunciado' => $this->input->post('enunciado'),
                'alternativa_a' => $this->input->post('alternativa_a'),
                'alternativa_b' => $this->input->post('alternativa_b'),
                'alternativa_c' => $this->input->post('alternativa_c'),
                'alternativa_d' => $this->input->post('alternativa_d'),
                'alternativa_e' => $this->input->post('alternativa_e'),
                'correta' => strtoupper($this->input->post('correta')),
                'feedback_pedagogico' => $this->input->post('feedback_pedagogico'),
                'criado_por' => $this->session->userdata('usuario_id')
            ];
            $this->Questao_model->inserir($dados);
            $this->session->set_flashdata('sucesso','Questão cadastrada com sucesso.');
            redirect('admin/lista_questoes');
        }
        $this->load->view('admin/header');
        $this->load->view('admin/questao_form', ['acao'=>'novo','temas'=>$this->db->get('temas')->result()]);
        $this->load->view('admin/footer');
    }

    public function editar($id){
        $questao = $this->Questao_model->buscar($id);
        if(!$questao) show_404();
        if($this->input->post()){
            $dados = [
                'tema_id' => $this->input->post('tema_id'),
                'nivel' => $this->input->post('nivel'),
                'enunciado' => $this->input->post('enunciado'),
                'alternativa_a' => $this->input->post('alternativa_a'),
                'alternativa_b' => $this->input->post('alternativa_b'),
                'alternativa_c' => $this->input->post('alternativa_c'),
                'alternativa_d' => $this->input->post('alternativa_d'),
                'alternativa_e' => $this->input->post('alternativa_e'),
                'correta' => strtoupper($this->input->post('correta')),
                'feedback_pedagogico' => $this->input->post('feedback_pedagogico')
            ];
            $this->Questao_model->atualizar($id,$dados);
            $this->session->set_flashdata('sucesso','Questão atualizada.');
            redirect('admin/lista_questoes');
        }
        $this->load->view('admin/header');
        $this->load->view('admin/questao_form', ['acao'=>'editar','questao'=>$questao,'temas'=>$this->db->get('temas')->result()]);
        $this->load->view('admin/footer');
    }

    public function excluir($id){
        $questao = $this->Questao_model->buscar($id);
        if(!$questao) show_404();
        $this->Questao_model->excluir($id);
        $this->session->set_flashdata('sucesso','Questão excluída.');
        redirect('admin/lista_questoes');
    }
}
