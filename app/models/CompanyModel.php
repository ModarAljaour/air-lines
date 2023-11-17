<?php

namespace CompanyModel;

class CompanyModel{

    private $db;
    
    public function __construct($db)
    {
        $this->db = $db;
    }

    public function getCompany($id)
    {
            $this->db->where("id", $id);
            return $this->db->get("companies");    
    }

    public function addcompany($data)
    {
        return $this->db->insert('companies', $data);
    
    }

    public function editcompany($id , $data)
    {   $this->db->where("id", $id);
         return $this->db->update("companies", $data) ;
    }

    public function deletecompany($id)
    {
        $this->db->where("id", $id);
        return $this->db->delete('companies') ;
} }

?>