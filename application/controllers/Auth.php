<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('Usuario_model');
        $this->load->library('session');
        $this->load->helper(['url','form']);
    }

    // ===============================
    // LOGIN
    // ===============================
    public function login(){
        if ($this->session->userdata('logado')) redirect('painel');
        $this->load->view('auth/login');
    }

    public function autenticar()
{
    $email = $this->input->post('email');
    $senha = $this->input->post('senha');

    $usuario = $this->Usuario_model->buscar_por_email($email);

    if ($usuario) {
        // DEBUG: Veja os valores vindo do banco
        /*
        echo "<pre>";
        print_r($usuario);
        echo "Digitada: ".$senha;
        exit;
        */

        if ($usuario->senha == $senha) {

            $this->session->set_userdata([
                'logado'      => true,
                'usuario_id'  => $usuario->id,
                'nome'        => $usuario->nome,
                'papel'       => $usuario->papel
            ]);

            redirect('painel');
            return;
        }
    }

    $this->session->set_flashdata('erro', 'E-mail ou senha incorretos');
    redirect('login');
}



    // ===============================
    // REGISTRAR
    // ===============================
    public function registrar(){

        if ($this->session->userdata('logado')) redirect('painel');

        if ($this->input->post()) {

            $nome  = $this->input->post('nome', true);
            $email = $this->input->post('email', true);
            $senha = $this->input->post('senha'); // senha normal agora

            if ($this->Usuario_model->buscar_por_email($email)) {
                $this->session->set_flashdata('erro', 'E-mail já cadastrado');
                redirect('registrar');
            }

            // salva senha sem hash
            $id = $this->Usuario_model->criar([
                'nome'  => $nome,
                'email' => $email,
                'senha' => $senha,
                'papel' => 'aluno'
            ]);

            // cria progresso inicial
            $this->db->insert('progresso_usuario', [
                'usuario_id'    => $id,
                'pontuacao'     => 0,
                'recursos_json' => '{}'
            ]);

            // login automático
            $usuario = $this->Usuario_model->buscar_por_email($email);

            $this->session->set_userdata([
                'logado'      => true,
                'usuario_id'  => $usuario->id,
                'nome'        => $usuario->nome,
                'papel'       => $usuario->papel
            ]);

            redirect('painel');
        }

        $this->load->view('auth/registrar');
    }

    // ===============================
    // LOGOUT
    // ===============================
    public function logout(){
        $this->session->sess_destroy();
        redirect('login');
    }

    // ===============================
    // RECUPERAÇÃO DE SENHA
    // ===============================
    public function recuperar_senha(){

        if ($this->input->post()) {

            $email = $this->input->post('email', true);
            $usuario = $this->Usuario_model->buscar_por_email($email);

            if (!$usuario) {
                $this->session->set_flashdata('erro', 'E-mail não encontrado');
                redirect('recuperar-senha');
            }

            $token = bin2hex(random_bytes(16));

            $this->db->insert('recuperacao_senha', [
                'usuario_id' => $usuario->id,
                'token'      => $token,
                'criado_em'  => date('Y-m-d H:i:s')
            ]);

            $this->session->set_flashdata('sucesso', 'Link de recuperação enviado (simulado)');
            redirect('recuperar-senha');
        }

        $this->load->view('auth/recuperar_senha');
    }
}
