<?php
//namespace bookingcontroller;
class BookingController
{
    public function __construct($model) 
    {
        $this->model = $model;
    }
    public function index() 
    {
        $booking = $this->model->getbookings();
        $json_a= isset($json_a)?$json_a:new stdclass();
        $json_a->bookings=$booking;
        $json=json_encode($json_a);
        print_r($json);
    }
    public function addBooking() {
        echo "this is add booking";
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $hotel_id=$_POST['hotel_id'];
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
    public function updatBooking()
    {
        echo "this is update";
        if ($_SERVER['REQUEST_METHOD'] === 'POST')
        {
            $hotel_id=$_POST['hotel_id'];
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
    public function deleteBooking()
    {            
        if($this->model->deleteBooking($_GET['id']))
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


