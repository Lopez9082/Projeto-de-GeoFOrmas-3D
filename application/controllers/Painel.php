<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Painel extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->library('session');
        $this->load->helper('url');
        if(!$this->session->userdata('logado')) redirect('login');
        $this->load->model('Progresso_model');
    }

    public function index(){
        $usuario_id = $this->session->userdata('usuario_id');
        $data['nome'] = $this->session->userdata('nome');
        $data['progresso'] = $this->Progresso_model->obter_progresso($usuario_id);
        $this->load->view('painel/header', $data); // header + sidebar
        $this->load->view('painel/home', $data);   // conteúdo central
        $this->load->view('painel/footer');
    }
}
