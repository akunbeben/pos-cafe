<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pos_process extends CI_Model
{
    public function process($param)
    {
        $this->db->insert('sales', $param);
    }

    public function addDetail($no_invoice)
    {
        $this->db->query("INSERT INTO sales_detail (id, sales_id, items, sold_qty)
                    SELECT null, '$no_invoice', cart.product_id, cart.qty
                    FROM cart");
    }

    public function last_row()
    {
        return $this->db->from('sales')->order_by('id DESC')->limit(1)->get()->row();
    }
}
