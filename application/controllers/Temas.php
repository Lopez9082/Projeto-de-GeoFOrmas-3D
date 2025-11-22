<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Temas extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->library('session');
        $this->load->helper('url');
        if (!$this->session->userdata('logado')) redirect('login');

        $this->load->model('Tema_model');
        $this->load->model('Questao_model');
    }

    public function index(){
        $data['temas'] = $this->Tema_model->listar();
        $this->load->view('painel/header', $data);
        $this->load->view('temas/listar', $data);
        $this->load->view('painel/footer');
    }

    public function questoes($tema_id){
        $data['tema'] = $this->Tema_model->buscar($tema_id);
        if (!$data['tema']) show_404();
        $data['questoes'] = $this->Questao_model->listar_por_tema($tema_id);

        $this->load->view('painel/header', $data);
        $this->load->view('temas/questoes', $data);
        $this->load->view('painel/footer');
    }
}
