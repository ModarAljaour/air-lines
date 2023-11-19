<?php
// namespace control_city;
// use model_city;

class CityController
{
    private $model;

    public function __construct($model)
    {
        $this->model = $model;
    }

    public function index()
    {
        if ($cities = $this->model->getCities()) {
            $json_r = isset($json_r) ? $json_r : new stdClass();
            $json_r->admin = $cities;
            $json_r->status = "true";
            echo  $json = json_encode($json_r);
        } else {
            $json_r = isset($json_r) ? $json_r : new stdClass();
            $json_r->status = "false";
            echo   $json = json_encode($json_r);
        }
    }

    public function addCity()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'];
            $country = $_POST['country'];
            $data = [
                'name' => $name,
                'country' => $country,
            ];

            if ($this->model->addCity($data)) {
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


    public function updateCity($id)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'];
            $country = $_POST['country'];
            $data = [
                'name' => $name,
                'country' => $country,
            ];

            if ($this->model->updateCity($_GET['id'], $data)) {
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

    public function deleteCity()
    {
        if ($this->model->deleteCity($_GET['id'])) {
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
