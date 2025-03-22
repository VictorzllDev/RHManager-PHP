<?php
defined('BASEPATH') or exit('No direct script access allowed');

class EmployeesModel extends CI_Model
{
  // Get all employees
  public function getAllEmployees()
  {
    $this->db->select('id, name, position, department, cpf, email, phone, role');
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
