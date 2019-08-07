<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Reservations extends CI_Model
{
    public function booking($param)
    {
        $this->db->insert('reservation', $param);
    }

    public function get()
    {
        $this->db->select('reservation.id, reservation.name, reservation.phone, booking_status.status_b, reservation.booking_at');
        $this->db->from('reservation');
        $this->db->join('booking_status', 'booking_status.id = reservation.status');
        $this->db->order_by('booking_at ASC');
        return $this->db->get();
    }
}
