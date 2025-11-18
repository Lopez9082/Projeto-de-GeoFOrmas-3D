<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Professor_model extends CI_Model {

    protected $tabela = 'professores';

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * AUTENTICA UM PROFESSOR PELO EMAIL E SENHA
     */
    public function autenticar($email, $senha)
    {
        return $this->db
                    ->where('email', $email)
                    ->where('senha', $senha) // SEM HASH, conforme você pediu
                    ->get($this->tabela)
                    ->row();
    }

    /**
     * BUSCA UM PROFESSOR PELO ID
     */
    public function buscar_por_id($id)
    {
        return $this->db
                    ->where('id', $id)
                    ->get($this->tabela)
                    ->row();
    }

    /**
     * BUSCA UM PROFESSOR PELO EMAIL
     */
    public function buscar_por_email($email)
    {
        return $this->db
                    ->where('email', $email)
                    ->get($this->tabela)
                    ->row();
    }

    /**
     * CADASTRA UM PROFESSOR
     */
    public function cadastrar($dados)
    {
        return $this->db->insert($this->tabela, $dados);
    }

    /**
     * ATUALIZA OS DADOS DO PROFESSOR
     */
    public function atualizar($id, $dados)
    {
        return $this->db
                    ->where('id', $id)
                    ->update($this->tabela, $dados);
    }

    /**
     * EXCLUI UM PROFESSOR
     */
    public function excluir($id)
    {
        return $this->db
                    ->where('id', $id)
                    ->delete($this->tabela);
    }

    /**
     * LISTA TODOS OS PROFESSORES (caso precise no futuro)
     */
    public function listar_todos()
    {
        return $this->db->order_by('nome', 'ASC')->get($this->tabela)->result();
    }
}
