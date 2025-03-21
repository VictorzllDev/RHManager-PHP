<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class EmployeesController extends CI_Controller {
	public function view_employees()
	{
    $data['title'] = 'Funcionarios';

    $data['employees'] = $this->EmployeesModel->getAllEmployees();

    $data['content'] = $this->load->view('employees/index', $data, TRUE);
		$this->load->view('layouts/private/main', $data);
	}
}
