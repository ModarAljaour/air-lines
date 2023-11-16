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
        $admins = $this->model->getCustomer();

        // $adminInfo = $this->model->getAdminByID(3);
        // // $adminInfo = $this->model->getAdminByID($_POST['id']);
        // foreach ($adminInfo as $admin) {
        //     foreach ($admin as $key => $value) {
        //         echo "<pre>";
        //         print_r($admin);
        //         echo "</pre>";
        //         break;
        //     }
        // }
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
                echo "true add Customer";
                //header("REFRESH:0; URL=" . BASE_PATH);
            } else {
                echo "Failed to add Customer.";
            }
        }
    }
    // ........... Update Admin .................
    public function updateCustomer()
    {
        $update_customer = $this->model->getCustomerByID($_POST['id']);
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

            if (!$this->model->updateCustomer($data, $_POST['id'])) {
                echo 'true update Customer';
                // header("REFRESH:0; URL=" . BASE_PATH);
            } else {
                echo "Failed to edit Customer.";
            }
        } else {
            echo 'aa';
        }
    }
    public function deleteCustomer()
    {
        $this->model->deleteCustomer($_POST['id']);
        // header("REFRESH:0; URL=" . BASE_PATH);
    }
}
