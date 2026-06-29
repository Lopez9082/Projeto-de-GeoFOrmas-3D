<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Questoes extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Questao_model');
        $this->load->library(['session', 'upload', 'form_validation']);
        $this->load->helper(['security','url','form']);


    }

    // Listar questões (apenas professores/licenciados/admin)
    public function index() {
        $papel = $this->session->userdata('papel');
        if (!in_array($papel, ['professor','licenciado','admin'])) {
            show_error('Acesso negado', 403);
        }

        $usuario_id = $this->session->userdata('usuario_id'); // caso queira filtrar por criador
        // listar apenas não-excluídas
        $data['lista'] = $this->Questao_model->get_all_by_creator($usuario_id);
        $this->load->view('questoes/index', $data);
    }

    // Form para criar
    public function criar() {
        $papel = $this->session->userdata('papel');
        if (!in_array($papel, ['professor','licenciado','admin'])) redirect('login');

        // pegar temas para select (se existir tabela temas)
        $data['temas'] = $this->db->order_by('titulo','ASC')->get('temas')->result();

        $this->load->view('questoes/form', $data);
    }

    // Salvar nova questão
    public function salvar() {
        $papel = $this->session->userdata('papel');
        if (!in_array($papel, ['professor','licenciado','admin'])) redirect('login');

        // regras mínimas — adapte conforme seu formulário
        $this->form_validation->set_rules('enunciado','Enunciado','required|trim');
        $this->form_validation->set_rules('correta','Alternativa correta','required|trim');

        if ($this->form_validation->run() === FALSE) {
            $this->criar();
            return;
        }

        $post = $this->input->post(null, true);
        $post = $this->security->xss_clean($post);

        // upload (cria pasta se necessário)
        $imagem = $this->_process_upload();
        if ($imagem === FALSE) {
            // upload falhou — já defini flash com erro no método; voltar ao form
            $this->criar();
            return;
        }
        if ($imagem !== NULL) $post['imagem'] = $imagem;

        $post['criado_por'] = $this->session->userdata('usuario_id') ?: null;
        $post['criado_em'] = date('Y-m-d H:i:s');

        // campos esperados pela tabela: tema_id, nivel, enunciado, imagem, alternativa_a..e, correta, feedback_pedagogico, criado_por
        $insert_id = $this->Questao_model->insert($post);
        if ($insert_id) {
            $this->session->set_flashdata('sucesso','Questão cadastrada com sucesso.');
        } else {
            $this->session->set_flashdata('erro','Erro ao salvar questão.');
        }
        redirect('questoes');
    }

    // Form de edição
    public function editar($id) {
        $papel = $this->session->userdata('papel');
        if (!in_array($papel, ['professor','licenciado','admin'])) redirect('login');

        $questao = $this->Questao_model->get($id);
        if (!$questao) show_404();

        $data['questao'] = $questao;
        $data['temas'] = $this->db->order_by('titulo','ASC')->get('temas')->result();

        $this->load->view('questoes/form', $data);
    }

    // Atualizar após edição
    public function atualizar($id) {
        $papel = $this->session->userdata('papel');
        if (!in_array($papel, ['professor','licenciado','admin'])) redirect('login');

        $this->form_validation->set_rules('enunciado','Enunciado','required|trim');
        $this->form_validation->set_rules('correta','Alternativa correta','required|trim');

        if ($this->form_validation->run() === FALSE) {
            $this->editar($id);
            return;
        }

        $post = $this->input->post(null, true);
        $post = $this->security->xss_clean($post);

        // upload opcional
        $upload = $this->_process_upload();
        if ($upload === FALSE) {
            $this->editar($id);
            return;
        }
        if ($upload !== NULL) $post['imagem'] = $upload;

        $ok = $this->Questao_model->update($id, $post);
        $this->session->set_flashdata($ok ? 'sucesso' : 'erro', $ok ? 'Atualizado.' : 'Erro ao atualizar.');
        redirect('questoes');
    }
    public function excluir_confirm($id)
{
    $papel = $this->session->userdata('papel');
    if (!in_array($papel, ['professor','licenciado','admin'])) redirect('login');

    $data['questao'] = $this->Questao_model->buscar($id);
    if (!$data['questao']) show_404();

    $this->load->view('professor/excluir_confirmacao', $data);
}


    // Excluir logicamente com justificativa (mostre um form antes)

    public function excluir($id) {
        $prof = $this->session->userdata('professor');
        if (!$prof) redirect('professor/login');

        $data['questao'] = $this->Questao_model->buscar($id);
        if (!$data['questao']) show_404();

        $this->load->view('professor/excluir_confirmacao', $data);
    }

    // VIEW para alunos (simples)
    public function view_questions() {
        // qualquer aluno logado
        if ($this->session->userdata('papel') !== 'aluno') redirect('login');

        $data['questions'] = $this->Questao_model->get_all_active();
        $this->load->view('student/view_questions', $data);
    }

    // Submeter resposta (simples)
    public function submit_answer() {
        if ($this->session->userdata('papel') !== 'aluno') redirect('login');

        $question_id = $this->input->post('question_id', true);
        $answer = $this->input->post('answer', true);

        if (!$question_id || $answer === null) {
            $this->session->set_flashdata('erro','Dados inválidos.');
            redirect('questoes/view_questions');
        }

        $correct = $this->Questao_model->check_answer($question_id, $answer);
        if ($correct) {
            $this->session->set_flashdata('sucesso','Resposta correta!');
        } else {
            $this->session->set_flashdata('erro','Resposta incorreta.');
        }
        redirect('questoes/view_questions');
    }

    // UPLOAD com criação de pasta
    private function _process_upload() {
        if (!empty($_FILES['imagem']['name'])) {

            $upload_path = './uploads/questoes/';
            if (!is_dir($upload_path)) {
                mkdir($upload_path, 0777, true);
            }

            $config['upload_path']   = $upload_path;
            $config['allowed_types'] = 'jpg|jpeg|png|gif';
            $config['encrypt_name']  = TRUE;
            $config['max_size']      = 4096; // 4MB

            $this->upload->initialize($config);

            if ($this->upload->do_upload('imagem')) {
                $d = $this->upload->data();
                return $d['file_name'];
            } else {
                $this->session->set_flashdata('erro', strip_tags($this->upload->display_errors()));
                return FALSE;
            }
        }
        return NULL;
    }
}
