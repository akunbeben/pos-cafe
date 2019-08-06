<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Properties extends CI_Model
{
    public function add($param)
    {
        $this->db->insert('category', $param);
    }

    public function getCat()
    {
        $this->db->from('category');
        return $this->db->get();
    }

    public function getUnit()
    {
        $this->db->from('units');
        return $this->db->get();
    }

    public function delete($id)
    {
        $this->db->delete('category', ['id' => $id]);
    }
}
