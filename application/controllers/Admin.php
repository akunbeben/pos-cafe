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
        $this->load->model('reservations');
        $this->load->model('pos_process', 'pos');
    }

    public function index()
    {
        $data['title']      = 'Admin Area';
        $data['prod']       = $this->products->getProduct()->num_rows();
        $data['user']       = $this->auth->getuser($this->session->userdata('username'))->row_array();
        $data['booking']    = $this->reservations->get(1)->num_rows();
        $data['sales']      = $this->pos->get();
        $this->template->load('backend/template', 'backend/admin/index', $data);
    }
}
