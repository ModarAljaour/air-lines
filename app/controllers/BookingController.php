<?php
// namespace bookingcontroller;

class BookingController
{
    private $model;
    public function __construct($model)
    {
        $this->model = $model;
    }
    public function index()
    {
        if ($users = $this->model->getBookings()) {
            $json_r = isset($json_r) ? $json_r : new stdClass();
            $json_r->admin = $users;
            $json_r->status = "true";
            echo $json = json_encode($json_r);
        } else {
            $json_r = isset($json_r) ? $json_r : new stdClass();
            $json_r->status = "false";
            echo $json = json_encode($json_r);
        }
    }
    public function addBooking()
    {
        echo "hello";
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $hotel_id = $_POST['hotel_id'];
            $customer_id = $_POST['customer_id'];
            $ticket_id = $_POST['ticket_id'];
            $date = $_POST['date'];
            $data = [
                'customer_id' => $customer_id,
                'ticket_id' => $ticket_id,
                'hotel_id' => $hotel_id,
                'date' => $date
            ];

            if ($this->model->addBooking($data)) {
                $json_r = isset($json_r) ? $json_r : new stdClass();
                $json_r->status = "true";
                echo  $json = json_encode($json_r);
            } else {
                $json_r = isset($json_r) ? $json_r : new stdClass();
                $json_r->status = "false";
                echo   $json = json_encode($json_r);
            }
        }
    }
    public function updatBooking()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $hotel_id = $_POST['hotel-id'];
            $customer_id = $_POST['customer_id'];
            $ticket_id = $_POST['ticket_id'];
            $date = $_POST['date'];
            $data = [
                'customer_id' => $customer_id,
                'ticket_id' => $ticket_id,
                'hotel_id' => $hotel_id,
                'date' => $date
            ];
            if ($this->model->editBooking($_GET['id'], $data)) {
                $json_r = isset($json_r) ? $json_r : new stdClass();
                $json_r->status = "true update";
                echo   $json = json_encode($json_r);
            } else {
                $json_r = isset($json_r) ? $json_r : new stdClass();
                $json_r->status = "false";
                echo     $json = json_encode($json_r);
            }
        }
    }
    public function deleteBooking()
    {
        if ($this->model->deleteBooking($_GET['id'])) {
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
