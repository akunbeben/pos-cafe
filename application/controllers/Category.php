<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Category extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('auth_model', 'auth');
        $this->load->model('properties');
        $this->load->model('reservations');
    }
    public function index()
    {
        $data['title']      = 'Product properties';
        $data['user']       = $this->auth->getuser($this->session->userdata('username'))->row_array();
        $data['cat']        = $this->properties->getCat()->result_array();
        $data['unit']       = $this->properties->getUnit()->result_array();
        $data['booking']    = $this->reservations->get(1)->num_rows();
        $this->template->load('backend/template', 'backend/category/index', $data);
    }

    public function add()
    {
        $data['booking']    = $this->reservations->get(1)->num_rows();
        $data['title']      = 'Product properties - Add category';
        $data['user']       = $this->auth->getuser($this->session->userdata('username'))->row_array();

        $this->load->library('form_validation');
        $this->form_validation->set_rules('category', 'Category', 'required|trim');

        if ($this->form_validation->run() == FALSE) {
            $this->template->load('backend/template', 'backend/category/add', $data);
        } else {
            $param = [
                'id'        => null,
                'cat_title' => $this->input->post('category')
            ];
            $this->properties->add($param);
            $this->session->set_flashdata('message', 'New category added.');
            redirect('category/');
        }
    }

    public function addunit()
    {
        $data['booking']    = $this->reservations->get(1)->num_rows();
        $data['title']      = 'Product properties - Add Unit';
        $data['user']       = $this->auth->getuser($this->session->userdata('username'))->row_array();

        $this->load->library('form_validation');
        $this->form_validation->set_rules('unit', 'Unit', 'required|trim');

        if ($this->form_validation->run() == FALSE) {
            $this->template->load('backend/template', 'backend/category/add_unit', $data);
        } else {
            $param = [
                'id'            => null,
                'unit_title'    => $this->input->post('unit')
            ];
            $this->properties->addunit($param);
            $this->session->set_flashdata('message', 'New unit added.');
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

    public function delunit($id = null)
    {
        if ($id == null) {
            $this->session->set_flashdata('message', 'Id cannot be empty.');
            redirect('category/');
        } else {
            $this->properties->delunit($id);
            $this->session->set_flashdata('message', 'Unit deleted.');
            redirect('category/');
        }
    }

    public function edit($id)
    {
        $data['booking']    = $this->reservations->get(1)->num_rows();
        $data['title']      = 'Product properties - Edit category';
        $data['user']       = $this->auth->getuser($this->session->userdata('username'))->row_array();
        $data['cat']        = $this->properties->getCat($id)->row_array();

        $id_prod = $id;

        $this->load->library('form_validation');
        $this->form_validation->set_rules('category', 'Category', 'required|trim');

        if ($this->form_validation->run() == FALSE) {
            $this->template->load('backend/template', 'backend/category/edit', $data);
        } else {
            $param = [
                'id' => $id_prod,
                'cat_title' => $this->input->post('category')
            ];
            $this->properties->edit($param);
            $this->session->set_flashdata('message', 'Category updated!.');
            redirect('category/');
        }
    }

    public function editunit($id)
    {
        $data['booking']    = $this->reservations->get(1)->num_rows();
        $data['title']      = 'Product properties - Edit Unit';
        $data['user']       = $this->auth->getuser($this->session->userdata('username'))->row_array();
        $data['unit']       = $this->properties->getUnit($id)->row_array();

        $id_prod = $id;

        $this->load->library('form_validation');
        $this->form_validation->set_rules('unit', 'Unit', 'required|trim');

        if ($this->form_validation->run() == FALSE) {
            $this->template->load('backend/template', 'backend/category/edit_unit', $data);
        } else {
            $param = [
                'id'            => $id_prod,
                'unit_title'    => $this->input->post('unit')
            ];
            $this->properties->editunit($param);
            $this->session->set_flashdata('message', 'Unit updated!.');
            redirect('category/');
        }
    }
}
