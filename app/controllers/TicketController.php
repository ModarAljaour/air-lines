<?php
//namespace ticketcontroller;
class TicketController
{
    public function __construct($model) 
    {
        $this->model = $model;
    }
    public function index() {
        $tickets = $this->model->getTickets();
        $json_a= isset($json_a)?$json_a:new stdclass();
        $json_a->tickets=$tickets;
        $json=json_encode($json_a);
        print_r($json);
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
                $json_a= isset($json_a)?$json_a:new stdclass();
                $json_a->status="true";
                echo $json=json_encode($json_a);

            } else {
                $json_a= isset($json_a)?$json_a:new stdclass();
                $json_a->status="false";
                echo $json=json_encode($json_a);
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
            if($this->model->editTicket($_GET['id'],$data))
            {
                $json_a= isset($json_a)?$json_a:new stdclass();
                $json_a->status="true";
                $json_a->data=$data;
                echo $json_a=json_encode($json_a);
            } 
            else  
            {
                $json_a= isset($json_a)?$json_a:new stdclass();
                $json_a->status="false";
                echo $json=json_encode($json_a);
            }
        }
    }
    public function deleteTicket()
    {            
        if($this->model->deleteTicket($_GET['id']))
        {
            $json_a= isset($json_a)?$json_a:new stdclass();
            $json_a->status="true";
            echo $json=json_encode($json_a);

        } else {
            $json_a= isset($json_a)?$json_a:new stdclass();
            $json_a->status="false";
            echo $json=json_encode($json_a);
        }
    }
}


