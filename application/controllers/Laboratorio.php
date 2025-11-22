<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laboratorio extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->library('session');
        $this->load->helper('url');
        if (!$this->session->userdata('logado')) redirect('login');

        $this->load->model('Laboratorio_model');
        $this->load->model('Progresso_model');
    }

    public function index(){
        $usuario_id = $this->session->userdata('usuario_id');
        $data['funcs'] = $this->Laboratorio_model->listar($usuario_id);
        $data['progresso'] = $this->Progresso_model->obter($usuario_id);

        $this->load->view('painel/header', $data);
        $this->load->view('laboratorio/index', $data);
        $this->load->view('painel/footer');
    }
}
