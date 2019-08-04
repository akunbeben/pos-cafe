<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_manage extends CI_Model
{
    public function editProfile($param = null, $query = null)
    {
        if ($param['image'] == null) {
            $this->db->set('name', $param['name']);
            $this->db->where('email', $param['email']);
            $this->db->update('employee JOIN user on (employee.id) = (user.employee_id)');
        } else {
            $this->db->set('image', $param['image']);
            $this->db->set('name', $param['name']);
            $this->db->where('email', $param['email']);
            $this->db->update('employee JOIN user on (employee.id) = (user.employee_id)');
        }
    }
}
