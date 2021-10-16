<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admistrateur extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Admistrateur_model');
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

        var_dump($admin);
        exit;
    }

    // fonction qui gère les sessions de l'admistrateur
    private function est_connecte()
    {
        $CI = &get_instance();

        $CI->load->library('session');

        $token_admin = $CI->session->userdata('token_admin');

        return  $token_admin != null;
    }
}
