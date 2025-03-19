<?php
defined('BASEPATH') or exit('No direct script access allowed');

class EmployeesModel extends CI_Model
{
  public function __construct()
  {
    parent::__construct();
    $this->load->database(); // Carregar o banco de dados
  }

  // Get all employees
  public function getAllEmployees()
  {
    $query = $this->db->get('employees');
    return $query->result();
  }

  // Get employee by email
  public function getByEmail($email)
  {
    $query = $this->db->get_where('employees', ['email' => $email]);
    return $query->row();
  }

  // Create employee
  public function createEmployee($data)
  {
    return $this->db->insert('employees', $data);
  }
}
