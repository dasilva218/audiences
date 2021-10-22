<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Test extends CI_Controller
{
	public function __construct()
	{
		parent:: __construct();
		$this->load->model('Audience_model');
	}

	public function affich()
	{
		$admistrations = [
			'Primature',
			"Ministère du Commerce, de l'Industrie et des PME/PMI",
			"Ministère de l'Education Nationale",
			'Ministère du Tourisme',
			'Ministère du Travail',
			"Ministère de l'Economie]",
		];
		$this->load->view('test_vue');
	}

	public function test_code()
	{
		$demande_audiences = $this->Audience_model->sql('Primature');

		// var_dump($demande_audiences);
		$user = [
			'nom' => $demande_audiences,
		];

		echo( json_encode($user) );
		
	}

	public function affiche()
	{
		$this->load->view('template/head');
		$this->load->view('template/header');
		$this->load->view('template/side');
		$this->load->view('template/top');
		$this->load->view('backend/audience');
		$this->load->view('template/fouter');
	}
	/*
	if (!$this->est_connecte()) {
		redirect('gestionnaire/connexion');
	}

	$config['upload_path'] = './ressources/';
	$config['allowed_types'] = 'gif|jpg|jpeg|png|pdf|mp4';

	$this->load->library('upload', $config);

	$fichier = '';

	if (!$this->upload->do_upload('fichier_res')) {
		$error = array('error' => $this->upload->display_errors());

		$this->session->set_flashdata('message', $error['error']);

		if (empty($this->input->post('lien'))) {
			redirect('gestionnaire/nouvelle_ressource');
		}
	} else {
		$data = array('upload_data' => $this->upload->data());
		$fichier = $data['upload_data']['file_name'];
	}

	$gestionnaire = $this->gestionnaire_model->par_email($this->session->email_gest);

	$this->load->model('ressource_model');

	$ressource = new Ressource_model();
	$ressource->nom_res  = $this->input->post('nom_res');
	$ressource->type_res = $this->input->post('type_res');
	$ressource->lien     = $this->input->post('lien');
	$ressource->fichier  = $fichier;
	$ressource->id_gest  = $gestionnaire->id_gest;

	$succes = $ressource->inserer();

	if ($succes) {
		//Affichage de la vue de listing des ressources
		redirect('gestionnaire/ressources');
	} else {
		// Retour au formulaire
		redirect('gestionnaire/nouvelle_ressource');
	}*/
}
