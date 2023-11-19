<?php
// namespace RateControlle;

class RateController
{
    public $model;

    public function __construct($model)
    {
        $this->model = $model;
    }
    public function select()
    {
        if ($rates =  $this->model->getRates()) {
            $json_r = isset($json_r) ? $json_r : new stdClass();
            $json_r->admin = $rates;
            $json_r->status = "true";
            echo $json = json_encode($json_r);
        } else {
            $json_r = isset($json_r) ? $json_r : new stdClass();
            $json_r->status = "false";
            echo $json = json_encode($json_r);
        }
        // $rate =  $this->model->getRate($_POST['id']);
    }

    public function addrate()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $customerId = $_POST['customer_id'];
            $hotelId = $_POST["hotel_id"];
            $star = $_POST['star'];
            $comment = $_POST['comment'];

            $data = [
                "customer_id" => "$customerId",
                "star" => "$star",
                "hotel_id" => "$hotelId",
                "comment" => "$comment"
            ];

            if ($this->model->addrate($data))
            $json_r = isset($json_r) ? $json_r : new stdClass();
            $json_r->status = "true";
            echo $json = json_encode($json_r);
        } else {
            $json_r = isset($json_r) ? $json_r : new stdClass();
            $json_r->status = "false";
            echo $json = json_encode($json_r);
        }
    }

    public function updateRated($id)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $star = $_POST['star'];
            $customerId = $_POST['customer_id'];
            $hotelId = $_POST["hotel_id"];
            $comment = $_POST["comment"];
            $data = [
                'star' => $star,
                'comment' => $comment
            ];

            if ($this->model->updaterate($_GET['id'], $data))
                $json_r = isset($json_r) ? $json_r : new stdClass();
            $json_r->status = "true update";
            echo  $json = json_encode($json_r);
        } else {
            $json_r = isset($json_r) ? $json_r : new stdClass();
            $json_r->status = "false";
            echo  $json = json_encode($json_r);
        }
    }


    public function deleterate($id)
    {
        if ($this->model->deleterate($_GET['id'])) {
            $json_r = isset($json_r) ? $json_r : new stdClass();
            $json_r->status = "true";
            echo  $json = json_encode($json_r);
        } else {
            $json_r = isset($json_r) ? $json_r : new stdClass();
            $json_r->status = "false";
            echo  $json = json_encode($json_r);
        }
    }
}
