<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Employee_model extends CI_Model
{
    public function get($param = null)
    {
        if ($param == null) {
            $this->db->from('user');
            $this->db->join('employee', 'employee.id = user.employee_id');
            return $this->db->get();
        } else {
            $this->db->from('user');
            $this->db->join('employee', 'employee.id = user.employee_id');
            $this->db->where('employee.id', $param);
            return $this->db->get();
        }
    }

    public function deleteEmployee($id)
    {
        $this->db->delete('employee', ['id' => $id]);
    }

    public function deleteUser($id)
    {
        $this->db->delete('user', ['id' => $id]);
    }
}
