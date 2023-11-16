<?php

class AdminController
{
    private $model;

    public function __construct($model)
    {
        $this->model = $model;
    }
    public function index()
    {
        $admins = $this->model->getAdmin();

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
    public function getAdminByID()
    {
        $adminInfo = $this->model->getAdminByID($_POST['id']);
    }
    public function addAdmin()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $name = $_POST['name'];
            $password = $_POST['password'];
            $email = $_POST['email'];

            $data = [
                'name' => $name,
                'email' => $email,
                'password' => $password
            ];
            if ($this->model->addAdmin($data)) {
                echo "true add admin";
                //header("REFRESH:0; URL=" . BASE_PATH);
            } else {
                echo "Failed to add admin.";
            }
        }
    }
    // ........... Update Admin ..................
    public function updateAdmin()
    {
        $update_admin = $this->model->getAdminByID($_POST['id']);
        // echo '<pre>';
        // print_r($update_admin);
        // echo '</pre>';
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $name = $_POST['name'];
            $password = $_POST['password'];
            $email = $_POST['email'];

            $data = [
                'name' => $name,
                'email' => $email,
                'password' => $password
            ];

            if (!$this->model->updateAdmin($data, $_POST['id'])) {
                echo '<br>true update admin';
                // header("REFRESH:0; URL=" . BASE_PATH);
            } else {
                echo "Failed to edit admin";
            }
        }
    }
    public function deleteAdmin()
    {
        $this->model->deleteAdmin($_POST['id']);
        // header("REFRESH:0; URL=" . BASE_PATH);
    }
}
