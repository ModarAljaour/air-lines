<?php
namespace bookingcontroller;
class BookingController
{
    public function __construct($model) 
    {
        $this->model = $model;
    }
    public function index() {
        $users = $this->model->getBookings();
    }
    public function addBooking() {
        echo "hello";
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $hotel_id=$_POST['hotel-id'];
            $customer_id=$_POST['customer_id'];
            $ticket_id=$_POST['ticket_id'];
            $date=$_POST['date'];
            $data = [
                'customer_id' =>$customer_id ,
                'ticket_id' => $ticket_id ,
                'hotel_id' => $hotel_id ,
                'date' => $date
            ];

            if ($this->model->addBooking($data)) {
                echo "Booking successfully!";

            } else {
                echo "Failed to Booking.";
            }
        
        }
    }
    public function updatBooking()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST')
        {
            $hotel_id=$_POST['hotel-id'];
            $customer_id=$_POST['customer_id'];
            $ticket_id=$_POST['ticket_id'];
            $date=$_POST['date'];
            $data = [
                'customer_id' =>$customer_id ,
                'ticket_id' => $ticket_id ,
                'hotel_id' => $hotel_id ,
                'date' => $date
            ];
            if($this->model->editBooking($_GET['id'],$data))
            {
                echo "Booking update successfully!";
            } else {
                echo "Failed to update Booking.";
            }
        }
    }
    public function deleteBooking()
    {            
        if($this->model->deleteBooking($_GET['id']))
        {
            echo "delete successfully";
        }
    }
}


