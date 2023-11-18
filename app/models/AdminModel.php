<?php
class AdminModel
{
    private $db;
    public function __construct($db)
    {
        $this->db = $db;
    }
    // ...... Get Admin By ID .................
    public function getAdminByID($id)
    {
        $this->db->where('id', $id);
        return $this->db->get('admin');
    }
    // ................ GET Admin...................
    public function getAdmin()
    {
        // $this->db->where('id', $id);
        return $this->db->get('admin');
    }
    // ............... ADD Admin ...................
    public function addAdmin($data)
    {
        return $this->db->insert('admin', $data);
    }
    // ............... UPDATE ADMIN ................
    public function updateAdmin($data, $id)
    {
        $this->db->where('id', $id);
        $this->db->update('admin', $data);
    }
    // ............... DELETE ADMIN ................
    public function deleteAdmin($id)
    {
        $this->db->Where('id', $id);
        $this->db->delete('admin');
    }
}