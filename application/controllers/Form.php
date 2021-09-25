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

    public function traitement_formulaire()
    {
    }
}
