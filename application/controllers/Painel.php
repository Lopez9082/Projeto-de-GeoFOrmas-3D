<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Painel extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper('url');

        if (!$this->session->userdata('logado')) {
            redirect('login');
        }

        // Models
        $this->load->model('Progresso_model');
        $this->load->model('Missao_model');
        $this->load->model('Badge_model');
    }

    public function index()
    {
        $usuario_id = $this->session->userdata('usuario_id');

        // Dados do painel
        $data['nome']      = $this->session->userdata('nome');
        $data['progresso'] = $this->Progresso_model->obter_progresso($usuario_id);
        $data['missao']    = $this->Missao_model->get_missoes_ativas($usuario_id);
        $data['badges']    = $this->Badge_model->get_badges_usuario($usuario_id);

        // Views
        $this->load->view('painel/header', $data);
        $this->load->view('painel/home', $data);
        $this->load->view('painel/footer', $data);
    }
}
