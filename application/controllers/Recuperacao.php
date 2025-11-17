<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Recuperacao extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->model('Usuario_model');
        $this->load->library(['session','email']);
        $this->load->helper(['url','form']);
    }

    // tela para solicitar link
    public function solicitar(){
        if($this->input->post()){
            $email = $this->input->post('email', true);
            $usuario = $this->Usuario_model->buscar_por_email($email);
            if(!$usuario){
                $this->session->set_flashdata('erro','E-mail não encontrado.');
                redirect('recuperacao/solicitar');
            }
            // gerar token e salvar
            $token = bin2hex(random_bytes(24));
            $expiracao = date('Y-m-d H:i:s', strtotime('+2 hour'));
            $this->db->insert('recuperacao_senha', [
                'usuario_id'=>$usuario->id,
                'token'=>$token,
                'expiracao'=>$expiracao
            ]);
            // enviar email com link
            $link = site_url('recuperacao/resetar?token='.$token);
            $assunto = 'Recuperação de senha - App Matemática';
            $mensagem = "Olá {$usuario->nome},\n\nClique no link abaixo para redefinir sua senha (válido por 2 horas):\n\n{$link}\n\nSe você não solicitou, ignore esta mensagem.";
            // envia via library email do CodeIgniter (configurar smtp em application/config/email.php ou config)
            $this->email->from('no-reply@seusite.com','App Matemática');
            $this->email->to($usuario->email);
            $this->email->subject($assunto);
            $this->email->message($mensagem);
            if($this->email->send()){
                $this->session->set_flashdata('sucesso','E-mail de recuperação enviado (verifique sua caixa).');
            } else {
                // fallback: salvar token e mostrar link (em dev). Em produção retire esta exposição.
                $this->session->set_flashdata('erro','Falha ao enviar e-mail. Contate o administrador.');
            }
            redirect('recuperacao/solicitar');
        }
        $this->load->view('auth/recuperar_senha');
    }

    // tela de redefinição - recebe token GET
    public function resetar(){
        $token = $this->input->get('token', true);
        if(!$token){ show_404(); }
        $row = $this->db->get_where('recuperacao_senha',['token'=>$token,'usado'=>0])->row();
        if(!$row || strtotime($row->expiracao) < time()){
            $this->session->set_flashdata('erro','Token inválido ou expirado.');
            redirect('recuperacao/solicitar');
        }
        if($this->input->post()){
            $nova = $this->input->post('senha');
            $conf = $this->input->post('senha_confirm');
            if($nova !== $conf){
                $this->session->set_flashdata('erro','As senhas não coincidem.');
                redirect(current_url().'?token='.$token);
            }
            // atualizar senha
            $hash = password_hash($nova, PASSWORD_DEFAULT);
            $this->db->where('id',$row->usuario_id)->update('usuarios',['senha_hash'=>$hash]);
            // marca token como usado
            $this->db->where('id',$row->id)->update('recuperacao_senha',['usado'=>1]);
            $this->session->set_flashdata('sucesso','Senha redefinida com sucesso. Faça login.');
            redirect('login');
        }
        $this->load->view('auth/resetar_senha', ['token'=>$token]);
    }
}
