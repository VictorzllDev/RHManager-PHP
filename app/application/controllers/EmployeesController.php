<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class EmployeesController extends CI_Controller {
	public function view_employees()
	{
    $data['title'] = 'pagina inicial';
    $data['content'] = $this->load->view('employees/index', [], TRUE);
		$this->load->view('layouts/private/main', $data);
	}
}
