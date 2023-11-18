<?php
namespace RateControlle;

class RateController{
public $rate;

public function __construct($rate)
{
    $this->rate = $rate;
}
    public function select()
    {
        return $this->rate->getRates();
    }

    public function addrate()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST'){
        $customerId = $_POST['customer_id'];
        $hotelId=$_POST["hotel_id"];
        $star = $_POST['star'];
        $comment =$_POST['comment'];
    
            $data = [
                "customer_id" => "$customerId",
                "star" => "$star",
                "hotel_id" => "$hotelId",
                "comment"=>"$comment"
            ];
            if( $this->rate->addrate($data))
            echo "rate add successfully" ;
        }
        
    }

    public function updateRatd($id)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST')
        {
            $star = $_POST['star'];
            $customerId = $_POST['customer_id'];
            $hotelId = $_POST["hotel_id"];
            $comment=$_POST["comment"];
            $data = [
            'star'=>$star,
            'comment'=>$comment
            ];    
            
            if($this->model->editrate($_GET['id'],$data))
            echo "rate update successfully";
                }
           
        }
       
    
    public function deleterate($id)
    {
        if($this->model->deleterate($_GET['id']))
        {
            echo "rate delete successfully";
        }
    }
}
?>