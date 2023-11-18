<?php

namespace RateModel;

class RateModel {
    private $db;
    public function __construct($db)
    {
        $this->db = $db;
    }
    public function getrates()
    {
        return $this->db->get('rates');
    }
    public function getrate($id)
    {
            $this->db->where("id", $id);
            return  $this->db->get("rates");
    }

    public function addrate($data)
    {
        return $this->db->insert('rates', $data);
    
    }
    
    public function editrate($id,$data)
    {
        $this->db->where("id", $id);
        return $this->db->update("rates", $data);
    }

    public function deleteRate($id)
    {
        $this->db->where("id", $id);
        return $this->db->delete("rates") ;
    }
}
?>
