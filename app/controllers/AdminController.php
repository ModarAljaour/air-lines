<?php
// namespace app\controllers;
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
        // $adminInfo = $this->model->getAdminByID($_POST['id']);
        $json_r = isset($json_r) ? $json_r : new stdClass();
        $json_r->admin = $admins;
        $json_r->status = "true";
        $json = json_encode($json_r);
        echo '<pre>';
        print_r($json);
        echo '</pre>';
    }
    // ........... Get Admin By Id ...........
    public function getAdminByID()
    {
        $adminInfo = $this->model->getAdminByID($_POST['id']);
        echo '<pre>';
        print_r($adminInfo);
        echo '</pre>';
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
                $json_r = isset($json_r) ? $json_r : new stdClass();
                $json_r->status = "true";
                echo $json = json_encode($json_r);
            } else {
                $json_r = isset($json_r) ? $json_r : new stdClass();
                $json_r->status = "false";
                echo $json = json_encode($json_r);
            }
        }
    }
    // ........... Update Admin ..................
    public function updateAdmin()
    {
        $update_admin = $this->model->getAdminByID($_GET['id']);
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

            if (!$this->model->updateAdmin($data, $_GET['id'])) {
                $json_r = isset($json_r) ? $json_r : new stdClass();
                $json_r->status = "true";
                echo  $json = json_encode($json_r);
            } else {
                $json_r = isset($json_r) ? $json_r : new stdClass();
                $json_r->status = "false";
                echo $json = json_encode($json_r);
            }
        }
    }
    public function deleteAdmin()
    {
        if ($this->model->deleteAdmin($_GET['id'])) {
            $json_r = isset($json_r) ? $json_r : new stdClass();
            $json_r->status = "true delete";
            echo $json = json_encode($json_r);
        } else {
            $json_r = isset($json_r) ? $json_r : new stdClass();
            $json_r->status = "false delete";
            echo  $json = json_encode($json_r);
        }
    }
}
