<?php

// namespace CompanyController;

class CompanyController
{
    public $model;

    public function __construct($model)
    {
        $this->model = $model;
    }

    public function select()
    {
        if ($companies =  $this->model->getcompanies()) {
            $json_r = isset($json_r) ? $json_r : new stdClass();
            $json_r->admin = $companies;
            $json_r->status = "true";
            echo  $json = json_encode($json_r);
        } else {
            $json_r = isset($json_r) ? $json_r : new stdClass();
            $json_r->status = "false";
            echo  $json = json_encode($json_r);
        }
    }

    public function addCompany()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'];
            $phone = $_POST['phone'];

            $data = [
                "name" => "$name",
                "phone" => "$phone"
            ];
            if ($this->model->addcompany($data)) {
                $json_r = isset($json_r) ? $json_r : new stdClass();
                $json_r->status = "true";
                echo   $json = json_encode($json_r);
            } else {
                $json_r = isset($json_r) ? $json_r : new stdClass();
                $json_r->status = "false";
                echo $json = json_encode($json_r);
            }
        }
    }

    public function updateCompany($id)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $name = $_POST['name'];
            $phone = $_POST['phone'];
            $data = array();

            $data = [
                "name" => "$name",
                "phone" => "$phone"
            ];
            if ($this->model->editcompany($_GET['id'], $data)) {
                $json_r = isset($json_r) ? $json_r : new stdClass();
                $json_r->status = "true update";
                echo  $json = json_encode($json_r);
            } else {
                $json_r = isset($json_r) ? $json_r : new stdClass();
                $json_r->status = "false";
                echo $json = json_encode($json_r);
            }
        }
    }


    public function deletecompany($id)
    {
        if ($this->model->deletecompany($_GET['id'])) {
            $json_r = isset($json_r) ? $json_r : new stdClass();
            $json_r->status = "true";
            echo $json = json_encode($json_r);
        } else {
            $json_r = isset($json_r) ? $json_r : new stdClass();
            $json_r->status = "false";
            echo  $json = json_encode($json_r);
        }
    }
}
