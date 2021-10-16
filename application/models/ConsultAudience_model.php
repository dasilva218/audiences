<?php

defined('BASEPATH') or exit('No direct script access allowed');

class ConsultAudience_model extends CI_Model
{
    public $id_admistrateur;
    public $id_demande;
    public $accepter; 
    public $important; 
    public $archiver; 
    //public $rejeter; 
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

    public function toute_consultation()
    {
        $query = $this->db->get($this->table);
        return $query->result();
    }

    //audience detail
    public function demande_id($id)
    {
        $query = $this->db->get_where($this->table, array('id_demande' => $id));
        return $query->row();
    }

    public function demande_admin($id)
    {
        $query = $this->db->get_where($this->table, array('id_admistrateur' => $id));
        return $query->row();
    }
    
    public function demande_audience($id)
    {
        $query = $this->db->get_where($this->table, array('id_demande' => $id));
        return $query->row();
    }

    public function sql($id){
        $sql = 
        "SELECT demande_audiences.id_demande, nom_demandeur, prenom_demandeur, statut_demandeur, date_envoie, objet, nom_admistrateur, accepter
         FROM demande_audiences, admistrateur, consulter
         WHERE demande_audiences.id_demande = consulter.id_demande 
         AND admistrateur.id_admistrateur = consulter.id_admistrateur
         AND consulter.accepter=? ";
    
        return $this->db->query($sql,$id)->result();        
    }

    
}    