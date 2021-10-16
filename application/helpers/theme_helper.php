<?php
defined('BASEPATH') or exit('No direct script access allowed');

function theme_url()
{
    return base_url() . 'theme/';
}

function static_url($chemin)
{
    return base_url('static/' . $chemin);
}

function static_url_front($chemin)
{
    return base_url('static/front/' . $chemin);
}

function upload_url($chemin)
{
    return base_url('uploads/' . $chemin);
}

function template($vue, $data = array())
{
    $CI = &get_instance();

    $CI->load->view('template/head', $data);
    $CI->load->view('template/header', $data);
    $CI->load->view('template/side', $data);
    $CI->load->view('template/top', $data);
    $CI->load->view($vue, $data);
    $CI->load->view('template/fouter', $data);
}

