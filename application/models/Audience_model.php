<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Audience_model extends CI_Model
{
    public $nom_demandeur;
    public $prenom_demandeur;
    public $statut_demandeur;
    public $tel_perso;
    public $tel_bureau;
    public $email;
    public $destinataire;
    public $objet;
    public $nom_fichier1;
    public $nom_fichier2;
    public $civilite;
    public $type_audience;
    public $nom_admistration;

    // Nom de la table
    private $table = 'demande_audiences';

    // Clé primaire de la table
    private $id = 'id_demande';

    public function __construct()
    {
        $this->load->database();
    }

    public function toute_demande_audience()
    {
        $query = $this->db->get($this->table);
        return $query->result();
    }

    public function enregistrer_audience()
    {
        return $this->db->insert($this->table, $this);
    }
}