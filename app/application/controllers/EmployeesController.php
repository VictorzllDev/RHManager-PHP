<?php
defined('BASEPATH') or exit('No direct script access allowed');

class EmployeesController extends CI_Controller
{
  // Método para exibir funcionários
  public function view_employees()
  {
    $data['title'] = 'Funcionários';
    $data['employees'] = $this->EmployeesModel->getAllEmployees();
    $data['content'] = $this->load->view('employees/index', $data, TRUE);
    $this->load->view('layouts/private/main', $data);
  }

  // Método auxiliar para validação
  private function validate_employee()
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

    return $this->form_validation->run();
  }

  // Método para lidar com registro de funcionário
  public function handle_register()
  {
    // Validando os dados do formulário
    if (!$this->validate_employee()) {
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
      'role'       => $this->input->post('role', TRUE)
    ];

    // Cadastrando o funcionário
    if ($this->EmployeesModel->createEmployee($data)) {
      redirect('employees');
    } else {
      echo json_encode([
        'status' => 'error',
        'message' => 'Erro ao cadastrar funcionário. Tente novamente.'
      ]);
    }
  }

  // Método para lidar com edição de funcionário
  public function handle_edit($id)
  {
    // Validando os dados do formulário
    if (!$this->validate_employee()) {
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
      'role'       => $this->input->post('role', TRUE)
    ];

    // Atualizando o funcionário
    if ($this->EmployeesModel->updateEmployee($id, $data)) {
      redirect('employees');
    } else {
      echo json_encode([
        'status' => 'error',
        'message' => 'Erro ao atualizar funcionário. Tente novamente.'
      ]);
    }
  }

  // Método para deletar funcionário
  public function handle_delete($id)
  {
    if ($this->EmployeesModel->deleteEmployee($id)) {
      redirect('employees');
    } else {
      echo json_encode([
        'status' => 'error',
        'message' => 'Erro ao excluir funcionário. Tente novamente.'
      ]);
    }
  }
}
