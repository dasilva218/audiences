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
    public $message;
    // public $accepte;
    // public $important;
    // public $archiver;
    public $admistrations_nom_admistration;

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

    // Renvoyer demande d'audience par admistration

    public function audience_admistration($nom_admistration)
    {
        $query = $this->db->get_where($this->table, array('admistrations_nom_admistration' => $nom_admistration));
        return $query->result();
    }

    public function sql($id)
    {
        $sql =
            "SELECT *
         FROM demande_audiences
         WHERE admistrations_nom_admistration = ? 
         ORDER BY date_envoie desc ";

        return $this->db->query($sql, $id)->result();
    }

    // Renvoyer une demande par son identifiant

    public function audience_id($id)
    {
        $query = $this->db->get_where($this->table, array('id_demande' => $id));
        return $query->row();
    }


    //modifier le prix
    public function modifier($id, $action)
    {
        switch ($action) {
            case 'accepter':
                $sql = " UPDATE demande_audiences 
                SET accepte = 1, important = 0, archiver = 0  
                WHERE demande_audiences.id_demande = ? ";
                break;
            case 'important':
                $sql = " UPDATE demande_audiences 
                SET accepte = 0, important = 1, archiver = 0  
                WHERE demande_audiences.id_demande = ? ";
                break;
            case 'archiver':
                $sql = " UPDATE demande_audiences 
                SET accepte = 0, important = 0, archiver = 1  
                WHERE demande_audiences.id_demande = ? ";
                break;
            default:
                return false;
                break;
        }


        return $this->db->query($sql, $id);
    }

    // Modifier l'etat d'une audience accepter
    // public function modifier_etat($id, $action)
    // {
    //     // $query = $this->db->get_where($this->table, array('id_demande' => $id));
    //     // $demande = $query->row();
    //     return $this->db->update($this->table, array('accepte' => 1), array($this->id_demande => $id));

    //     // switch ($action) {
    //     //     case 'accepter':
    //     //         break;
    //     //     case 'important':
    //     //         return $this->db->update($this->table, array('accepte' => 0, 'important' => 1, 'archiver' => 0), array($this->id_demande => $id));
    //     //         break;
    //     //     case 'archiver':
    //     //         return $this->db->update($this->table, array('accepte' => 0, 'important' => 0, 'archiver' => 1), array($this->id_demande => $id));
    //     //         break;
    //     //     default:
    //     //         return false;
    //     //         break;
    //     // }
    // }
}
