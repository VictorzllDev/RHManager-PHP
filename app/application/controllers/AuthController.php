<?php
defined('BASEPATH') or exit('No direct script access allowed');

class AuthController extends CI_Controller
{
  public function view_login()
  {
    if ($this->session->userdata('loggedIn')) {
      redirect('/');
      return;
    }

    $data['title'] = 'Login';
    $data['content'] = $this->load->view('auth/login', [], TRUE);
    $this->load->view('layouts/public/main', $data);
  }

  public function handle_login()
  {
    $this->load->library('form_validation');

    $this->form_validation->set_rules('email', 'E-mail', 'required|valid_email');
    $this->form_validation->set_rules('password', 'Senha', 'required');

    if (!$this->form_validation->run()) {
      $this->session->set_flashdata('warning', validation_errors());
      redirect('/login');
      return;
    }

    $data = [
      'email'      => $this->input->post('email', TRUE),
      'password'   => $this->input->post('password', TRUE)
    ];

    $user = $this->EmployeesModel->getByEmail($data['email']);
    if (!$user) {
      $this->session->set_flashdata('warning', 'E-mail ou senha incorretos.');
      redirect('/login');
      return;
    }

    $isPasswordValid = password_verify($data['password'], $user->password);
    if (!$isPasswordValid) {
      $this->session->set_flashdata('warning', 'E-mail ou senha incorretos.');
      redirect('/login');
      return;
    }

    $sessionData = array(
      'userId' => $user->id,
      'userName' => $user->name,
      'userEmail' => $user->email,
      'userRole' => $user->role,
      'loggedIn' => TRUE
    );

    $this->session->set_userdata($sessionData);
    redirect('/');
  }

  public function handle_logout()
  {
    $this->session->sess_destroy();
    redirect('/login');
  }
}
