<?php
defined('BASEPATH') or exit('No direct script access allowed');

class TrainingsModel extends CI_Model
{
  protected $table = 'trainings';

  // Get all trainings
  public function getAllTrainings()
  {
    $this->db->select('id, name, execution_date, expiration_date, training_completed, employee_id');
    $query = $this->db->get($this->table);
    return $query->result();
  }

  // Get all trainings by employee ID
  public function getAllTrainingsByEmployeeId($employeeId)
  {
    $query = $this->db->get_where($this->table, ['employee_id' => $employeeId]);
    return $query->result();
  }

  // Get training by ID
  public function getById($id)
  {
    $query = $this->db->get_where($this->table, ['id' => $id]);
    return $query->row();
  }

  // Create training
  public function createTraining($data)
  {
    return $this->db->insert($this->table, $data);
  }

  // Update training
  public function updateTraining($id, $data)
  {
    return $this->db->update($this->table, $data, ['id' => $id]);
  }

  // Delete training
  public function deleteTraining($id)
  {
    return $this->db->delete($this->table, ['id' => $id]);
  }
}
