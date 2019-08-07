<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Reservation extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_not_login();
        $this->load->model('auth_model', 'auth');
        $this->load->model('reservations');
    }
    public function index()
    {
        $data['title'] = 'Reservation';
        $data['user'] = $this->auth->getuser($this->session->userdata('username'))->row_array();
        $data['booking'] = $this->reservations->get()->result_array();
        $this->template->load('backend/template', 'backend/reservation/index', $data);
    }

    public function check($id = null)
    {
        if ($id == null) {
            $this->session->set_flashdata('message', 'Id cannot be empty.');
            redirect('category/');
        } else {
            $id_new = $id;
            $param = '3';
            $this->reservations->check($param, $id_new);
            $this->session->set_flashdata('message', 'Booking completed!.');
            redirect('reservation/');
        }
    }
}
