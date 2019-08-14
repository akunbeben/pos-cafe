<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Auth_model', 'auth');
        $this->load->model('cart');
    }

    public function index()
    {
        $this->form_validation->set_rules('username', 'Username', 'required|trim');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');
        $this->form_validation->set_message('required', 'Username or Password cannot be empty.');

        $data['title'] = 'Sample Cafe - Admin';

        if ($this->form_validation->run() == FALSE) {
            if ($this->session->userdata('Login_Token')) {
                redirect('admin/');
            }
            $this->load->view('backend/login', $data);
        } else {
            $this->_dologin();
        }
    }

    private function _dologin()
    {
        $username   = $this->input->post('username');
        $password   = $this->input->post('password');

        $getuserfromDB  = $this->auth->getuser($username)->row_array();

        if ($getuserfromDB) {
            if (password_verify($password, $getuserfromDB['password'])) {
                $data   = [
                    'Login_Token'   => password_hash($username, PASSWORD_DEFAULT),
                    'employee_id'   => $getuserfromDB['employee_id'],
                    'username'      => $getuserfromDB['username'],
                    'email'         => $getuserfromDB['email'],
                    'date_created'  => $getuserfromDB['date_created']
                ];
                $this->session->set_userdata($data);
                redirect('admin');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger">Username or password is not valid.</div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger">Username or password is not valid.</div>');
            redirect('auth');
        }
    }

    public function logout()
    {
        if ($this->cart->getCartData()->num_rows() >= 1) {
            $this->session->set_flashdata('message', 'There is an pending order, please complete it before logout.');
            redirect('pos/');
        } else {
            $this->session->unset_userdata(['Login_Token', 'employee_id', 'username', 'email', 'date_created']);
            $this->session->set_flashdata('message', '<div class="alert alert-success">You are logged out.</div>');
            redirect('auth');
        }
    }
}
