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

                $this->session->set_userdata('professor', [
                    'id'   => $professor->id,
                    'nome' => $professor->nome,
                    'email'=> $professor->email
                ]);

                redirect('professor/dashboard');

            } else {
                $data['erro'] = "Email ou senha incorretos";
            }
        }

        $this->load->view('professor/login');
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

            $imagem = $this->fazer_upload_imagem();


            $dados = [
                'tema_id'             => $this->input->post('tema_id'),
                'nivel'               => $this->input->post('nivel'),
                'enunciado'           => $this->input->post('enunciado'),
                'imagem'              => $imagem, // nome do arquivo OU null
                'alternativa_a'       => $this->input->post('alternativa_a'),
                'alternativa_b'       => $this->input->post('alternativa_b'),
                'alternativa_c'       => $this->input->post('alternativa_c'),
                'alternativa_d'       => $this->input->post('alternativa_d'),
                'alternativa_e'       => $this->input->post('alternativa_e'),
                'correta'             => strtoupper($this->input->post('correta')),
                'feedback_pedagogico' => $this->input->post('feedback_pedagogico'),
                'criado_por'          => $prof['id']
            ];

            $this->Questao_model->inserir($dados);

            $this->session->set_flashdata('sucesso', 'Questão criada com sucesso!');
            redirect('professor/questoes');
        }

        // Dentro de Professor.php -> nova_questao()
        $data['temas'] = $this->db->get('temas')->result(); // ou via Tema_model

        $this->load->view('professor/header');
        $this->load->view('professor/questao_form', $data); // <--- $temas aqui
        $this->load->view('professor/footer');

    }

    // ============================
    // EDITAR QUESTÃO
    // ============================
    public function editar_questao($id)
{
    // Protege a rota
    if (!$this->session->userdata('professor')) {
        redirect('professorauth/login');
        return;
    }

    // Busca a questão pelo ID
    $questao = $this->Questao_model->buscar($id);

    if (!$questao) {
        show_error("Questão não encontrada", 404);
        return;
    }

    // Busca os temas para o select
    // Atenção: coloque o nome da coluna correta que existe na sua tabela de temas
    $data['temas'] = $this->db->order_by('titulo', 'ASC')->get('temas')->result();

    $data['questao'] = $questao;

    // Se o formulário foi submetido
    if ($this->input->post()) {

        $imagem = $this->fazer_upload_imagem();
        if ($imagem) {
            // apaga antiga
            if ($questao->imagem && file_exists('./uploads/questoes/'.$questao->imagem)) {
                unlink('./uploads/questoes/'.$questao->imagem);
            }
        } else {
            $imagem = $questao->imagem; // mantém a antiga
        }


        $dados = [
            'tema_id'             => $this->input->post('tema_id'),
            'nivel'               => $this->input->post('nivel'),
            'enunciado'           => $this->input->post('enunciado'),
            'imagem'              => $imagem,
            'alternativa_a'       => $this->input->post('alternativa_a'),
            'alternativa_b'       => $this->input->post('alternativa_b'),
            'alternativa_c'       => $this->input->post('alternativa_c'),
            'alternativa_d'       => $this->input->post('alternativa_d'),
            'alternativa_e'       => $this->input->post('alternativa_e'),
            'correta'             => strtoupper($this->input->post('correta')),
            'feedback_pedagogico' => $this->input->post('feedback_pedagogico'),
        ];

        $this->Questao_model->atualizar($id, $dados);

        $this->session->set_flashdata('sucesso', 'Questão atualizada!');
        redirect('professor/questoes');
    }

    // Carrega a view com os dados da questão
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
    private function fazer_upload_imagem()
{
    if (empty($_FILES['imagem']['name'])) {
        return null;
    }

    // cria a pasta se não existir
    if (!is_dir('./uploads/questoes/')) {
        mkdir('./uploads/questoes/', 0777, true);
    }

    $config['upload_path']   = './uploads/questoes/';
    $config['allowed_types'] = 'jpg|jpeg|png|gif';
    $config['max_size']      = 2048;
    $config['encrypt_name']  = TRUE;

    $this->upload->initialize($config);

    if (!$this->upload->do_upload('imagem')) {

        // Para DEBUG e visualizar o problema
        log_message('error', 'UPLOAD ERROR: ' . $this->upload->display_errors('', ''));

        // Mostra o erro para o usuário
        $this->session->set_flashdata('erro', $this->upload->display_errors());
        return null;  
    }

    $dados = $this->upload->data();
    return $dados['file_name'];
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

