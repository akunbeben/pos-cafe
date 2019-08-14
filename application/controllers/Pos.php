<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pos extends CI_Controller
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
    }

    public function index()
    {
        $data['title']          = 'Point Of Sales';
        $data['user']           = $this->auth->getuser($this->session->userdata('username'))->row_array();
        $data['booking']        = $this->reservations->get(1)->num_rows();
        $data['products']       = $this->cart->carts()->result_array();
        $data['cart']           = $this->cart->getCartData()->result_array();
        $data['invoice']        = FormatNoTrans(OtomatisID());
        $data['grand_total']    = $this->cart->grandTotal();


        $this->form_validation->set_rules('qty', 'Quantity', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->template->load('backend/template', 'backend/pos/index', $data);
        } else {
            $param = [
                'id'            => null,
                'product_id'    => $this->input->post('product'),
                'qty'           => $this->input->post('qty')
            ];
            $this->cart->addtocart($param);

            $product = $this->products->detailProd($param['product_id'])->row_array();
            $qty = $this->cart->getCartDetail($param['product_id'])->row_array();

            $isi = [
                'id'            => null,
                'cart_id'       => $qty['id'],
                'sub_total'     => $product['selling_price'] * $qty['qty']
            ];
            $this->cart->sub_total($isi);
            redirect('pos/');
        }
    }

    public function process()
    {
        $invoice            = FormatNoTrans(OtomatisID());
        $grand_total        = $this->cart->grand_total();
        $param['cash']      = $this->input->post('cash');
        $param['customer']  = $this->input->post('customer');
        $param['cashier']   = $this->auth->getuser($this->session->userdata('username'))->row()->name;
    }

    public function delete($id)
    {
        $get_id = $id;
        $this->cart->delete($get_id);
        redirect('pos/');
    }

    public function clear()
    {
        $this->cart->clear();
        redirect('pos/');
    }
}
