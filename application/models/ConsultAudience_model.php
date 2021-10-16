<?php

defined('BASEPATH') or exit('No direct script access allowed');

class ConsultAudience_model extends CI_Model
{
    public $id_admistrateur;
    public $id_demande;
    public $accepter; 
    public $rejeter; 
    public $important; 
    // public $archiver; 
    // public $attentes; 
  

    // Nom de la table
    private $table = 'consulter';

    // Clé primaire de la table
    private $id = 'id_consult';

    public function __construct()
    {
        $this->load->database();
    }

    public function action()
    {
        return $this->db->insert($this->table, $this);
    }

    public function demande_id($id)
    {
        $query = $this->db->get_where($this->table, array('id_demande' => $id));
        return $query->row();
    }
}    