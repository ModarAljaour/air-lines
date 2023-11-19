<?php

class CustomerController
{
    private $model;

    public function __construct($model)
    {
        $this->model = $model;
    }
    public function index()
    {
        $customers = $this->model->getCustomer();
        // $customer =  $this->model->getCustomerByID($_POST['id']);
        if ($customer =  $this->model->getCustomer()) {
            $json_r = isset($json_r) ? $json_r : new stdClass();
            $json_r->admin = $customer;
            $json_r->status = "true";
            echo $json = json_encode($json_r);
        } else {
            $json_r = isset($json_r) ? $json_r : new stdClass();
            $json_r->status = "false";
            echo $json = json_encode($json_r);
        }
    }
    // ........... Get Admin By Id ...........
    public function getCustomerByID()
    {
        $this->model->getCustomerByID($_POST['id']);
    }
    public function addCustomer()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];
            $gender = $_POST['gender'];

            $data = [
                'name' => $name,
                'email' => $email,
                'phone' => $phone,
                'gender' => $gender,
            ];
            if ($this->model->addCustomer($data)) {
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
    // ........... Update Admin .................
    public function updateCustomer()
    {
        $update_customer = $this->model->getCustomerByID($_GET['id']);
        // print_r($update_customer);   
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $name = $_POST['name'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];
            $gender = $_POST['gender'];

            $data = [
                'name' => $name,
                'email' => $email,
                'phone' => $phone,
                'gender' => $gender,
            ];

            if (!$this->model->updateCustomer($data, $_GET['id'])) {
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
    public function deleteCustomer()
    {
        if ($this->model->deleteCustomer($_POST['id'])) {
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
