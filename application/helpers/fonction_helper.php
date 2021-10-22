<?php
defined('BASEPATH') or exit('No direct script access allowed');

function date_formater($date)
	{
		setlocale(LC_TIME, 'fr');

		
		$dateformat = ucfirst(strftime('%A, le %d ', strtotime($date)));
		$dateformat .= ucfirst(strftime('%B %Y ', strtotime($date)));

		return ($dateformat);
	}