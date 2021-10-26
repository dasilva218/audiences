<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Log_action_model extends CI_Model
{

    public $action;
    public $demande_audiences_id_demande;
    public $admistrateur_id_admistrateur;
    // Nom de la table
    private $table = 'log_action';

    // Clé primaire de la table
    private $id = 'id_log';


    public function __construct()
    {
        $this->load->database();
    }

    public function inser_log()
    {
        return $this->db->insert($this->table, $this);
    }

   
}
