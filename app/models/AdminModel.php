<?php
namespace adminmodel;
class AdminModel 
{
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }
    
}