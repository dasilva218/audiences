<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Front extends CI_Controller
{
    public function index()
    {
        $this->affichefront('frontend/home');
    }

    // page de confirmation d'envoi audience
    public function confirmAudience()
    {
        $this->load->view('frontend/message_reussi');
    }
   
    public function confirM()
    {
        $this->load->view('email/demandeur/confir_mail');
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

        $this->load->model('Audience_model');

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
        $demandeAudience->admistrations_nom_admistration = $this->input->post('subject');

        //On enregistre la demande d'audience
        $succes = $demandeAudience->enregistrer_audience();
        // exit("message d'erreur");
        //On redirige en fonction du succe
        if ($succes) {
            # code...
            // On charge la vue du mail
            $message = $this->load->view('email/demandeur/enregistrement', '', TRUE);

            $cles    = array(
                '{destination}',
                '{genre}',
                '{nom}'
            );
            $valeurs = array(
                $demandeAudience->destinataire,
                ($demandeAudience->civilite == 'Madame' ? 'Mme' : 'M.'),
                $demandeAudience->nom_demandeur
            );

            $message = str_replace($cles, $valeurs, $message);

            // Pour envoyer un mail HTML, l'en-tête Content-type doit être défini
            //$headers[] = 'MIME-Version: 1.0';
            //$headers[] = 'Content-type: text/html; charset=iso-8859-1';

            $headers  = "MIME-Version: 1.0\r\n";
            $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
            $headers .= $demandeAudience->destinataire;

            // On envoie un mail au candidat
            mail($demandeAudience->email, 'Audience', $message, $headers);

            // On redirige vers la page de confirmation
            redirect('front/confirmAudience');
        }
    }


    public function affichefront($vue, $data = array())
    {
        $this->load->view('tempfront/header', $data);
        $this->load->view($vue, $data);
        $this->load->view('tempfront/footer', $data);
    }
}
