<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Reservation extends CI_Model
{
    public function booking($param)
    {
        $this->db->insert('reservation', $param);
    }
}
