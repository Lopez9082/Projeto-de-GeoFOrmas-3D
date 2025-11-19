<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tema_model extends CI_Model {
    public function todos() {
        return $this->db->order_by('nome','ASC')->get('temas')->result();
    }
}
