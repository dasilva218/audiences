<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Admistration_model extends CI_Model
{
    // Nom de la table
    private $table = 'admistration';

    // Clé primaire de la table
    private $id = 'nom_admistration';
    private $id_falc = 'id_admistration';

    public function __construct()
    {
        $this->load->database();
    }

    public function toute_admistrations()
    {
        $query = $this->db->get($this->table);

        return $query->result();
    }
}
