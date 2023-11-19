<?php
// namespace control_hotel;
// use model_hotel;

class HotelController
{
    private $model;

    public function __construct($model)
    {
        $this->model = $model;
    }
    public function index()
    {
        if ($hotels = $this->model->getHotels()) {
            $json_r = isset($json_r) ? $json_r : new stdClass();
            $json_r->admin = $hotels;
            $json_r->status = "true";
            echo $json = json_encode($json_r);
        } else {
            $json_r = isset($json_r) ? $json_r : new stdClass();
            $json_r->status = "false";
            echo $json = json_encode($json_r);
        };
    }

    public function addHotel()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $city_id = $_POST['city_id'];
            $name = $_POST['name'];
            $phone = $_POST['phone'];
            $data = [
                'city_id' => $city_id,
                'name' => $name,
                'phone' => $phone,

            ];

            if ($this->model->addHotel($data)) {
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


    public function updateHotel()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // $id = $_POST['id'];
            $city_id = $_POST['city_id'];
            $name = $_POST['name'];
            $phone = $_POST['phone'];
            $data = [
                'city_id' => $city_id,
                'name' => $name,
                'phone' => $phone,

            ];

            if ($this->model->updateHotel($_GET['id'], $data)) {
                $json_r = isset($json_r) ? $json_r : new stdClass();
                $json_r->status = "true update";
                echo $json = json_encode($json_r);
            } else {
                $json_r = isset($json_r) ? $json_r : new stdClass();
                $json_r->status = "false";
                echo  $json = json_encode($json_r);
            }
        }
    }
    public function deleteHotel()
    {
        if ($this->model->deleteHotel($_GET['id'])) {
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
