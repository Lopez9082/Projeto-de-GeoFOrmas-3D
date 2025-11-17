<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->model('Usuario_model');
        $this->load->library('session');
        $this->load->helper(['url','form']);
    }

    public function login(){
        if($this->session->userdata('logado')) redirect('painel');
        $this->load->view('auth/login');
    }

    public function autenticar(){
        $email = $this->input->post('email', true);
        $senha = $this->input->post('senha', true);
        $usuario = $this->Usuario_model->validar_login($email,$senha);
        if($usuario){
            $this->session->set_userdata([
                'logado' => true,
                'usuario_id' => $usuario->id,
                'nome' => $usuario->nome,
                'papel' => $usuario->papel
            ]);
            redirect('painel');
        } else {
            $this->session->set_flashdata('erro', 'E-mail ou senha incorretos');
            redirect('login');
        }
    }

    public function registrar(){
        if($this->session->userdata('logado')) redirect('painel');
        if($this->input->post()){
            $nome = $this->input->post('nome', true);
            $email = $this->input->post('email', true);
            $senha = $this->input->post('senha');
            // validações básicas omissas aqui (recomendo form_validation)
            if($this->Usuario_model->buscar_por_email($email)){
                $this->session->set_flashdata('erro','E-mail já cadastrado');
                redirect('registrar');
            }
            $hash = password_hash($senha, PASSWORD_DEFAULT);
            $id = $this->Usuario_model->criar([
                'nome'=>$nome, 'email'=>$email, 'senha_hash'=>$hash
            ]);
            // criar progresso inicial
            $this->db->insert('progresso_usuario',['usuario_id'=>$id,'pontuacao'=>0,'recursos_json'=>'{}']);
            // logar automaticamente
            $usuario = $this->Usuario_model->buscar_por_email($email);
            $this->session->set_userdata([
                'logado' => true,
                'usuario_id' => $usuario->id,
                'nome' => $usuario->nome,
                'papel' => $usuario->papel
            ]);
            redirect('painel');
        }
        $this->load->view('auth/registrar');
    }

    public function logout(){
        $this->session->sess_destroy();
        redirect('login');
    }

    // Recuperação de senha (gerar token e enviar e-mail) — resumo:
    public function recuperar_senha(){
        if($this->input->post()){
            $email = $this->input->post('email', true);
            $usuario = $this->Usuario_model->buscar_por_email($email);
            if(!$usuario){
                $this->session->set_flashdata('erro','E-mail não encontrado');
                redirect('recuperar-senha');
            }
            // gerar token, salvar em tabela temporária e enviar e-mail com link
            // aqui apenas exemplo simplificado (implemente envio real por SMTP)
            $token = bin2hex(random_bytes(16));
            $this->db->insert('recuperacao_senha',['usuario_id'=>$usuario->id,'token'=>$token,'criado_em'=>date('Y-m-d H:i:s')]);
            // enviar e-mail com link: site/recuperar-senha/confirmar?token=...
            $this->session->set_flashdata('sucesso','Link de recuperação enviado (simulado)');
            redirect('recuperar-senha');
        }
        $this->load->view('auth/recuperar_senha');
    }
}
