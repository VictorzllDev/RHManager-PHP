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

  // Get employee by email
  public function getByEmail($email)
  {
    $query = $this->db->get_where($this->table, ['email' => $email]);
    return $query->row();
  }

  // Create employee
  public function createEmployee($data)
  {
    return $this->db->insert($this->table, $data);
  }

  // Update employee
  public function updateEmployee($id, $data)
  {
    $this->db->where('id', $id);
    return $this->db->update($this->table, $data);
  }

  // Delete employee
  public function deleteEmployee($id)
  {
    return $this->db->delete($this->table, ['id' => $id]);
  }
}
