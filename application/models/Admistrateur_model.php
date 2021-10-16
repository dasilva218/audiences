<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Admistrateur_model extends CI_Model
{
    public $nom_admistrateur;
    public $email;
    public $pass_admi;
    public $nom_admistration;

    // Nom de la table
    private $table = 'admistrateur';

    // Clé primaire de la table
    private $id = 'id_admistrateur';

    public function __construct()
    {
        $this->load->database();
    }

    public function tout_admistrateur()
    {
        $query = $this->db->get($this->table);
        return $query->result();
    }

    //connexion admistrateur
    public function connexion($params)
    {
        $this->email   = $params['email_admi'];
        $this->pass_admi  = $params['pass_admi'];
        $query = $this->db->get_where($this->table, array('email' => $params['email_admi'], 'pass_admi' => $params['pass_admi']));

        return $query->row();
    }

    //Recupérer un admistrateur en fonction de son adresse e-mail
    public function par_email($email)
    {
        $query = $this->db->get_where($this->table, array('email' => $email));
        return $query->row();
    }

    
}
