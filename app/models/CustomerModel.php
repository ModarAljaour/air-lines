<?php
class CustomerModel
{
    private $db;
    public function __construct($db)
    {
        $this->db = $db;
    }
    // ...... Get Customer By ID .................
    public function getCustomerByID($id)
    {
        $this->db->where('id', $id);
        return $this->db->get('customers');
    }
    // ................ GET Customer...................
    public function getCustomer()
    {
        // $this->db->where('id', $id);
        return $this->db->get('customers');
    }
    // ............... ADD Customer ...................
    public function addCustomer($data)
    {
        return $this->db->insert('customers', $data);
    }
    // ............... UPDATE Customer ................
    public function updateCustomer($data, $id)
    {
        $this->db->where('id', $id);
        $this->db->update('customers', $data);
    }
    // ............... DELETE Customer ................
    public function deleteCustomer($id)
    {
        $this->db->Where('id', $id);
        $this->db->delete('customers');
    }
}
