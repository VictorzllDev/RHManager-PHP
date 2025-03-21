<?php
defined('BASEPATH') or exit('No direct script access allowed');

class AuthController extends CI_Controller
{
  public function view_login()
  {
    $data['title'] = 'Login';
    $data['content'] = $this->load->view('auth/login', [], TRUE);
    $this->load->view('layouts/public/main', $data);
  }

  public function view_register()
  {
    $data['title'] = 'Register';
    $data['content'] = $this->load->view('auth/register', [], TRUE);
    $this->load->view('layouts/public/main', $data);
  }

  public function handle_login()
  {
    $this->load->library('form_validation');

    $data = [
      'email'      => $this->input->post('email'),
      'password'   => $this->input->post('password')
    ];

    $user = $this->EmployeesModel->getByEmail($data['email']);
    if (!$user) {
      redirect(base_url() . 'sign-in?error=1');
    }

    $isPasswordValid = password_verify($data['password'], $user->password);
    if (!$isPasswordValid) {
      redirect(base_url() . 'sign-in?error=1');
    }

    print_r($user);
  }

  public function handle_register()
  {
    // Carregando a biblioteca de validação
    $this->load->library('form_validation');

    // Definindo regras de validação
    $this->form_validation->set_rules('name', 'Nome', 'required|min_length[3]|max_length[100]');
    $this->form_validation->set_rules('position', 'Cargo', 'required|min_length[2]|max_length[50]');
    $this->form_validation->set_rules('department', 'Departamento', 'required|min_length[2]|max_length[50]');
    $this->form_validation->set_rules('cpf', 'CPF', 'required|exact_length[14]|is_unique[employees.cpf]');
    $this->form_validation->set_rules('email', 'E-mail', 'required|valid_email|is_unique[employees.email]');
    $this->form_validation->set_rules('phone', 'Telefone', 'min_length[10]|max_length[20]');
    $this->form_validation->set_rules('password', 'Senha', 'required|min_length[6]');
    $this->form_validation->set_rules('role', 'tipo', 'required');

    // Verificando se a validação falhou
    if ($this->form_validation->run() == FALSE) {
      echo json_encode([
        'status' => 'error',
        'message' => validation_errors()
      ]);
      return;
    }

    // Recuperando e limpando os dados do formulário
    $data = [
      'name'       => $this->input->post('name', TRUE),
      'position'   => $this->input->post('position', TRUE),
      'department' => $this->input->post('department', TRUE),
      'cpf'        => $this->input->post('cpf', TRUE),
      'phone'      => $this->input->post('phone', TRUE),
      'email'      => $this->input->post('email', TRUE),
      'password'   => password_hash($this->input->post('password', TRUE), PASSWORD_BCRYPT), // Hash da senha
      'role'      => $this->input->post('role', TRUE)
    ];

    // Cadastrando o funcionário
    if ($this->EmployeesModel->createEmployee($data)) {
      echo json_encode([
        'status' => 'success',
        'message' => 'Funcionário cadastrado com sucesso!'
      ]);
    } else {
      echo json_encode([
        'status' => 'error',
        'message' => 'Erro ao cadastrar funcionário. Tente novamente.'
      ]);
    }
  }
}
