<?php
// namespace model_hotel;
// use control_hotel;

class HotelModel {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function getHotels() {
        return $this->db->get('hotels');
    }


    public function getHotelByid($id) {
        return $this->db->where('id', $id)->getOne('hotels');
    }


    public function addHotel($data) {
        
        return $this->db->insert('hotels', $data);
    }

    
    public function updateHotel($id, $data)
    {     
        $this->db->where('id', $id);
        return $this->db->update('hotels', $data);
    }

    public function deleteHotel($id) {
       $this->db->where('id',$id);
        return $this->db->delete('hotels', $id);
    }



}
?>





