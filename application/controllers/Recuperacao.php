<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Recuperacao extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->model('Usuario_model');
        $this->load->model('Professor_model');
        $this->load->library(['session','email']);
        $this->load->helper(['url','form']);
    }

    public function index(){
        redirect('recuperacao/solicitar');
    }

    // tela para solicitar link
    public function solicitar()
    {
        if ($this->input->post()) {

            // Obtém o e-mail digitado no formulário
            $email = $this->input->post('email', true);

            // Procura primeiro na tabela de usuários
            $usuario = $this->Usuario_model->buscar_por_email($email);
            $tipo = 'usuario';

            // Se não encontrar, procura na tabela de professores
            if (!$usuario) {
                $usuario = $this->Professor_model->buscar_por_email($email);
                $tipo = 'professor';
            }

            // Se não encontrar em nenhuma das duas tabelas
            if (!$usuario) {
                $this->session->set_flashdata('erro', 'E-mail não encontrado.');
                redirect('recuperacao/solicitar');
            }

            // Gera o token
            $token = bin2hex(random_bytes(24));
            $expiracao = date('Y-m-d H:i:s', strtotime('+2 hours'));

            // Salva o token no banco
            $this->db->insert('recuperacao_senha', [
                'usuario_id' => $usuario->id,
                'tipo'       => $tipo,
                'token'      => $token,
                'expiracao'  => $expiracao
            ]);

            // Link de recuperação
            $link = site_url('recuperacao/resetar?token=' . $token);

            // Assunto e mensagem
            $assunto = 'Recuperação de senha - App Matemática';
            $mensagem = "Olá {$usuario->nome},\n\n";
            $mensagem .= "Clique no link abaixo para redefinir sua senha (válido por 2 horas):\n\n";
            $mensagem .= "{$link}\n\n";
            $mensagem .= "Se você não solicitou esta alteração, ignore este e-mail.";

            // Configuração do e-mail
            $this->email->from('mathgame.unig@gmail.com', 'App Matemática');
            $this->email->to($usuario->email);
            $this->email->subject($assunto);
            $this->email->message($mensagem);

            // Envia
            if ($this->email->send()) {
                $this->session->set_flashdata('sucesso', 'E-mail de recuperação enviado. Verifique sua caixa de entrada.');
            } else {
                $this->session->set_flashdata('erro', 'Falha ao enviar o e-mail de recuperação.');
                // Para depuração, você pode descomentar a linha abaixo:
                // echo $this->email->print_debugger();
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
            if($row->tipo == 'usuario'){
                $this->db->where('id', $row->usuario_id)
                        ->update('usuarios', ['senha' => $hash]);
            }else{
                $this->db->where('id', $row->usuario_id)
                        ->update('professores', ['senha' => $hash]);
            }            // marca token como usado
            $this->db->where('id',$row->id)->update('recuperacao_senha',['usado'=>1]);
            $this->session->set_flashdata('sucesso','Senha redefinida com sucesso. Faça login.');
            redirect('login');
        }
        $this->load->view('auth/resetar_senha', ['token'=>$token]);
    }
}
