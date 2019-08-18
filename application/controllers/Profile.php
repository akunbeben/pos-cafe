<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profile extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_not_login();
        $this->load->model('user_manage', 'users');
        $this->load->model('auth_model', 'auth');
        $this->load->model('reservations');
    }
    public function index()
    {
        $data['title']      = 'My Profile';
        $data['booking']    = $this->reservations->get(1)->num_rows();
        $data['user']       = $this->auth->getuser($this->session->userdata('username'))->row_array();
        $this->template->load('backend/template', 'backend/user/profile', $data);
    }

    public function edit()
    {
        $this->load->library('form_validation');
        $data['title']      = 'Edit Profile';
        $data['booking']    = $this->reservations->get(1)->num_rows();
        $data['user']       = $this->auth->getuser($this->session->userdata('username'))->row_array();
        // $data['test'] = $this->session->userdata('employee_id');

        $this->form_validation->set_rules('name', 'Full Name', 'required|trim');
        $this->form_validation->set_rules('phone', 'Phone', 'required|trim');

        if ($this->form_validation->run() == FALSE) {
            $this->template->load('backend/template', 'backend/user/edit', $data);
        } else {
            $img_upload = $_FILES['image']['name'];
            if ($img_upload) {
                $config['allowed_types']        = 'gif|jpg|png|jpeg';
                $config['max_size']             = '2048';
                $config['upload_path']          = './uploads/profile/';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image')) {
                    $new_name = $this->upload->data('file_name');
                } else {
                    echo $this->upload->display_errors();
                }
            }
            $param = [
                'name'  => $this->input->post('name'),
                'email' => $this->input->post('email'),
                'image' => $new_name
            ];
            $this->users->editProfile($param);
            $this->session->set_flashdata('message', '<div class="alert alert-success">Data updated successfully.</div>');
            redirect('profile/');
        }
    }

    public function detail()
    {
        $data['title']      = 'Detail Profile';
        $data['booking']    = $this->reservations->get(1)->num_rows();
        $data['user']       = $this->auth->getuser($this->session->userdata('username'))->row_array();
        $this->template->load('backend/template', 'backend/user/detail', $data);
    }
}
