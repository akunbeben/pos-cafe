<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_not_login();
        $this->load->model('auth_model', 'auth');
        $this->load->model('products');
    }
    public function index()
    {
        $data['title'] = 'Admin Area';
        $data['prod'] = $this->products->getProduct()->num_rows();
        $data['user'] = $this->auth->getuser($this->session->userdata('username'))->row_array();
        $this->template->load('backend/template', 'backend/admin/index', $data);
    }
}
