<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Professor extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('Professor_model');
        $this->load->model('Questao_model');
        $this->load->library(['session', 'upload']);
        $this->load->helper(['url','form']);
    }

    // ============================
    // LOGIN
    // ============================
    public function login()
{
    if ($this->input->post()) {

        $email = $this->input->post('email');
        $senha = $this->input->post('senha');

        $professor = $this->Professor_model->autenticar($email, $senha);

        if ($professor) {

            // 👑 ADMIN
            if ($professor->tipo === 'admin') {

                $this->session->set_userdata('admin', [
                    'id'   => $professor->id,
                    'nome' => $professor->nome,
                    'email'=> $professor->email
                ]);

                redirect('admin/dashboard');
                return;
            }

            // 🔒 PROFESSOR NORMAL
            if ($professor->status !== 'aprovado') {
                $this->session->set_flashdata('erro', 'Seu cadastro está aguardando aprovação.');
                redirect('professor/login');
                return;
            }

            $this->session->set_userdata('professor', [
                'id'   => $professor->id,
                'nome' => $professor->nome,
                'email'=> $professor->email
            ]);

            redirect('professor/dashboard');

        } else {
            $this->session->set_flashdata('erro', 'E-mail ou senha incorretos');
            $this->session->set_flashdata('papel', 'professor'); // ou 'aluno'

            redirect('auth/login');
        }
    }

    $this->load->view('auth/login');
}

    

    // ===============================
    // REGISTRAR
    // ===============================
public function registrar()
{
    if ($this->session->userdata('logado')) {
        redirect('professor/dashboard');
    }

    if ($this->input->post()) {

        $nome  = $this->input->post('nome', true);
        $email = $this->input->post('email', true);
        $senha = $this->input->post('senha');
        $faculdade = $this->input->post('faculdade');

        // verifica email
        if ($this->Professor_model->buscar_por_email($email)) {
            $this->session->set_flashdata('erro', 'E-mail já cadastrado');
            redirect('professor/registrar');
            return;
        }

        $hash = password_hash($senha, PASSWORD_DEFAULT);


        // salva no banco
        $this->Professor_model->criar([
            'nome'       => $nome,
            'email'      => $email,
            'senha'      => $hash,
            'faculdade'  => $faculdade,
            'status'     => 'pendente'
        ]);

        // tenta enviar email (SEM QUEBRAR se falhar)
        try {
            $this->load->library('email');

            $this->email->from('mathgame.unig@gmail.com', 'MathGame');
            $this->email->to($email);
            $this->email->subject('Cadastro recebido');
            $this->email->message('
                Olá!

                Seu cadastro foi recebido com sucesso.
                Aguarde a aprovação do administrador.
            ');

            $this->email->send();
        } catch (Exception $e) {
            log_message('error', 'Erro ao enviar email: ' . $e->getMessage());
        }

        // mensagem de sucesso
        $this->session->set_flashdata('sucesso', true);

        redirect('professor/registrar'); // 👈 ESSENCIAL
        return;
    }

    $this->load->view('professor/registrar');
}

    public function dashboard()
    {
        $prof = $this->session->userdata('professor');

        if (!$prof) redirect('professor/login');

        $data['nome'] = $prof['nome'];

        $this->load->view('professor/header');
        $this->load->view('professor/dashboard', $data);
        $this->load->view('professor/footer');
        
    }

    // ============================
    // LISTAR QUESTÕES
    // ============================
    public function questoes()
    {
        $prof = $this->session->userdata('professor');
        if (!$prof) redirect('professor/login');

        $data['questoes'] = $this->Questao_model->listar_do_professor($prof['id']);

        $this->load->view('professor/header');
        $this->load->view('professor/questoes_lista', $data);
        $this->load->view('professor/footer');
    }

    // ============================
    // CADASTRAR QUESTÃO
    // ============================
public function nova_questao()
    {
        $prof = $this->session->userdata('professor');
        if (!$prof) redirect('professor/login');

        if ($this->input->post()) {

            // uploads
            $imagem        = $this->fazer_upload_imagem('imagem');
            $img_a         = $this->fazer_upload_imagem('img_a');
            $img_b         = $this->fazer_upload_imagem('img_b');
            $img_c         = $this->fazer_upload_imagem('img_c');
            $img_d         = $this->fazer_upload_imagem('img_d');
            $img_e         = $this->fazer_upload_imagem('img_e');
            $img_feedback  = $this->fazer_upload_imagem('img_feedback');

            $dados = [
                'tema_id'             => $this->input->post('tema_id'),
                'nivel'               => $this->input->post('nivel'),
                'enunciado'           => $this->input->post('enunciado'),
                'imagem'              => $imagem,

                'alternativa_a' => $this->input->post('alternativa_a'),
                'alternativa_b' => $this->input->post('alternativa_b'),
                'alternativa_c' => $this->input->post('alternativa_c'),
                'alternativa_d' => $this->input->post('alternativa_d'),
                'alternativa_e' => $this->input->post('alternativa_e'),

                // 🔥 NOVOS CAMPOS
                'img_a' => $img_a,
                'img_b' => $img_b,
                'img_c' => $img_c,
                'img_d' => $img_d,
                'img_e' => $img_e,
                'img_feedback' => $img_feedback,

                'correta' => strtoupper($this->input->post('correta')),
                'feedback_pedagogico' => $this->input->post('feedback_pedagogico'),

                'criado_por' => $prof['id']
            ];

            $this->Questao_model->inserir($dados);

            $this->session->set_flashdata('sucesso', 'Questão criada com sucesso!');
            redirect('professor/questoes');
        }

        $data['temas'] = $this->db->get('temas')->result();

        $this->load->view('professor/header');
        $this->load->view('professor/questao_form', $data);
        $this->load->view('professor/footer');
    }
    
    // ============================
    // EDITAR QUESTÃO
    // ============================
    public function editar_questao($id)
    {
        if (!$this->session->userdata('professor')) {
            redirect('professor/login');
            return;
        }

        $questao = $this->Questao_model->buscar($id);
        if (!$questao) show_404();

        $data['temas'] = $this->db->order_by('titulo', 'ASC')->get('temas')->result();
        $data['questao'] = $questao;

        if ($this->input->post()) {

            // uploads novos
            $imagem       = $this->fazer_upload_imagem('imagem') ?: $questao->imagem;
            $img_a        = $this->fazer_upload_imagem('img_a') ?: $questao->img_a;
            $img_b        = $this->fazer_upload_imagem('img_b') ?: $questao->img_b;
            $img_c        = $this->fazer_upload_imagem('img_c') ?: $questao->img_c;
            $img_d        = $this->fazer_upload_imagem('img_d') ?: $questao->img_d;
            $img_e        = $this->fazer_upload_imagem('img_e') ?: $questao->img_e;
            $img_feedback = $this->fazer_upload_imagem('img_feedback') ?: $questao->img_feedback;

            $dados = [
                'tema_id'   => $this->input->post('tema_id'),
                'nivel'     => $this->input->post('nivel'),
                'enunciado' => $this->input->post('enunciado'),
                'imagem'    => $imagem,

                'alternativa_a' => $this->input->post('alternativa_a'),
                'alternativa_b' => $this->input->post('alternativa_b'),
                'alternativa_c' => $this->input->post('alternativa_c'),
                'alternativa_d' => $this->input->post('alternativa_d'),
                'alternativa_e' => $this->input->post('alternativa_e'),

                // 🔥 NOVOS CAMPOS
                'img_a' => $img_a,
                'img_b' => $img_b,
                'img_c' => $img_c,
                'img_d' => $img_d,
                'img_e' => $img_e,
                'img_feedback' => $img_feedback,

                'correta' => strtoupper($this->input->post('correta')),
                'feedback_pedagogico' => $this->input->post('feedback_pedagogico'),
            ];

            $this->Questao_model->atualizar($id, $dados);

            $this->session->set_flashdata('sucesso', 'Questão atualizada!');
            redirect('professor/questoes');
        }

        $this->load->view('professor/header');
        $this->load->view('professor/questao_form', $data);
        $this->load->view('professor/footer');
    }


    // ============================
    // EXCLUIR QUESTÃO
    // ============================

    public function excluir($id) {
        $papel = $this->session->userdata('papel');
        if (!in_array($papel, ['professor','licenciado','admin'])) redirect('login');

        $motivo = $this->input->post('motivo_exclusao', true);
        if (trim($motivo) === '') {
            $this->session->set_flashdata('erro','Informe o motivo da exclusão.');
            redirect('questoes/excluir_confirm/'.$id);
        }

        $this->Questao_model->ocultar($id, $motivo);
        $this->session->set_flashdata('sucesso','Questão marcada como excluída.');
        redirect('questoes');
    }

    public function excluir_questao($id)
    {
        $questao = $this->Questao_model->buscar($id);
        if (!$questao) show_404();

        if ($questao->imagem && file_exists('./uploads/questoes/'.$questao->imagem)) {
            unlink('./uploads/questoes/'.$questao->imagem);
        }

        $this->Questao_model->ocultar($id);

        $this->session->set_flashdata('sucesso', 'Questão excluída!');
        redirect('professor/questoes');
    }

    

    // ----------- FUNÇÃO DE UPLOAD -----------
        private function fazer_upload_imagem($campo = 'imagem')
    {
        if (empty($_FILES[$campo]['name'])) {
            return null;
        }

        if (!is_dir('./uploads/questoes/')) {
            mkdir('./uploads/questoes/', 0777, true);
        }

        $config['upload_path']   = './uploads/questoes/';
        $config['allowed_types'] = 'jpg|jpeg|png|gif|webp';
        $config['max_size']      = 2048;
        $config['encrypt_name']  = TRUE;

        $this->upload->initialize($config);

        if (!$this->upload->do_upload($campo)) {
            log_message('error', 'UPLOAD ERROR: ' . $this->upload->display_errors('', ''));
            $this->session->set_flashdata('erro', $this->upload->display_errors());
            return null;
        }

        return $this->upload->data('file_name');
    }

public function logout()
{
    $this->session->unset_userdata('professor');
    $this->session->sess_destroy();

    redirect('professor/login');
}



public function ocultar_questao($id)
{
    // protege rota
    $prof = $this->session->userdata('professor');
    if (!$prof) {
        // se você usa outra chave (logado / papel), ajuste aqui
        redirect('professor/login');
        return;
    }

    $questao = $this->Questao_model->buscar($id);
    if (!$questao) {
        show_404();
        return;
    }

    // Se vier POST -> processa
    if ($this->input->post()) {
        $motivo = $this->input->post('motivo', true);
        if (trim($motivo) === '') {
            $this->session->set_flashdata('erro', 'Informe o motivo da exclusão.');
            redirect('professor/ocultar_questao/'.$id);
            return;
        }

        $ok = $this->Questao_model->ocultar($id, $motivo);
        if ($ok) {
            $this->session->set_flashdata('sucesso', 'Questão ocultada com sucesso.');
        } else {
            $this->session->set_flashdata('erro', 'Erro ao ocultar a questão. Tente novamente.');
        }

        redirect('professor/questoes');
        return;
    }

    // GET -> mostra o formulário de confirmação
    $data['questao'] = $questao;
    $this->load->view('professor/header');
    $this->load->view('professor/excluir_confirmacao', $data);
    $this->load->view('professor/footer');
}



    

}

