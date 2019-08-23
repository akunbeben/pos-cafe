<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_login();
        is_admin();
        $this->load->model('auth_model', 'auth');
        $this->load->model('employee_model', 'employees');
        $this->load->model('reservations');
    }
    public function index()
    {
        $data['title']          = 'Users';
        $data['booking']        = $this->reservations->get(1)->num_rows();
        $data['user']           = $this->auth->getuser($this->session->userdata('username'))->row_array();
        $data['employees']      = $this->employees->get()->result();
        $this->template->load('backend/template', 'backend/user/index', $data);
    }
}