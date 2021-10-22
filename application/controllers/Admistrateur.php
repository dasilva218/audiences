<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admistrateur extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Admistrateur_model');
        $this->load->model('Audience_model');
        $this->load->model('ConsultAudience_model');
    }
    //affiche le formulaire de connexion
    public function index()
    {
        $this->session->sess_destroy();
        $this->load->view('backend/login');
    }

    //traitement de la deconnexion
    public function deconnexion()
    {
        $this->session->sess_destroy();
        redirect('admistrateur');
    }

    //traitement connexion admistrateur
    public function traitement_connexion_admin()
    {
        //récupération des données
        $email_admi   = $this->input->post('loginEmail');
        $pass_admin  = $this->input->post('loginPassword');
        $param =  [
            'email_admin' => $email_admi,
            'pass_admin' => $pass_admin
        ];

        // Validation des données

        //insertion d'information
        $admin = $this->Admistrateur_model->connexion($param);

        if ($admin) {
            $this->session->set_userdata('token_admin', md5(time()));
            $this->session->set_userdata('email_admin', $admin->email);

            redirect('admistrateur/dashboard');
        } else {
            $this->session->set_flashdata('message', "Email ou mot de passe incorrect");
            //$this->session->set_flashdata('nom_util', $email_util);
            redirect('admistrateur');
        }
    }

    //affiche le dashboard
    public function dashboard()
    {
        if (!$this->est_connecte()) {
            redirect('admistrateur');
        }

        //affiche l' admistrateur
        $admin = $this->Admistrateur_model->par_email($this->session->email_admin);

        if (!$admin) {
            redirect('admistrateur');
        }

        $audience = $this->Audience_model->sql($admin->admistrations_nom_admistration);

        $data = [
            'demande' => $audience,
            'admistrateur' => $admin,
            'title' => "Réception",
            'active' => "dashboard"
        ];

        template('backend/list', $data);
    }


    //section détail audience
    public function dashboard_detail($id)
    {
        if (!$this->est_connecte()) {
            redirect('admistrateur');
        }

        //affiche l' admistrateur
        $admin = $this->Admistrateur_model->par_email($this->session->email_admin);
        $audience = $this->Audience_model->audience_id($id);
        // $action_consultation = $this->ConsultAudience_model->demande_id($audience->id_demande);

        $data = [
            'demande' => $audience,
            'admistrateur' => $admin,
            'action' => $action_consultation,
            'title' => "Consultation",
            'active' => "dashboard"

        ];
        // if($audience->nom_fichier2 == null) 
        //     echo 'bien';
        // else 
        //     echo 'rien';    
        // var_dump($audience->nom_fichier2);
        // exit;
        template('backend/audience', $data);
    }

    //gestion des differents pages

    public function pageAccepte()
    {
        if (!$this->est_connecte()) {
            redirect('admistrateur');
        }

        //affiche l' admistrateur
        $admin = $this->Admistrateur_model->par_email($this->session->email_admin);

        if (!$admin) {
            redirect('admistrateur');
        }

        $audience = $this->ConsultAudience_model->accepte(1);

        $data = [
            'demande' => $audience,
            'admistrateur' => $admin,
            'active' => "accepte",
            'title' => "Accepter",

        ];

        template('backend/accepterList', $data);
    }


    public function accepter_detail($id)
    {
        if (!$this->est_connecte()) {
            redirect('admistrateur');
        }

        //affiche l' admistrateur
        $admin = $this->Admistrateur_model->par_email($this->session->email_admin);
        $audience = $this->Audience_model->audience_id($id);
        $action_consultation = $this->ConsultAudience_model->demande_id($audience->id_demande);

        $data = [
            'demande' => $audience,
            'admistrateur' => $admin,
            'action' => $action_consultation,
            'active' => "accepte",
            'title' => "Accepter",

        ];

        template('backend/accepterDetail', $data);
    }


    public function pageImportant()
    {
        if (!$this->est_connecte()) {
            redirect('admistrateur');
        }

        //affiche l' admistrateur
        $admin = $this->Admistrateur_model->par_email($this->session->email_admin);

        if (!$admin) {
            redirect('admistrateur');
        }

        $audience = $this->ConsultAudience_model->important(1);

        $data = [
            'demande' => $audience,
            'admistrateur' => $admin,
            'active' => "important",
            'title' => "Important"

        ];

        template('backend/importantList', $data);
    }


    public function important_detail($id)
    {
        if (!$this->est_connecte()) {
            redirect('admistrateur');
        }

        //affiche l' admistrateur
        $admin = $this->Admistrateur_model->par_email($this->session->email_admin);
        $audience = $this->Audience_model->audience_id($id);
        $action_consultation = $this->ConsultAudience_model->demande_id($audience->id_demande);

        $data = [
            'demande' => $audience,
            'admistrateur' => $admin,
            'action' => $action_consultation,
            'active' => "important",
            'title' => "Important"

        ];
        // if($audience->nom_fichier2 == null) 
        //     echo 'bien';
        // else 
        //     echo 'rien';    
        // var_dump($audience->nom_fichier2);
        // exit;
        template('backend/importantDetail', $data);
    }


    public function pageArchiver()
    {
        if (!$this->est_connecte()) {
            redirect('admistrateur');
        }

        //affiche l' admistrateur
        $admin = $this->Admistrateur_model->par_email($this->session->email_admin);

        if (!$admin) {
            redirect('admistrateur');
        }

        $audience = $this->ConsultAudience_model->archiver(1);

        $data = [
            'demande' => $audience,
            'admistrateur' => $admin,
            'active' => "archiver",
            'title' => "Archiver",

        ];

        template('backend/archiverList', $data);
    }

    public function archiver_detail($id)
    {
        if (!$this->est_connecte()) {
            redirect('admistrateur');
        }

        //affiche l' admistrateur
        $admin = $this->Admistrateur_model->par_email($this->session->email_admin);
        $audience = $this->Audience_model->audience_id($id);
        $action_consultation = $this->ConsultAudience_model->demande_id($audience->id_demande);

        $data = [
            'demande' => $audience,
            'admistrateur' => $admin,
            'action' => $action_consultation,
            'active' => "archiver",
            'title' => "Archiver",

        ];

        template('backend/archiverDetail', $data);
    }


    /* les actions sur les boutons*/
    public function accepter($id)
    {
        if (!$this->est_connecte()) {
            redirect('admistrateur');
        }

        $admin = $this->Admistrateur_model->par_email($this->session->email_admin);
        $audience = $this->Audience_model->audience_id($id);

        $consult = new ConsultAudience_model();
        $consult->id_admistrateur = $admin->id_admistrateur;
        $consult->id_demande = $audience->id_demande;
        $consult->accepter = 1;
        $consult->important = 0;
        $consult->archiver = 0;

        $consult->action();

        redirect('admistrateur/dashboard_detail/' . $audience->id_demande);
    }

    public function archiver($id)
    {
        if (!$this->est_connecte()) {
            redirect('admistrateur');
        }

        $admin = $this->Admistrateur_model->par_email($this->session->email_admin);
        $audience = $this->Audience_model->audience_id($id);

        $consult = new ConsultAudience_model();
        $consult->id_admistrateur = $admin->id_admistrateur;
        $consult->id_demande = $audience->id_demande;
        $consult->accepter = 0;
        $consult->important = 0;
        $consult->archiver = 1;

        $consult->action();

        redirect('admistrateur/dashboard_detail/' . $audience->id_demande);
    }

    public function important($id)
    {
        if (!$this->est_connecte()) {
            redirect('admistrateur');
        }

        $admin = $this->Admistrateur_model->par_email($this->session->email_admin);
        $audience = $this->Audience_model->audience_id($id);

        $consult = new ConsultAudience_model();
        $consult->id_admistrateur = $admin->id_admistrateur;
        $consult->id_demande = $audience->id_demande;
        $consult->accepter = 0;
        $consult->important = 1;
        $consult->archiver = 0;

        $consult->action();

        redirect('admistrateur/dashboard_detail/' . $audience->id_demande);
    }
    /* fin des actions sur les boutons*/


    // fonction qui gère les sessions de l'admistrateur
    private function est_connecte()
    {
        $CI = &get_instance();

        $CI->load->library('session');

        $token_admin = $CI->session->userdata('token_admin');

        return  $token_admin != null;
    }
}
