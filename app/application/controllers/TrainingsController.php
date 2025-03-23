<?php
defined('BASEPATH') or exit('No direct script access allowed');

class TrainingsController extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    check_login();
    check_role(['manager', 'regular']);
  }

  public function view_trainings()
  {
    $data['title'] = 'Trainings';
    $data['employees'] = $this->EmployeesModel->getAllEmployees();
    $data['trainings'] = $this->TrainingsModel->getAllTrainings();
    $data['content'] = $this->load->view('trainings/index', $data, TRUE);
    $this->load->view('layouts/private/main', $data);
  }

  // Método auxiliar para validação
  private function validate_training($option)
  {
    // Carregando a biblioteca de validação
    $this->load->library('form_validation');

    switch ($option) {

      case 'register':
        // Definindo regras de validação
        $this->form_validation->set_rules('name', 'Nome', 'required|min_length[3]|max_length[100]');
        $this->form_validation->set_rules('employee_id', 'Funcionário', 'required|numeric');
        $this->form_validation->set_rules('execution_date', 'Data de Realização', 'required|date');
        $this->form_validation->set_rules('expiration_date', 'Data de Expiração', 'required|date');
        break;
      default:
        break;
    }

    return $this->form_validation->run();
  }

  public function handle_register()
  {
    check_role(['manager']);

    // Validando os dados do formulário
    if (!$this->validate_training('register')) {
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
}
