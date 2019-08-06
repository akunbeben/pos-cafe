<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Category extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('auth_model', 'auth');
        $this->load->model('properties');
    }
    public function index()
    {
        $data['title'] = 'Product properties - Category';
        $data['user'] = $this->auth->getuser($this->session->userdata('username'))->row_array();
        $data['cat'] = $this->properties->getCat()->result_array();
        $this->template->load('backend/template', 'backend/category/index', $data);
    }

    public function add()
    {
        $data['title'] = 'Product properties - Add category';
        $data['user'] = $this->auth->getuser($this->session->userdata('username'))->row_array();
        $data['cat'] = $this->properties->getCat()->result_array();

        $this->load->library('form_validation');
        $this->form_validation->set_rules('category', 'Category', 'required|trim');

        if ($this->form_validation->run() == FALSE) {
            $this->template->load('backend/template', 'backend/category/add', $data);
        } else {
            $param = [
                'id' => null,
                'cat_title' => $this->input->post('category')
            ];
            $this->properties->add($param);
            $this->session->set_flashdata('message', 'New category added.');
            redirect('category/');
        }
    }

    public function delete($id = null)
    {
        if ($id == null) {
            $this->session->set_flashdata('message', 'Id cannot be empty.');
            redirect('category/');
        } else {
            $this->properties->delete($id);
            $this->session->set_flashdata('message', 'Category deleted.');
            redirect('category/');
        }
    }
}
