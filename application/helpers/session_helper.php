<?php

defined('BASEPATH') or exit('No direct script access allowed');


function est_un_gestionnaire()
{
    $CI = &get_instance();

    $CI->load->library('session');

    return $CI->session->userdata('token_admin') != null;

  
}