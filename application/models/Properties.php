<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Properties extends CI_Model
{
    public function add($param)
    {
        $this->db->insert('category', $param);
    }

    public function getCat($id = null)
    {
        if ($id == null) {
            $this->db->from('category');
            return $this->db->get();
        } else {
            $this->db->from('category');
            $this->db->where('id', $id);
            return $this->db->get();
        }
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

    public function edit($param)
    {
        $this->db->set('cat_title', $param['cat_title']);
        $this->db->where('id', $param['id']);
        $this->db->update('category', $param);
    }
}
