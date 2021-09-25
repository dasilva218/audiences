<?php
defined('BASEPATH') or exit('No direct script access allowed');

function theme_url()
{
    return base_url() . 'theme/';
}

function static_url($chemin)
{
    return base_url('static/'.$chemin);
}