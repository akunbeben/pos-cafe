<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cart extends CI_Model
{
    public function carts()
    {
        $this->db->from('products');
        $this->db->order_by('item_name', 'ASC');
        return $this->db->get();
    }

    public function getCartData()
    {
        $this->db->select('cart.id, cart.product_id, products.item_name, products.selling_price, cart.qty');
        $this->db->from('cart');
        $this->db->join('products', 'products.id = cart.product_id');
        return $this->db->get();
    }

    public function grandTotal()
    {
        $query = 'SELECT sum(sub_total) AS grand_total FROM cart_total';
        return $this->db->query($query)->row()->grand_total;
    }

    public function sub_total($isi)
    {
        $cart = $this->db->select('*')->from('cart_total')->where('cart_id', $isi['cart_id'])->get()->row_array();
        if ($cart['cart_id'] == $isi['cart_id']) {
            $this->db->set('sub_total', $isi['sub_total']);
            $this->db->where('cart_id', $isi['cart_id']);
            $this->db->update('cart_total');
        } else {
            $this->db->insert('cart_total', $isi);
        }
    }

    public function addtocart($param)
    {
        $prod = $this->db->select('*')->from('cart')->where('product_id', $param['product_id'])->get()->row_array();
        if ($this->input->post('product') == $prod['product_id']) {
            $this->db->set('qty', $param['qty']);
            $this->db->where('id', $prod['id']);
            $this->db->update('cart');
        } else {
            $this->db->insert('cart', $param);
        }
    }

    public function delete($id)
    {
        $this->db->delete('cart', ['id' => $id]);
    }

    public function clear()
    {
        return $this->db->query('DELETE FROM cart');
    }

    public function getCartDetail($id)
    {
        $this->db->from('cart');
        $this->db->where('product_id', $id);
        return $this->db->get();
    }
}
