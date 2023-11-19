<?php

// namespace ticketmodel;

class TicketModel
{
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }
    public function getTickets()
    {
        return $this->db->get('tickets');
    }
    public function getTicket($id)
    {
        $this->db->where('id', $id);
        return $this->db->get('tickets');
    }
    public function addTicket($data)
    {
        return $this->db->insert('tickets', $data);
    }
    public function editTicket($id, $data)
    {
        $this->db->where('id', $id);
        return $this->db->update('tickets', $data);
    }
    public function deleteTicket($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('tickets');
    }
}
