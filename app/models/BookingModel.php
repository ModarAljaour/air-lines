<?php
namespace bookingmodel;
class BookingModel {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }
    public function getbookings()
    {
        return $this->db->get('booking');
    }
    public function getbooking($id)
    {
        $this->db->where('id',$id);
        return $this->db->get('booking');
    }
    public function addBooking($data) 
    {
        return $this->db->insert('booking', $data);
    }
    public function editBooking($id,$data) {
        $this->db->where('id',$id);
        return $this->db->update('booking', $data);
    }
    public function deleteBooking($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('booking');
   
    }
}