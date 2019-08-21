<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Report extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_not_login();
        $this->load->library('form_validation');
        $this->load->model('auth_model', 'auth');
        $this->load->model('reservations');
        $this->load->model('products');
        $this->load->model('cart');
        $this->load->model('pos_process', 'pos');
        $this->load->model('reports');
    }

    public function index()
    {
        $data['title']          = 'Report';
        $data['booking']        = $this->reservations->get(1)->num_rows();
        $data['user']           = $this->auth->getuser($this->session->userdata('username'))->row_array();
        $data['report']         = $this->reports->get()->result();
        $this->template->load('backend/template', 'backend/report/index', $data);
    }

    public function detail($id = null)
    {
        $invoice                = $id;
        $data['title']          = 'Report Detail - ' . $id;
        $data['booking']        = $this->reservations->get(1)->num_rows();
        $data['user']           = $this->auth->getuser($this->session->userdata('username'))->row_array();
        $data['invoice']        = $this->reports->get($invoice)->row();
        $data['report']         = $this->reports->detail($invoice)->result();

        if ($id == null) {
            $this->session->set_flashdata('message', 'Invalid invoice number!');
            redirect('report/');
        } else {
            if ($data['report'] == null) {
                $this->session->set_flashdata('message', 'Invalid invoice number!');
                redirect('report/');
            } else {
                $this->template->load('backend/template', 'backend/report/detail', $data);
            }
        }
    }
}
