<?php
defined('BASEPATH') or exit('No direct script access allowed');

class TrainingsController extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    check_login();
    check_role(['manager', 'regular']);
    $this->load->helper('date');
  }

  public function view_trainings()
  {
    $data['title'] = 'Trainings';
    $data['employees'] = $this->EmployeesModel->getAllEmployees();

    if ($this->session->userdata('userRole') == 'manager') {
      $data['trainings'] = $this->TrainingsModel->getAllTrainings();
    } else if ($this->session->userdata('userRole') == 'regular') {
      $data['trainings'] = $this->TrainingsModel->getAllTrainingsByEmployeeId($this->session->userdata('userId'));
    }

    $data['content'] = $this->load->view('trainings/index', $data, TRUE);
    $this->load->view('layouts/private/main', $data);
  }

  // Método auxiliar para validação
  private function validate_training()
  {
    // Carregando a biblioteca de validação
    $this->load->library('form_validation');

    $this->form_validation->set_rules('name', 'Nome', 'required|min_length[3]|max_length[100]');
    $this->form_validation->set_rules('employee_id', 'Funcionário', 'required|numeric');
    $this->form_validation->set_rules('execution_date', 'Data de Realização', 'required|min_length[10]|max_length[10]');
    $this->form_validation->set_rules('expiration_date', 'Data de Expiração', 'required|min_length[10]|max_length[10]');

    return $this->form_validation->run();
  }

  // Método para lidar com cadastro de treinamentos
  public function handle_register()
  {
    check_role(['manager']);

    // Validando os dados do formulário
    if (!$this->validate_training()) {
      $this->session->set_flashdata('warning', validation_errors());
      redirect('trainings');
      return;
    }

    // Recuperando e limpando os dados do formulário
    $data = [
      'name'       => $this->input->post('name', TRUE),
      'employee_id' => $this->input->post('employee_id', TRUE),
      'execution_date' => $this->input->post('execution_date', TRUE),
      'expiration_date' => $this->input->post('expiration_date', TRUE),
    ];

    // Validar e converter as datas
    $data['execution_date'] = validate_and_convert_date($data['execution_date']);
    $data['expiration_date'] = validate_and_convert_date($data['expiration_date']);

    // Verificando se as datas foram preenchidas de maneira correta
    if (!$data['execution_date'] || !$data['expiration_date']) {
      $this->session->set_flashdata('warning', 'Datas nao preenchidas corretamente');
      redirect('trainings');
      return;
    }


    // verificar se funcionario existe
    if (!$this->EmployeesModel->getById($data['employee_id'])) {
      $this->session->set_flashdata('warning', 'Funcionario não encontrado');
      redirect('trainings');
      return;
    }

    // verificando se a data de realizacao é maior que a data de expiracao
    if (strtotime($data['execution_date']) > strtotime($data['expiration_date'])) {
      $this->session->set_flashdata('warning', 'Data de Realização não pode ser maior que a Data de Expiração');
      redirect('trainings');
      return;
    }

    // verificando se a data de expiracao é menor que a data atual
    if (strtotime($data['expiration_date']) < strtotime(date('d/m/Y'))) {
      $this->session->set_flashdata('warning', 'Data de Expiração não pode ser menor que a Data Atual');
      redirect('trainings');
      return;
    }

    // verificando se a data de realizacao e menor que a data atual
    if (strtotime($data['execution_date']) < strtotime(date('d/m/Y'))) {
      $this->session->set_flashdata('warning', 'Data de Realização não pode ser menor que a Data Atual');
      redirect('trainings');
      return;
    }

    // convertendo as datas dd/mm/yyyy para yyyy/mm/dd
    $data['execution_date'] = date('Y-m-d', strtotime(str_replace('/', '-', $data['execution_date'])));
    $data['expiration_date'] = date('Y-m-d', strtotime(str_replace('/', '-', $data['expiration_date'])));


    // Criando o trainings
    if ($this->TrainingsModel->createTraining($data)) {
      $this->session->set_flashdata('success', 'Treinamento cadastrado com sucesso!');
    } else {
      $this->session->set_flashdata('error', 'Erro ao cadastrar o Trainamento. Tente novamente.');
    }
    redirect('trainings');
  }

  // Método para lidar com edição de training
  public function handle_edit($id)
  {
    check_role(['manager']);

    // Validando os dados do formulário
    if (!$this->validate_training()) {
      $this->session->set_flashdata('warning', validation_errors());
      redirect('trainings');
      return;
    }

    // Recuperando e limpando os dados do formulário
    $data = [
      'name'       => $this->input->post('name', TRUE),
      'employee_id' => $this->input->post('employee_id', TRUE),
      'execution_date' => $this->input->post('execution_date', TRUE),
      'expiration_date' => $this->input->post('expiration_date', TRUE),
    ];

    // Validar e converter as datas
    $data['execution_date'] = validate_and_convert_date($data['execution_date']);
    $data['expiration_date'] = validate_and_convert_date($data['expiration_date']);

    // Verificando se as datas foram preenchidas de maneira correta
    if (!$data['execution_date'] || !$data['expiration_date']) {
      $this->session->set_flashdata('warning', 'Datas nao preenchidas corretamente');
      redirect('trainings');
      return;
    }

    // Verificando se o treinamento existe
    if (!$this->TrainingsModel->getById($id)) {
      $this->session->set_flashdata('warning', 'Treinamento nao encontrado.');
      redirect('trainings');
      return;
    }

    // verificar se funcionario existe
    if (!$this->EmployeesModel->getById($data['employee_id'])) {
      $this->session->set_flashdata('warning', 'Funcionario não encontrado');
      redirect('trainings');
      return;
    }

    // verificando se a data de realizacao é maior que a data de expiracao
    if (strtotime($data['execution_date']) > strtotime($data['expiration_date'])) {
      $this->session->set_flashdata('warning', 'Data de Realização não pode ser maior que a Data de Expiração');
      redirect('trainings');
      return;
    }

    // verificando se a data de realizacao e menor que a data atual
    if (strtotime($data['execution_date']) < strtotime(date('d/m/Y'))) {
      $this->session->set_flashdata('warning', 'Data de Realização não pode ser menor que a Data Atual');
      redirect('trainings');
      return;
    }

    // verificando se a data de expiracao é menor que a data atual
    if (strtotime($data['expiration_date']) < strtotime(date('d/m/Y'))) {
      $this->session->set_flashdata('warning', 'Data de Expiração não pode ser menor que a Data Atual');
      redirect('trainings');
      return;
    }


    // Atualizando o treinamento
    if ($this->TrainingsModel->updateTraining($id, $data)) {
      $this->session->set_flashdata('success', 'Treinamento atualizado com sucesso!');
    } else {
      $this->session->set_flashdata('error', 'Erro ao atualizar treinamento. Tente novamente.');
    }
    redirect('trainings');
  }

  // Método para deletar funcionário
  public function handle_delete($id)
  {
    check_role(['manager']);

    $training = $this->TrainingsModel->getById($id);

    // Verificando se o treinamento existe
    if (!$training) {
      $this->session->set_flashdata('warning', 'Treinamento nao encontrado.');
      redirect('trainings');
      return;
    }


    // Excluindo o Treinamento
    if ($this->TrainingsModel->deleteTraining($id)) {
      $this->session->set_flashdata('success', 'Treinamento excluido com sucesso!');
    } else {
      $this->session->set_flashdata('error', 'Erro ao excluir treinamento. Tente novamente.');
    }
    redirect('trainings');
  }
}
