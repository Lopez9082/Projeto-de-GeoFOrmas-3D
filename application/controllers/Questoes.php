<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Questoes extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Questoes_model');

        // Se quiser restringir a quem está logado:
        if(!$this->session->userdata('logado')) {
            redirect('professor/login');
        }
    }

    public function index() {
        $data['lista'] = $this->Questoes_model->get_all();
        $this->load->view('questoes/index', $data);
    }

    public function criar() {
        $this->load->view('questoes/form');
    }

    public function salvar() {
        $data = $this->input->post();

        // PROCESSAMENTO DE UPLOAD
        if (!empty($_FILES['imagem']['name'])) {
            $config['upload_path']   = './uploads/questoes/';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';
            $config['encrypt_name']  = TRUE;

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('imagem')) {
                $uploadData = $this->upload->data();
                $data['imagem'] = $uploadData['file_name'];
            } else {
                echo $this->upload->display_errors();
                return;
            }
        }

        $data['criado_por'] = $this->session->userdata('id');
        $data['criado_em'] = date('Y-m-d H:i:s');

        $this->Questoes_model->insert($data);
        redirect('questoes');
    }

    public function editar($id) {
        $data['q'] = $this->Questoes_model->get($id);
        $this->load->view('questoes/form', $data);
    }

    public function atualizar($id) {
        $data = $this->input->post();

        // UPLOAD opcional
        if (!empty($_FILES['imagem']['name'])) {
            $config['upload_path']   = './uploads/questoes/';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';
            $config['encrypt_name']  = TRUE;

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('imagem')) {
                $uploadData = $this->upload->data();
                $data['imagem'] = $uploadData['file_name'];
            } else {
                echo $this->upload->display_errors();
                return;
            }
        }

        $this->Questoes_model->update($id, $data);
        redirect('questoes');
    }

    public function excluir($id) {
        $this->Questoes_model->delete($id);
        redirect('questoes');
    }
}
