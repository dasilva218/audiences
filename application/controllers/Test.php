<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Test extends CI_Controller
{
	public function affich($_roots = '')
	{
		$admistrations = [
			'Primature',
			"Ministère du Commerce, de l'Industrie et des PME/PMI",
			"Ministère de l'Education Nationale",
			'Ministère du Tourisme',
			'Ministère du Travail',
			"Ministère de l'Economie]",
		];
		$this->load->view('front/' . $_roots, $admistrations);
	}

	public function test_code()
	{
		echo static_url('static/js/');
	}
}
