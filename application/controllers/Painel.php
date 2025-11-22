<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Painel extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        
        // Carregar sessões e helpers
        $this->load->library('session');
        $this->load->helper('url');

        // Verificação de login
        if (!$this->session->userdata('logado')) {
            redirect('login');
            exit; // evita continuar executando código
        }

        // Carregar models
        $this->load->model('Progresso_model');
        $this->load->model('Missao_model');
        $this->load->model('Badge_model');
    }

    public function index()
    {
        $usuario_id = $this->session->userdata('usuario_id');

        if (!$usuario_id) {
            // Sessão corrompida
            redirect('login');
            exit;
        }
            $progresso = $this->Progresso_model->obter($usuario_id);

        $data['nome'] = $this->session->userdata('nome');
        $data['progresso'] = $progresso;

        $this->load->view('painel/header', $data);
        $this->load->view('painel/home', $data);
        $this->load->view('painel/footer');
    }
}
