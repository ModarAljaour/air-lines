<?php
// namespace ticketcontroller;
class TicketController
{
    private $model;

    public function __construct($model)
    {
        $this->model = $model;
    }
    public function index()
    {
        if ($tickets = $this->model->getTickets()) {
            $json_r = isset($json_r) ? $json_r : new stdClass();
            $json_r->admin = $tickets;
            $json_r->status = "true";
            echo   $json = json_encode($json_r);
        } else {
            $json_r = isset($json_r) ? $json_r : new stdClass();
            $json_r->status = "false";
            echo  $json = json_encode($json_r);
        }
    }
    public function addTicket()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $company_id = $_POST['company_id'];
            $city_id = $_POST['city_id'];
            $date_s = $_POST['date_s'];
            $date_e = $_POST['date_e'];
            $data = [
                'company_id' => $company_id,
                'city_id' => $city_id,
                'date-s' => $date_s,
                'date-e' => $date_e
            ];
            if ($this->model->addTicket($data)) {
                $json_r = isset($json_r) ? $json_r : new stdClass();
                $json_r->status = "true";
                echo   $json = json_encode($json_r);
            } else {
                $json_r = isset($json_r) ? $json_r : new stdClass();
                $json_r->status = "false";
                echo  $json = json_encode($json_r);
            }
        }
    }
    public function updateTicket()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $company_id = $_POST['company_id'];
            $city_id = $_POST['city_id'];
            $date_s = $_POST['date_s'];
            $date_e = $_POST['date_e'];
            $data = [
                'company_id' => $company_id,
                'city_id' => $city_id,
                'date-s' => $date_s,
                'date-e' => $date_e
            ];
            if ($this->model->editTicket($_GET['id'], $data)) {
                $json_r = isset($json_r) ? $json_r : new stdClass();
                $json_r->status = "true update";
                echo  $json = json_encode($json_r);
            } else {
                $json_r = isset($json_r) ? $json_r : new stdClass();
                $json_r->status = "false";
                echo  $json = json_encode($json_r);
            }
        }
    }
    public function deleteTicket()
    {
        if ($this->model->deleteTicket($_GET['id'])) {
            $json_r = isset($json_r) ? $json_r : new stdClass();
            $json_r->status = "true";
            echo   $json = json_encode($json_r);
        } else {
            $json_r = isset($json_r) ? $json_r : new stdClass();
            $json_r->status = "false";
            echo  $json = json_encode($json_r);
        }
    }
}
