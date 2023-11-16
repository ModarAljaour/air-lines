<?php
namespace ticketcontroller;
class TicketController
{
    public function __construct($model) 
    {
        $this->model = $model;
    }
    public function index() {
        $users = $this->model->getTickets();
    }
    public function addTicket() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $company_id=$_POST['company_id'];
            $city_id=$_POST['city_id'];
            $date_s=$_POST['date_s'];
            $date_e=$_POST['date_e'];
            $data = [
                'company_id' =>$company_id ,
                'city_id' => $city_id ,
                'date-s' => $date_s ,
                'date-e' => $date_e
            ];

            if ($this->model->addTicket($data)) {
                echo "Ticket successfully!";

            } else {
                echo "Failed to Ticket.";
            }
        
        }
    }
    public function updatTicket()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST')
        {
            $company_id=$_POST['company_id'];
            $city_id=$_POST['city_id'];
            $date_s=$_POST['date_s'];
            $date_e=$_POST['date_e'];
            $data = [
                'company_id' =>$company_id ,
                'city_id' => $city_id ,
                'date-s' => $date_s ,
                'date-e' => $date_e
            ];
            if($this->model->editTicket($_POST['id'],$data))
            {
                echo "Ticket update successfully!";
            } else {
                echo "Failed to update Ticket.";
            }
        }
    }
    public function deleteTicket()
    {            
        if($this->model->deleteTicket($_GET['id']))
        {
            echo "delete successfully";
        }
    }
}


