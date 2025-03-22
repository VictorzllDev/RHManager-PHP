<?php
defined('BASEPATH') or exit('No direct script access allowed');

function check_login()
{
  $CI = &get_instance();
  $CI->load->library('session');
  $CI->load->helper('url');

  if (!$CI->session->userdata('loggedIn')) {
    redirect('login');
    return;
  }

  return TRUE;
}

// Verifica se o usuário tem um das roles especificados
function check_role($roles = [])
{
  $CI = &get_instance();
  $CI->load->library('session');
  $CI->load->helper('url');

  $user_role = $CI->session->userdata('userRole');

  if (!in_array($user_role, $roles)) {
    redirect('/');
  }
}
