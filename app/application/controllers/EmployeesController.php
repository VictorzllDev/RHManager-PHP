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
  private function validate_employee($option)
  {
    // Carregando a biblioteca de validação
    $this->load->library('form_validation');

    switch ($option) {

      case 'register':
        // Definindo regras de validação
        $this->form_validation->set_rules('name', 'Nome', 'required|min_length[3]|max_length[100]');
        $this->form_validation->set_rules('position', 'Cargo', 'required|min_length[2]|max_length[50]');
        $this->form_validation->set_rules('department', 'Departamento', 'required|min_length[2]|max_length[50]');
        $this->form_validation->set_rules('cpf', 'CPF', 'required|exact_length[14]|is_unique[employees.cpf]');
        $this->form_validation->set_rules('email', 'E-mail', 'required|valid_email|is_unique[employees.email]');
        $this->form_validation->set_rules('phone', 'Telefone', 'min_length[10]|max_length[20]');
        $this->form_validation->set_rules('password', 'Senha', 'required|min_length[6]');
        $this->form_validation->set_rules('role', 'tipo', 'required');
        break;
      case 'edit':
        // Definindo regras de validação
        $this->form_validation->set_rules('name', 'Nome', 'required|min_length[3]|max_length[100]');
        $this->form_validation->set_rules('position', 'Cargo', 'required|min_length[2]|max_length[50]');
        $this->form_validation->set_rules('department', 'Departamento', 'required|min_length[2]|max_length[50]');
        $this->form_validation->set_rules('cpf', 'CPF', 'required|exact_length[14]');
        $this->form_validation->set_rules('email', 'E-mail', 'required|valid_email');
        $this->form_validation->set_rules('phone', 'Telefone', 'min_length[10]|max_length[20]');
        $this->form_validation->set_rules('role', 'tipo', 'required');
        break;
      default:
        break;
    }

    return $this->form_validation->run();
  }

  // Método para lidar com registro de funcionário
  public function handle_register()
  {
    // Validando os dados do formulário
    if (!$this->validate_employee('register')) {
      $this->session->set_flashdata('warning', validation_errors());
      redirect('employees');
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
      $this->session->set_flashdata('success', 'Funcionario cadastrado com sucesso!');
    } else {
      $this->session->set_flashdata('error', 'Erro ao cadastrar funcionário. Tente novamente.');
    }
    redirect('employees');
  }

  // Método para lidar com edição de funcionário
  public function handle_edit($id)
  {
    // Validando os dados do formulário
    if (!$this->validate_employee('edit')) {
      $this->session->set_flashdata('warning', validation_errors());
      redirect('employees');
      return;
    }

    // Verificando se o funcionário existe
    if (!$this->EmployeesModel->getById($id)) {
      $this->session->set_flashdata('warning', 'Funcionario nao encontrado.');
      redirect('employees');
      return;
    }

    // Verificando se o CPF do funcionário ja existe
    if ($this->EmployeesModel->getByCPF($this->input->post('cpf', TRUE))->id != $id) {
      $this->session->set_flashdata('warning', 'CPF ja cadastrado.');
      redirect('employees');
      return;
    }

    // Verificando se o e-mail do funcionário ja existe
    if ($this->EmployeesModel->getByEmail($this->input->post('email', TRUE))->id != $id) {
      $this->session->set_flashdata('warning', 'E-mail ja cadastrado.');
      redirect('employees');
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
      $this->session->set_flashdata('success', 'Funcionario atualizado com sucesso!');
    } else {
      $this->session->set_flashdata('error', 'Erro ao atualizar funcionário. Tente novamente.');
    }
    redirect('employees');
  }

  // Método para deletar funcionário
  public function handle_delete($id)
  {
    // Verificando se o funcionário existe
    if (!$this->EmployeesModel->getById($id)) {
      $this->session->set_flashdata('warning', 'Funcionario nao encontrado.');
      redirect('employees');
      return;
    }

    if ($this->EmployeesModel->deleteEmployee($id)) {
      $this->session->set_flashdata('success', 'Funcionario excluido com sucesso!');
    } else {
      $this->session->set_flashdata('error', 'Erro ao excluir funcionario. Tente novamente.');
    }
    redirect('employees');
  }
}
