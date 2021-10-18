<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Front extends CI_Controller
{
    public function index()
    {
        $this->affichefront('frontend/home');
    }

    // affiche le formulaire de demande d'audience
    public function audience()
    {
        $this->load->model('Admistration_model');

        $admistrations = $this->Admistration_model->toute_admistrations();

        $nom_administration = [];

        foreach ($admistrations as $admistration => $valeur) {
            $nom_administration[] = $valeur->nom_admistration;
        }

        $this->affichefront('frontend/form', [
            'title' => 'Formulaire',
            'admistrations' => $nom_administration
        ]);
    }

    // affiche la page about
    public function about()
    {
        $this->affichefront('frontend/about', ['title' => 'A propos']);
    }

    // affiche la page aide
    public function help()
    {
        $this->affichefront('frontend/help', ['title' => 'Aide']);
    }

    // affiche la page contact
    public function contact()
    {
        $this->affichefront('frontend/contact', ['title' => 'Contact']);
    }

    // affiche la page 
    public function privacy()
    {
        $this->affichefront('frontend/privacy', ['title' => 'Confidentialité']);
    }

    // affiche la page about
    public function terms()
    {
        $this->affichefront('frontend/terms', ['title' => 'Conditions d\'utilisation']);
    }


    // traite l'envoi des données du formulaire de demande d'audience
    public function do_upload()
    {

        $filesName = [];
        $file1 = "";
        $file2 = "";

        foreach ($_FILES as $key => $value) {

            $filesName[] = $value['name'];
        }

        $file1 = $filesName[0];
        $file2 = $filesName[1];

        foreach ($_FILES as $file) {
            if ($file['error'] == UPLOAD_ERR_NO_FILE) {
                continue;
            }

            $folderDestination = './uploads/' . $file['name'];
            $folderTemp = $file['tmp_name'];
            $succes = move_uploaded_file($folderTemp, $folderDestination);

            if (!$succes) {
                echo 'file no upload';
            }
        }

        $this->load->model('audience_model');

        $demandeAudience = new Audience_model();
        $demandeAudience->nom_demandeur = $this->input->post('first_name');
        $demandeAudience->prenom_demandeur = $this->input->post('nom');
        $demandeAudience->statut_demandeur = $this->input->post('statut');
        $demandeAudience->tel_perso = $this->input->post('telephone');
        $demandeAudience->tel_bureau = $this->input->post('phone');
        $demandeAudience->email = $this->input->post('email');
        $demandeAudience->destinataire = $this->input->post('subject');
        $demandeAudience->objet = $this->input->post('objet');
        $demandeAudience->nom_fichier1 = $file1;
        $demandeAudience->nom_fichier2 = $file2;
        $demandeAudience->civilite = $this->input->post('civilite');
        $demandeAudience->type_audience = $this->input->post('audience');
        $demandeAudience->message = $this->input->post('note');
        $demandeAudience->nom_admistration = $this->input->post('subject');

        $demandeAudience->enregistrer_audience();
        redirect('front/audience');
    }

    public function affichefront($vue, $data = array())
    {
        $this->load->view('tempfront/header', $data);
        $this->load->view($vue, $data);
        $this->load->view('tempfront/footer', $data);
    }
}
