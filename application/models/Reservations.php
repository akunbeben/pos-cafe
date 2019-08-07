<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Reservations extends CI_Model
{
    public function booking($param)
    {
        $this->db->insert('reservation', $param);
    }

    public function get($param = null)
    {
        if ($param == null) {
            $this->db->select('reservation.id, reservation.name, reservation.phone, booking_status.status_b, reservation.booking_at');
            $this->db->from('reservation');
            $this->db->join('booking_status', 'booking_status.id = reservation.status');
            $this->db->order_by('status', 'ASC');
            $this->db->order_by('booking_at', 'ASC');
            return $this->db->get();
        } else {
            $this->db->from('reservation');
            $this->db->where('status', $param);
            return $this->db->get();
        }
    }

    public function check($param, $id)
    {
        $this->db->set('status', $param);
        $this->db->where('id', $id);
        $this->db->update('reservation');
    }
}
