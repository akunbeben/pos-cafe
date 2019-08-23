<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Employee extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_not_login();
        is_admin();
        $this->load->model('auth_model', 'auth');
        $this->load->model('employee_model', 'employees');
        $this->load->model('reservations');
    }

    public function index()
    {
        $data['title']          = 'Employees';
        $data['booking']        = $this->reservations->get(1)->num_rows();
        $data['user']           = $this->auth->getuser($this->session->userdata('username'))->row_array();
        $data['employees']      = $this->employees->get()->result();
        $this->template->load('backend/template', 'backend/employee/index', $data);
    }

    public function detail($id = null)
    {
        if ($id == null) {
            $this->session->set_flashdata('message', "Employee's ID cannot be empty");
            redirect('employee');
        } else {
            if ($this->employees->get($id)->row() == null) {
                $this->session->set_flashdata('message', "Employees not found, maybe wrong ID.");
                redirect('employee');
            }
            $data['title']      = 'Detail Employee';
            $data['booking']    = $this->reservations->get(1)->num_rows();
            $data['user']       = $this->auth->getuser($this->session->userdata('username'))->row_array();
            $data['e_detail']   = $this->employees->get($id)->row();
            $data['eu_detail']  = $this->employees->get($id)->row_array();
            $this->template->load('backend/template', 'backend/employee/detail', $data);
        }
    }

    public function delete($id = null)
    {
        if ($id == null) {
            $this->session->set_flashdata('message', "Employee's ID cannot be empty");
            redirect('employee');
        } else {
            if ($this->session->userdata('role') == $id) {
                $this->session->set_flashdata('message', "Current users cannot be delete!");
                redirect('employee');
            } else {
                $this->employees->deleteEmployee($id);
                $this->session->set_flashdata('message', "Employee deleted.");
                redirect('employee');
            }
        }
    }
}
