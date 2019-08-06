<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Products extends CI_Model
{
    public function getProduct()
    {
        $this->db->select('products.id, products.item_name, products.purchase_price, products.selling_price, products.image, products.profit, products.category, products.unit, category.cat_title, units.unit_title');
        $this->db->from('products');
        $this->db->join('category', 'category.id = products.category');
        $this->db->join('units', 'units.id = products.unit');
        return $this->db->get();
    }

    public function getProductFrontend()
    {
        $this->db->select('products.id, products.item_name, products.purchase_price, products.selling_price, products.image, products.profit, products.category, products.unit, category.cat_title, units.unit_title');
        $this->db->from('products');
        $this->db->join('category', 'category.id = products.category');
        $this->db->join('units', 'units.id = products.unit');
        $this->db->limit(6);
        $this->db->order_by('id DESC');
        return $this->db->get();
    }

    public function detailProd($id = null)
    {
        $this->db->select('products.id, products.item_name, products.purchase_price, products.selling_price, products.image, products.profit, products.category, products.unit, category.cat_title, units.unit_title');
        $this->db->from('products');
        $this->db->join('category', 'category.id = products.category');
        $this->db->join('units', 'units.id = products.unit');
        $this->db->where('products.id', $id);
        return $this->db->get();
    }

    public function updateProduct($param = null, $id_prod)
    {
        if ($param['image'] == null) {
            $this->db->set('item_name', $param['item_name']);
            $this->db->set('image', $param['image']);
            $this->db->set('purchase_price', $param['purchase_price']);
            $this->db->set('selling_price', $param['selling_price']);
            $this->db->set('profit', $param['profit']);
            $this->db->set('category', $param['category']);
            $this->db->set('unit', $param['unit']);
            $this->db->where('id', $param['id']);
            $this->db->replace('products', $param);
        } else {
            $this->db->set('item_name', $param['item_name']);
            $this->db->set('image', $param['image']);
            $this->db->set('purchase_price', $param['purchase_price']);
            $this->db->set('selling_price', $param['selling_price']);
            $this->db->set('profit', $param['profit']);
            $this->db->set('category', $param['category']);
            $this->db->set('unit', $param['unit']);
            $this->db->where('id', $param['id']);
            $this->db->replace('products', $param);
        }
    }

    public function delProduct($id)
    {
        $this->db->delete('products', ['id' => $id]);
    }

    public function addProduct($param)
    {
        $this->db->insert('products', $param);
    }
}
