<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admistrateur extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Admistrateur_model');
        $this->load->model('Audience_model');
        $this->load->model('Log_action_model');
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
        // var_dump($audience);
        // $audience = array_filter($audience_admistration, function ($aud) {
        //     return $aud->accepte == 0 and $aud->important == 0 and $aud->archiver == 0;
        // });

        $data = [
            'demande' => $audience,
            'admistrateur' => $admin,
            'title' => "Réception",
            'active' => "dashboard"
        ];

        template('backend/list', $data);
    }


    //section détail audience
    public function dashboard_detail($id, $active)
    {
        if (!$this->est_connecte()) {
            redirect('admistrateur');
        }

        //affiche l' admistrateur
        $admin = $this->Admistrateur_model->par_email($this->session->email_admin);
        $audience = $this->Audience_model->audience_id($id);


        $data = [
            'demande' => $audience,
            'admistrateur' => $admin,
            'title' => "Consultation",
        ];

        switch ($active) {
            case 'dashboard':
                $data['active'] = $active;
                break;
            case 'accepte':
                $data['active'] = $active;
                break;
            case 'important':
                $data['active'] = $active;
                break;
            case 'archiver':
                $data['active'] = $active;
                break;
            default:
                # code...
                break;
        }


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

        $audience_admistration = $this->Audience_model->sql($admin->admistrations_nom_admistration);

        $audience = array_filter($audience_admistration, function ($aud) {
            return $aud->accepte == 1;
        });

        $data = [
            'demande' => $audience,
            'admistrateur' => $admin,
            'active' => "accepte",
            'title' => "Accepter",

        ];

        template('backend/accepterList', $data);
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

        $audience_admistration = $this->Audience_model->sql($admin->admistrations_nom_admistration);

        $audience = array_filter($audience_admistration, function ($aud) {
            return $aud->important == 1;
        });

        $data = [
            'demande' => $audience,
            'admistrateur' => $admin,
            'active' => "important",
            'title' => "Important"

        ];

        template('backend/importantList', $data);
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

        $audience_admistration = $this->Audience_model->sql($admin->admistrations_nom_admistration);

        $audience = array_filter($audience_admistration, function ($aud) {
            return $aud->archiver == 1;
        });

        $data = [
            'demande' => $audience,
            'admistrateur' => $admin,
            'active' => "archiver",
            'title' => "Archiver",

        ];

        template('backend/archiverList', $data);
    }


    /* les actions sur les boutons*/
    public function action($id, $action)
    {
        if (!$this->est_connecte()) {
            redirect('admistrateur');
        }

        $admin = $this->Admistrateur_model->par_email($this->session->email_admin);
        $audience = $this->Audience_model->audience_id($id);
        // $this->Audience_model->modifier_etat($id, $action);

        if ($this->Audience_model->modifier($id, $action)) {

            $log_action = new Log_action_model();

            $log_action->action = $action;
            $log_action->demande_audiences_id_demande = $audience->id_demande;
            $log_action->admistrateur_id_admistrateur = $admin->id_admistrateur;

            $log_action->inser_log();

            switch ($action) {
                case 'accepter':
                    $this->session->set_flashdata('message-success', "Audience accepté !!");
                    break;
                case 'important':
                    $this->session->set_flashdata('message-success', "Placé dans les importants !!");
                    break;
                case 'archiver':
                    $this->session->set_flashdata('message-success', "l'audience a été archivée !!");
                    break;
                default:
                    return false;
                    break;
            }
        }

        redirect('admistrateur/dashboard_detail/' . $audience->id_demande . '/' . $action);
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
