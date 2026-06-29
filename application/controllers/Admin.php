<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Professor_model');
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->library('email');
    }

    public function dashboard()
    {
        // 🔒 proteção
        if (!$this->session->userdata('admin')) {
            redirect('professor/login');
        }

        $data['pendentes'] = $this->Professor_model->listar_pendentes();

        $this->load->view('admin/dashboard', $data);
    }

    public function aprovar($id)
{
    if (!$this->session->userdata('admin')) {
        redirect('professor/login');
    }

    // busca professor
    $professor = $this->db->where('id', $id)->get('professores')->row();

    if (!$professor) {
        show_404();
    }

    // aprova no banco
    $this->Professor_model->aprovar($id);

    // 🔥 CONFIG EMAIL
    $this->load->library('email');

    $config = [
        'protocol'  => 'smtp',
        'smtp_host' => 'smtp.gmail.com',
        'smtp_port' => 587,
        'smtp_user' => 'mathgame.unig@gmail.com',
        'smtp_pass' => 'pzaf mchv xsrv ntnj',
        'mailtype'  => 'html',
        'charset'   => 'utf-8',
        'newline'   => "\r\n"
    ];

    $this->email->initialize($config);

    // 🔥 ENVIA EMAIL
    $this->email->from('mathgame.unig@gmail.com', 'MathGame');
    $this->email->to($professor->email);

    $this->email->subject('Cadastro aprovado 🎉');

    $this->email->message("
        <h2>Olá, {$professor->nome}!</h2>
        <p>Seu cadastro foi <strong>aprovado</strong> com sucesso.</p>
        <p>Agora você já pode acessar o sistema e utilizar todas as funcionalidades.</p>
        <br>
        <a href='http://localhost/MathGame/professor/login'>
            Acessar sistema
        </a>
    ");

    if (!$this->email->send()) {
        log_message('error', $this->email->print_debugger());
    }

    $this->session->set_flashdata('sucesso', 'Professor aprovado e e-mail enviado!');
    redirect('admin/dashboard');
}
}