<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Products extends CI_Model
{
    public function getProduct()
    {
        $this->db->from('products');
        return $this->db->get();
    }
}
