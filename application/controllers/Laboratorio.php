<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laboratorio extends CI_Controller {

    public function __construct(){
        parent::__construct();

        // TIMEZONE BRASIL
        date_default_timezone_set('America/Sao_Paulo');

        $this->load->library(['session','pdf']);
        $this->load->helper(['url','download']);
        $this->load->model('Certificado_model');
        $this->load->model('Progresso_model');

        if (!$this->session->userdata('logado')) {
            redirect('login');
        }
    }

    public function index(){

        $usuario_id = $this->session->userdata('usuario_id');
        $nome       = $this->session->userdata('nome');

        $progresso = $this->Progresso_model->obter($usuario_id);
        $xp = $progresso ? (int)$progresso->xp_total : 0;

        $certificados = $this->Certificado_model->certificados_ativos();

        $pasta = FCPATH.'uploads/certificados/';
        if (!is_dir($pasta)) {
            mkdir($pasta, 0777, true);
        }

        $certificado_atual = null;
        $proximo = null;

        foreach ($certificados as $c) {

            // DEFINIR PROGRESSO
            if ($xp >= $c->xp_minimo) {
                $certificado_atual = $c;
            } else {
                if (!$proximo) $proximo = $c;
            }

            // GERAR CERTIFICADO SE TIVER XP
            if ($xp >= $c->xp_minimo) {

                if ($this->Certificado_model->usuario_possui($usuario_id, $c->id)) {
                    continue;
                }

                $arquivo_fisico = $pasta.'cert_'.$c->id.'_'.$usuario_id.'.pdf';
                $arquivo_db     = 'uploads/certificados/cert_'.$c->id.'_'.$usuario_id.'.pdf';

                // EVITA ERRO DO AUTOLOAD
                if (method_exists($this->pdf, 'gerar_certificado')) {

                    $this->pdf->gerar_certificado(
                        $nome,
                        $c->titulo,
                        $c->descricao,
                        $arquivo_fisico,
                        date('Y-m-d H:i:s')
                    );

                    $this->Certificado_model->salvar(
                        $usuario_id,
                        $c->id,
                        $arquivo_db
                    );
                }
            }
        }

        $data['certificados'] = $this->Certificado_model->listar_usuario($usuario_id);
        $data['progresso']    = $progresso;
        $data['xp']           = $xp;
        $data['certificado_atual'] = $certificado_atual;
        $data['proximo'] = $proximo;

        $this->load->view('painel/header', $data);
        $this->load->view('laboratorio/index', $data);
        $this->load->view('painel/footer');
    }


    public function gerar_certificado(){

        $usuario_id = $this->session->userdata('usuario_id');
        $nome       = $this->session->userdata('nome');

        $pasta = FCPATH.'uploads/certificados/';
        if (!is_dir($pasta)) {
            mkdir($pasta, 0777, true);
        }

        $arquivo_fisico = $pasta.'certificado_'.$usuario_id.'.pdf';
        $arquivo_db     = 'uploads/certificados/certificado_'.$usuario_id.'.pdf';

        // gera PDF com data correta
        $this->pdf->gerar_certificado(
            $nome,
            'Certificado MathGame',
            'Certificado de participação na plataforma MathGame',
            $arquivo_fisico,
            date('Y-m-d H:i:s')
        );

        // salva no banco
        $this->Certificado_model->salvar(
            $usuario_id,
            0,
            $arquivo_db
        );

        redirect('laboratorio');
    }


    public function baixar($id){

        $usuario_id = $this->session->userdata('usuario_id');

        $cert = $this->db
            ->select('
                cu.*,
                c.titulo,
                c.descricao
            ')
            ->from('certificados_usuario cu')
            ->join('certificados c', 'c.id = cu.certificado_id')
            ->where('cu.id', (int)$id)
            ->where('cu.usuario_id', $usuario_id)
            ->get()
            ->row();

        if (!$cert) {
            show_404();
        }

        $caminho = FCPATH . $cert->arquivo_pdf;

        // se o arquivo não existir recria
        if (!file_exists($caminho)) {

            $pasta = dirname($caminho);
            if (!is_dir($pasta)) {
                mkdir($pasta, 0777, true);
            }

            $nome = $this->session->userdata('nome');

            $this->pdf->gerar_certificado(
                $nome,
                $cert->titulo,
                $cert->descricao,
                $caminho,
                $cert->data_emissao
            );
        }

        // download
        force_download($caminho, NULL);
    }

}