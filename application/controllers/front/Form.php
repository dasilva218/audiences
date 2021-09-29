<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Form extends CI_Controller
{
    public function index()
    {
        $admistrations = [
            'Primature',
            "Ministère du Commerce, de l'Industrie et des PME/PMI",
            "Ministère de l'Education Nationale",
            'Ministère du Tourisme',
            'Ministère du Travail',
            "Ministère de l'Economie",
        ];
        $this->load->view('front/form', ['admistration' => $admistrations]);
    }

    //methode de controle du formulaire

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
        $demandeAudience->prenom_demandeur = $this->input->post('noms');
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
        $demandeAudience->nom_admistration = $this->input->post('subject');
    
        $demandeAudience->enregistrer_audience();
        
    }
}
