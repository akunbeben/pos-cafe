<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Product extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_not_login();
        is_admin();
        $this->load->model('auth_model', 'auth');
        $this->load->model('products');
        $this->load->model('properties');
        $this->load->model('reservations');
    }

    public function index()
    {
        $data['booking']    = $this->reservations->get(1)->num_rows();
        $data['title']      = 'Products List';
        $data['products']   = $this->products->getProduct()->result_array();
        $data['user']       = $this->auth->getuser($this->session->userdata('username'))->row_array();
        $this->template->load('backend/template', 'backend/product/index', $data);
    }

    public function view($id = null)
    {
        $data['booking']    = $this->reservations->get(1)->num_rows();
        $data['title']      = 'View product detail';
        $data['user']       = $this->auth->getuser($this->session->userdata('username'))->row_array();
        $data['detailprod'] = $this->products->detailProd($id)->row_array();
        if ($id == null) {
            $this->session->set_flashdata('message', 'Id cannot be empty.');
            redirect('product/');
        } else {
            if ($data['detailprod'] == null) {
                $this->session->set_flashdata('message', 'Invalid ID!.');
                redirect('product/');
            } else {
                $this->template->load('backend/template', 'backend/product/view', $data);
            }
        }
    }

    public function edit($id = null)
    {
        $this->load->library('form_validation');
        $data['booking']    = $this->reservations->get(1)->num_rows();
        $data['title']      = 'Edit Product';
        $data['user']       = $this->auth->getuser($this->session->userdata('username'))->row_array();
        $data['prod']       = $this->products->detailProd($id)->row_array();
        $data['cat']        = $this->properties->getCat()->result_array();
        $data['unit']       = $this->properties->getUnit()->result_array();

        $get_image          = $this->products->detailProd($id)->row_array();
        $id_prod            = $id;
        $image              = $get_image['image'];

        $this->form_validation->set_rules('item', 'Item Name', 'required|trim');
        $this->form_validation->set_rules('purchase_price', 'Purchase Price', 'required|trim');
        $this->form_validation->set_rules('selling_price', 'Selling Price', 'required|trim');

        if ($id == null) {
            $this->session->set_flashdata('message', 'Id cannot be empty.');
            redirect('product/');
        } else {
            if ($this->form_validation->run() == FALSE) {
                $this->template->load('backend/template', 'backend/product/edit', $data);
            } else {
                $img_upload = $_FILES['image']['name'];
                if ($img_upload) {
                    $config['allowed_types']    = 'gif|jpg|png|jpeg';
                    $config['max_size']         = '4096';
                    $config['upload_path']      = './uploads/product/';
                    $config['overwrite']        = true;

                    $this->load->library('upload', $config);

                    if ($this->upload->do_upload('image')) {
                        $image = $this->upload->data('file_name');
                        $conf['image_library']    = 'gd2';
                        $conf['source_image']     = './uploads/product/' . $image;
                        $conf['create_thumb']     = FALSE;
                        $conf['maintain_ratio']   = FALSE;
                        $conf['width']            = 650;
                        $conf['height']           = 350;
                        $conf['new_image']        = './uploads/product/' . $image;

                        $this->load->library('image_lib', $conf);
                        $this->image_lib->resize();
                    } else {
                        echo $this->upload->display_errors();
                    }
                }
                $param = [
                    'id'                => $id_prod,
                    'item_name'         => $this->input->post('item'),
                    'image'             => $image,
                    'purchase_price'    => $this->input->post('purchase_price'),
                    'selling_price'     => $this->input->post('selling_price'),
                    'profit'            => $this->input->post('selling_price') - $this->input->post('purchase_price'),
                    'category'          => $this->input->post('category'),
                    'unit'              => $this->input->post('unit')
                ];
                $this->products->updateProduct($param, $id_prod);
                $this->session->set_flashdata('message', 'Data updated successfully.');
                redirect('product/');
            }
        }
    }

    public function delete($id = null)
    {
        if ($id == null) {
            $this->session->set_flashdata('message', 'Id cannot be empty.');
            redirect('product/');
        } else {
            $this->products->delProduct($id);
            $this->session->set_flashdata('message', 'Data deleted.');
            redirect('product/');
        }
    }

    public function add()
    {
        $this->load->library('form_validation');
        $data['title']      = 'Add Product';
        $data['booking']    = $this->reservations->get(1)->num_rows();
        $data['user']       = $this->auth->getuser($this->session->userdata('username'))->row_array();
        $data['cat']        = $this->properties->getCat()->result_array();
        $data['unit']       = $this->properties->getUnit()->result_array();

        $this->form_validation->set_rules('item', 'Item Name', 'required|trim');
        $this->form_validation->set_rules('purchase_price', 'Purchase Price', 'required|trim');
        $this->form_validation->set_rules('selling_price', 'Selling Price', 'required|trim');


        if ($this->form_validation->run() == FALSE) {
            $this->template->load('backend/template', 'backend/product/add', $data);
        } else {
            $img_upload = $_FILES['image']['name'];
            if ($img_upload) {
                $config['allowed_types']    = 'gif|jpg|png|jpeg';
                $config['max_size']         = '4096';
                $config['upload_path']      = './uploads/product/';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image')) {
                    $image = $this->upload->data('file_name');
                    $conf['image_library']    = 'gd2';
                    $conf['source_image']     = './uploads/product/' . $image;
                    $conf['create_thumb']     = FALSE;
                    $conf['maintain_ratio']   = FALSE;
                    $conf['width']            = 650;
                    $conf['height']           = 350;
                    $conf['new_image']        = './uploads/product/' . $image;
                    $this->load->library('image_lib', $conf);
                    $this->image_lib->resize();
                } else {
                    echo $this->upload->display_errors();
                }
            }
            if ($image == null) {
                redirect('product/add');
            } else {
                $param = [
                    'id'                => null,
                    'item_name'         => $this->input->post('item'),
                    'image'             => $image,
                    'purchase_price'    => $this->input->post('purchase_price'),
                    'selling_price'     => $this->input->post('selling_price'),
                    'profit'            => $this->input->post('selling_price') - $this->input->post('purchase_price'),
                    'category'          => $this->input->post('category'),
                    'unit'              => $this->input->post('unit')
                ];
                $this->products->addProduct($param);
                $this->session->set_flashdata('message', 'New product added.');
                redirect('product/');
            }
        }
    }
}
