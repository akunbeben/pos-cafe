<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Reports extends CI_Model
{
    public function get($invoice = null)
    {
        if ($invoice == null) {
            $this->db->select('id, cashier, customer, total, profit, cash_in, cashback, TIME_FORMAT(sales_date, "%H:%i:%s %d-%M-%Y") as sales_date');
            $this->db->from('sales');
            return $this->db->get();
        } else {
            $this->db->select('id, cashier, customer, total, profit, cash_in, cashback, TIME_FORMAT(sales_date, "%H:%i:%s %d-%M-%Y") as sales_date');
            $this->db->from('sales');
            $this->db->where('id', $invoice);
            return $this->db->get();
        }
    }

    public function detail($invoice)
    {
        $this->db->select('products.item_name, sales_detail.sold_qty, products.selling_price, products.purchase_price');
        $this->db->from('sales_detail');
        $this->db->join('products', 'products.id = sales_detail.items');
        $this->db->where('sales_id', $invoice);
        return $this->db->get();
    }
}
