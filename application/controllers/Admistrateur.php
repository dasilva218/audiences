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
        $audience = $this->Audience_model->sql($admin->nom_admistration);

        $data = [
            'demande' => $audience,
            'admistrateur' => $admin
        ];

        template('backend/list', $data);
    }

    //page detail audience
    public function dashboard_detail($id)
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
            'action' => $action_consultation
        ];
        // if($audience->nom_fichier2 == null) 
        //     echo 'bien';
        // else 
        //     echo 'rien';    
        // var_dump($audience->nom_fichier2);
        // exit;
        template('backend/audience', $data);
    }


    /* les actions sur les boutons*/
    public function accepter()
    {
        
    }
    /* les actions sur les boutons*/


    // fonction qui gère les sessions de l'admistrateur
    private function est_connecte()
    {
        $CI = &get_instance();

        $CI->load->library('session');

        $token_admin = $CI->session->userdata('token_admin');

        return  $token_admin != null;
    }
}
