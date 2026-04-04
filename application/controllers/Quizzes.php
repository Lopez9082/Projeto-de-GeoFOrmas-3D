<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Quizzes extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model("Questao_model");
        $this->load->model("Progresso_model");
        $this->load->library("session");

        // Verificação de login
        if (!$this->session->userdata('logado')) {
            redirect('login');
            exit;
        }
    }

    // 1) Página com temas
    public function index() {
        $usuario_id = $this->session->userdata('usuario_id');

        if (!$usuario_id) {
            redirect('login');
            exit;
        }

        $data['temas'] = $this->Questao_model->listarTemas();
        $data['progresso'] = $this->Progresso_model->obter($usuario_id);

        $this->load->view("painel/header");
        $this->load->view("quizzes/temas", $data);
        $this->load->view("painel/footer");
    }

    // 2) Seleciona nível
    public function tema($tema_id) {
        $tema = $this->Questao_model->getTema($tema_id);

        if (!$tema) {
            show_error("Tema não encontrado.");
        }

        $usuario_id = $this->session->userdata('usuario_id');

        if (!$usuario_id) {
            redirect('login');
            exit;
        }

        $data['tema'] = $tema;

        $this->load->view("painel/header");
        $this->load->view("quizzes/nivel", $data);
        $this->load->view("painel/footer");
    }

    // 3) Inicia quiz
    public function iniciar() {
        $tema  = $this->input->post("tema");
        $nivel = $this->input->post("nivel");

        $questoes = $this->Questao_model->buscarQuestoes($tema, $nivel);

        if (!$questoes || count($questoes) < 5) {
            echo "Não há 5 questões cadastradas para este tema/nivel.";
            return;
        }

        // Salva na sessão
        $this->session->set_userdata("quiz_questoes", $questoes);
        $this->session->set_userdata("quiz_index", 0);
        $this->session->set_userdata("pontos", 0);
        $this->session->set_userdata("historico", []);

        redirect("quizzes/pergunta");
    }

    // 4) Exibe pergunta
    public function pergunta() {
    $index    = $this->session->userdata("quiz_index");
    $questoes = $this->session->userdata("quiz_questoes");

    // ✅ PRIMEIRO: verifica se terminou o quiz
    if ($index >= 5) {
        redirect("quizzes/final");
        return;
    }

    // ✅ DEPOIS: valida sessão
    if (!$questoes || !isset($questoes[$index])) {
        redirect("quizzes");
        return;
    }

    $data['numero']  = $index + 1;
    $data['questao'] = $questoes[$index];

    $this->load->view("painel/header");
    $this->load->view("quizzes/pergunta", $data);
    $this->load->view("painel/footer");
}

    // 5) Processa resposta
    public function responder() {
        $resposta  = $this->input->post("resposta");
        $correta   = $this->input->post("correta");
        $enunciado = $this->input->post("enunciado") ?? '';
        $feedback  = $this->input->post("feedback") ?? '';

        $historico = $this->session->userdata("historico") ?? [];

        $historico[] = [
            "enunciado" => $enunciado,
            "resposta"  => $resposta,
            "correta"   => $correta,
            "feedback"  => $feedback
        ];

        $this->session->set_userdata("historico", $historico);

        // Pontuação
        if ($resposta === $correta) {
            $pontos = $this->session->userdata("pontos") ?? 0;
            $this->session->set_userdata("pontos", $pontos + 25);
        }

        // Próxima pergunta
        $index = $this->session->userdata("quiz_index") ?? 0;
        $this->session->set_userdata("quiz_index", $index + 1);

        redirect("quizzes/pergunta");
    }

    // 6) Tela final
    public function final() {
        $pontos     = $this->session->userdata("pontos") ?? 0;
        $historico  = $this->session->userdata("historico") ?? [];
        $usuario_id = $this->session->userdata("usuario_id");

        if ($usuario_id) {
            $this->Progresso_model->adicionar_xp($usuario_id, $pontos);
        }

        $data['pontos']    = $pontos;
        $data['historico'] = $historico;

        $this->load->view("painel/header");
        $this->load->view("quizzes/final", $data);
        $this->load->view("painel/footer");

        // Limpa sessão
        $this->session->unset_userdata([
            'quiz_questoes',
            'quiz_index',
            'pontos',
            'historico'
        ]);
    }
}