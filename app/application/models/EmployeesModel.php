<?php
defined('BASEPATH') or exit('No direct script access allowed');

class EmployeesModel extends CI_Model
{
  protected $table = 'employees';

  // Get all employees
  public function getAllEmployees()
  {
    $this->db->select('id, name, position, department, cpf, email, phone, role');
    $query = $this->db->get($this->table);
    return $query->result();
  }

  // Get employee by ID
  public function getById($id)
  {
    $query = $this->db->get_where($this->table, ['id' => $id]);
    return $query->row();
  }

  // Get employee by email
  public function getByEmail($email)
  {
    $query = $this->db->get_where($this->table, ['email' => $email]);
    return $query->row();
  }

  // Get employee by CPF
  public function getByCPF($cpf)
  {
    $query = $this->db->get_where($this->table, ['cpf' => $cpf]);
    return $query->row();
  }

  // Get Employees by role
  public function getNumberOfManagers($role)
  {
    $query = $this->db->get_where($this->table, ['role' => $role]);
    return $query->num_rows();
  }

  // Create employee
  public function createEmployee($data)
  {
    return $this->db->insert($this->table, $data);
  }

  // Update employee
  public function updateEmployee($id, $data)
  {
    return $this->db->update($this->table, $data, ['id' => $id]);
  }

  // Delete employee
  public function deleteEmployee($id)
  {
    return $this->db->delete($this->table, ['id' => $id]);
  }
}
