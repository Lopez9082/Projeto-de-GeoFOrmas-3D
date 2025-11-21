<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Questoes extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Questoes_model');
        $this->load->library(['session', 'upload', 'form_validation']);

        // Verificação de login obrigatória
        if (!$this->session->userdata('logado')) {
            redirect('professor/login');
        }

        // Carregar CSRF para segurança
        $this->load->helper('security');
    }

    // Método para listar questões (área do professor)
    public function index() {
        if ($this->session->userdata('role') !== 'professor') {
            redirect('professor/login'); // Restringir a professores
        }
        $data['lista'] = $this->Questoes_model->get_all();
        $this->load->view('questoes/index', $data);
    }

    // Método para criar nova questão (professor)
    public function criar() {
        if ($this->session->userdata('role') !== 'professor') {
            redirect('professor/login');
        }
        $this->load->view('questoes/form');
    }

    // Método para salvar nova questão
    public function salvar() {
        if ($this->session->userdata('role') !== 'professor') {
            redirect('professor/login');
        }

        // Validação de formulário
        $this->form_validation->set_rules('pergunta', 'Pergunta', 'required|trim');
        $this->form_validation->set_rules('opcoes', 'Opções', 'required');
        $this->form_validation->set_rules('resposta_correta', 'Resposta Correta', 'required|trim');

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('questoes/form');
            return;
        }

        $data = $this->input->post();
        $data = $this->security->xss_clean($data); // Sanitização

        // Processar upload de imagem (método privado)
        $data['imagem'] = $this->_process_upload();

        $data['criado_por'] = $this->session->userdata('id');
        $data['criado_em'] = date('Y-m-d H:i:s');

        if ($this->Questoes_model->insert($data)) {
            $this->session->set_flashdata('success', 'Questão salva com sucesso!');
        } else {
            $this->session->set_flashdata('error', 'Erro ao salvar questão.');
        }
        redirect('questoes');
    }

    // Método para editar questão (professor)
    public function editar($id) {
        if ($this->session->userdata('role') !== 'professor') {
            redirect('professor/login');
        }
        $data['q'] = $this->Questoes_model->get($id);
        if (!$data['q']) {
            show_404();
        }
        $this->load->view('questoes/form', $data);
    }

    // Método para atualizar questão
    public function atualizar($id) {
        if ($this->session->userdata('role') !== 'professor') {
            redirect('professor/login');
        }

        // Validação similar ao salvar
        $this->form_validation->set_rules('pergunta', 'Pergunta', 'required|trim');
        $this->form_validation->set_rules('opcoes', 'Opções', 'required');
        $this->form_validation->set_rules('resposta_correta', 'Resposta Correta', 'required|trim');

        if ($this->form_validation->run() === FALSE) {
            $data['q'] = $this->Questoes_model->get($id);
            $this->load->view('questoes/form', $data);
            return;
        }

        $data = $this->input->post();
        $data = $this->security->xss_clean($data);

        // Processar upload opcional
        $upload = $this->_process_upload();
        if ($upload) {
            $data['imagem'] = $upload;
        }

        if ($this->Questoes_model->update($id, $data)) {
            $this->session->set_flashdata('success', 'Questão atualizada!');
        } else {
            $this->session->set_flashdata('error', 'Erro ao atualizar.');
        }
        redirect('questoes');
    }

    // Método para excluir questão (professor)
    public function excluir($id) {
        if ($this->session->userdata('role') !== 'professor') {
            redirect('professor/login');
        }
        if ($this->Questoes_model->delete($id)) {
            $this->session->set_flashdata('success', 'Questão excluída!');
        } else {
            $this->session->set_flashdata('error', 'Erro ao excluir.');
        }
        redirect('questoes');
    }

    // Novo: Método para visualizar questões (alunos)
    public function view_questions() {
        if ($this->session->userdata('role') !== 'aluno') {
            redirect('professor/login'); // Restringir a alunos
        }
        $questions = $this->Questoes_model->get_all(); // Assumindo questões ativas
        $data['questions'] = $questions;
        $this->load->view('student/view_questions', $data);
    }

    // Novo: Método para submeter resposta (alunos)
    public function submit_answer() {
        if ($this->session->userdata('role') !== 'aluno') {
            redirect('professor/login');
        }

        $question_id = $this->input->post('question_id');
        $answer = $this->input->post('answer');

        if (!$question_id || !$answer) {
            $this->session->set_flashdata('error', 'Dados inválidos.');
            redirect('questoes/view_questions');
        }

        $correct = $this->Questoes_model->check_answer($question_id, $answer);
        if ($correct) {
            $points = $this->session->userdata('points') ?? 0;
            $this->session->set_userdata('points', $points + 1);
            $this->_check_lab_pieces(); // Verificar laboratório
            $this->session->set_flashdata('success', 'Resposta correta! +1 ponto.');
        } else {
            $this->session->set_flashdata('error', 'Resposta incorreta. Tente novamente.');
        }
        redirect('questoes/view_questions');
    }

    // Novo: Método para seção laboratório (alunos)
    public function laboratorio() {
        if ($this->session->userdata('role') !== 'aluno') {
            redirect('professor/login');
        }
        $points = $this->session->userdata('points') ?? 0;
        $pieces = floor($points / 5); // 1 peça a cada 5 pontos
        $data['pieces'] = $pieces;
        $this->load->view('student/laboratorio', $data);
    }

    // Método privado para processar upload (reutilizável)
    private function _process_upload() {
        if (!empty($_FILES['imagem']['name'])) {
            $config['upload_path'] = './uploads/questoes/';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';
            $config['encrypt_name'] = TRUE;
            $config['max_size'] = 2048; // Limite de 2MB

            $this->upload->initialize($config);

            if ($this->upload->do_upload('imagem')) {
                $uploadData = $this->upload->data();
                return $uploadData['file_name'];
            } else {
                $this->session->set_flashdata('error', $this->upload->display_errors());
                return FALSE;
            }
        }
        return NULL;
    }

    // Método privado para verificar peças do laboratório
    private function _check_lab_pieces() {
        $points = $this->session->userdata('points') ?? 0;
        if ($points % 5 === 0 && $points > 0) {
            // Lógica adicional, ex.: salvar no banco ou notificar
            $this->session->set_flashdata('success', 'Parabéns! Você desbloqueou uma nova peça no laboratório.');
        }
    }
}