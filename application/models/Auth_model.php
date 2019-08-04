<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth_model extends CI_Model
{
    public function getuser($param = null)
    {
        $this->db->from('user');
        $this->db->join('employee', 'employee.id = user.employee_id');
        $this->db->where('username', $param);
        return $this->db->get();
    }
}
